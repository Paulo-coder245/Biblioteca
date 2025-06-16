<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('livro_id');
            $table->enum('status_emprestimo', ['aprovado', 'devolvido', 'atrasado']);
            $table->date('data_emprestimo');
            $table->date('data_devolucao')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
};