<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'autor',
        'ano_publicacao',
        'status_livro',
    ];

    // Livro pertence ao usuário
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Livro tem vários empréstimos
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}