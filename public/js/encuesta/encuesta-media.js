(function () {
  const ALLOWED_EXTENSIONS = new Set([
    "pdf",
    "jpg",
    "jpeg",
    "jfif",
    "png",
    "webp",
    "heic",
    "heif",
    "avif",
    "bmp",
    "gif",
  ]);

  function storageUrl(path) {
    return path ? `/storage/${path}` : null;
  }

  function previewObject(path, extra = {}) {
    if (!path) return null;

    return {
      preview: storageUrl(path),
      existing: true,
      ...extra,
    };
  }

  function previewObjects(paths = []) {
    return (paths || [])
      .filter(Boolean)
      .map((path) => previewObject(path))
      .filter(Boolean);
  }

  function previewUrls(paths = []) {
    return (paths || []).filter(Boolean).map((path) => storageUrl(path));
  }

  function normalizeFiles(value) {
    const items = Array.isArray(value) ? value : [value];

    return items
      .map((item) => {
        if (item instanceof File) return item;
        if (item?.file instanceof File) return item.file;
        return null;
      })
      .filter(Boolean);
  }

  function getFileExtension(file) {
    const name = file?.name || "";
    const parts = name.split(".");
    return parts.length > 1 ? parts.pop().toLowerCase() : "";
  }

  function getInvalidFiles(files = []) {
    return files.filter((file) => !ALLOWED_EXTENSIONS.has(getFileExtension(file)));
  }

  function assertAllowedFiles(files = []) {
    const invalidFiles = getInvalidFiles(files);

    if (invalidFiles.length === 0) {
      return;
    }

    const detail = invalidFiles
      .map((file) => `${file.name || "archivo"} (${file.type || "sin tipo"})`)
      .join(", ");

    throw new Error(`Formato no permitido: ${detail}`);
  }

  async function uploadNewFiles(context, step, value, existingPaths = []) {
    const newFiles = normalizeFiles(value);

    if (newFiles.length === 0) {
      return [...existingPaths];
    }

    assertAllowedFiles(newFiles);

    const subida = await context.subirArchivosTemp(step, newFiles);

    return [
      ...existingPaths,
      ...(subida?.paths || []),
    ];
  }

  async function uploadSingleFile(context, step, value, existingPath = null) {
    const [file] = normalizeFiles(value);

    if (!file) {
      return existingPath;
    }

    assertAllowedFiles([file]);

    const subida = await context.subirArchivosTemp(step, [file]);
    return subida?.paths?.[0] || existingPath;
  }

  function createDatosExtraEdificio() {
    return {
      espacios: "",
      edad: "",
      estructura: "",
      niveles: "",
      otros: "",
      total_espacios: "",
      ejes: "",
      azotea: "",
      pisos: "",
      muros: "",
      imagenes: [],
      danio_estructural: [],
      imagen_danio: [],
      imagenes_paths: [],
      danio_paths: [],
    };
  }

  function applyEdificioPreviewState(extra) {
    extra.imagenes = previewObjects(extra.imagenes_paths || []);
    extra.imagen_danio = previewObjects(extra.danio_paths || []);
    return extra;
  }

  function rehydrateDatosExtraCollection(datosExtra = {}) {
    const hydrated = {};

    Object.entries(datosExtra).forEach(([edificio, info]) => {
      hydrated[edificio] = applyEdificioPreviewState({
        ...createDatosExtraEdificio(),
        ...info,
      });
    });

    return hydrated;
  }

  function getServiciosFileMap(servicios) {
    return {
      archivo_vialidad: servicios.archivo_vialidad,
      fotografia_agua_potable: servicios.fotografia_agua_potable,
      fotografia_drenaje: servicios.fotografia_drenaje,
      fotografia_energia: servicios.fotografia_energia,
      fotografia_especiales: servicios.fotografia_especiales,
      fotografia_tecnologias: servicios.fotografia_tecnologias,
      fotografias_accesibilidad: servicios.fotografias_accesibilidad,
    };
  }

  function rehydrateServiciosPreviewState(servicios = {}) {
    return {
      vialidadImagen: previewUrls(servicios.archivo_vialidad || []),
      sistemaAguaImagen: previewUrls(servicios.fotografia_agua_potable || []),
      sistemaDrenajeImagen: previewUrls(servicios.fotografia_drenaje || []),
      sistemaEnergiaImagen: previewUrls(servicios.fotografia_energia || []),
      sistemaEspecialImagen: previewUrls(servicios.fotografia_especiales || []),
      sistemaTecnologiasImagen: previewUrls(servicios.fotografia_tecnologias || []),
      sistemaAccesibilidadImagen: previewUrls(servicios.fotografias_accesibilidad || []),
    };
  }

  function resetServiciosPreviewState(context) {
    context.vialidadImagen = [];
    context.sistemaAguaImagen = [];
    context.sistemaDrenajeImagen = [];
    context.sistemaEnergiaImagen = [];
    context.sistemaEspecialImagen = [];
    context.sistemaTecnologiasImagen = [];
    context.sistemaAccesibilidadImagen = [];
  }

  function applyObraExteriorPreviewState(obraExterior) {
    obraExterior.fotografiaUsoMultiples = previewObjects(
      obraExterior.fotografiaUsoMultiples_paths || []
    );

    obraExterior.croquis = obraExterior.croquis_path
      ? previewObject(obraExterior.croquis_path, { name: "Croquis guardado" })
      : null;

    return obraExterior;
  }

  function rehydrateEnergia(energiaElectrica = {}) {
    const hydrated = { ...energiaElectrica };

    hydrated.documento = hydrated.documento_path
      ? previewObject(hydrated.documento_path)
      : hydrated.documento;

    hydrated.fotografiaMedidor = hydrated.fotografiaMedidor_path
      ? previewObject(hydrated.fotografiaMedidor_path)
      : hydrated.fotografiaMedidor;

    hydrated.archivoCertificadovie = hydrated.archivoCertificadovie_path
      ? previewObject(hydrated.archivoCertificadovie_path)
      : hydrated.archivoCertificadovie;

    return hydrated;
  }

  window.EncuestaMedia = {
    applyEdificioPreviewState,
    assertAllowedFiles,
    applyObraExteriorPreviewState,
    createDatosExtraEdificio,
    getFileExtension,
    getInvalidFiles,
    getServiciosFileMap,
    normalizeFiles,
    previewObject,
    previewObjects,
    previewUrls,
    rehydrateDatosExtraCollection,
    rehydrateEnergia,
    rehydrateServiciosPreviewState,
    resetServiciosPreviewState,
    storageUrl,
    uploadNewFiles,
    uploadSingleFile,
  };
})();
