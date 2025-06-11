<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    
    Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');

    //USUARIO DELETE
    Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    Route::resource('livros', LivroController::class);
    Route::get('livros/create', [LivroController::class, 'create'])->name('livros.create');
    Route::post('livros', [LivroController::class, 'store'])->name('livros.store');
    
    //LIVRO DELETE
    Route::delete('livros/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');
});

require __DIR__.'/auth.php';
