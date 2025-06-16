<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';

    protected $fillable = [
        'usuario_id',
        'livro_id',
        'status_emprestimo',
        'data_emprestimo',
        'data_devolucao',
    ];

    // RELACIONAMENTO: Um empréstimo pertence a um usuário
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // RELACIONAMENTO: Um empréstimo pertence a um livro
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    // Hook para atualizar o status do livro automaticamente
    protected static function booted()
    {
        static::created(function ($emprestimo) {
            if (in_array($emprestimo->status_emprestimo, ['aprovado', 'atrasado'])) {
                $emprestimo->livro->update(['status_livro' => 'emprestado']);
            }
        });

        static::updated(function ($emprestimo) {
            if (in_array($emprestimo->status_emprestimo, ['aprovado', 'atrasado'])) {
                $emprestimo->livro->update(['status_livro' => 'emprestado']);
            }
        });
    }
}