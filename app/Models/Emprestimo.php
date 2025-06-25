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

    // RELACIONAMENTO: UM EMPRÉSTIMO PERTENCE A UM USUÁRIO
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // RELACIONAMENTO: UM EMPRÉSTIMO PERTENCE A UM LIVRO
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    // ATUALIZA O STATUS DO LIVRO
    protected static function booted()
    {    static::created(function ($emprestimo) {
        if (in_array($emprestimo->status_emprestimo, ['aprovado', 'atrasado'])) {
            $emprestimo->livro->update(['status_livro' => 'emprestado']);
        } elseif ($emprestimo->status_emprestimo === 'devolvido') {
            $emprestimo->livro->update(['status_livro' => 'disponível']);
        }
    });

    static::updated(function ($emprestimo) {
        if (in_array($emprestimo->status_emprestimo, ['aprovado', 'atrasado'])) {
            $emprestimo->livro->update(['status_livro' => 'emprestado']);
        } elseif ($emprestimo->status_emprestimo === 'devolvido') {
            $emprestimo->livro->update(['status_livro' => 'disponível']);
        }
    });
}
}