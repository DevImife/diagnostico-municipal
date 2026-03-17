<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Municipality;
use App\Models\Postcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodigoPostalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search_codigos');

        $codigos = Postcode::when($search, function ($query, $search) {
            return $query->where('codigo_postal', 'like', "%{$search}%");
        })->paginate(8);

        $municipios = Municipality::paginate(8);

        $municipiosAll = Municipality::select('id', 'nombre_municipio')
            ->orderBy('id')
            ->get();

        return view('catalogos', compact('codigos', 'municipios', 'municipiosAll'));
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
        // se convierten los datos del formulario en mayusculas
        $request->merge([
            'localidad' => strtoupper(trim($request->localidad)),
            'tipo' => strtoupper(trim($request->tipo)),
            'zona' => strtoupper(trim($request->zona)),
        ]);

        $request->validate([
            'codigo_postal' => 'required|regex:/^[0-9]{5}$/',
            'municipio_id' => 'required',
            'localidad' => 'required|max:200|string',
            'tipo' => 'required|max:200|string',
            'zona' => 'required|max:200|string',
        ]);

        $codigoPostal = Postcode::create([
            'municipio_id' => $request->municipio_id,
            'codigo_postal' => $request->codigo_postal,
            'localidad' => $request->localidad,
            'tipo' => $request->tipo,
            'zona' => $request->zona,
        ]);

        $idInsertado = $codigoPostal->id;
        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Create',
            'tabla' => 'postcodes',
            'datoAfectado' => $idInsertado,
            'ip_address' => $ip,
        ]);

        return redirect()->back()->with('success', 'Código Postal Creado');

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
        $codigoEdit = Postcode::findOrFail($id);
        $codigos = Postcode::paginate(8); // Para mostrar todos también
        $municipios = Municipality::paginate(8);

        $municipiosAll = Municipality::select('id', 'nombre_municipio')
            ->orderBy('id')
            ->get();

        return view('catalogos', compact('codigos', 'codigoEdit', 'municipios', 'municipiosAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->merge([
            'localidad' => strtoupper(trim($request->localidad)),
            'tipo' => strtoupper(trim($request->tipo)),
            'zona' => strtoupper(trim($request->zona)),
        ]);

        $request->validate([
            'codigo_postal' => 'required|regex:/^[0-9]{5}$/',
            'municipio_id' => 'required',
            'localidad' => 'required|max:200|string',
            'tipo' => 'required|max:200|string',
            'zona' => 'required|max:200|string',
        ]);

        $codigoPostal = Postcode::findOrFail($id);

        $codigoPostal->update([
            'municipio_id' => $request->municipio_id,
            'codigo_postal' => $request->codigo_postal,
            'localidad' => $request->localidad,
            'tipo' => $request->tipo,
            'zona' => $request->zona,
        ]);

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Update',
            'tabla' => 'postcodes',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('catalogos')->with('success', 'Código Postal actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $codigoPostal = Postcode::findOrFail($id);
        $codigoPostal->delete();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Delete',
            'tabla' => 'postcodes',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('catalogos')->with('success', 'Código eliminado correctamente.');
    }
}
