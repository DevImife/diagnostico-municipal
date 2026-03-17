<?php

namespace App\Http\Controllers;

use App\Exports\EncuestasExport;
use App\Models\Audit;
use App\Models\Cct;
use App\Models\Institution;
use App\Models\Municipality;
use App\Models\Survey;
use App\Services\EncuestasExportService;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Laravel\Pail\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $usuarioId = Auth::id();
            $plantelId = $request->plantel_id;
            $formToken = $request->form_token;

            /* ======================================================
              🔹 DECODIFICAR JSON
            ====================================================== */

            $ccts = json_decode($request->ccts, true);
            $matricula = json_decode($request->matricula, true);
            $amenazas = json_decode($request->amenazas, true);
            $otrosElementos = json_decode($request->otrosElementos, true);
            $medidas = json_decode($request->medidas, true);
            $documentoPropiedad = json_decode($request->documentoPropiedad, true);
            $servicioPlantel = json_decode($request->servicioPlantel, true);
            $zonaSismica = json_decode($request->zonaSismica, true);
            $servSanitarioCantidad = json_decode($request->servSanitarioCantidad, true);
            $servSanitarioEstado = json_decode($request->servSanitarioEstado, true);
            $tipoDescarga = json_decode($request->tipoDescarga, true);
            $edifEspaciosCantidad = json_decode($request->edifEspaciosCantidad, true);
            $edificios = json_decode($request->edifTipoEstructura, true);
            $edifCondiciones = json_decode($request->edifCondiciones, true);
            $obraExteriorEstado = json_decode($request->obraExteriorEstado, true);
            $obraExterior = json_decode($request->obraExteriorComplementos, true);
            $necesidadMejora = json_decode($request->necesidadMejora, true);
            $elemEstructuraMejora = json_decode($request->elemEstructuraMejora, true);
            $elemExteriorMejora = json_decode($request->elemExteriorMejora, true);
            $accesibilidadMejora = json_decode($request->accesibilidadMejora, true);
            $espaciosMejora = json_decode($request->espaciosMejora, true);
            $descripcionMejora = json_decode($request->descripcionMejora, true);
            $bienes = json_decode($request->bienes, true);
            $energia = json_decode($request->energiaElectrica, true);
            $fotografiasPaths = json_decode($request->fotografias_paths, true);

            /* ======================================================
              🔹 FUNCIÓN PARA MOVER DESDE TEMP
            ====================================================== */

            $moverDesdeTemp = function ($paths, $carpetaFinal) use ($plantelId) {

                $guardados = [];

                if (! $paths) {
                    return $guardados;
                }

                foreach ($paths as $rutaTemp) {

                    if (! Storage::disk('public')->exists($rutaTemp)) {
                        continue;
                    }

                    $nombre = basename($rutaTemp);
                    $rutaNueva = "planteles/{$plantelId}/{$carpetaFinal}/{$nombre}";

                    Storage::disk('public')->move($rutaTemp, $rutaNueva);

                    $guardados[] = $nombre;
                }

                return $guardados;
            };

            /* ======================================================
              🔹 MOVER STEP 4 - AMENAZAS
            ====================================================== */

            if (! empty($otrosElementos['imagenAmenaza_path'])) {

                $resultado = $moverDesdeTemp(
                    [$otrosElementos['imagenAmenaza_path']],
                    'amenazas'
                );

                $otrosElementos['imagenAmenaza'] = $resultado[0] ?? null;
            }

            /* ======================================================
              🔹 MOVER STEP 5 - DOCUMENTO PROPIEDAD
            ====================================================== */

            if (! empty($documentoPropiedad['archivoPropiedad'])) {

                $resultado = $moverDesdeTemp(
                    [$documentoPropiedad['archivoPropiedad']],
                    'documentos_propiedad'
                );

                $documentoPropiedad['archivoPropiedad'] = $resultado[0] ?? null;
            }

            /* ======================================================
              🔹 MOVER STEP 6 - SERVICIOS
            ====================================================== */

            $camposServicios = [
                'fotografia_agua_potable_path',
                'fotografia_drenaje_path',
                'fotografia_energia_path',
                'fotografia_especiales_path',
                'fotografia_tecnologias_path',
                'fotografias_accesibilidad_path',
                'archivo_vialidad_path',
            ];

            foreach ($camposServicios as $campo) {

                if (! empty($servicioPlantel[$campo])) {

                    $resultado = $moverDesdeTemp(
                        [$servicioPlantel[$campo]],
                        'servicios'
                    );

                    $campoFinal = str_replace('_path', '', $campo);

                    $servicioPlantel[$campoFinal] = $resultado[0] ?? null;
                }
            }

            /* ======================================================
              🔹 MOVER EDIFICIOS
            ====================================================== */

            foreach ($edificios as $clave => &$edificio) {

                $edificio['imagenes'] = $moverDesdeTemp(
                    $edificio['imagenes_paths'] ?? [],
                    'edificios'
                );

                $edificio['imagen_danio'] = $moverDesdeTemp(
                    $edificio['danio_paths'] ?? [],
                    'edificios_danio'
                );

                unset($edificio['imagenes_paths']);
                unset($edificio['danio_paths']);
            }

            /* ======================================================
              🔹 MOVER OBRA EXTERIOR
            ====================================================== */

            $obraExterior['fotografiaUsoMultiples'] =
                $moverDesdeTemp(
                    $obraExterior['fotografiaUsoMultiples_paths'] ?? [],
                    'obra_exterior'
                );

            if (! empty($obraExterior['croquis_path'])) {

                $croquis = $moverDesdeTemp(
                    [$obraExterior['croquis_path']],
                    'obra_exterior'
                );

                $obraExterior['croquis'] = $croquis[0] ?? null;
            }

            /* ======================================================
              🔹 MOVER ENERGÍA
            ====================================================== */

            foreach (['documento_path', 'fotografiaMedidor_path', 'archivoCertificadovie_path'] as $campo) {

                if (! empty($energia[$campo])) {

                    $resultado = $moverDesdeTemp(
                        [$energia[$campo]],
                        'energia'
                    );

                    $campoFinal = str_replace('_path', '', $campo);
                    $energia[$campoFinal] = $resultado[0] ?? null;
                }
            }

            /* ======================================================
              🔹 MOVER STEP 13
            ====================================================== */

            $fotografiasFinal =
                $moverDesdeTemp($fotografiasPaths, 'fotografias');

            /* ======================================================
              🔹 CREAR ENCUESTA
            ====================================================== */

            $survey = Survey::create([
                'usuario_id' => $usuarioId,
                'plantel_id' => $plantelId,
                // 'ccts' => json_encode($ccts),
                'matricula' => json_encode($matricula),
                'amenazas' => json_encode($amenazas),
                'otrosElementos' => json_encode($otrosElementos),
                'medidas' => json_encode($medidas),
                'zonaSismica' => json_encode($zonaSismica),
                'documentoPropiedad' => json_encode($request->documentoPropiedad),
                'servicioPlantel' => json_encode($request->servicioPlantel),
                'servSanitarioCantidad' => json_encode($servSanitarioCantidad),
                'servSanitarioEstado' => json_encode($servSanitarioEstado),
                'tipoDescarga' => json_encode($tipoDescarga),
                'edifEspaciosCantidad' => json_encode($edifEspaciosCantidad),
                'edifTipoEstructura' => json_encode($edificios),
                'edifCondiciones' => json_encode($edifCondiciones),
                'obraExteriorEstado' => json_encode($obraExteriorEstado),
                'obraExteriorComplementos' => json_encode($obraExterior),
                'necesidadMejora' => json_encode($necesidadMejora),
                'elemEstructuraMejora' => json_encode($elemEstructuraMejora),
                'elemExteriorMejora' => json_encode($elemExteriorMejora),
                'accesibilidadMejora' => json_encode($accesibilidadMejora),
                'espaciosMejora' => json_encode($espaciosMejora),
                'descripcionMejora' => json_encode($descripcionMejora),
                'bienes' => json_encode($bienes),
                'energiaElectrica' => json_encode($energia),
                'fotografias' => json_encode($fotografiasFinal),
            ]);
            // $survey = Survey::create([
            //     'usuario_id' => $usuarioId,
            //     'plantel_id' => $plantelId,

            //     'matricula' => $matricula,
            //     'amenazas' => $amenazas,
            //     'otrosElementos' => $otrosElementos,
            //     'medidas' => $medidas,
            //     'zonaSismica' => $zonaSismica,
            //     'documentoPropiedad' => $request->documentoPropiedad,
            //     'servicioPlantel' => $request->servicioPlantel,
            //     'servSanitarioCantidad' => $servSanitarioCantidad,
            //     'servSanitarioEstado' => $servSanitarioEstado,
            //     'tipoDescarga' => $tipoDescarga,
            //     'edifEspaciosCantidad' => $edifEspaciosCantidad,
            //     'edifTipoEstructura' => $edificios,
            //     'edifCondiciones' => $edifCondiciones,
            //     'obraExteriorEstado' => $obraExteriorEstado,
            //     'obraExteriorComplementos' => $obraExterior,
            //     'necesidadMejora' => $necesidadMejora,
            //     'elemEstructuraMejora' => $elemEstructuraMejora,
            //     'elemExteriorMejora' => $elemExteriorMejora,
            //     'accesibilidadMejora' => $accesibilidadMejora,
            //     'espaciosMejora' => $espaciosMejora,
            //     'descripcionMejora' => $descripcionMejora,
            //     'bienes' => $bienes,
            //     'energiaElectrica' => $energia,
            //     'fotografias' => $fotografiasFinal,
            // ]);

            /* ======================================================
              🔹 LIMPIAR TEMP
            ====================================================== */

            Storage::disk('public')
                ->deleteDirectory("temp/formularios/{$formToken}");

            return response()->json([
                'message' => '✅ Encuesta guardada correctamente',
                'id' => $survey->id,
            ]);

        } catch (\Throwable $e) {

            \Log::error('❌ Error al guardar encuesta', [
                'mensaje' => $e->getMessage(),
                'archivo' => $e->getFile(),
                'linea' => $e->getLine(),
            ]);

            return response()->json([
                'message' => '❌ Error al guardar la encuesta',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    private function guardarArchivo($request, $campo, $plantelId, $subcarpeta = 'otros')
    {
        $archivos = $request->file($campo);

        if (! $archivos) {
            return null;
        }

        $folder = "planteles/{$plantelId}/{$subcarpeta}";
        if (! Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        // Si es arreglo de archivos
        if (is_array($archivos)) {
            $nombres = [];
            foreach ($archivos as $file) {
                if ($file->isValid()) {
                    $nombre = time().'_'.$file->getClientOriginalName();
                    $file->storeAs($folder, $nombre, 'public');
                    $nombres[] = $nombre;
                }
            }

            return $nombres;
        }

        // Si es un solo archivo
        if ($archivos->isValid()) {
            $nombre = time().'_'.$archivos->getClientOriginalName();
            $archivos->storeAs($folder, $nombre, 'public');

            return $nombre;
        }

        return null;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $registroEncuesta = Survey::findOrFail($id);

        $id_plantel = $registroEncuesta->plantel_id;

        $folder = "planteles/$id_plantel";

        if (Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->deleteDirectory($folder);
        }

        $registroEncuesta->delete();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Delete',
            'tabla' => 'surveys',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return response()->json([
            'message' => 'Plantel eliminado',
            'plantel_id' => $id_plantel,
        ]);

    }

    public function busquedaPlantel(Request $request)
    {
        $query = $request->get('q', '');

        // Lógica de búsqueda
        $resultados = Institution::with(['codigo_postal.municipio'])
            ->where('nombre_plantel', 'like', "%{$query}%")
            ->take(10)
            ->get() // selecciona campos necesarios
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre_completo' => $item->nombre_plantel.' - '.($item->codigo_postal->municipio->nombre_municipio ?? 'Sin municipio'),
                ];
            });

        return response()->json($resultados);
    }

    public function mostrarPlantel($id)
    {
        $plantel = Survey::with([
            'usuario', // usuario que creó la encuesta
            'plantel',
            'plantel.codigo_postal.municipio',
            // 'plusuario_id', // usuario asociado al plantel
        ])
            ->where('plantel_id', $id)
            ->first();

        if (! $plantel) {
            return response()->json(['message' => 'No se encontró el plantel'], 404);
        }

        // Decodificar los campos JSON generales
        $jsonFields = ['datos_director', 'infraestructura', 'otros_datos'];
        foreach ($jsonFields as $field) {
            if (! empty($plantel->$field)) {
                $plantel->$field = json_decode(stripslashes($plantel->$field), true);
            }
        }
        // dd($plantel->matricula);

        //  Decodificar y enriquecer el campo matricula
        if (! empty($plantel->matricula)) {
            try {
                $raw = $plantel->matricula;

                // Quitar comillas dobles externas si las tiene
                if (substr($raw, 0, 1) === '"' && substr($raw, -1) === '"') {
                    $raw = substr($raw, 1, -1);
                }

                // Decodificar correctamente (doble decodificación)
                $matricula = json_decode(stripslashes($raw), true);
                if (is_string($matricula)) {
                    $matricula = json_decode($matricula, true);
                }

                // Obtener todos los cct_id únicos
                $cctIds = collect($matricula)->pluck('cct_id')->filter()->unique()->toArray();

                // Consultar los datos de CCT
                // $ccts = \App\Models\Cct::whereIn('id', $cctIds)->get()->keyBy('id');
                $ccts = Cct::with(['nivel', 'turno'])
                    ->whereIn('id', $cctIds)
                    ->get()
                    ->keyBy('id');

                // dd($ccts);

                // Enriquecer cada registro con los datos del CCT
                $matricula = collect($matricula)->map(function ($item) use ($ccts) {
                    $item['cct'] = $ccts[$item['cct_id']] ?? null;

                    return $item;
                })->toArray();

                $plantel->matricula = $matricula;
            } catch (\Exception $e) {
                \Log::warning('Error decodificando matrícula: '.$e->getMessage());
                $plantel->matricula = [];
            }
        }

        $idInsertado = $plantel->id;
        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Search',
            'tabla' => 'surveys',
            'datoAfectado' => $idInsertado,
            'ip_address' => $ip,
        ]);

        return response()->json($plantel);
    }

    public function exportarExcel($id, EncuestasExportService $exporter)
    {
        $hora = Carbon::now()->format('YmdHis');

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Exportar',
            'tabla' => 'surveys',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        // return Excel::download(new EncuestasExport($id), 'Encuesta_'.$hora.'.xlsx');
        return $exporter->exportar($id, $hora);
    }

    public function uploadTemp(Request $request)
    {

        $request->validate([
            'files.*' => 'required|file|mimes:pdf,jpg,jpeg,png|max:15360',
        ]);

        $token = $request->token;
        $step = $request->step;

        $paths = [];

        foreach ($request->file('files') as $file) {
            $paths[] = $file->store(
                "temp/formularios/{$token}/step_{$step}",
                'public'
            );
        }

        return response()->json([
            'token' => $token,
            'step' => $step,
            'paths' => $paths,
        ]);

    }

    public function escuelasRegistradas()
    {
        $planteles = Survey::select('surveys.*')
            ->join('institutions', 'surveys.plantel_id', '=', 'institutions.id')
            ->join('postcodes', 'institutions.postcode_id', '=', 'postcodes.id')
            ->join('municipalities', 'postcodes.municipio_id', '=', 'municipalities.id')
            ->with([
                'usuario',
                'plantel.ccts.nivel',
                'plantel.ccts.turno',
                'plantel.codigo_postal.municipio',
            ])
            ->orderBy('municipalities.nombre_municipio', 'asc') // 👈 aquí ordenas
            ->paginate(50); // 50 por página

        $municipios = Municipality::whereHas('postcodes.institutions.surveys')
            ->orderBy('nombre_municipio')
            ->get();

        return view('busqueda', compact('planteles', 'municipios'));
    }

    public function exportarExcelMunicipio(
        Request $request,
        EncuestasExportService $exporter
    ) {
        $idMunicipio = $request->id_municipio;

        if (! $idMunicipio) {
            return back()->with('error', 'Seleccione un municipio');
        }

        $hora = Carbon::now()->format('YmdHis');

        return $exporter->exportarPorMunicipio($idMunicipio, $hora);
    }
}
