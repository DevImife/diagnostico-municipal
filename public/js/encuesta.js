// localStorage.removeItem("encuesta_step_1");


function formularioEncuesta() {
  const grupos = ["alumnas", "alumnos", "maestras", "maestros", "discapacidad_alumno", "discapacidad_alumna"];
  const media = window.EncuestaMedia || {};
  const stepHandlers = window.EncuestaStepHandlers || {};
  const createDatosExtraEdificio = media.createDatosExtraEdificio || function () {
    return {
      espacios: '',
      edad: '',
      estructura: '',
      niveles: '',
      otros: '',
      total_espacios: '',
      ejes: '',
      azotea: '',
      pisos: '',
      muros: '',
      imagenes: [],
      danio_estructural: [],
      imagen_danio: [],
      imagenes_paths: [],
      danio_paths: []
    };
  };
  let token = localStorage.getItem('form_token');

  if (!token) {
    token = crypto.randomUUID();
    localStorage.setItem('form_token', token);
  }

  return {
    formToken: token,
    subiendo: false,
    progresoSubida: 0,
    mensajeSubida: '',
    step: 1,
    planteles: [], // 🔹 aquí guardamos los datos de step1
    showAgregar: false,
    idPlantelActual: null,
    cct: "",
    fachadaEncuesta: null,
    fachadaGuardada: null,
    editando: false,
    creando: false,
    datosEditar: {
      latitudEdicion: '',
      longitudEdicion: '',
      telefonoEdicion: '',
      fachadaEdicion: '',
      EdadEdicion: '',
      catalogadoEdicion: '',
    },
    nombreArchivo: null,
    nombreDocPropiedad: null,
    nombreImagenAcceso: null,
    nombreImagenAgua: null,
    nombreImagenDrenaje: null,
    nombreImagenEnergia: null,
    nombreImagenEspeciales: null,
    nombreImagenTecno: null,
    nombreImagenAccesibilidad: null,
    nombreImagenEspacios: null,
    nombreImagenCroquis: null,
    nombreImagenFotMedidor: null,
    imagenCertificado: null,
    nombreImagenCertificado: null,
    matricula: [],
    errores: [], // aquí guardamos errores por plantel
    directorObras: { // 🔹 datos generales (step 3)
      directorobras: '',
      apellidos_director_obras: '',
      direccion_director_obras: '',
      telefono_director_obras: '',
      celular_director_obras: '',
      correo_director_obras: '',
      director_desarrallo_urbano: '',
      apellidos_director_urbano: '',
      direccion_director_desarrollo: '',
      telefono_director_desarrollo: '',
      celular_director_desarrollo: '',
      correo_director_desarrollo: '',
    },
    preview: [],
    vialidadImagen: [],
    sistemaAguaImagen: [],
    sistemaDrenajeImagen: [],
    sistemaEnergiaImagen: [],
    sistemaEspecialImagen: [],
    sistemaTecnologiasImagen: [],
    sistemaAccesibilidadImagen: [],
    edificioImagen: null,
    mostrarPDF: null,
    amenazas: [
      'Ladera',
      'Talud',
      'Barranca',
      'Río',
      'Arroyo',
      'Gasoducto',
      'Zona Inundable',
      'Torres de CFE',
      'Gasera',
      'Fallas Geológicas',
      'Gasolinera',
      'Ducto de Combustible',
      'Amenazas Viales',
      'Otros'
    ],
    distancias: ['0', '10-20', '20-50', '50-100', '100+'],
    seleccion: {},
    otrasAmenazas: {
      otrosElementos: '',
      imagenAmenaza: [],
    },
    predio: {
      superficieTerreno: '',
      superficieDesplante: '',
      superficieConstruida: '',
      medidasColindancia: '',
    },
    zonaSismica: {
      zona: '',
      tipo_suelo: '',
    },
    documento: {
      docPropiedad: '',
      tipoDocumento: '',
      archivoPropiedad: null,
      archivoPropiedad_path: null,
      otroTipo: '',
    },
    servicios: {
      tipo_vialidad: '',
      archivo_vialidad: [],
      agua_potable: '',
      drenaje_sanitario: '',
      energia_electrica: '',
      red_agua_potable: '',
      fotografia_agua_potable: [],
      tipo_drenaje: '',
      fotografia_drenaje: [],
      proveedor_energia: '',
      fotografia_energia: [],
      gas: '',
      aire_acondicionado: '',
      internet: '',
      fotografia_especiales: [],
      red_voz_datos: '',
      telefonia: '',
      fotografia_tecnologias: [],
      accesibilidad: '',
      estado_general: '',
      fotografias_accesibilidad: [],
    },
    tipoSeleccionado: "",
    componentes: ["WC", "Lavamanos", "Vertederos", "Mingitorios", "Regaderas", "Pasamanos", "Barra de Apoyo Laterales"],
    etiquetas: {
      alumnas: "Alumnas",
      alumnos: "Alumnos",
      maestras: "Maestras",
      maestros: "Maestros",
      discapacidad_alumno: "Alumnos con Discapacidad",
      discapacidad_alumna: "Alumnas con Discapacidad"
    },
    respuestas: {
      alumnas: {},
      alumnos: {},
      maestras: {},
      maestros: {},
      discapacidad_alumno: {},
      discapacidad_alumna: {},
    },
    get componentesVisibles() {
      let lista = [...this.componentesBase];

      // ➕ Mingitorios
      if (['alumnos', 'maestros', 'discapacidad_alumno'].includes(this.tipoSeleccionado)) {
        lista.push("Mingitorios");
      }

      // ➕ Accesibilidad
      if (['discapacidad_alumno', 'discapacidad_alumna'].includes(this.tipoSeleccionado)) {
        lista.push("Pasamanos", "Barra de Apoyo Laterales");
      }

      return lista;
    },
    componentesBase: [
      "WC",
      "Lavamanos",
      "Vertederos",
      "Regaderas"
    ],

    get estadoFisicoKeysVisibles() {
      // keys base (sin mingitorios)
      let keys = [
        'wc',
        'lavamanos',
        'vertederos',
        'regaderas',
        'mamparas',
        'instalacion_electrica',
        'instalacion_hidraulica',
        'instalacion_sanitaria',
        'letrinas'
      ];

      // ➕ mingitorios solo en estos grupos
      if (['alumnos', 'maestros', 'discapacidad_alumno'].includes(this.tipoSeleccionado)) {
        keys.push('mingitorios');
      }

      return keys;
    },
    camposEstadoFisicoPorGrupo(grupo) {
      let campos = [
        'wc',
        'lavamanos',
        'vertederos',
        'regaderas',
        'mamparas',
        'instalacion_electrica',
        'instalacion_hidraulica',
        'instalacion_sanitaria',
        'letrinas'
      ];

      if (['alumnos', 'maestros', 'discapacidad_alumno'].includes(grupo)) {
        campos.push('mingitorios');
      }

      return campos;
    },

    estado_fisico: grupos.reduce((acc, grupo) => {
      acc[grupo] = {
        wc: "",
        lavamanos: "",
        mingitorios: "",
        vertederos: "",
        regaderas: "",
        mamparas: "",
        instalacion_electrica: "",
        instalacion_hidraulica: "",
        instalacion_sanitaria: "",
        letrinas: "",
        // tipo_descarga: ""   // ✅ ya inicializado
      };
      return acc;
    }, {}),
    tipo_descarga: {
      alumnos: '',
      maestros: '',
      discapacidad_alumno: ''
    },
    rango: Array.from({
      length: 7
    }, (_, i) => i), // [0,1,2,3,4,5,6]
    //variables step 8
    numero_espacios: [0, 1, 2, 3, 4, 5, 6, '7+'],
    nombre_espacio: [
      'Aulas', 'Laboratorios', 'Talleres', 'Dirección',
      'Biblioteca', 'Aula de Computo', 'Sanitarios',
      'Cocina', 'Comedor', 'Pórtico', 'Cubo de escaleras',
      'Espacios Adosados', 'Otros'
    ],
    respuesta_espacios: {
      'A': {}
    },
    condicion_fisica: [
      'BUENO', 'REGULAR', 'MALO', 'NO APLICA', 'NO TIENE'
    ],
    nombre_condicion: [
      'Impermeabilización', 'Pisos Interiores', 'Aplanados', 'Pintura', 'Herrería y Cancelería',
      'Luminarias', 'Inst Eléctrica', 'Inst Hidráulica', 'Inst Sanitaria', 'Inst de Gas', 'Barandales',
      'Firmes Exteriores'
    ],
    respuesta_condiciones: {
      'A': {} // ya existe para el edificio A
    },
    edificios: ['A'],
    currentIndex: 0,
    get edificio() {
      return this.edificios[this.currentIndex];
    },
    datosExtra: {
      'A': createDatosExtraEdificio()
    },
    inicializarEdificio(nombre) {
      this.datosExtra[nombre] = createDatosExtraEdificio();
    },
    obraExterior: {
      bardaPerimetral: '',
      materialBarda: '',
      metrosCerco: '',
      materialCerco: '',
      portonAcceso: '',
      materialPorton: '',
      estacionamiento: '',
      materialEstacionamiento: '',
      plazaCivica: '',
      materialPlazaCivica: '',
      areaDeportiva: '',
      materialAreaDeportiva: '',
      cubiertas: '',
      medidaCubierta: '',
      materialCubierta: '',
      bebederos: '',
      materialBebederos: '',
      fotografiaUsoMultiples: [],
      fotografiaUsoMultiples_paths: [],
      croquis: null,
      croquis_path: null,
    },
    imagenEspacios: null,
    imagenCroquis: null,
    OExteriorEstado: ['BUENA', 'REGULAR', 'MALO', 'NO TIENE'],
    OExteriorEspacios: [
      'Muro de Acometida',
      'Alumbrado Exterior (dentro del inmueble)',
      'Barda Perimetral',
      'Cerco o Reja Perimetral',
      'Portón de Acceso',
      'Asta Bandera',
      'Estacionamiento',
      'Áreas Verdes',
      'Plaza Cívica',
      'Techumbre',
      'Área Deportiva',
      'Cubiertas',
      'Bebederos',
      'Otros',
    ],
    respuestaObraExterior: {

    },
    necesidades: {
      aulas: [],
      laboratorio: [],
      talleres: [],
      computo: [],
      biblioteca: [],
      aula_de_usos: [],
      comedor: [],
      direccion: [],
      sanitarios: [],
      otros: []
    },
    elementosEstructurales: {
      pintura: [],
      pisos_interiores: [],
      herreria: [],
      albañileria: [],
      aplanados: [],
      muebles_sanitarios: [],
      inst_electrica: [],
      inst_sanitaria: [],
      inst_hidraulica: [],
      inst_gas: [],
      impermeabilizacion: []
    },
    descripcion: {
      d_espacios: '',
      d_elementosEstructurales: '',
      d_accesibilidad: '',
      d_elementosExteriores: '',
      d_espaciosUsosMultiples: '',
    },
    elementosExteriores: {
      red_electica: [],
      red_hidraulica: [],
      red_sanitaria: [],
      cisterna: [],
      tinacos: [],
      fosa_septica: [],
      biodigestor: [],
    },
    accesibilidadMejora: {
      firmes_exteriores: [],
      andadores: [],
      rampas: [],
      pasamanos: [],
      otros: [],
    },
    espaciosMultiplesMejora: {
      area_deportiva: [],
      plaza_civica: [],
      techumbre: [],
      asta_bandera: [],
      cubierta: [],
      muro_acometida: [],
      alumbradoExterior: [],
      estacionamiento: [],
      areasVerdes: [],
      areaJuegosInfantiles: [],
      bebederos: [],
      cercoBarda: [],
      accesoPrincipal: [],
      otros: [],
    },
    bienesInservibles: {
      programaLimpia: '',
      correo: '',
      tansferencia: '',
      reImpresion: '',
      bajaBienes: '',
      eventoSiniestro: '',
      extravio: '',
    },
    energiaElectrica: {
      servicio: '',
      contrato: '',
      numeroServicio: '',
      documento: null,
      documento_path: null,
      medidor: '',
      numeroMedidior: '',
      fotografiaMedidor: null,
      fotografiaMedidor_path: null,
      activoMedidor: '',
      pago: '',
      adeudo: '',
      montoAdeudo: '',
      certificadoUvie: '',
      archivoCertificadovie: null,
      archivoCertificadovie_path: null,
    },
    mostrarRecibo: null,
    imagenMedidor: null,
    fotografias: [],
    reporteFotografico: null,
    // agregarEdificio() {
    //   const letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //   const next = letras[this.edificios.length]; // A=0,B=1,...

    //   // Agregar el nuevo edificio
    //   this.edificios.push(next);

    //   // Inicializa respuestas de espacios
    //   this.respuesta_espacios[next] = this.initEdificio();

    //   // Inicializa respuestas de condiciones
    //   this.respuesta_condiciones[next] = this.initCondiciones();

    //   // Inicializa datos extra
    //   this.inicializarEdificio(next);

    //   // Cambia la vista al nuevo
    //   this.currentIndex = this.edificios.length - 1;
    // },
    async agregarEdificio() {
      return stepHandlers.agregarEdificio?.call(this);
    },
    crearNuevoEdificio() {
      const letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      const next = letras[this.edificios.length];

      this.edificios.push(next);
      this.respuesta_espacios[next] = this.initEdificio();
      this.respuesta_condiciones[next] = this.initCondiciones();
      this.inicializarEdificio(next);

      this.currentIndex = this.edificios.length - 1;
    },
    async guardarEdificioActual() {
      return stepHandlers.guardarEdificioActual?.call(this) ?? false;
    },

    saveStep(step, data) {
      localStorage.setItem(`encuesta_step_${step}`, JSON.stringify(data));
    },
    // Alias opcional (para no tener que renombrar llamadas existentes)
    saveStepData(step, data) {
      return this.saveStep(step, data);
    },

    loadStep(step) {
      const data = localStorage.getItem(`encuesta_step_${step}`);
      return data ? JSON.parse(data) : null;
    },
    init() {
      this.respuesta_espacios['A'] = this.initEdificio();
      this.respuesta_condiciones['A'] = this.initCondiciones();
      this.inicializarEdificio('A');
      // Si detectas algún estado anterior, recarga 

      // console.log("INIT ejecutado");

      const step1 = this.loadStep(1);
      if (step1) {
        console.log("Step1 cargado:", step1);
      } else {
        console.warn("No hay Step1 aún");
      }
    },
    validarEdificioActual() {
      const edificio = this.edificio;

      // 1 Validar espacios (radios)
      const espacios = this.respuesta_espacios[edificio] || {};
      const totalEspacios = this.nombre_espacio.length;
      const contestados = Object.values(espacios).filter(v => v && v !== '').length;

      if (contestados !== totalEspacios) {
        notyf.error("Faltan datos por llenar en los ESPACIOS del edificio " + edificio);
        return false;
      }

      // 2 Validar datosExtra
      const extra = this.datosExtra[edificio];
      const camposExtraObligatorios = [
        'edad', 'estructura', 'niveles',
        'total_espacios', 'ejes', 'azotea', 'pisos', 'muros'
      ];

      for (const campo of camposExtraObligatorios) {
        if (!extra[campo] || extra[campo] === '') {
          notyf.error(`Falta completar "${campo}" del edificio ${edificio}`);
          return false;
        }
      }

      // 3 Validar condiciones físicas
      const condiciones = this.respuesta_condiciones[edificio] || {};

      if (Object.keys(condiciones).length !== this.nombre_condicion.length) {
        notyf.error("Faltan seleccionar CONDICIONES FÍSICAS del edificio " + edificio);
        return false;
      }

      // 4 Validar imágenes (si son obligatorias)
      if (extra.imagenes.length === 0) {
        notyf.error("Debes subir al menos 1 imagen del edificio " + edificio);
        return false;
      }

      return true; // Todo correcto
    },
    initEdificio() {
      let data = {};
      this.nombre_espacio.forEach(esp => {
        data[esp] = null;
      });
      return data;
    },
    initCondiciones() {
      let data = {};
      this.nombre_condicion.forEach(cond => {
        data[cond] = null;
      });
      return data;
    },
    setPlanteles(data) {
      this.planteles = data; // 🔹 actualiza directo desde Alpine
      this.errores = data.map(() => ({})); // inicializa errores vacíos
    },
    tieneDatos: false,
    async mostrarDatos(codigo) {
      codigo = codigo.trim();
      limpiarInputs();
      if (codigo.length !== 10) {
        notyf.error("El campo CCT debe tener exactamente 10 caracteres");
        this.tieneDatos = false;
        return;
      }

      // 🔹 Validar si ya existe registro
      const registro = await fetch(`/ccts/validarRegistro/${codigo}`);
      const validar = await registro.json();
      console.log("VALIDACIÓN:", validar);

      // 🔹 Si la CCT no existe
      if (validar === "no-existe-cct") {
        notyf.error("La CCT no existe en el catálogo");
        this.tieneDatos = false;
        return;
      }

      // 🔹 Si ya existe encuesta → preguntar si desea editar
      if (validar === "ya-registrado") {
        this.editando = true;
        Swal.fire({
          title: "Encuesta existente",
          text: "Este plantel ya tiene una encuesta registrada.",
          // text: "Este plantel ya tiene una encuesta registrada. ¿Deseas editarla?",
          icon: "warning",
          showCancelButton: false,
          // confirmButtonText: "Sí, editar",
          confirmButtonColor: '#56212f',
          cancelButtonText: "Cancelar"
        }).then((result) => {
          if (result.isConfirmed) {
            // Aquí envías al usuario a editar
            // window.location.href = `/encuestas/editar/${codigo}`;
          }
        });

        return; // IMPORTANTE: no ejecutar el try
      }

      // 🔹 Si está disponible → continuar con tu lógica
      if (validar === "disponible") {
        this.editando = false;

        //  limpiarInputs();
        try {
          const response = await fetch(`/ccts/datosGenerales/${codigo}`);
          const data = await response.json();

          if (!data || data.length === 0) {
            notyf.error("No se encontró ningún plantel con ese CCT favor de revisar");
            document.getElementById('cct_encuesta').value = '';
            document.getElementById('nombre_plantel_encuesta').value = '';
            this.tieneDatos = false;
            return;
          }

          // 🔹 (todo lo que ya tienes en tu try)
          this.planteles = data;

          this.idPlantelActual = this.planteles[0].plantel.id;
          console.log("ID actual ", this.idPlantelActual);
          //traer datos de localStorage

          const step1 = this.loadStep(1);

          if (step1 && step1.id_plantel) {
            console.log("ID de localStorage ", step1.id_plantel);
          } else {
            console.log("No hay Step1 en localStorage");
          }

          if (step1) {
            console.log("Step1 data:", step1);

            // Validación de plantel
            if (step1.id_plantel === this.idPlantelActual) {
              for (let i = 2; i <= 12; i++) {
                this.rehidratarStep(i);
              }
            }
          }

          this.matricula = data.map(item => ({
            cct_id: item.id,
            nombre_director: '',
            apellidos_director: '',
            direccion_director: '',
            telefono_director: '',
            celular_director: '',
            correo_director: '',
            alumnos: '',
            alumnas: '',
            directores: '',
            docentes: '',
            administrativos: '',
            conserjes: '',
            personas_discapacidad: '',
            total_grupos: ''
          }));

          this.tieneDatos = true;

          let item = data[0];

          fillAndLockInput('nombre_plantel_encuesta', item.plantel.nombre_plantel);
          fillAndLockInput('municipio_encuesta', item.plantel.codigo_postal.municipio.nombre_municipio);
          fillAndLockInput('latitud_encuesta', item.plantel.latitud);
          fillAndLockInput('longitud_encuesta', item.plantel.longitud);
          fillAndLockInput('domicilio_encuesta', item.plantel.codigo_postal.localidad);
          fillAndLockInput('telefono_encuesta', item.plantel.telefono);
          fillAndLockInput('codigo_postal_encuesta', item.plantel.codigo_postal.codigo_postal);
          fillAndLockInput('edad_inmueble', item.plantel.edad_plantel);
          fillAndLockInput('ambito', item.plantel.codigo_postal.zona);
          fillAndLockInput('catalogo', item.plantel.inah);
          fillAndLockInput('fachada_encuesta', item.plantel.inah);

          if (item.plantel.archivo_plantel) {
            this.fachadaGuardada = `/storage/fachadas/${item.plantel.archivo_plantel}`;
            this.fachadaEncuesta = null;
          } else {
            this.fachadaGuardada = null;
          }

        } catch (error) {
          console.error(error);
          notyf.error("Error al obtener datos");
          this.tieneDatos = false;
        }
      }
    },
    validarStep2() {
      let valido = true;
      let faltantes = [];

      // limpiar errores previos
      //this.errores = this.planteles.map(() => ({}));
      this.errores = this.matricula.map(() => ({}));

      const camposObligatorios = [
        "nombre_director",
        "apellidos_director",
        "direccion_director",
        "telefono_director",
        "celular_director",
        "correo_director",
        "alumnos",
        "alumnas",
        "directores",
        "docentes",
        "administrativos",
        "conserjes",
        "total_grupos"
      ];

      for (let i = 0; i < this.matricula.length; i++) {
        let p = this.matricula[i];
        let e = {};

        // 🔹 validar todos los campos numéricos > 0
        camposObligatorios.forEach(campo => {
          if (!p[campo] || p[campo] <= 0) {
            e[campo] = true;
            valido = false;
            faltantes.push(`${campo} (plantel ${i + 1})`);
          }
        });

        console.log(camposObligatorios);

        // 🔹 excepción: personas_discapacidad puede ser 0 pero no negativo
        if (p.personas_discapacidad === undefined || p.personas_discapacidad < 0) {
          e.personas_discapacidad = true;
          valido = false;
        }

        this.errores[i] = e;
      }

      if (!valido) {
        notyf.error("Faltan datos obligatorios");
      }

      return valido;
    },
    cambiarFachada() {
      this.fachadaGuardada = null;
      this.fachadaEncuesta = null;
    },
    async avanzar() {
      const handler = stepHandlers.advance?.[this.step];

      if (handler) {
        return handler.call(this);
      }

      this.step++;
    },
    retroceder() {
      if (this.step <= 1) return;

      this.step--;
      this.rehidratarStep(this.step);
    },
    mostrarFachada(item) {
      // Si el plantel tiene archivo guardado
      if (item.plantel.archivo_plantel) {
        this.fachadaGuardada = `/storage/fachadas/${item.plantel.archivo_plantel}`;
        this.fachadaEncuesta = null;
        this.datosEditar.fachadaEdicion = item.plantel.archivo_plantel;
      } else {
        // No hay imagen guardada, se habilita el input
        this.fachadaGuardada = null;
        this.fachadaEncuesta = null;
        this.datosEditar.fachadaEdicion = '';
      }
    },
    rehidratarStep(step) {
      const data = this.loadStep(step);
      if (!data) return;

      this.$nextTick(() => {
        const handler = stepHandlers.rehydrate?.[step];
        handler?.call(this, data);
      });
    },

    async subirFotosFinales(files) {

      try {

        this.subiendo = true;
        this.progresoSubida = 0;

        const subida = await this.subirArchivosTemp(13, files);

        // Guardar paths reales
        this.fotografias_paths = subida.paths;

        // Reconstruir preview desde servidor
        this.fotografias = subida.paths.map(p => ({
          preview: `/storage/${p}`,
          nombre: p.split('/').pop(),
          existing: true
        }));

        this.subiendo = false;

      } catch (e) {

        console.error(e);
        notyf.error("Error al subir fotografías");
        this.subiendo = false;
      }
    },


    async enviarEncuesta() {

      try {

        if (!this.fotografias_paths || this.fotografias_paths.length === 0) {
          notyf.error("Debes subir al menos una fotografía antes de enviar.");
          return;
        }

        if (this.subiendo) {
          notyf.error("Espera a que termine la carga de imágenes.");
          return;
        }

        const formData = new FormData();

        formData.append("plantel_id", this.planteles[0].plantel_id);
        formData.append("form_token", localStorage.getItem("form_token"));

        /* ======================================================
           🔹 STEP 1–13 SOLO JSON
        ====================================================== */

        formData.append("ccts", JSON.stringify(this.cct));
        formData.append("matricula", JSON.stringify(this.matricula));
        formData.append("amenazas", JSON.stringify(this.seleccion));
        formData.append("otrosElementos", JSON.stringify(this.otrasAmenazas));
        formData.append("medidas", JSON.stringify(this.predio));
        formData.append("documentoPropiedad", JSON.stringify(this.documento));
        formData.append("zonaSismica", JSON.stringify(this.zonaSismica));
        formData.append("servicioPlantel", JSON.stringify(this.servicios));
        formData.append("servSanitarioCantidad", JSON.stringify(this.respuestas));
        formData.append("servSanitarioEstado", JSON.stringify(this.estado_fisico));
        formData.append("tipoDescarga", JSON.stringify(this.tipo_descarga));
        formData.append("edifEspaciosCantidad", JSON.stringify(this.respuesta_espacios));
        formData.append("edifTipoEstructura", JSON.stringify(this.datosExtra));
        formData.append("edifCondiciones", JSON.stringify(this.respuesta_condiciones));
        formData.append("obraExteriorEstado", JSON.stringify(this.respuestaObraExterior));
        formData.append("obraExteriorComplementos", JSON.stringify(this.obraExterior));
        formData.append("necesidadMejora", JSON.stringify(this.necesidades));
        formData.append("elemEstructuraMejora", JSON.stringify(this.elementosEstructurales));
        formData.append("elemExteriorMejora", JSON.stringify(this.elementosExteriores));
        formData.append("accesibilidadMejora", JSON.stringify(this.accesibilidadMejora));
        formData.append("espaciosMejora", JSON.stringify(this.espaciosMultiplesMejora));
        formData.append("descripcionMejora", JSON.stringify(this.descripcion));
        formData.append("bienes", JSON.stringify(this.bienesInservibles));
        formData.append("energiaElectrica", JSON.stringify(this.energiaElectrica));

        /* ======================================================
           🔹 SOLO PATHS (NO FILES)
        ====================================================== */

        formData.append("fotografias_paths",
          JSON.stringify(this.fotografias_paths));

        formData.append("edificios",
          JSON.stringify(this.datosExtra));

        /* ======================================================
           🔹 ENVIAR
        ====================================================== */

        const response = await fetch(surveyUrl, {
          method: "POST",
          headers: {
            "X-CSRF-TOKEN": document
              .querySelector('meta[name="csrf-token"]')
              .getAttribute("content"),
          },
          body: formData,
        });

        const data = await response.json();

        if (!response.ok) {
          throw new Error(data.message || "Error al guardar encuesta");
        }

        Swal.fire({
          title: "Encuesta enviada",
          text: "Los datos se guardaron correctamente.",
          icon: "success",
          confirmButtonColor: "#56212f",
        }).then(() => {

          this.clearSurveyStorage();
          window.location.reload();

        });

      } catch (error) {

        console.error("❌ Error:", error);

        Swal.fire({
          title: "Error",
          text: "Ocurrió un problema al enviar la encuesta.",
          icon: "error",
          confirmButtonColor: "#56212f",
        });
      }
    },

    async subirArchivosTemp(step, archivos) {
      return new Promise((resolve, reject) => {

        const formData = new FormData();
        formData.append('step', step);
        formData.append('token', localStorage.getItem('form_token'));

        archivos.forEach(file => {
          formData.append('files[]', file);
        });

        const xhr = new XMLHttpRequest();

        xhr.open('POST', '/survey/upload-temp', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.upload.onprogress = (event) => {
          if (event.lengthComputable) {
            this.progresoSubida = Math.round((event.loaded / event.total) * 100);
          }
        };

        xhr.onload = () => {
          this.subiendo = false;
          let responseData = null;

          try {
            responseData = JSON.parse(xhr.responseText);
          } catch (e) {
            const preview = (xhr.responseText || '').slice(0, 300);
            reject(
              preview
                ? `Respuesta inválida del servidor: ${preview}`
                : 'Respuesta inválida del servidor'
            );
            return;
          }

          if (xhr.status >= 200 && xhr.status < 300) {
            resolve(responseData);
          } else {
            const errores = responseData?.errors
              ? Object.values(responseData.errors).flat().join(' ')
              : null;

            reject(responseData?.message || errores || xhr.responseText || 'Error al subir archivos');
          }
        };

        xhr.onerror = () => {
          this.subiendo = false;
          reject('Error de red');
        };

        xhr.send(formData);
      });
    },
    clearSurveyStorage() {
      const keys = [
        "encuesta_step_1",
        "encuesta_step_2",
        "encuesta_step_4",
        "encuesta_step_5",
        "encuesta_step_6",
        "encuesta_step_7",
        "encuesta_step_8",
        "encuesta_step_9",
        "encuesta_step_10",
        "encuesta_step_11",
        "encuesta_step_12",
        "form_token",
      ];

      keys.forEach(k => localStorage.removeItem(k));

    },

  };

}




document.addEventListener("livewire:navigated", () => {
  // Livewire SPA a veces destruye Alpine y lo vuelve a reconstruir
  if (window.Alpine) {
    window.formularioEncuesta = formularioEncuesta;
  }
});

function appendJsonAndFile(formData, name, data, fileKeys = []) {
  // Si fileKeys es string, lo convertimos en array automáticamente
  if (typeof fileKeys === 'string') fileKeys = [fileKeys];

  const temp = { ...data };
  fileKeys.forEach(k => delete temp[k]);
  formData.append(name, JSON.stringify(temp));

  fileKeys.forEach(key => {
    const value = data[key];
    if (Array.isArray(value)) {
      value.forEach((item) => {
        if (item.file) formData.append(`${key}[]`, item.file);
      });
    } else if (value instanceof File) {
      formData.append(key, value);
    }
  });
}


function fillAndLockInput(id, value) {
  const element = document.getElementById(id);
  if (!element) return;

  const tag = element.tagName.toLowerCase();

  // Aplica estilo común
  const lockedClasses = [
    'bg-gray-100',
    'text-gray-500',
    'dark:bg-gray-800',
    'dark:text-gray-400'
  ];

  switch (tag) {
    case 'input':
      if (element.type === 'file' || element.type === 'image') {
        element.disabled = true; // desactiva input tipo imagen o file
      } else {
        element.value = value ?? '';
        element.readOnly = true;
      }
      element.classList.add(...lockedClasses);
      break;

    case 'select':
      element.value = value ?? '';
      element.disabled = true;
      element.classList.add(...lockedClasses);
      break;

    case 'textarea':
      element.value = value ?? '';
      element.readOnly = true;
      element.classList.add(...lockedClasses);
      break;

    case 'img':
      if (value) element.src = value;
      // Estilo visual de bloqueo
      element.style.opacity = '0.6';
      element.style.pointerEvents = 'none';
      element.title = 'Campo bloqueado';
      break;

    default:
      console.warn(`Elemento con id="${id}" no es compatible.`);
      break;
  }
}

function limpiarInputs() {
  const campos = [
    'nombre_plantel_encuesta',
    'municipio_encuesta',
    'latitud_encuesta',
    'longitud_encuesta',
    'domicilio_encuesta',
    'telefono_encuesta',
    'codigo_postal_encuesta',
    'edad_inmueble',
    'ambito',
    'catalogo',
    'fachada_encuesta'
  ];

  campos.forEach(id => {
    const el = document.getElementById(id);
    if (el) {
      el.value = "";
      el.removeAttribute("readonly"); // por si estaba bloqueado
    }
  });
}

function unlockField(id) {
  const element = document.getElementById(id);
  if (!element) return;

  const tag = element.tagName.toLowerCase();

  // Quitar clases de bloqueo
  element.classList.remove(
    'bg-gray-100',
    'text-gray-500',
    'dark:bg-gray-800',
    'dark:text-gray-400'
  );

  // Restaurar clases normales de editable
  element.classList.add(
    'bg-white',
    'dark:bg-gray-950',
    'text-black',
    'dark:text-white',
    'border',
    'border-vino'
  );

  switch (tag) {
    case 'input':
      if (element.type === 'file' || element.type === 'image') {
        element.disabled = false; // reactivar input tipo file o image
      } else {
        element.readOnly = false; // permitir edición
        element.removeAttribute('readonly');
      }
      break;

    case 'select':
      element.disabled = false;
      break;

    case 'textarea':
      element.readOnly = false;
      element.removeAttribute('readonly');
      break;

    case 'img':
      // Restaurar apariencia e interacción
      element.style.opacity = '1';
      element.style.pointerEvents = 'auto';
      element.title = '';
      break;

    default:
      console.warn(`Elemento con id="${id}" no es compatible para desbloquear.`);
      break;
  }
}
