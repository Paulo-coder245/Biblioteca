<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();

            // RELAÇÕES
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
            $table->foreignId('livro_id')->constrained()->onDelete('cascade');


            $table->enum('status_emprestimo', ['aprovado', 'devolvido', 'atrasado']);
            $table->date('data_emprestimo');
            $table->date('data_devolucao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
