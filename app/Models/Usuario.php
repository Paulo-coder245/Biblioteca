<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nome', 'cpf', 'email'];

    // RELACIONAMENTO COM EMPRESTIMOS (USUARIO TEM MUITOS EMPRESTIMOS)
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}