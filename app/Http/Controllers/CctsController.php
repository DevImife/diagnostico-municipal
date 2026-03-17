<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Cct;
use App\Models\Institution;
use App\Models\Level;
use App\Models\Postcode;
use App\Models\Shift;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CctsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shifts = Shift::all();
        $levels = Level::all();

        return view('ccts', compact('shifts', 'levels'));
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
        $request->merge([
            'cct' => strtoupper(trim($request->cct)),
        ]);

        $request->validate([
            'cct' => 'required|string|max:10',
            'institution_id' => 'required',
            'nivel_id' => 'required',
            'turno_id' => 'required',
        ]);

        $cct = Cct::create([
            'plantel_id' => $request->institution_id,
            'nivel_id' => $request->nivel_id,
            'turno_id' => $request->turno_id,
            'clave_cct' => $request->cct,
        ]);

        $idInsertado = $cct->id;
        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Create',
            'tabla' => 'ccts',
            'datoAfectado' => $idInsertado,
            'ip_address' => $ip,
        ]);

        return redirect()->back()->with('success', 'CCT registrada con éxito.');
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
        $cct = Cct::findOrFail($id);
        $shifts = Shift::all();
        $levels = Level::all();

        return view('ccts', compact('cct', 'shifts', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $cct = Cct::findOrFail($id);

        $request->merge([
            'cct' => strtoupper(trim($request->cct)),
        ]);

        $request->validate([
            'cct' => 'required|string|max:10',
            'institution_id' => 'required',
            'nivel_id' => 'required',
            'turno_id' => 'required',
        ]);

        $cct->plantel_id = $request->institution_id;
        $cct->nivel_id = $request->nivel_id;
        $cct->turno_id = $request->turno_id;
        $cct->clave_cct = $request->cct;
        $cct->save();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Update',
            'tabla' => 'ccts',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('ccts')->with('success', 'CCT actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cct = Cct::find($id);

        $cct->delete();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Delete',
            'tabla' => 'ccts',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('ccts')->with('success', 'Cct eliminada correctamente.');
    }

    public function obtenerLocalidades($codigoPostal)
    {
        $localidades = Postcode::where('codigo_postal', $codigoPostal)->get(['id', 'localidad']);

        return response()->json($localidades);
    }

    public function mostrarDatosEncuesta($cct)
    {

        $cctBusqueda = Cct::with(['plantel.codigo_postal.municipio', 'nivel', 'turno'])
            ->where('clave_cct', '=', "$cct")
            ->limit(20)
            ->get();

        return response()->json($cctBusqueda);

    }

    public function validarRegistro($cct)
    {
        $cctData = Cct::where('clave_cct', $cct)->first();

        if (! $cctData) {
            return response()->json('no-existe-cct');
        }

        $plantelId = $cctData->plantel_id;

        // Si ya existe encuesta → regresar respuesta simple
        if (Survey::where('plantel_id', $plantelId)->exists()) {
            return response()->json('ya-registrado');
        }

        return response()->json('disponible');

    }

    public function grafica()
    {
        // Agrupa encuestas por mes del año 2025
        $data = Survey::whereYear('created_at', 2025)
            ->selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Construir respuesta para ApexCharts
        $meses = [
            1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic',
        ];

        $labels = [];
        $values = [];

        foreach ($data as $row) {
            $labels[] = $meses[$row->mes];
            $values[] = $row->total;
        }

        return response()->json([
            'labels' => $labels,
            'values' => $values,
        ]);
    }

    public function usuariosActivos()
    {
        $hace30dias = Carbon::now()->subDays(30);

        // Contar encuestas por usuario en los últimos 7 días
        $usuarios = Survey::where('created_at', '>=', $hace30dias)
            ->selectRaw('usuario_id, COUNT(*) as total')
            ->groupBy('usuario_id')
            ->with('usuario:id,name') // si quieres nombre del usuario
            ->get();

        return response()->json([
            'labels' => $usuarios->pluck('usuario.name'),
            'values' => $usuarios->pluck('total'),
        ]);
    }

    public function dataCantidad()
    {
        // Obtener planteles con su municipio
        $planteles = Institution::with('codigo_postal.municipio')
            ->get();

        // Agrupar por municipio y contar
        $porMunicipio = $planteles->groupBy(function ($item) {
            return $item->codigo_postal->municipio->nombre_municipio ?? 'SIN MUNICIPIO';
        });

        $labels = $porMunicipio->keys();               // Nombre de los municipios
        $values = $porMunicipio->map(function ($group) {
            return $group->count();
        })->values()->toArray(); // Cantidad de planteles

        return response()->json([
            'labels' => $labels,
            'values' => $values,
        ]);
    }
}
