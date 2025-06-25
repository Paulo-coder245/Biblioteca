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

    // RELACIONAMENTO COM USUÁRIOS (LIVRO PERTENCE A UM USUÁRIO, 1:1)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    //RELACIONAMENTO COM EMPRÉSTIMOS (LIVRO PODE TER MUITOS EMPRÉSTIMOS, 1:N)
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}