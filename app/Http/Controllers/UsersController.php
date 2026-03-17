<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Municipality;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        // $roles = Role::all();
        $roles = Role::where('id', '!=', 1)->get();
        $municipios = Municipality::all();
        // $usuarios = User::all();
        $usuarios = User::with(['rol', 'municipio'])
            ->where('status', 1)
            ->paginate(10);

        return view('usuarios', compact('roles', 'municipios', 'usuarios'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd("llegas");
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'id_rol' => 'nullable|exists:roles,id',
            'id_municipio' => 'nullable|exists:municipalities,id',
        ]);

        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_rol' => $request->id_rol,
            'id_municipio' => $request->id_municipio,
            'status' => 1,
        ]);

        $idInsertado = $usuario->id;
        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Create',
            'tabla' => 'users',
            'datoAfectado' => $idInsertado,
            'ip_address' => $ip,
        ]);

        return redirect()->route('usuarios')->with('success', 'Usuario creado correctamente');
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
        $user = User::findOrFail($id);

        $user->status = 0;

        $user->save();

        $usuarioId = Auth::id();
        $ip = request()->getClientIp();

        Audit::create([
            'user_id' => $usuarioId,
            'accion' => 'Cambio de Status',
            'tabla' => 'users',
            'datoAfectado' => $id,
            'ip_address' => $ip,
        ]);

        return redirect()->route('usuarios')->with('success', 'Usuario eliminado');
    }
}
