<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:usuarios,cpf',
            'email' => 'required|email|unique:usuarios,email',
        ]);

        Usuario::create($validated);

        return redirect()->route('usuarios.create')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:usuarios,cpf,' . $usuario->id,
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
        ]);

        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }
}