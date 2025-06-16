<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with('usuario')->get();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:100',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'status_livro' => 'required|in:disponivel,emprestado',
        ]);

        Livro::create($validated);

        return redirect()->route('livros.create')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function show(string $id) { }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:100',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'status_livro' => 'required|in:disponivel,emprestado',
        ]);

        $livro->update($validated);

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}