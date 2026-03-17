<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Institution;
use App\Models\Level;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlantelesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd('llegas planteles');

        $request->merge([
            'nombre_plantel' => strtoupper(trim($request->nombre_plantel)),
        ]);

        $request->validate([
            'nombre_plantel' => 'required|string|max:255',
            'localidad' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'telefono' => 'nullable|digits:10',
        ]);

        $fileName = '';

        if ($request->hasFile('fachada_plantel')) {
            $file = $request->file('fachada_plantel');
            // Generar nombre único
            $fileName = time().'_'.$file->getClientOriginalName();
            // Guardar en storage/app/public/fachadas
            $path = $file->storeAs('fachadas', $fileName, 'public');
            // dd($fileName);
        }

        $plantel = Institution::create([
            'postcode_id' => $request->localidad,
            'nombre_plantel' => $request->nombre_plantel,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'telefono' => $request->telefono,
            'inah' => $request->inah,
            'edad_plantel' => $request->edad_plantel,
            'archivo_plantel' => $fileName,
        ]);

        $idInsertado = $plantel->id;
        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Create',
            'tabla' => 'institutions',
            'datoAfectado' => $idInsertado,
            'ip_address' => $ip,
        ]);

        return redirect()->back()->with('success', 'Plantel registrado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $institucion = Institution::findOrFail($id);
        $shifts = Shift::all();
        $levels = Level::all();

        return view('ccts', compact('institucion', 'shifts', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->eliminar_fachada);

        $institucion = Institution::findOrFail($id);

        $request->merge([
            'nombre_plantel' => strtoupper(trim($request->nombre_plantel)),
        ]);

        $request->validate([
            'nombre_plantel' => 'required|string|max:255',
            'localidad' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'telefono' => 'nullable|digits:10',
        ]);

        // ⚡ Si se mandó eliminar la fachada
        if ($request->has('eliminar_fachada') && $request->eliminar_fachada == 1) {
            if ($institucion->archivo_plantel && Storage::disk('public')->exists('fachadas/'.$institucion->archivo_plantel)) {
                Storage::disk('public')->delete('fachadas/'.$institucion->archivo_plantel);
            }
            $institucion->archivo_plantel = null; // lo dejas vacío en la BD
        }

        if ($request->hasFile('fachada_plantel')) {
            // Borras el anterior (si existe)
            if ($institucion->archivo_plantel && Storage::disk('public')->exists('fachadas/'.$institucion->archivo_plantel)) {
                Storage::disk('public')->delete('fachadas/'.$institucion->archivo_plantel);
            }

            // Guardas el nuevo archivo
            $path = $request->file('fachada_plantel')->store('fachadas', 'public');
            $institucion->archivo_plantel = basename($path); // solo guardas el nombre
        }

        // Guardas los demás cambios
        $institucion->nombre_plantel = $request->nombre_plantel;
        $institucion->postcode_id = $request->localidad;
        $institucion->latitud = $request->latitud;
        $institucion->edad_plantel = $request->edad_plantel;
        $institucion->telefono = $request->telefono;
        $institucion->inah = $request->inah;
        $institucion->longitud = $request->longitud;

        $institucion->save();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Update',
            'tabla' => 'institutions',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('ccts')->with('success', 'Institución actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $institucion = Institution::find($id);

        if ($institucion->archivo_plantel && Storage::disk('public')->exists('fachadas/'.$institucion->archivo_plantel)) {
            Storage::disk('public')->delete('fachadas/'.$institucion->archivo_plantel);
        }
        $institucion->delete();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Delete',
            'tabla' => 'institutions',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('ccts')->with('success', 'Plantel eliminado correctamente.');
    }

    public function searchInstitution(Request $request)
    {
        $search = $request->get('q', '');

        // $plantelBusqueda = Institution::where('nombre_plantel', 'like', "%$search%")
        //     ->select('id', 'nombre_plantel as text') //text es lo que ocupa select2
        //     ->limit(20) //para no traer varios registros y sobrecargar el sistema
        //     ->get();

        $plantelBusqueda = Institution::join('postcodes', 'institutions.postcode_id', '=', 'postcodes.id')
            ->where('nombre_plantel', 'like', "%$search%")
            ->select(
                'institutions.id',
                DB::raw("CONCAT(institutions.nombre_plantel, ' - ', postcodes.codigo_postal) as text")
            )
            ->limit(20)
            ->get();

        return response()->json($plantelBusqueda);
    }
}
