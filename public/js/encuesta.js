// localStorage.removeItem("encuesta_step_1");
// localStorage.removeItem("encuesta_step_10");
// localStorage.removeItem("encuesta_step_11");
// localStorage.removeItem("encuesta_step_12");
// localStorage.removeItem("encuesta_step_13");
// localStorage.removeItem("encuesta_step_2");
// localStorage.removeItem("encuesta_step_3");
// localStorage.removeItem("encuesta_step_4");
// localStorage.removeItem("encuesta_step_5");
// localStorage.removeItem("encuesta_step_6");
// localStorage.removeItem("encuesta_step_7");
// localStorage.removeItem("encuesta_step_8");
// localStorage.removeItem("encuesta_step_9");


function generarUUID() {
  if (window.crypto && typeof window.crypto.randomUUID === 'function') {
    return window.crypto.randomUUID();
  }

  return 'id-' + Date.now() + '-' + Math.random().toString(36).substring(2, 10);
}

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

  const amenazasCatalogo = [
    "Ladera",
    "Talud",
    "Barranca",
    "R\u00edo",
    "Arroyo",
    "Gasoducto",
    "Zona Inundable",
    "Torres de CFE",
    "Gasera",
    "Fallas Geol\u00f3gicas",
    "Gasolinera",
    "Ducto de Combustible",
    "Amenazas Viales",
    "Otros",
  ];

  const espaciosCatalogo = [
    "Aulas",
    "Laboratorios",
    "Talleres",
    "Direcci\u00f3n",
    "Biblioteca",
    "Aula de Computo",
    "Sanitarios",
    "Cocina",
    "Comedor",
    "P\u00f3rtico",
    "Cubo de escaleras",
    "Espacios Adosados",
    "Otros",
  ];

  const condicionesCatalogo = [
    "Impermeabilizaci\u00f3n",
    "Pisos Interiores",
    "Aplanados",
    "Pintura",
    "Herrer\u00eda y Canceler\u00eda",
    "Luminarias",
    "Inst El\u00e9ctrica",
    "Inst Hidr\u00e1ulica",
    "Inst Sanitaria",
    "Inst de Gas",
    "Barandales",
    "Firmes Exteriores",
  ];

  const obraExteriorCatalogo = [
    "Muro de Acometida",
    "Alumbrado Exterior (dentro del inmueble)",
    "Barda Perimetral",
    "Cerco o Reja Perimetral",
    "Port\u00f3n de Acceso",
    "Asta Bandera",
    "Estacionamiento",
    "\u00c1reas Verdes",
    "Plaza C\u00edvica",
    "Techumbre",
    "\u00c1rea Deportiva",
    "Cubiertas",
    "Bebederos",
    "Otros",
  ];

  const aliasTexto = {
    "R\u00edo": ["RÃ­o", "RÃƒÂ­o", "RÃƒÆ’Ã‚Â­o"],
    "Fallas Geol\u00f3gicas": ["Fallas Geológicas", "Fallas GeolÃ³gicas", "Fallas GeolÃƒÂ³gicas", "Fallas GeolÃƒÆ’Ã‚Â³gicas"],
    "Direcci\u00f3n": ["Dirección", "DirecciÃ³n", "DirecciÃƒÂ³n", "DirecciÃƒÆ’Ã‚Â³n"],
    "P\u00f3rtico": ["Pórtico", "PÃ³rtico", "PÃƒÂ³rtico", "PÃƒÆ’Ã‚Â³rtico"],
    "Impermeabilizaci\u00f3n": ["Impermeabilización", "ImpermeabilizaciÃ³n", "ImpermeabilizaciÃƒÂ³n", "ImpermeabilizaciÃƒÆ’Ã‚Â³n"],
    "Herrer\u00eda y Canceler\u00eda": ["Herrería y Cancelería", "HerrerÃ­a y CancelerÃ­a", "HerrerÃƒÂ­a y CancelerÃƒÂ­a", "HerrerÃƒÆ’Ã‚Â­a y CancelerÃƒÆ’Ã‚Â­a"],
    "Inst El\u00e9ctrica": ["Inst Eléctrica", "Inst ElÃ©ctrica", "Inst ElÃƒÂ©ctrica", "Inst ElÃƒÆ’Ã‚Â©ctrica"],
    "Inst Hidr\u00e1ulica": ["Inst Hidráulica", "Inst HidrÃ¡ulica", "Inst HidrÃƒÂ¡ulica", "Inst HidrÃƒÆ’Ã‚Â¡ulica"],
    "Port\u00f3n de Acceso": ["Portón de Acceso", "PortÃ³n de Acceso", "PortÃƒÂ³n de Acceso", "PortÃƒÆ’Ã‚Â³n de Acceso"],
    "\u00c1reas Verdes": ["Áreas Verdes", "Ãreas Verdes", "ÃƒÂreas Verdes", "ÃƒÆ’Ã‚Âreas Verdes"],
    "Plaza C\u00edvica": ["Plaza Cívica", "Plaza CÃ­vica", "Plaza CÃƒÂ­vica", "Plaza CÃƒÆ’Ã‚Â­vica"],
    "\u00c1rea Deportiva": ["Área Deportiva", "Ãrea Deportiva", "ÃƒÂrea Deportiva", "ÃƒÆ’Ã‚Ârea Deportiva"],
  };

  // if (!token) {
  //   token = crypto.randomUUID();
  //   localStorage.setItem('form_token', token);
  // }

  if (!token) {
    token = generarUUID();
    localStorage.setItem('form_token', token);
  }

  return {
    formToken: token,
    subiendo: false,
    progresoSubida: 0,
    mensajeSubida: '',
    step: 1,
    planteles: [], // Ã°Å¸â€Â¹ aquÃƒÂ­ guardamos los datos de step1
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
    errores: [], // aquÃƒÂ­ guardamos errores por plantel
    directorObras: { // Ã°Å¸â€Â¹ datos generales (step 3)
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
      'RÃƒÂ­o',
      'Arroyo',
      'Gasoducto',
      'Zona Inundable',
      'Torres de CFE',
      'Gasera',
      'Fallas GeolÃƒÂ³gicas',
      'Gasolinera',
      'Ducto de Combustible',
      'Amenazas Viales',
      'Otros'
    ],
    get amenazasLista() {
      return amenazasCatalogo;
    },
    distancias: ['0', '10-20', '20-50', '50-100', '100+'],
    seleccion: {},
    otrasAmenazas: {
      otrosElementos: '',
      imagenAmenaza: [],
      imagenAmenaza_path: null,
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

      // Ã¢Å¾â€¢ Mingitorios
      if (['alumnos', 'maestros', 'discapacidad_alumno'].includes(this.tipoSeleccionado)) {
        lista.push("Mingitorios");
      }

      // Ã¢Å¾â€¢ Accesibilidad
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

      // Ã¢Å¾â€¢ mingitorios solo en estos grupos
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
        // tipo_descarga: ""   // Ã¢Å“â€¦ ya inicializado
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
      'Aulas', 'Laboratorios', 'Talleres', 'DirecciÃƒÂ³n',
      'Biblioteca', 'Aula de Computo', 'Sanitarios',
      'Cocina', 'Comedor', 'PÃƒÂ³rtico', 'Cubo de escaleras',
      'Espacios Adosados', 'Otros'
    ],
    respuesta_espacios: {
      'A': {}
    },
    condicion_fisica: [
      'BUENO', 'REGULAR', 'MALO', 'NO APLICA', 'NO TIENE'
    ],
    nombre_condicion: [
      'ImpermeabilizaciÃƒÂ³n', 'Pisos Interiores', 'Aplanados', 'Pintura', 'HerrerÃƒÂ­a y CancelerÃƒÂ­a',
      'Luminarias', 'Inst ElÃƒÂ©ctrica', 'Inst HidrÃƒÂ¡ulica', 'Inst Sanitaria', 'Inst de Gas', 'Barandales',
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
      'PortÃƒÂ³n de Acceso',
      'Asta Bandera',
      'Estacionamiento',
      'ÃƒÂreas Verdes',
      'Plaza CÃƒÂ­vica',
      'Techumbre',
      'ÃƒÂrea Deportiva',
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
      ['alba\u00f1ileria']: [],
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
    fotografias_paths: [],
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
      if (this.edificios.length >= letras.length) {
        notyf.error("Solo puedes agregar edificios desde la A hasta la Z.");
        return false;
      }
      const next = letras[this.edificios.length];

      this.edificios.push(next);
      this.respuesta_espacios[next] = this.initEdificio();
      this.respuesta_condiciones[next] = this.initCondiciones();
      this.inicializarEdificio(next);

      this.currentIndex = this.edificios.length - 1;
      return true;
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
    cloneDefault(value) {
      if (typeof window.structuredClone === "function") {
        return window.structuredClone(value);
      }

      if (Array.isArray(value)) {
        return value.map((item) => this.cloneDefault(item));
      }

      if (value && typeof value === "object") {
        return JSON.parse(JSON.stringify(value));
      }

      return value;
    },
    parseSurveyFieldValue(value, fallback = {}, doubleParse = false) {
      if (value === null || value === undefined || value === "") {
        return this.cloneDefault(fallback);
      }

      if (typeof value === "object") {
        return value;
      }

      try {
        let parsed = value;

        if (typeof parsed === "string") {
          parsed = JSON.parse(parsed);

          if (doubleParse && typeof parsed === "string") {
            parsed = JSON.parse(parsed);
          }
        }

        return parsed ?? this.cloneDefault(fallback);
      } catch (error) {
        console.warn("No se pudo parsear un campo de encuesta:", error);
        return this.cloneDefault(fallback);
      }
    },
    obtenerAliasesTexto(clave) {
      return [clave, ...(aliasTexto[clave] || [])];
    },
    normalizarRespuestasCatalogo(origen, catalogo, defaults = {}) {
      const base = { ...defaults };
      const source = origen && typeof origen === "object" ? origen : {};

      catalogo.forEach((clave) => {
        let valor = base[clave] ?? null;

        for (const alias of this.obtenerAliasesTexto(clave)) {
          if (
            Object.prototype.hasOwnProperty.call(source, alias) &&
            source[alias] !== undefined &&
            source[alias] !== null &&
            source[alias] !== ""
          ) {
            valor = source[alias];
            break;
          }
        }

        base[clave] = valor;
      });

      return base;
    },
    extraerRutaGuardada(valor) {
      if (!valor) {
        return null;
      }

      if (typeof valor === "string") {
        return valor;
      }

      if (Array.isArray(valor)) {
        for (const item of valor) {
          const ruta = this.extraerRutaGuardada(item);

          if (ruta) {
            return ruta;
          }
        }

        return null;
      }

      if (typeof valor === "object") {
        return valor.path || valor.preview || valor.imagenAmenaza_path || valor.imagenAmenaza || null;
      }

      return null;
    },
    normalizarRutaGuardada(carpeta, valor) {
      const rutaOriginal = this.extraerRutaGuardada(valor);

      if (!rutaOriginal || typeof rutaOriginal !== "string") {
        return null;
      }

      const ruta = rutaOriginal
        .replace(/^https?:\/\/[^/]+/i, "")
        .replace(/^\/?storage\//, "")
        .replace(/\\/g, "/");
      const nombre = ruta.split("/").pop();

      if (!nombre || !this.idPlantelActual) {
        return null;
      }

      const rutaFinal = `planteles/${this.idPlantelActual}/${carpeta}/${nombre}`;

      if (ruta.startsWith("planteles/")) {
        return rutaFinal;
      }

      return rutaFinal;
    },
    normalizarRutasGuardadas(carpeta, valores) {
      if (Array.isArray(valores)) {
        return valores
          .map((valor) => this.normalizarRutaGuardada(carpeta, valor))
          .filter(Boolean);
      }

      const unica = this.normalizarRutaGuardada(carpeta, valores);
      return unica ? [unica] : [];
    },
    normalizarItemGaleria(item) {
      if (!item) return null;

      if (item instanceof File) {
        return {
          file: item,
          preview: URL.createObjectURL(item),
          name: item.name,
        };
      }

      if (item?.file instanceof File) {
        return {
          ...item,
          preview: item.preview || URL.createObjectURL(item.file),
          name: item.name || item.file.name,
        };
      }

      if (typeof item === "string") {
        return media.previewObject
          ? media.previewObject(item)
          : {
            path: item,
            name: item.split("/").pop(),
            preview: `/storage/${item}`,
            existing: true,
          };
      }

      if (item?.path || item?.preview || item?.existing) {
        return {
          ...item,
          preview: item.preview || (item.path ? (media.storageUrl ? media.storageUrl(item.path) : `/storage/${item.path}`) : null),
          name: item.name || (item.path ? item.path.split("/").pop() : ""),
        };
      }

      return null;
    },
    construirGaleria(items = []) {
      return (items || [])
        .map((item) => this.normalizarItemGaleria(item))
        .filter(Boolean);
    },
    construirPreviewGaleria(items = []) {
      return this.construirGaleria(items)
        .map((item) => item.preview)
        .filter(Boolean);
    },
    obtenerSrcGaleria(item) {
      return this.normalizarItemGaleria(item)?.preview || null;
    },
    agregarArchivosGaleria(actuales, files, max = 5) {
      const actualesNormalizados = this.construirGaleria(actuales);
      const nuevos = Array.from(files || []).map((file) => this.normalizarItemGaleria(file)).filter(Boolean);
      const total = [...actualesNormalizados, ...nuevos];

      if (total.length > max) {
        notyf.error(`Solo puedes conservar hasta ${max} imagenes.`);
      }

      return total.slice(0, max);
    },
    agregarImagenAmenaza(files) {
      this.otrasAmenazas.imagenAmenaza = this.agregarArchivosGaleria(
        this.otrasAmenazas.imagenAmenaza,
        files,
        5
      );
      this.preview = this.construirPreviewGaleria(this.otrasAmenazas.imagenAmenaza);
    },
    eliminarImagenAmenaza(index) {
      this.otrasAmenazas.imagenAmenaza.splice(index, 1);
      this.preview = this.construirPreviewGaleria(this.otrasAmenazas.imagenAmenaza);
    },
    agregarImagenesServicio(field, previewField, files) {
      this.servicios[field] = this.agregarArchivosGaleria(
        this.servicios[field],
        files,
        5
      );
      this[previewField] = this.construirPreviewGaleria(this.servicios[field]);
    },
    eliminarImagenServicio(field, previewField, index) {
      this.servicios[field].splice(index, 1);
      this[previewField] = this.construirPreviewGaleria(this.servicios[field]);
    },
    vincularInputArchivos(id, callback) {
      const input = document.getElementById(id);

      if (!input || input.dataset.encuestaMediaBound === "1") {
        return;
      }

      input.dataset.encuestaMediaBound = "1";
      input.addEventListener("change", (event) => {
        event.stopImmediatePropagation();
        callback(event);
      }, true);
    },
    configurarMediaEditable() {
      this.vincularInputArchivos("entornoyamenazas", (event) => {
        this.agregarImagenAmenaza(event.target.files);
        event.target.value = "";
      });

      [
        ["fotosacceso", "archivo_vialidad", "vialidadImagen"],
        ["fotosdeagua", "fotografia_agua_potable", "sistemaAguaImagen"],
        ["drenaje_imagen", "fotografia_drenaje", "sistemaDrenajeImagen"],
        ["foto_energia_electrica", "fotografia_energia", "sistemaEnergiaImagen"],
        ["fotosinstalaciones", "fotografia_especiales", "sistemaEspecialImagen"],
        ["fotosdetecnologias", "fotografia_tecnologias", "sistemaTecnologiasImagen"],
        ["imagen_accesibilidad", "fotografias_accesibilidad", "sistemaAccesibilidadImagen"],
      ].forEach(([id, field, previewField]) => {
        this.vincularInputArchivos(id, (event) => {
          this.agregarImagenesServicio(field, previewField, event.target.files);
          event.target.value = "";
        });
      });
    },
    scrollSurveyTop() {
      const contenedor = document.getElementById("contenedor2");
      contenedor?.scrollTo({ top: 0, behavior: "smooth" });
    },
    async cargarEncuestaExistente() {
      if (!this.idPlantelActual) {
        return false;
      }

      try {
        const response = await fetch(`/plantel/${this.idPlantelActual}`, {
          headers: {
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
          },
        });

        const survey = await response.json();

        if (!response.ok) {
          throw new Error(survey?.message || "No se pudo cargar la encuesta existente.");
        }

        this.hidratarEncuestaExistente(survey);
        this.saveStepData(1, {
          id_plantel: this.idPlantelActual,
          modo_edicion: true,
        });

        this.step = 2;
        this.scrollSurveyTop();
        return true;
      } catch (error) {
        console.error(error);
        notyf.error(error?.message || "No se pudo cargar la encuesta para editar.");
        this.editando = false;
        return false;
      }
    },
    hidratarEncuestaExistente(survey) {
      const matricula = this.parseSurveyFieldValue(survey.matricula, [], true);
      this.matricula = Array.isArray(matricula)
        ? matricula.map((item) => ({ ...item }))
        : [];
      this.saveStepData(2, {
        plantel_id: this.planteles[0]?.plantel_id,
        matricula: this.matricula,
      });

      const step3 = this.loadStep(3);
      if (step3?.plantel_id === this.idPlantelActual && step3.directorObras) {
        this.directorObras = {
          ...this.directorObras,
          ...step3.directorObras,
        };
      } else {
        this.saveStepData(3, {
          plantel_id: this.idPlantelActual,
          directorObras: this.directorObras,
        });
      }

      const seleccion = this.parseSurveyFieldValue(survey.amenazas, {}, true);
      const predio = this.parseSurveyFieldValue(survey.medidas, {}, true);
      const otrasAmenazas = this.parseSurveyFieldValue(survey.otrosElementos, {}, true);
      const imagenesAmenaza = this.normalizarRutasGuardadas(
        "amenazas",
        otrasAmenazas.imagenAmenaza_path || otrasAmenazas.imagenAmenaza
      );
      const imagenAmenazaPath = imagenesAmenaza[0] ?? null;

      this.seleccion = this.normalizarRespuestasCatalogo(
        seleccion,
        this.amenazasLista
      );
      this.predio = { ...this.predio, ...predio };
      this.otrasAmenazas = {
        ...this.otrasAmenazas,
        ...otrasAmenazas,
        imagenAmenaza: this.construirGaleria(imagenesAmenaza),
        imagenAmenaza_path: imagenAmenazaPath,
      };
      this.preview = media.previewUrls(imagenesAmenaza);
      this.saveStepData(4, {
        otrasAmenazas: {
          otrosElementos: this.otrasAmenazas.otrosElementos,
          imagenes: imagenesAmenaza,
        },
        predio: this.predio,
        seleccion: this.seleccion,
      });

      const zonaSismica = this.parseSurveyFieldValue(survey.zonaSismica, {}, true);
      const documento = this.parseSurveyFieldValue(survey.documentoPropiedad, {}, true);
      const archivoPropiedad = this.normalizarRutaGuardada(
        "documentos_propiedad",
        documento.archivoPropiedad || documento.archivoPropiedad_path
      );

      this.zonaSismica = {
        ...this.zonaSismica,
        ...zonaSismica,
      };
      this.documento = {
        ...this.documento,
        ...documento,
        archivoPropiedad,
      };
      this.saveStepData(5, {
        zonaSismica: this.zonaSismica,
        documento: this.documento,
      });

      const servicios = this.parseSurveyFieldValue(survey.servicioPlantel, {}, true);
      const serviciosNormalizados = {
        ...this.servicios,
        ...servicios,
        archivo_vialidad: this.construirGaleria(this.normalizarRutasGuardadas(
          "servicios",
          servicios.archivo_vialidad || servicios.archivo_vialidad_path
        )),
        fotografia_agua_potable: this.construirGaleria(this.normalizarRutasGuardadas(
          "servicios",
          servicios.fotografia_agua_potable || servicios.fotografia_agua_potable_path
        )),
        fotografia_drenaje: this.construirGaleria(this.normalizarRutasGuardadas(
          "servicios",
          servicios.fotografia_drenaje || servicios.fotografia_drenaje_path
        )),
        fotografia_energia: this.construirGaleria(this.normalizarRutasGuardadas(
          "servicios",
          servicios.fotografia_energia || servicios.fotografia_energia_path
        )),
        fotografia_especiales: this.construirGaleria(this.normalizarRutasGuardadas(
          "servicios",
          servicios.fotografia_especiales || servicios.fotografia_especiales_path
        )),
        fotografia_tecnologias: this.construirGaleria(this.normalizarRutasGuardadas(
          "servicios",
          servicios.fotografia_tecnologias || servicios.fotografia_tecnologias_path
        )),
        fotografias_accesibilidad: this.construirGaleria(this.normalizarRutasGuardadas(
          "servicios",
          servicios.fotografias_accesibilidad || servicios.fotografias_accesibilidad_path
        )),
      };

      this.servicios = serviciosNormalizados;
      const previewsServicios = media.rehydrateServiciosPreviewState(serviciosNormalizados);
      this.vialidadImagen = previewsServicios.vialidadImagen;
      this.sistemaAguaImagen = previewsServicios.sistemaAguaImagen;
      this.sistemaDrenajeImagen = previewsServicios.sistemaDrenajeImagen;
      this.sistemaEnergiaImagen = previewsServicios.sistemaEnergiaImagen;
      this.sistemaEspecialImagen = previewsServicios.sistemaEspecialImagen;
      this.sistemaTecnologiasImagen = previewsServicios.sistemaTecnologiasImagen;
      this.sistemaAccesibilidadImagen = previewsServicios.sistemaAccesibilidadImagen;
      this.saveStepData(6, {
        servicios: this.servicios,
      });

      const respuestas = this.parseSurveyFieldValue(survey.servSanitarioCantidad, {}, true);
      const estadoFisico = this.parseSurveyFieldValue(survey.servSanitarioEstado, {}, true);
      const tipoDescarga = this.parseSurveyFieldValue(survey.tipoDescarga, {}, true);

      this.respuestas = { ...this.respuestas, ...respuestas };
      this.estado_fisico = { ...this.estado_fisico, ...estadoFisico };
      this.tipo_descarga = { ...this.tipo_descarga, ...tipoDescarga };
      this.saveStepData(7, {
        respuestas: this.respuestas,
        estado_fisico: this.estado_fisico,
        tipo_descarga: this.tipo_descarga,
      });

      const espacios = this.parseSurveyFieldValue(survey.edifEspaciosCantidad, {}, true);
      const condiciones = this.parseSurveyFieldValue(survey.edifCondiciones, {}, true);
      const edificiosGuardados = this.parseSurveyFieldValue(survey.edifTipoEstructura, {}, true);
      const clavesEdificios = Array.from(
        new Set([
          "A",
          ...Object.keys(espacios || {}),
          ...Object.keys(condiciones || {}),
          ...Object.keys(edificiosGuardados || {}),
        ])
      ).sort();

      const respuestaEspacios = {};
      const respuestaCondiciones = {};
      const datosExtraGuardados = {};

      clavesEdificios.forEach((clave) => {
        const edificioInfo = edificiosGuardados?.[clave] || {};

        respuestaEspacios[clave] = this.normalizarRespuestasCatalogo(
          espacios?.[clave] || {},
          this.nombre_espacio,
          this.initEdificio()
        );

        respuestaCondiciones[clave] = this.normalizarRespuestasCatalogo(
          condiciones?.[clave] || {},
          this.nombre_condicion,
          this.initCondiciones()
        );

        datosExtraGuardados[clave] = {
          ...edificioInfo,
          imagenes_paths: this.normalizarRutasGuardadas(
            "edificios",
            edificioInfo.imagenes_paths || edificioInfo.imagenes
          ),
          danio_paths: this.normalizarRutasGuardadas(
            "edificios_danio",
            edificioInfo.danio_paths || edificioInfo.imagen_danio
          ),
        };
      });

      this.edificios = clavesEdificios;
      this.currentIndex = 0;
      this.respuesta_espacios = respuestaEspacios;
      this.respuesta_condiciones = respuestaCondiciones;
      this.datosExtra = media.rehydrateDatosExtraCollection(datosExtraGuardados);
      this.saveStepData(8, {
        edificios: this.edificios,
        edificioActual: this.edificios[0],
        respuesta_espacios: this.respuesta_espacios,
        respuesta_condiciones: this.respuesta_condiciones,
        datosExtra: this.datosExtra,
      });

      const respuestaObraExterior = this.parseSurveyFieldValue(
        survey.obraExteriorEstado,
        {},
        true
      );
      const obraExterior = this.parseSurveyFieldValue(
        survey.obraExteriorComplementos,
        {},
        true
      );
      const obraExteriorNormalizada = {
        ...this.obraExterior,
        ...obraExterior,
        fotografiaUsoMultiples_paths: this.normalizarRutasGuardadas(
          "obra_exterior",
          obraExterior.fotografiaUsoMultiples_paths || obraExterior.fotografiaUsoMultiples
        ),
        croquis_path: this.normalizarRutaGuardada(
          "obra_exterior",
          obraExterior.croquis_path || obraExterior.croquis
        ),
      };

      this.respuestaObraExterior = { ...respuestaObraExterior };
      this.obraExterior = media.applyObraExteriorPreviewState(obraExteriorNormalizada);
      this.saveStepData(9, {
        respuestaObraExterior: this.respuestaObraExterior,
        obraExterior: this.obraExterior,
      });

      this.necesidades = {
        ...this.necesidades,
        ...this.parseSurveyFieldValue(survey.necesidadMejora, {}, true),
      };
      this.elementosEstructurales = {
        ...this.elementosEstructurales,
        ...this.parseSurveyFieldValue(survey.elemEstructuraMejora, {}, true),
      };
      this.elementosExteriores = {
        ...this.elementosExteriores,
        ...this.parseSurveyFieldValue(survey.elemExteriorMejora, {}, true),
      };
      this.accesibilidadMejora = {
        ...this.accesibilidadMejora,
        ...this.parseSurveyFieldValue(survey.accesibilidadMejora, {}, true),
      };
      this.espaciosMultiplesMejora = {
        ...this.espaciosMultiplesMejora,
        ...this.parseSurveyFieldValue(survey.espaciosMejora, {}, true),
      };
      this.descripcion = {
        ...this.descripcion,
        ...this.parseSurveyFieldValue(survey.descripcionMejora, {}, true),
      };
      this.saveStepData(10, {
        necesidades: this.necesidades,
        elementosEstructurales: this.elementosEstructurales,
        elementosExteriores: this.elementosExteriores,
        accesibilidadMejora: this.accesibilidadMejora,
        espaciosMultiplesMejora: this.espaciosMultiplesMejora,
        descripcion: this.descripcion,
      });

      this.bienesInservibles = {
        ...this.bienesInservibles,
        ...this.parseSurveyFieldValue(survey.bienes, {}, true),
      };
      this.saveStepData(11, {
        bienesInservibles: this.bienesInservibles,
      });

      const energia = this.parseSurveyFieldValue(survey.energiaElectrica, {}, true);
      const energiaNormalizada = {
        ...this.energiaElectrica,
        ...energia,
        documento_path: this.normalizarRutaGuardada(
          "energia",
          energia.documento_path || energia.documento
        ),
        fotografiaMedidor_path: this.normalizarRutaGuardada(
          "energia",
          energia.fotografiaMedidor_path || energia.fotografiaMedidor
        ),
        archivoCertificadovie_path: this.normalizarRutaGuardada(
          "energia",
          energia.archivoCertificadovie_path || energia.archivoCertificadovie
        ),
      };

      this.energiaElectrica = media.rehydrateEnergia(energiaNormalizada);
      this.saveStepData(12, {
        energiaElectrica: this.energiaElectrica,
      });

      this.fotografias_paths = this.normalizarRutasGuardadas(
        "fotografias",
        this.parseSurveyFieldValue(survey.fotografias, [], true)
      );
      this.actualizarFotografiasFinales(this.fotografias_paths);
    },
    init() {
      this.amenazas = [...amenazasCatalogo];
      this.nombre_espacio = [...espaciosCatalogo];
      this.nombre_condicion = [...condicionesCatalogo];
      this.OExteriorEspacios = [...obraExteriorCatalogo];
      this.respuesta_espacios['A'] = this.initEdificio();
      this.respuesta_condiciones['A'] = this.initCondiciones();
      this.inicializarEdificio('A');
      this.$nextTick(() => {
        this.configurarMediaEditable();
      });
      // Si detectas algÃƒÂºn estado anterior, recarga 

      // console.log("INIT ejecutado");

      const step1 = this.loadStep(1);
      if (step1) {
        console.log("Step1 cargado:", step1);
      } else {
        console.warn("No hay Step1 aÃƒÂºn");
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

      // 3 Validar condiciones fÃƒÂ­sicas
      const condiciones = this.respuesta_condiciones[edificio] || {};

      if (Object.keys(condiciones).length !== this.nombre_condicion.length) {
        notyf.error("Faltan seleccionar CONDICIONES FÃƒÂSICAS del edificio " + edificio);
        return false;
      }

      // 4 Validar imÃƒÂ¡genes (si son obligatorias)
      if (extra.imagenes.length === 0) {
        notyf.error("Debes subir al menos 1 imagen del edificio " + edificio);
        return false;
      }

      return true; // Todo correcto
    },
    validarEdificioActual() {
      const edificio = this.edificio;
      const espacios = this.respuesta_espacios[edificio] || {};
      const extra = this.datosExtra[edificio];
      const condiciones = this.respuesta_condiciones[edificio] || {};

      const espaciosContestados = this.nombre_espacio.filter(
        (espacio) => espacios[espacio] !== null && espacios[espacio] !== ""
      );

      if (espaciosContestados.length !== this.nombre_espacio.length) {
        notyf.error("Faltan datos por llenar en los ESPACIOS del edificio " + edificio);
        return false;
      }

      const camposExtraObligatorios = [
        "edad",
        "estructura",
        "niveles",
        "total_espacios",
        "ejes",
        "azotea",
        "pisos",
        "muros",
      ];

      for (const campo of camposExtraObligatorios) {
        if (!extra?.[campo] || extra[campo] === "") {
          notyf.error(`Falta completar "${campo}" del edificio ${edificio}`);
          return false;
        }
      }

      const faltanCondiciones = this.nombre_condicion.filter(
        (condicion) => !condiciones[condicion]
      );

      if (faltanCondiciones.length > 0) {
        notyf.error("Faltan seleccionar CONDICIONES FISICAS del edificio " + edificio);
        return false;
      }

      if (!Array.isArray(extra?.imagenes) || extra.imagenes.length === 0) {
        notyf.error("Debes subir al menos 1 imagen del edificio " + edificio);
        return false;
      }

      return true;
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
      this.planteles = data; // Ã°Å¸â€Â¹ actualiza directo desde Alpine
      this.errores = data.map(() => ({})); // inicializa errores vacÃƒÂ­os
    },
    tieneDatos: false,
    async cargarDatosPlantel(codigo, editMode = false) {
      this.editando = editMode;

      try {
        const response = await fetch(`/ccts/datosGenerales/${codigo}`);
        const data = await response.json();

        if (!data || data.length === 0) {
          notyf.error("No se encontró ningún plantel con ese CCT favor de revisar");
          document.getElementById('cct_encuesta').value = '';
          document.getElementById('nombre_plantel_encuesta').value = '';
          this.tieneDatos = false;
          this.editando = false;
          return false;
        }

        this.planteles = data;
        this.idPlantelActual = this.planteles[0].plantel.id;
        console.log("ID actual ", this.idPlantelActual);

        const step1 = this.loadStep(1);

        if (step1 && step1.id_plantel) {
          console.log("ID de localStorage ", step1.id_plantel);
        } else {
          console.log("No hay Step1 en localStorage");
        }

        if (step1 && !editMode) {
          console.log("Step1 data:", step1);

          if (step1.id_plantel === this.idPlantelActual) {
            for (let i = 2; i <= 13; i++) {
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

        if (editMode) {
          return await this.cargarEncuestaExistente();
        }

        return true;
      } catch (error) {
        console.error(error);
        notyf.error("Error al obtener datos");
        this.tieneDatos = false;
        this.editando = false;
        return false;
      }
    },
    async mostrarDatos(codigo) {
      codigo = codigo.trim();
      limpiarInputs();
      if (codigo.length !== 10) {
        notyf.error("El campo CCT debe tener exactamente 10 caracteres");
        this.tieneDatos = false;
        return;
      }

      const registro = await fetch(`/ccts/validarRegistro/${codigo}`);
      const validar = await registro.json();
      console.log("VALIDACIÓN:", validar);

      if (validar === "no-existe-cct") {
        notyf.error("La CCT no existe en el cátalogo");
        this.tieneDatos = false;
        return;
      }

      if (validar === "ya-registrado") {
        Swal.fire({
          title: "Encuesta existente",
          text: "Este plantel ya tiene una encuesta registrada. ¿Quieres editar la información?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sí­, editar",
          confirmButtonColor: '#56212f',
          cancelButtonColor: '#c3b08f',
          cancelButtonText: "Cancelar"
        }).then(async (result) => {
          if (result.isConfirmed) {
            await this.cargarDatosPlantel(codigo, true);

          } else {
            this.editando = false;
            this.tieneDatos = false;
          }
        });

        return;
      }

      if (validar === "disponible") {
        await this.cargarDatosPlantel(codigo, false);
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

        // Ã°Å¸â€Â¹ validar todos los campos numÃƒÂ©ricos > 0
        camposObligatorios.forEach(campo => {
          if (!p[campo] || p[campo] <= 0) {
            e[campo] = true;
            valido = false;
            faltantes.push(`${campo} (plantel ${i + 1})`);
          }
        });

        console.log(camposObligatorios);

        // Ã°Å¸â€Â¹ excepciÃƒÂ³n: personas_discapacidad puede ser 0 pero no negativo
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
      const maxFotos = 5;
      const rutasActuales = Array.isArray(this.fotografias_paths) ? [...this.fotografias_paths] : [];
      const disponibles = maxFotos - rutasActuales.length;

      if (disponibles <= 0) {
        notyf.error("Solo puedes conservar hasta 5 imagenes en el reporte fotografico.");
        return;
      }

      const archivos = Array.isArray(files) ? files : Array.from(files || []);
      const archivosSeleccionados = archivos.slice(0, disponibles);

      if (archivos.length > disponibles) {
        notyf.error(`Solo puedes agregar ${disponibles} imagen(es) mas.`);
      }

      try {

        this.subiendo = true;
        this.progresoSubida = 0;

        const subida = await this.subirArchivosTemp(13, archivosSeleccionados);
        const nuevasRutas = Array.isArray(subida?.paths) ? subida.paths : [];

        this.actualizarFotografiasFinales([
          ...rutasActuales,
          ...nuevasRutas,
        ]);

        return;
      } catch (e) {

        console.error(e);
        notyf.error("Error al subir fotografias");
        return;
      } finally {
        this.subiendo = false;
      }

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
        notyf.error("Error al subir fotografÃƒÂ­as");
        this.subiendo = false;
      }
    },


    actualizarFotografiasFinales(paths = []) {
      const normalizadas = (paths || []).filter(Boolean).slice(0, 5);

      this.fotografias_paths = normalizadas;
      this.fotografias = normalizadas.map((path) => ({
        preview: media.storageUrl ? media.storageUrl(path) : `/storage/${path}`,
        nombre: path.split("/").pop(),
        existing: true
      }));

      this.saveStepData(13, {
        plantel_id: this.idPlantelActual ?? this.planteles[0]?.plantel?.id ?? this.planteles[0]?.plantel_id,
        fotografias_paths: this.fotografias_paths,
      });
    },
    async manejarCambioFotografiasFinales(event) {
      const files = Array.from(event?.target?.files || []);

      if (files.length === 0) {
        return;
      }

      await this.subirFotosFinales(files);

      if (event?.target) {
        event.target.value = "";
      }
    },
    eliminarFotografiaFinal(index) {
      const nuevasRutas = [...this.fotografias_paths];
      nuevasRutas.splice(index, 1);
      this.actualizarFotografiasFinales(nuevasRutas);
    },
    limpiarFotografiasFinales() {
      this.actualizarFotografiasFinales([]);
    },
    async enviarEncuesta() {

      try {

        if (!this.fotografias_paths || this.fotografias_paths.length === 0) {
          notyf.error("Debes subir al menos una fotografÃƒÂ­a antes de enviar.");
          return;
        }

        if (this.subiendo) {
          notyf.error("Espera a que termine la carga de imÃƒÂ¡genes.");
          return;
        }

        const formData = new FormData();

        formData.append("plantel_id", this.planteles[0].plantel_id);
        formData.append("form_token", localStorage.getItem("form_token"));
        formData.append("modo_edicion", this.editando ? "1" : "0");

        /* ======================================================
           Ã°Å¸â€Â¹ STEP 1Ã¢â‚¬â€œ13 SOLO JSON
        ====================================================== */

        formData.append("ccts", JSON.stringify(this.cct));
        formData.append("matricula", JSON.stringify(this.matricula));
        const rutasAmenaza = media.extractExistingPaths
          ? media.extractExistingPaths(
            this.otrasAmenazas.imagenAmenaza,
            Array.isArray(this.otrasAmenazas.imagenAmenaza_path)
              ? this.otrasAmenazas.imagenAmenaza_path
              : this.otrasAmenazas.imagenAmenaza_path
                ? [this.otrasAmenazas.imagenAmenaza_path]
                : []
          )
          : [];

        const payloadOtrasAmenazas = {
          ...this.otrasAmenazas,
          imagenAmenaza: rutasAmenaza,
          imagenAmenaza_path: rutasAmenaza,
        };

        formData.append("amenazas", JSON.stringify(this.seleccion));
        formData.append("otrosElementos", JSON.stringify(payloadOtrasAmenazas));
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
           Ã°Å¸â€Â¹ SOLO PATHS (NO FILES)
        ====================================================== */

        formData.append("fotografias_paths",
          JSON.stringify(this.fotografias_paths));

        formData.append("edificios",
          JSON.stringify(this.datosExtra));

        /* ======================================================
           Ã°Å¸â€Â¹ ENVIAR
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
          title: this.editando ? "Encuesta actualizada" : "Encuesta enviada",
          text: this.editando
            ? "Los cambios se guardaron correctamente."
            : "Los datos se guardaron correctamente.",
          icon: "success",
          confirmButtonColor: "#56212f",
        }).then(() => {

          this.clearSurveyStorage();
          window.location.reload();

        });

      } catch (error) {

        console.error("Ã¢ÂÅ’ Error:", error);

        Swal.fire({
          title: "Error",
          text: "OcurriÃƒÂ³ un problema al enviar la encuesta.",
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
                ? `Respuesta invÃƒÂ¡lida del servidor: ${preview}`
                : 'Respuesta invÃƒÂ¡lida del servidor'
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
        "encuesta_step_3",
        "encuesta_step_4",
        "encuesta_step_5",
        "encuesta_step_6",
        "encuesta_step_7",
        "encuesta_step_8",
        "encuesta_step_9",
        "encuesta_step_10",
        "encuesta_step_11",
        "encuesta_step_12",
        "encuesta_step_13",
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
  // Si fileKeys es string, lo convertimos en array automÃƒÂ¡ticamente
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

  // Aplica estilo comÃƒÂºn
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
        element.readOnly = false; // permitir ediciÃƒÂ³n
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
      // Restaurar apariencia e interacciÃƒÂ³n
      element.style.opacity = '1';
      element.style.pointerEvents = 'auto';
      element.title = '';
      break;

    default:
      console.warn(`Elemento con id="${id}" no es compatible para desbloquear.`);
      break;
  }
}
