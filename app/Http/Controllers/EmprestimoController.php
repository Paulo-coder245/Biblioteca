<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Usuario;
use App\Models\Livro;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    //METODO INDEX
    public function index()
    {
        $emprestimos = Emprestimo::with(['usuario', 'livro'])->get();
        return view('emprestimos.index', compact('emprestimos'));
    }

    //METODO CREATE
    public function create()
    {
        $usuarios = Usuario::all();
        $livros = Livro::where('status_livro', 'disponivel')->get();
        return view('emprestimos.create', compact('usuarios', 'livros'));
    }

    //METODO STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'livro_id' => 'required|exists:livros,id',
            'status_emprestimo' => 'required|in:aprovado,devolvido,atrasado',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|date|after_or_equal:data_emprestimo',
        ]);

        Emprestimo::create($validated);

        Livro::where('id', $request->livro_id)->update(['status_livro' => 'emprestado']);

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo registrado com sucesso!');
    }

    //METODO EDIT
    public function edit(Emprestimo $emprestimo)
    {
        $usuarios = Usuario::all();
        $livros = Livro::all();
        return view('emprestimos.edit', compact('emprestimo', 'usuarios', 'livros'));
    }

    //METODO UPDATE
    public function update(Request $request, Emprestimo $emprestimo)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'livro_id' => 'required|exists:livros,id',
            'status_emprestimo' => 'required|in:aprovado,devolvido,atrasado',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|date|after_or_equal:data_emprestimo',
        ]);

        $emprestimo->update($validated);

        if ($request->status_emprestimo === 'devolvido') {
            Livro::where('id', $request->livro_id)->update(['status_livro' => 'disponivel']);
        }

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    //METODO DESTROY
    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo excluído com sucesso!');
    }
}
