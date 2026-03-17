// localStorage.removeItem("encuesta_step_1");


function formularioEncuesta() {
  const grupos = ["alumnas", "alumnos", "maestras", "maestros", "discapacidad_alumno", "discapacidad_alumna"];
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
      'A': {
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
        imagenes_paths: [],  // rutas backend
        danio_paths: []
      }
    },
    inicializarEdificio(nombre) {
      this.datosExtra[nombre] = {
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

      };
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

      const edificioActual = this.edificios[this.currentIndex];

      // 🟡 Si no existe edificio actual, crear uno nuevo
      if (!edificioActual) {
        this.crearNuevoEdificio();
        return;
      }

      try {
        this.subiendo = true;
        this.mensajeSubida = `Subiendo imágenes del edificio ${edificioActual}...`;
        this.progresoSubida = 0;

        const extra = this.datosExtra[edificioActual];

        /* =====================================================
          📸 IMÁGENES GENERALES
        ===================================================== */
        if (Array.isArray(extra.imagenes) && extra.imagenes.length > 0) {

          // Solo subir las que sean nuevas (File)
          const nuevas = extra.imagenes.filter(i => i.file instanceof File);

          if (nuevas.length > 0) {
            const subida = await this.subirArchivosTemp(
              8,
              nuevas.map(i => i.file)
            );

            // 🔥 Agregar a las rutas existentes
            extra.imagenes_paths = [
              ...(extra.imagenes_paths || []),
              ...subida.paths
            ];
          }
        }

        /* =====================================================
          🚧 IMÁGENES DE DAÑO
        ===================================================== */
        if (Array.isArray(extra.imagen_danio) && extra.imagen_danio.length > 0) {

          const nuevasDanio = extra.imagen_danio.filter(i => i.file instanceof File);

          if (nuevasDanio.length > 0) {
            const subidaDanio = await this.subirArchivosTemp(
              8,
              nuevasDanio.map(i => i.file)
            );

            extra.danio_paths = [
              ...(extra.danio_paths || []),
              ...subidaDanio.paths
            ];
          }
        }

        /* =====================================================
          🧹 LIMPIAR SOLO FILES (NO RUTAS)
        ===================================================== */

        // Volvemos a dejar solo las previews existentes
        extra.imagenes = (extra.imagenes_paths || []).map(p => ({
          preview: `/storage/${p}`,
          existing: true
        }));

        extra.imagen_danio = (extra.danio_paths || []).map(p => ({
          preview: `/storage/${p}`,
          existing: true
        }));

        /* =====================================================
          💾 GUARDAR STEP 8
        ===================================================== */
        this.saveStepData(8, {
          edificios: this.edificios,
          edificioActual: edificioActual,
          respuesta_espacios: this.respuesta_espacios,
          respuesta_condiciones: this.respuesta_condiciones,
          datosExtra: this.datosExtra,
        });

      } catch (e) {
        console.error(e);
        notyf.error(`Error al subir imágenes del edificio ${edificioActual}`);
        this.subiendo = false;
        return;
      }

      this.subiendo = false;

      /* =====================================================
        ➕ CREAR NUEVO EDIFICIO
      ===================================================== */
      this.crearNuevoEdificio();
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

      const edificioActual = this.edificios[this.currentIndex];

      if (!edificioActual) return false;

      const extra = this.datosExtra[edificioActual];

      if (!extra) return false;

      try {

        this.subiendo = true;
        this.mensajeSubida = `Subiendo imágenes del edificio ${edificioActual}...`;
        this.progresoSubida = 0;

        /* =====================================================
          📸 IMÁGENES GENERALES
        ===================================================== */
        if (Array.isArray(extra.imagenes) && extra.imagenes.length > 0) {

          const nuevas = extra.imagenes.filter(i => i.file instanceof File);

          if (nuevas.length > 0) {

            const subida = await this.subirArchivosTemp(
              8,
              nuevas.map(i => i.file)
            );

            extra.imagenes_paths = [
              ...(extra.imagenes_paths || []),
              ...(subida?.paths || [])
            ];
          }
        }

        /* =====================================================
          🚧 IMÁGENES DE DAÑO
        ===================================================== */
        if (Array.isArray(extra.imagen_danio) && extra.imagen_danio.length > 0) {

          const nuevasDanio = extra.imagen_danio.filter(i => i.file instanceof File);

          if (nuevasDanio.length > 0) {

            const subidaDanio = await this.subirArchivosTemp(
              8,
              nuevasDanio.map(i => i.file)
            );

            extra.danio_paths = [
              ...(extra.danio_paths || []),
              ...(subidaDanio?.paths || [])
            ];
          }
        }

        /* =====================================================
          🧹 LIMPIAR FILES Y DEJAR SOLO PREVIEWS
        ===================================================== */

        extra.imagenes = (extra.imagenes_paths || []).map(p => ({
          preview: `/storage/${p}`,
          existing: true
        }));

        extra.imagen_danio = (extra.danio_paths || []).map(p => ({
          preview: `/storage/${p}`,
          existing: true
        }));

        /* =====================================================
          💾 GUARDAR STEP 8
        ===================================================== */

        this.saveStepData(8, {
          edificios: this.edificios,
          edificioActual: edificioActual,
          respuesta_espacios: this.respuesta_espacios,
          respuesta_condiciones: this.respuesta_condiciones,
          datosExtra: this.datosExtra,
        });

        return true;

      } catch (error) {

        console.error("Error guardando edificio:", error);

        notyf.error(`Error al subir imágenes del edificio ${edificioActual}`);

        return false;

      } finally {
        this.subiendo = false;
      }
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
      if (this.step === 1) {

        const cctInput = document.getElementById("cct_encuesta");
        const plantelInput = document.getElementById("nombre_plantel_encuesta");
        const municipioInput = document.getElementById("municipio_encuesta");

        const valorCct = cctInput?.value.trim();
        const valorNombrePlantel = plantelInput?.value.trim();
        const valorMunicipio = municipioInput?.value.trim();

        // 🔹 Resetear estilos antes de validar
        [cctInput, plantelInput, municipioInput].forEach(input => {
          input.classList.remove("border", "border-red-500");
        });

        // 🔹 Detecta si está activo el modo oscuro
        // const darkMode = document.documentElement.classList.contains("dark");
        const darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        console.log(darkMode);
        const fondo = darkMode ? "#525151" : "#ffffff"; // gris oscuro o blanco
        const texto = darkMode ? "#f9fafb" : "#111827"; // texto claro u oscuro
        const botonConfirmar = darkMode ? "#977E5B" : "#56212f";
        const botonCancelar = darkMode ? "#660000" : "#c3b08f";

        if (valorCct && valorNombrePlantel && valorMunicipio) {
          Swal.fire({
            title: '¿Tus datos son correctos?',
            text: "¡Es importante para poder avanzar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: botonConfirmar,
            cancelButtonColor: botonCancelar,
            confirmButtonText: 'Sí, avanzar',
            cancelButtonText: 'Presenta errores',
            background: fondo,
            color: texto,
          }).then((result) => {
            if (result.isConfirmed) {
              console.log(this.datosEditar);
              console.log(this.cct);
              // guardar en localStorage
              this.saveStepData(1, {
                id_plantel: this.planteles[0].plantel_id,
              });

              this.step = 2;
              //this.avanzar();
              const contenedor = document.getElementById("contenedor2");
              contenedor.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
              unlockField('edad_inmueble');
              unlockField('telefono_encuesta');
              unlockField('latitud_encuesta');
              unlockField('longitud_encuesta');
              unlockField('catalogo');
              unlockField('fachada_encuesta');
            }
          });
        } else {
          // 🔹 Si falta algún campo, lo marco en rojo
          if (!valorCct) {
            cctInput.classList.add("border", "border-red-500");
          }
          if (!valorNombrePlantel) {
            plantelInput.classList.add("border", "border-red-500");
          }

          // 🔹 Mostrar alerta amigable
          Swal.fire({
            title: "Faltan datos",
            text: "Debes llenar todos los campos antes de continuar.",
            icon: "error",
            confirmButtonColor: "#56212f",
            background: fondo,
            color: texto
          });
        }
      } else if (this.step === 2) {
        console.log(this.planteles[0].plantel_id);
        console.log(this.matricula);
        if (!this.validarStep2()) {
          return; // no pasa al step3
        }
        this.saveStepData(2, {
          plantel_id: this.planteles[0]?.plantel_id,
          matricula: this.matricula
        });
        this.step = 3; // avanza solo uno
      } else if (this.step === 3) {
        console.log(this.directorObras);

        this.step = 4; // avanza solo uno
      } else if (this.step === 4) {

        // 🔹 Validaciones (igual que antes)
        const faltan = this.amenazas.filter(a => !this.seleccion[a]);
        if (faltan.length > 0) {
          notyf.error("Faltan datos por llenar en la matriz.");
          return;
        }

        const faltanPredio = Object.values(this.predio)
          .some(v => v === "" || v === null);
        if (faltanPredio) {
          notyf.error("Faltan datos por llenar del predio.");
          return;
        }

        // 🔹 Obtener lo que YA está guardado
        const s4 = this.loadStep(4);

        // 🔹 CASO 1: NO hay archivos nuevos, PERO ya hay imágenes guardadas
        if (this.otrasAmenazas.imagenAmenaza.length === 0 && s4?.otrasAmenazas?.imagenes?.length > 0) {
          // NO subir
          // NO sobrescribir imágenes
          this.saveStepData(4, {
            otrasAmenazas: {
              otrosElementos: this.otrasAmenazas.otrosElementos,
              imagenes: s4.otrasAmenazas.imagenes
            },
            predio: this.predio,
            seleccion: this.seleccion
          });

          this.step = 5;
          return;
        }

        // 🔹 CASO 2: Hay archivos nuevos → subir
        if (this.otrasAmenazas.imagenAmenaza.length === 0) {
          notyf.error("Debes subir la imagen de la amenaza.");
          return;
        }

        try {
          this.subiendo = true;
          this.progresoSubida = 0;
          this.mensajeSubida = "Subiendo imágenes de Posibles Amenazas...";

          const subida = await this.subirArchivosTemp(
            4,
            this.otrasAmenazas.imagenAmenaza
          );

          this.saveStepData(4, {
            otrasAmenazas: {
              otrosElementos: this.otrasAmenazas.otrosElementos,
              imagenes: subida.paths
            },
            predio: this.predio,
            seleccion: this.seleccion
          });

          // 🧹 limpiar SOLO memoria
          this.otrasAmenazas.imagenAmenaza = [];
          this.preview = [];

          this.step = 5;

        } catch (e) {
          notyf.error("Error al subir las imágenes");
          console.error(e);
        }

      } else if (this.step === 5) {

        const faltanZona = Object.values(this.zonaSismica)
          .some(v => v === "" || v === null);

        if (faltanZona) {
          notyf.error("Faltan datos por llenar en Zona Sísmica.");
          return;
        }

        if (!this.documento.docPropiedad) {
          notyf.error("Debes seleccionar si cuentas con documento de propiedad.");
          return;
        }

        // 🔹 SI NO TIENE DOCUMENTO
        if (this.documento.docPropiedad === "no") {

          this.saveStepData(5, {
            zonaSismica: this.zonaSismica,
            documento: {
              docPropiedad: "no",
              tipoDocumento: null,
              otroTipo: null,
              archivoPropiedad: null
            }
          });

          this.step = 6;
          return;
        }

        // 🔹 VALIDAR TIPO
        if (!this.documento.tipoDocumento) {
          notyf.error("Debes seleccionar el tipo de documento.");
          return;
        }

        if (this.documento.tipoDocumento === "otro" &&
          (!this.documento.otroTipo || this.documento.otroTipo.trim() === "")) {
          notyf.error("Debes especificar el tipo de documento.");
          return;
        }

        // 🅱️ SI YA ES STRING (YA ESTÁ SUBIDO)
        if (typeof this.documento.archivoPropiedad === 'string') {

          this.saveStepData(5, {
            zonaSismica: this.zonaSismica,
            documento: this.documento
          });

          this.step = 6;
          return;
        }

        // 🅰️ SI ES ARCHIVO NUEVO
        if (!(this.documento.archivoPropiedad instanceof File)) {
          notyf.error("Debes subir el archivo de propiedad.");
          return;
        }

        try {

          this.subiendo = true;
          this.progresoSubida = 0;
          this.mensajeSubida = "Subiendo documento de propiedad...";

          // console.log("Tipo:", this.documento.archivoPropiedad);
          // console.log("Es File?", this.documento.archivoPropiedad instanceof File);

          const subida = await this.subirArchivosTemp(
            5,
            [this.documento.archivoPropiedad]
          );

          // 🔥 IMPORTANTE: guardar ruta
          this.documento.archivoPropiedad = subida.paths[0];

          this.saveStepData(5, {
            zonaSismica: this.zonaSismica,
            documento: this.documento
          });

          this.step = 6;

        } catch (e) {

          console.error(e);
          notyf.error("Error al subir el archivo de propiedad.");

        } finally {
          this.subiendo = false;
        }
        //inicio 6
      } else if (this.step === 6) {

        console.log(this.servicios);

        /* =========================
           1️⃣ VALIDAR CAMPOS NO ARCHIVO
        ========================= */

        const faltanServicios = Object.entries(this.servicios).some(
          ([key, value]) => {
            // ignorar campos de archivos
            if ([
              'archivo_vialidad',
              'fotografia_agua_potable',
              'fotografia_drenaje',
              'fotografia_energia',
              'fotografia_especiales',
              'fotografia_tecnologias',
              'fotografias_accesibilidad'
            ].includes(key)) {
              return false;
            }

            return value === "" || value === null;
          }
        );

        if (faltanServicios) {
          notyf.error("Faltan datos por llenar en el apartado de Servicios.");
          return;
        }

        /* =========================
           2️⃣ VALIDAR TOKEN
        ========================= */

        const token = localStorage.getItem('form_token');

        if (!token) {
          notyf.error('La sesión del formulario expiró, vuelve a cargar la página.');
          return;
        }

        /* =========================
           3️⃣ MAPA DE ARCHIVOS
        ========================= */

        const archivosStep6 = {
          archivo_vialidad: this.servicios.archivo_vialidad,
          fotografia_agua_potable: this.servicios.fotografia_agua_potable,
          fotografia_drenaje: this.servicios.fotografia_drenaje,
          fotografia_energia: this.servicios.fotografia_energia,
          fotografia_especiales: this.servicios.fotografia_especiales,
          fotografia_tecnologias: this.servicios.fotografia_tecnologias,
          fotografias_accesibilidad: this.servicios.fotografias_accesibilidad,
        };

        const rutasSubidas = {};
        const s6 = this.loadStep(6);

        /* =========================
           4️⃣ SUBIDA CONDICIONAL
        ========================= */
        try {
          for (const [campo, archivos] of Object.entries(archivosStep6)) {

            // 🔹 rutas guardadas previamente
            const rutasGuardadas = s6?.servicios?.[campo];

            // 🔹 validar si son archivos reales
            const sonArchivosReales =
              Array.isArray(archivos) &&
              archivos.length > 0 &&
              archivos.every(a => a instanceof File);

            /* =========================================
               🅱️ NO HAY ARCHIVOS NUEVOS → REUTILIZAR
            ========================================= */
            if (!sonArchivosReales && Array.isArray(rutasGuardadas) && rutasGuardadas.length > 0) {
              rutasSubidas[campo] = rutasGuardadas;
              continue;
            }

            /* =========================================
               🅰️ HAY ARCHIVOS NUEVOS → SUBIR
            ========================================= */
            if (sonArchivosReales) {

              this.subiendo = true;
              this.progresoSubida = 0;
              this.mensajeSubida = 'Subiendo imágenes de servicios...';

              const subida = await this.subirArchivosTemp(6, archivos);
              rutasSubidas[campo] = subida.paths;

              continue;
            }

            /* =========================================
               🟡 NI ARCHIVOS NI RUTAS
            ========================================= */
            rutasSubidas[campo] = [];
          }

        } catch (e) {
          notyf.error("Ocurrió un error al subir las imágenes de Servicios.");
          console.error("ERROR STEP 6:", e);
          return;
        }




        /* =========================
           5️⃣ GUARDAR STEP 6 (SIN FILES)
        ========================= */

        this.saveStepData(6, {
          servicios: {
            ...this.servicios,
            ...rutasSubidas
          }
        });

        /* =========================
           6️⃣ LIMPIAR MEMORIA
        ========================= */

        this.servicios.archivo_vialidad = [];
        this.servicios.fotografia_agua_potable = [];
        this.servicios.fotografia_drenaje = [];
        this.servicios.fotografia_energia = [];
        this.servicios.fotografia_especiales = [];
        this.servicios.fotografia_tecnologias = [];
        this.servicios.fotografias_accesibilidad = [];

        this.vialidadImagen = [];
        this.sistemaAguaImagen = [];
        this.sistemaDrenajeImagen = [];
        this.sistemaEnergiaImagen = [];
        this.sistemaEspecialImagen = [];
        this.sistemaTecnologiasImagen = [];
        this.sistemaAccesibilidadImagen = [];

        /* =========================
           7️⃣ AVANZAR
        ========================= */

        this.step = 7;
      } else if (this.step === 7) {
        console.log(this.respuestas);
        console.log(this.estado_fisico);
        console.log(this.tipo_descarga);

        // 🔹 Validar respuestas vacías
        const faltanRespuestas = Object.values(this.respuestas).some(
          grupo => Object.keys(grupo).length === 0
        );
        if (faltanRespuestas) {
          notyf.error("Faltan respuestas en el apartado de población.");
          return;
        }

        // 🔹 Validar estado físico
        const faltanEstado = Object.entries(this.estado_fisico).some(
          ([grupo, datos]) => {
            const camposValidos = this.camposEstadoFisicoPorGrupo(grupo);
            return camposValidos.some(
              campo => datos[campo] === "" || datos[campo] === null
            );
          }
        );

        if (faltanEstado) {
          notyf.error("Faltan datos en el Estado Físico de los sanitarios.");
          return;
        }

        // 🔹 Validar tipo de descarga
        const faltanDescarga = Object.values(this.tipo_descarga).some(v => v === "");
        if (faltanDescarga) {
          notyf.error("Debes completar el tipo de descarga para cada grupo.");
          return;
        }

        // localStorage
        this.saveStepData(7, {
          respuestas: this.respuestas,
          estado_fisico: this.estado_fisico,
          tipo_descarga: this.tipo_descarga,
        });


        this.step = 8; // ✅ avanza solo si todo está contestado
      } else if (this.step === 8) {
        if (!this.validarEdificioActual()) {
          return;
        }

        Swal.fire({
          title: '¿Deseas Agregar un nuevo edificio?',
          text: "Si no agregas otro, continuaremos al siguiente paso.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#56212f',
          cancelButtonColor: '#c3b08f',
          confirmButtonText: 'Sí, agregar',
          cancelButtonText: 'No, avanzar'
        }).then(async (result) => {
          if (result.isConfirmed) {
            // notyf.error("Edificio B");
            await this.agregarEdificio();

          } else {
            console.log(this.respuesta_espacios);
            console.log(this.datosExtra);
            console.log(this.respuesta_condiciones);

            await this.guardarEdificioActual(); // sube el último edificio
            this.step = 9;
          }
        });
      } else if (this.step === 9) {

        const faltan1 = Object.keys(this.obraExterior).some(key => {
          if (key.includes('fotografia') || key.includes('croquis')) return false;
          const val = this.obraExterior[key];
          return val === "" || val === null || val === undefined;
        });

        const faltan2 = Object.keys(this.respuestaObraExterior).length === 0 ||
          Object.values(this.respuestaObraExterior).some(v => !v);

        if (faltan1 || faltan2) {
          notyf.error("Faltan datos por llenar en Obra Exterior.");
          return;
        }

        try {

          // 🔥 ACTIVA LA BARRA AQUÍ
          this.subiendo = true;
          this.progresoSubida = 0;
          this.mensajeSubida = "Subiendo imágenes de Obra Exterior...";

          /* =========================
             📸 FOTOGRAFÍAS GENERALES
          ========================= */
          if (Array.isArray(this.obraExterior.fotografiaUsoMultiples)) {

            const nuevas = this.obraExterior.fotografiaUsoMultiples
              .filter(i => i.file instanceof File);

            if (nuevas.length > 0) {

              const subida = await this.subirArchivosTemp(
                9,
                nuevas.map(i => i.file)
              );

              this.obraExterior.fotografiaUsoMultiples_paths = [
                ...(this.obraExterior.fotografiaUsoMultiples_paths || []),
                ...subida.paths
              ];
            }

            this.obraExterior.fotografiaUsoMultiples =
              (this.obraExterior.fotografiaUsoMultiples_paths || []).map(p => ({
                preview: `/storage/${p}`,
                existing: true
              }));
          }

          /* =========================
             📐 CROQUIS
          ========================= */
          if (this.obraExterior.croquis?.file instanceof File) {

            const subidaCroquis = await this.subirArchivosTemp(
              9,
              [this.obraExterior.croquis.file]
            );

            this.obraExterior.croquis_path = subidaCroquis.paths[0];
          }

          if (this.obraExterior.croquis_path) {
            this.obraExterior.croquis = {
              preview: `/storage/${this.obraExterior.croquis_path}`,
              existing: true
            };
          }

          this.saveStepData(9, {
            respuestaObraExterior: this.respuestaObraExterior,
            obraExterior: this.obraExterior,
          });

          this.step = 10;

        } catch (e) {
          console.error(e);
          notyf.error("Error al subir imágenes de Obra Exterior");
        } finally {
          // 🔥 APAGA LA BARRA AQUÍ
          this.subiendo = false;
        }
      } else if (this.step === 10) {

        const validarObjArrays = (obj) => {
          return Object.values(obj).some(arr => !arr || arr.length === 0);
        };

        const validarObjStrings = (obj) => {
          return Object.values(obj).some(v => v === "" || v === null || v === undefined);
        };


        // // 🔍 Validar todos los grupos
        // const faltanNecesidades = validarObjArrays(this.necesidades);
        // const faltanElementos = validarObjArrays(this.elementosEstructurales);
        // const faltanExteriores = validarObjArrays(this.elementosExteriores);
        // const faltanAccesibilidad = validarObjArrays(this.accesibilidadMejora);
        // const faltanEspaciosMultiples = validarObjArrays(this.espaciosMultiplesMejora);
        const faltanDescripcion = validarObjStrings(this.descripcion);


        if (
          // faltanNecesidades ||
          // faltanElementos ||
          // faltanExteriores ||
          // faltanAccesibilidad ||
          // faltanEspaciosMultiples ||
          faltanDescripcion
        ) {
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
      } else if (this.step === 11) {

        const validarObjStrings = (obj) => {
          return Object.values(obj).some(v => v === "" || v === null || v === undefined);
        };

        if (validarObjStrings(this.bienesInservibles)) {
          notyf.error("Faltan datos por llenar en Bienes Inservibles.");
          return;
        }

        console.log("BIENES INSERVIBLES:", this.bienesInservibles);

        // localStorage
        this.saveStepData(11, {
          bienesInservibles: this.bienesInservibles,
        });

        this.step = 12;
      } else if (this.step === 12) {

        const validarObjStrings = (obj) => {
          return Object.values(obj).some(v => v === "" || v === null || v === undefined);
        };

        const energiaSinArchivos = { ...this.energiaElectrica };
        delete energiaSinArchivos.documento;
        delete energiaSinArchivos.documento_path;
        delete energiaSinArchivos.fotografiaMedidor;
        delete energiaSinArchivos.fotografiaMedidor_path;
        delete energiaSinArchivos.archivoCertificadovie;
        delete energiaSinArchivos.archivoCertificadovie_path;

        if (validarObjStrings(energiaSinArchivos)) {
          notyf.error("Faltan datos por llenar en Energía Eléctrica.");
          return;
        }

        if (this.energiaElectrica.certificadoUvie === "si") {
          if (!this.energiaElectrica.archivoCertificadovie) {
            notyf.error("Debes subir el archivo del certificado UVIE.");
            return;
          }
        }

        try {

          this.subiendo = true;
          this.progresoSubida = 0;
          this.mensajeSubida = "Subiendo archivos de Energía Eléctrica...";

          /* =========================
            📄 DOCUMENTO (PDF)
          ========================= */
          if (this.energiaElectrica.documento?.file instanceof File) {

            const subida = await this.subirArchivosTemp(
              12,
              [this.energiaElectrica.documento.file]
            );

            this.energiaElectrica.documento_path = subida.paths[0];
          }

          /* =========================
            📸 FOTO MEDIDOR
          ========================= */
          if (this.energiaElectrica.fotografiaMedidor?.file instanceof File) {

            const subida = await this.subirArchivosTemp(
              12,
              [this.energiaElectrica.fotografiaMedidor.file]
            );

            this.energiaElectrica.fotografiaMedidor_path = subida.paths[0];
          }

          /* =========================
            📜 CERTIFICADO UVIE
          ========================= */
          if (
            this.energiaElectrica.certificadoUvie === "si" &&
            this.energiaElectrica.archivoCertificadovie?.file instanceof File
          ) {

            const subida = await this.subirArchivosTemp(
              12,
              [this.energiaElectrica.archivoCertificadovie.file]
            );

            this.energiaElectrica.archivoCertificadovie_path = subida.paths[0];
          }

          /* =========================
            🔁 RECONSTRUIR PREVIEWS
          ========================= */
          if (this.energiaElectrica.documento_path) {
            this.energiaElectrica.documento = {
              preview: `/storage/${this.energiaElectrica.documento_path}`,
              existing: true
            };
          }

          if (this.energiaElectrica.fotografiaMedidor_path) {
            this.energiaElectrica.fotografiaMedidor = {
              preview: `/storage/${this.energiaElectrica.fotografiaMedidor_path}`,
              existing: true
            };
          }

          if (this.energiaElectrica.archivoCertificadovie_path) {
            this.energiaElectrica.archivoCertificadovie = {
              preview: `/storage/${this.energiaElectrica.archivoCertificadovie_path}`,
              existing: true
            };
          }

          this.saveStepData(12, {
            energiaElectrica: this.energiaElectrica,
          });

          this.step = 13;

        } catch (e) {
          console.error(e);
          notyf.error("Error al subir archivos de Energía Eléctrica");
        } finally {
          this.subiendo = false;
        }
      } else {

        this.step++;

      }

      // this.guardarDatos();
      //this.step++;
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

        // 🔹 STEP 2
        if (step === 2) {
          this.matricula = data.matricula?.map(i => ({ ...i })) ?? [];
        }

        // 🔹 STEP 4 (IMÁGENES)
        if (step === 4) {
          this.seleccion = { ...data.seleccion };
          this.predio = { ...data.predio };

          this.otrasAmenazas.otrosElementos =
            data.otrasAmenazas?.otrosElementos ?? '';

          // 🔥 reconstruir previews desde backend
          this.preview = (data.otrasAmenazas?.imagenes ?? []).map(
            path => `/storage/${path}`
          );

          this.otrasAmenazas.imagenAmenaza = [];
        }

        // 🔹 STEP 5
        if (step === 5) {

          // 🔹 zona sísmica
          this.zonaSismica = {
            ...this.zonaSismica,
            ...data.zonaSismica
          };

          // 🔹 documento (SIN File)
          this.documento = {
            ...this.documento,
            docPropiedad: data.documento?.docPropiedad ?? null,
            tipoDocumento: data.documento?.tipoDocumento ?? null,
            otroTipo: data.documento?.otroTipo ?? null,
            archivoPropiedad: data.documento?.archivoPropiedad ?? null // 👈 RUTA
          };

        }

        // 🔹 STEP 6
        if (step === 6) {

          this.servicios = { ...this.servicios, ...data.servicios };

          this.vialidadImagen =
            (data.servicios.archivo_vialidad || []).map(p => `/storage/${p}`);

          this.sistemaAguaImagen =
            (data.servicios.fotografia_agua_potable || []).map(p => `/storage/${p}`);

          this.sistemaDrenajeImagen =
            (data.servicios.fotografia_drenaje || []).map(p => `/storage/${p}`);

          this.sistemaEnergiaImagen =
            (data.servicios.fotografia_energia || []).map(p => `/storage/${p}`);

          this.sistemaEspecialImagen =
            (data.servicios.fotografia_especiales || []).map(p => `/storage/${p}`);

          this.sistemaTecnologiasImagen =
            (data.servicios.fotografia_tecnologias || []).map(p => `/storage/${p}`);

          this.sistemaAccesibilidadImagen =
            (data.servicios.fotografias_accesibilidad || []).map(p => `/storage/${p}`);
        }

        // 🔹 STEP 7
        if (step === 7) {
          this.respuestas = { ...this.respuestas, ...data.respuestas };
          this.estado_fisico = { ...this.estado_fisico, ...data.estado_fisico };
          this.tipo_descarga = { ...this.tipo_descarga, ...data.tipo_descarga };
        }

        // 🔹 STEP 8
        if (step === 8) {

          this.edificios = [...data.edificios];
          this.edificioActual = data.edificioActual;
          this.respuesta_espacios = { ...data.respuesta_espacios };
          this.respuesta_condiciones = { ...data.respuesta_condiciones };
          this.datosExtra = { ...data.datosExtra };

          Object.keys(this.datosExtra).forEach(edificio => {

            const info = this.datosExtra[edificio];

            info.imagenes = (info.imagenes_paths || []).map(p => ({
              preview: `/storage/${p}`,
              existing: true
            }));

            info.imagen_danio = (info.danio_paths || []).map(p => ({
              preview: `/storage/${p}`,
              existing: true
            }));

          });
        }

        // 🔹 STEP 9
        if (step === 9) {

          this.respuestaObraExterior = { ...data.respuestaObraExterior };
          this.obraExterior = { ...data.obraExterior };

          // Rehidratar fotos múltiples
          this.obraExterior.fotografiaUsoMultiples =
            (this.obraExterior.fotografiaUsoMultiples_paths || []).map(p => ({
              preview: `/storage/${p}`,
              existing: true
            }));

          // Rehidratar croquis
          if (this.obraExterior.croquis_path) {
            this.obraExterior.croquis = {
              preview: `/storage/${this.obraExterior.croquis_path}`,
              existing: true,
              name: 'Croquis guardado'
            };
          }
        }

        // 🔹 STEP 10
        if (step === 10) {
          this.necesidades = { ...data.necesidades };
          this.elementosEstructurales = { ...data.elementosEstructurales };
          this.elementosExteriores = { ...data.elementosExteriores };
          this.accesibilidadMejora = { ...data.accesibilidadMejora };
          this.espaciosMultiplesMejora = { ...data.espaciosMultiplesMejora };
          this.descripcion = { ...data.descripcion };
        }

        // 🔹 STEP 11
        if (step === 11) {
          this.bienesInservibles = { ...data.bienesInservibles };
        }

        // 🔹 STEP 12
        if (step === 12) {

          this.energiaElectrica = { ...data.energiaElectrica };

          if (this.energiaElectrica.documento_path) {
            this.energiaElectrica.documento = {
              preview: `/storage/${this.energiaElectrica.documento_path}`,
              existing: true
            };
          }

          if (this.energiaElectrica.fotografiaMedidor_path) {
            this.energiaElectrica.fotografiaMedidor = {
              preview: `/storage/${this.energiaElectrica.fotografiaMedidor_path}`,
              existing: true
            };
          }

          if (this.energiaElectrica.archivoCertificadovie_path) {
            this.energiaElectrica.archivoCertificadovie = {
              preview: `/storage/${this.energiaElectrica.archivoCertificadovie_path}`,
              existing: true
            };
          }
        }

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

        xhr.upload.onprogress = (event) => {
          if (event.lengthComputable) {
            this.progresoSubida = Math.round((event.loaded / event.total) * 100);
          }
        };

        xhr.onload = () => {
          this.subiendo = false;

          if (xhr.status >= 200 && xhr.status < 300) {
            try {
              resolve(JSON.parse(xhr.responseText));
            } catch (e) {
              reject('Respuesta inválida del servidor');
            }
          } else {
            reject(xhr.responseText);
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
