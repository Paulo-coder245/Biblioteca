<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
