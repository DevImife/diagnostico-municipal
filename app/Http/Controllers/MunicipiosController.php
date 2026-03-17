<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Municipality;
use App\Models\Postcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $municipios = Municipality::when($search, function ($query, $search) {
            return $query->where('nombre_municipio', 'like', "%{$search}%");
        })->paginate(12, ['*'], 'municipios_page');

        // $codigos = Postcode::paginate(8);
        $codigos = Postcode::with('municipio')->paginate(12, ['*'], 'codigos_page');

        $municipiosAll = Municipality::select('id', 'nombre_municipio')
            ->orderBy('id')
            ->get();

        return view('catalogos', compact('municipios', 'codigos', 'municipiosAll'));
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
        //
        $request->merge([
            'nombre_municipio' => strtoupper(trim($request->nombre_municipio)),
        ]);

        $request->validate([
            'nombre_municipio' => 'required|max:90|string', // Asegurar que existe en la BD
        ]);

        // Crear el registro y obtener su ID
        $municipio = Municipality::create([
            'nombre_municipio' => $request->nombre_municipio,
        ]);

        $idInsertado = $municipio->id;

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Create',
            'tabla' => 'municipalities',
            'datoAfectado' => $idInsertado,
            'ip_address' => $ip,
        ]);

        return redirect()->back()->with('success', 'Municipio Creado');

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
        $municipioEdit = Municipality::findOrFail($id);
        $codigos = Postcode::with('municipio')->paginate(8, ['*'], 'codigos_page');
        $municipios = Municipality::paginate(8); // Para mostrar todos también

        $municipiosAll = Municipality::select('id', 'nombre_municipio')
            ->orderBy('id')
            ->get();

        return view('catalogos', compact('municipios', 'municipioEdit', 'codigos', 'municipiosAll'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'nombre_municipio' => 'required|max:150',
        ]);

        $request->merge([
            'nombre_municipio' => strtoupper(trim($request->nombre_municipio)),
        ]);

        $municipio = Municipality::findOrFail($id);
        $municipio->nombre_municipio = $request->nombre_municipio;
        $municipio->save();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Update',
            'tabla' => 'municipalities',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('catalogos')->with('success', 'Municipio actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // dd($id);
        $municipio = Municipality::findOrFail($id);
        $municipio->delete();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Delete',
            'tabla' => 'municipalities',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('catalogos')->with('success', 'Municipio eliminado correctamente.');

    }
}
