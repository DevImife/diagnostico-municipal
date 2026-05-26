(function () {
  const media = window.EncuestaMedia || {};

  function getThemeColors() {
    const darkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

    return {
      background: darkMode ? "#525151" : "#ffffff",
      color: darkMode ? "#f9fafb" : "#111827",
      confirmButtonColor: darkMode ? "#977E5B" : "#56212f",
      cancelButtonColor: darkMode ? "#660000" : "#c3b08f",
    };
  }

  function scrollSurveyTop() {
    const contenedor = document.getElementById("contenedor2");
    contenedor?.scrollTo({ top: 0, behavior: "smooth" });
  }

  async function guardarEdificioActual(context) {
    const edificioActual = context.edificios[context.currentIndex];

    if (!edificioActual) return false;

    const extra = context.datosExtra[edificioActual];
    if (!extra) return false;

    try {
      context.subiendo = true;
      context.mensajeSubida = `Subiendo imagenes del edificio ${edificioActual}...`;
      context.progresoSubida = 0;

      extra.imagenes_paths = await media.uploadNewFiles(
        context,
        8,
        extra.imagenes,
        extra.imagenes_paths || []
      );

      extra.danio_paths = await media.uploadNewFiles(
        context,
        8,
        extra.imagen_danio,
        extra.danio_paths || []
      );

      media.applyEdificioPreviewState(extra);

      context.saveStepData(8, {
        edificios: context.edificios,
        edificioActual,
        respuesta_espacios: context.respuesta_espacios,
        respuesta_condiciones: context.respuesta_condiciones,
        datosExtra: context.datosExtra,
      });

      return true;
    } catch (error) {
      console.error("Error guardando edificio:", error);
      if (Array.isArray(extra?.imagenes)) {
        console.log(
          "Archivos edificio:",
          extra.imagenes.map((item) => ({
            name: item?.file?.name || item?.name || null,
            type: item?.file?.type || item?.type || null,
            existing: !!item?.existing,
          }))
        );
      }
      const message = error?.message || String(error) || "Error al subir imagenes";
      notyf.error(message);
      return false;
    } finally {
      context.subiendo = false;
    }
  }

  async function agregarEdificio(context) {
    const edificioActual = context.edificios[context.currentIndex];

    if (!edificioActual) {
      context.crearNuevoEdificio();
      return;
    }

    const guardado = await guardarEdificioActual(context);

    if (guardado) {
      context.crearNuevoEdificio();
    }
  }

  const advance = {
    1: async function () {
      const cctInput = document.getElementById("cct_encuesta");
      const plantelInput = document.getElementById("nombre_plantel_encuesta");
      const municipioInput = document.getElementById("municipio_encuesta");

      const valorCct = cctInput?.value.trim();
      const valorNombrePlantel = plantelInput?.value.trim();
      const valorMunicipio = municipioInput?.value.trim();

      [cctInput, plantelInput, municipioInput].forEach((input) => {
        input?.classList.remove("border", "border-red-500");
      });

      const theme = getThemeColors();

      if (valorCct && valorNombrePlantel && valorMunicipio) {
        Swal.fire({
          title: "Tus datos son correctos?",
          text: "Es importante para poder avanzar.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: theme.confirmButtonColor,
          cancelButtonColor: theme.cancelButtonColor,
          confirmButtonText: "Si, avanzar",
          cancelButtonText: "Presenta errores",
          background: theme.background,
          color: theme.color,
        }).then((result) => {
          if (result.isConfirmed) {
            this.saveStepData(1, {
              id_plantel:
                this.idPlantelActual ??
                this.planteles[0]?.plantel?.id ??
                this.planteles[0]?.plantel_id,
            });

            this.step = 2;
            scrollSurveyTop();
            return;
          }

          unlockField("edad_inmueble");
          unlockField("telefono_encuesta");
          unlockField("latitud_encuesta");
          unlockField("longitud_encuesta");
          unlockField("catalogo");
          unlockField("fachada_encuesta");
        });

        return;
      }

      if (!valorCct) {
        cctInput?.classList.add("border", "border-red-500");
      }

      if (!valorNombrePlantel) {
        plantelInput?.classList.add("border", "border-red-500");
      }

      Swal.fire({
        title: "Faltan datos",
        text: "Debes llenar todos los campos antes de continuar.",
        icon: "error",
        confirmButtonColor: "#56212f",
        background: theme.background,
        color: theme.color,
      });
    },

    2: async function () {
      if (!this.validarStep2()) {
        return;
      }

      this.saveStepData(2, {
        plantel_id: this.planteles[0]?.plantel_id,
        matricula: this.matricula,
      });

      this.step = 3;
    },

    3: async function () {
      this.step = 4;
    },

    4: async function () {
      const faltan = this.amenazas.filter((amenaza) => !this.seleccion[amenaza]);
      if (faltan.length > 0) {
        notyf.error("Faltan datos por llenar en la matriz.");
        return;
      }

      const faltanPredio = Object.values(this.predio).some(
        (value) => value === "" || value === null
      );

      if (faltanPredio) {
        notyf.error("Faltan datos por llenar del predio.");
        return;
      }

      const savedStep = this.loadStep(4);

      if (
        this.otrasAmenazas.imagenAmenaza.length === 0 &&
        savedStep?.otrasAmenazas?.imagenes?.length > 0
      ) {
        this.saveStepData(4, {
          otrasAmenazas: {
            otrosElementos: this.otrasAmenazas.otrosElementos,
            imagenes: savedStep.otrasAmenazas.imagenes,
          },
          predio: this.predio,
          seleccion: this.seleccion,
        });

        this.step = 5;
        return;
      }

      if (this.otrasAmenazas.imagenAmenaza.length === 0) {
        notyf.error("Debes subir la imagen de la amenaza.");
        return;
      }

      try {
        this.subiendo = true;
        this.progresoSubida = 0;
        this.mensajeSubida = "Subiendo imagenes de Posibles Amenazas...";

        const subida = await this.subirArchivosTemp(
          4,
          this.otrasAmenazas.imagenAmenaza
        );

        this.saveStepData(4, {
          otrasAmenazas: {
            otrosElementos: this.otrasAmenazas.otrosElementos,
            imagenes: subida.paths,
          },
          predio: this.predio,
          seleccion: this.seleccion,
        });

        this.otrasAmenazas.imagenAmenaza = [];
        this.preview = [];
        this.step = 5;
      } catch (error) {
        notyf.error("Error al subir las imagenes");
        console.error(error);
      } finally {
        this.subiendo = false;
      }
    },

    5: async function () {
      const faltanZona = Object.values(this.zonaSismica).some(
        (value) => value === "" || value === null
      );

      if (faltanZona) {
        notyf.error("Faltan datos por llenar en Zona Sismica.");
        return;
      }

      if (!this.documento.docPropiedad) {
        notyf.error("Debes seleccionar si cuentas con documento de propiedad.");
        return;
      }

      if (this.documento.docPropiedad === "no") {
        this.saveStepData(5, {
          zonaSismica: this.zonaSismica,
          documento: {
            docPropiedad: "no",
            tipoDocumento: null,
            otroTipo: null,
            archivoPropiedad: null,
          },
        });

        this.step = 6;
        return;
      }

      if (!this.documento.tipoDocumento) {
        notyf.error("Debes seleccionar el tipo de documento.");
        return;
      }

      if (
        this.documento.tipoDocumento === "otro" &&
        (!this.documento.otroTipo || this.documento.otroTipo.trim() === "")
      ) {
        notyf.error("Debes especificar el tipo de documento.");
        return;
      }

      if (typeof this.documento.archivoPropiedad === "string") {
        this.saveStepData(5, {
          zonaSismica: this.zonaSismica,
          documento: this.documento,
        });

        this.step = 6;
        return;
      }

      if (!(this.documento.archivoPropiedad instanceof File)) {
        notyf.error("Debes subir el archivo de propiedad.");
        return;
      }

      try {
        this.subiendo = true;
        this.progresoSubida = 0;
        this.mensajeSubida = "Subiendo documento de propiedad...";

        this.documento.archivoPropiedad = await media.uploadSingleFile(
          this,
          5,
          this.documento.archivoPropiedad,
          this.documento.archivoPropiedad
        );

        this.saveStepData(5, {
          zonaSismica: this.zonaSismica,
          documento: this.documento,
        });

        this.step = 6;
      } catch (error) {
        console.error(error);
        notyf.error("Error al subir el archivo de propiedad.");
      } finally {
        this.subiendo = false;
      }
    },

    6: async function () {
      const fileFields = Object.keys(media.getServiciosFileMap(this.servicios));

      const faltanServicios = Object.entries(this.servicios).some(([key, value]) => {
        if (fileFields.includes(key)) {
          return false;
        }

        return value === "" || value === null;
      });

      if (faltanServicios) {
        notyf.error("Faltan datos por llenar en el apartado de Servicios.");
        return;
      }

      const token = localStorage.getItem("form_token");

      if (!token) {
        notyf.error("La sesion del formulario expiro, vuelve a cargar la pagina.");
        return;
      }

      const rutasSubidas = {};
      const savedStep = this.loadStep(6);

      try {
        this.subiendo = true;
        this.progresoSubida = 0;
        this.mensajeSubida = "Subiendo imagenes de servicios...";

        for (const [campo, archivos] of Object.entries(
          media.getServiciosFileMap(this.servicios)
        )) {
          const rutasGuardadas = Array.isArray(savedStep?.servicios?.[campo])
            ? savedStep.servicios[campo]
            : [];

          rutasSubidas[campo] = await media.uploadNewFiles(
            this,
            6,
            archivos,
            rutasGuardadas
          );
        }

        this.saveStepData(6, {
          servicios: {
            ...this.servicios,
            ...rutasSubidas,
          },
        });

        fileFields.forEach((campo) => {
          this.servicios[campo] = [];
        });

        media.resetServiciosPreviewState(this);
        this.step = 7;
      } catch (error) {
        notyf.error("Ocurrio un error al subir las imagenes de Servicios.");
        console.error("ERROR STEP 6:", error);
      } finally {
        this.subiendo = false;
      }
    },

    7: async function () {
      const faltanRespuestas = Object.values(this.respuestas).some(
        (grupo) => Object.keys(grupo).length === 0
      );

      if (faltanRespuestas) {
        notyf.error("Faltan respuestas en el apartado de poblacion.");
        return;
      }

      const faltanEstado = Object.entries(this.estado_fisico).some(
        ([grupo, datos]) => {
          const camposValidos = this.camposEstadoFisicoPorGrupo(grupo);
          return camposValidos.some(
            (campo) => datos[campo] === "" || datos[campo] === null
          );
        }
      );

      if (faltanEstado) {
        notyf.error("Faltan datos en el Estado Fisico de los sanitarios.");
        return;
      }

      const faltanDescarga = Object.values(this.tipo_descarga).some(
        (value) => value === ""
      );

      if (faltanDescarga) {
        notyf.error("Debes completar el tipo de descarga para cada grupo.");
        return;
      }

      this.saveStepData(7, {
        respuestas: this.respuestas,
        estado_fisico: this.estado_fisico,
        tipo_descarga: this.tipo_descarga,
      });

      this.step = 8;
    },

    8: async function () {
      if (!this.validarEdificioActual()) {
        return;
      }

      Swal.fire({
        title: "Deseas agregar un nuevo edificio?",
        text: "Si no agregas otro, continuaremos al siguiente paso.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#56212f",
        cancelButtonColor: "#c3b08f",
        confirmButtonText: "Si, agregar",
        cancelButtonText: "No, avanzar",
      }).then(async (result) => {
        if (result.isConfirmed) {
          await this.agregarEdificio();
          return;
        }

        await this.guardarEdificioActual();
        this.step = 9;
      });
    },

    9: async function () {
      const faltanCampos = Object.keys(this.obraExterior).some((key) => {
        if (key.includes("fotografia") || key.includes("croquis")) return false;

        const value = this.obraExterior[key];
        return value === "" || value === null || value === undefined;
      });

      const faltanEstado =
        Object.keys(this.respuestaObraExterior).length === 0 ||
        Object.values(this.respuestaObraExterior).some((value) => !value);

      if (faltanCampos || faltanEstado) {
        notyf.error("Faltan datos por llenar en Obra Exterior.");
        return;
      }

      try {
        this.subiendo = true;
        this.progresoSubida = 0;
        this.mensajeSubida = "Subiendo imagenes de Obra Exterior...";

        this.obraExterior.fotografiaUsoMultiples_paths = await media.uploadNewFiles(
          this,
          9,
          this.obraExterior.fotografiaUsoMultiples,
          this.obraExterior.fotografiaUsoMultiples_paths || []
        );

        this.obraExterior.croquis_path = await media.uploadSingleFile(
          this,
          9,
          this.obraExterior.croquis,
          this.obraExterior.croquis_path
        );

        media.applyObraExteriorPreviewState(this.obraExterior);

        this.saveStepData(9, {
          respuestaObraExterior: this.respuestaObraExterior,
          obraExterior: this.obraExterior,
        });

        this.step = 10;
      } catch (error) {
        console.error(error);
        notyf.error("Error al subir imagenes de Obra Exterior");
      } finally {
        this.subiendo = false;
      }
    },

    10: async function () {
      const faltanDescripcion = Object.values(this.descripcion).some(
        (value) => value === "" || value === null || value === undefined
      );

      if (faltanDescripcion) {
        notyf.error("Faltan datos por llenar en este apartado.");
        return;
      }

      this.saveStepData(10, {
        necesidades: this.necesidades,
        elementosEstructurales: this.elementosEstructurales,
        elementosExteriores: this.elementosExteriores,
        accesibilidadMejora: this.accesibilidadMejora,
        espaciosMultiplesMejora: this.espaciosMultiplesMejora,
        descripcion: this.descripcion,
      });

      this.step = 11;
    },

    11: async function () {
      const faltanDatos = Object.values(this.bienesInservibles).some(
        (value) => value === "" || value === null || value === undefined
      );

      if (faltanDatos) {
        notyf.error("Faltan datos por llenar en Bienes Inservibles.");
        return;
      }

      this.saveStepData(11, {
        bienesInservibles: this.bienesInservibles,
      });

      this.step = 12;
    },

    12: async function () {
      const energiaSinArchivos = { ...this.energiaElectrica };

      delete energiaSinArchivos.documento;
      delete energiaSinArchivos.documento_path;
      delete energiaSinArchivos.fotografiaMedidor;
      delete energiaSinArchivos.fotografiaMedidor_path;
      delete energiaSinArchivos.archivoCertificadovie;
      delete energiaSinArchivos.archivoCertificadovie_path;

      const faltanDatos = Object.values(energiaSinArchivos).some(
        (value) => value === "" || value === null || value === undefined
      );

      if (faltanDatos) {
        notyf.error("Faltan datos por llenar en Energia Electrica.");
        return;
      }

      if (
        this.energiaElectrica.certificadoUvie === "si" &&
        !this.energiaElectrica.archivoCertificadovie
      ) {
        notyf.error("Debes subir el archivo del certificado UVIE.");
        return;
      }

      try {
        this.subiendo = true;
        this.progresoSubida = 0;
        this.mensajeSubida = "Subiendo archivos de Energia Electrica...";

        this.energiaElectrica.documento_path = await media.uploadSingleFile(
          this,
          12,
          this.energiaElectrica.documento,
          this.energiaElectrica.documento_path
        );

        this.energiaElectrica.fotografiaMedidor_path = await media.uploadSingleFile(
          this,
          12,
          this.energiaElectrica.fotografiaMedidor,
          this.energiaElectrica.fotografiaMedidor_path
        );

        if (this.energiaElectrica.certificadoUvie === "si") {
          this.energiaElectrica.archivoCertificadovie_path =
            await media.uploadSingleFile(
              this,
              12,
              this.energiaElectrica.archivoCertificadovie,
              this.energiaElectrica.archivoCertificadovie_path
            );
        }

        this.energiaElectrica = media.rehydrateEnergia(this.energiaElectrica);

        this.saveStepData(12, {
          energiaElectrica: this.energiaElectrica,
        });

        this.step = 13;
      } catch (error) {
        console.error(error);
        notyf.error("Error al subir archivos de Energia Electrica");
      } finally {
        this.subiendo = false;
      }
    },
  };

  const rehydrate = {
    2: function (data) {
      this.matricula = data.matricula?.map((item) => ({ ...item })) ?? [];
    },

    4: function (data) {
      this.seleccion = { ...data.seleccion };
      this.predio = { ...data.predio };
      this.otrasAmenazas.otrosElementos = data.otrasAmenazas?.otrosElementos ?? "";
      this.preview = media.previewUrls(data.otrasAmenazas?.imagenes ?? []);
      this.otrasAmenazas.imagenAmenaza = [];
    },

    5: function (data) {
      this.zonaSismica = {
        ...this.zonaSismica,
        ...data.zonaSismica,
      };

      this.documento = {
        ...this.documento,
        docPropiedad: data.documento?.docPropiedad ?? null,
        tipoDocumento: data.documento?.tipoDocumento ?? null,
        otroTipo: data.documento?.otroTipo ?? null,
        archivoPropiedad: data.documento?.archivoPropiedad ?? null,
      };
    },

    6: function (data) {
      this.servicios = {
        ...this.servicios,
        ...data.servicios,
      };

      const previews = media.rehydrateServiciosPreviewState(data.servicios);

      this.vialidadImagen = previews.vialidadImagen;
      this.sistemaAguaImagen = previews.sistemaAguaImagen;
      this.sistemaDrenajeImagen = previews.sistemaDrenajeImagen;
      this.sistemaEnergiaImagen = previews.sistemaEnergiaImagen;
      this.sistemaEspecialImagen = previews.sistemaEspecialImagen;
      this.sistemaTecnologiasImagen = previews.sistemaTecnologiasImagen;
      this.sistemaAccesibilidadImagen = previews.sistemaAccesibilidadImagen;
    },

    7: function (data) {
      this.respuestas = { ...this.respuestas, ...data.respuestas };
      this.estado_fisico = { ...this.estado_fisico, ...data.estado_fisico };
      this.tipo_descarga = { ...this.tipo_descarga, ...data.tipo_descarga };
    },

    8: function (data) {
      this.edificios = [...(data.edificios || [])];
      this.currentIndex = Math.max(
        this.edificios.indexOf(data.edificioActual),
        0
      );
      this.respuesta_espacios = { ...data.respuesta_espacios };
      this.respuesta_condiciones = { ...data.respuesta_condiciones };
      this.datosExtra = media.rehydrateDatosExtraCollection(data.datosExtra || {});
    },

    9: function (data) {
      this.respuestaObraExterior = { ...data.respuestaObraExterior };
      this.obraExterior = media.applyObraExteriorPreviewState({
        ...data.obraExterior,
      });
    },

    10: function (data) {
      this.necesidades = { ...data.necesidades };
      this.elementosEstructurales = { ...data.elementosEstructurales };
      this.elementosExteriores = { ...data.elementosExteriores };
      this.accesibilidadMejora = { ...data.accesibilidadMejora };
      this.espaciosMultiplesMejora = { ...data.espaciosMultiplesMejora };
      this.descripcion = { ...data.descripcion };
    },

    11: function (data) {
      this.bienesInservibles = { ...data.bienesInservibles };
    },

    12: function (data) {
      this.energiaElectrica = media.rehydrateEnergia(data.energiaElectrica || {});
    },
  };

  window.EncuestaStepHandlers = {
    advance,
    rehydrate,
    agregarEdificio: function () {
      return agregarEdificio(this);
    },
    guardarEdificioActual: function () {
      return guardarEdificioActual(this);
    },
  };
})();
