<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\TextUI\Configuration\Php;

class UsuarioController extends Controller
{
    public function create() {
    return view('registro');
}

public function store(Request $request) {
    $data = $request->validate([
        'nombre' => 'required|min:3',
        'email' => 'required|email|unique:usuarios',
        'password' => 'required|min:6'
    ]);

    \App\Models\Usuario::create([
        'nombre' => $data['nombre'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    return redirect('/usuarios')->with('success', 'Usuario creado');
}

public function index() {
    $usuarios = \App\Models\Usuario::all();
    return view('lista', compact('usuarios'));
}

}
