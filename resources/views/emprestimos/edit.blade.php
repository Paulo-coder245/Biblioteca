<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Empréstimo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { background: #121212; color: #e0e0e0; font-family: 'Inter', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .container { background: #1e1e1e; padding: 40px; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.5); width: 100%; max-width: 500px; }
        h1 { margin-bottom: 24px; font-size: 24px; font-weight: 600; color: #fff; text-align: center; }
        label { display: block; margin-bottom: 16px; font-weight: 500; }
        select, input[type="date"] { width: 100%; padding: 10px 12px; border: none; border-radius: 8px; background: #2a2a2a; color: #e0e0e0; font-size: 16px; }
        button { width: 100%; padding: 12px; margin-top: 20px; background: #3b82f6; color: #fff; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s; }
        button:hover { background: #2563eb; }
        a { display: block; margin-top: 16px; text-align: center; background: #6b7280; color: #fff; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background 0.3s; }
        a:hover { background: #374151; }
        .errors { color: #f87171; margin-top: 20px; font-size: 14px; }
        .errors li { margin-bottom: 6px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Empréstimo</h1>
        <form action="{{ route('emprestimos.update', $emprestimo) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Usuário:
                <select name="usuario_id">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id', $emprestimo->usuario_id) == $usuario->id ? 'selected' : '' }}>{{ $usuario->nome }}</option>
                    @endforeach
                </select>
            </label>
            <label>Livro:
                <select name="livro_id">
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}" {{ old('livro_id', $emprestimo->livro_id) == $livro->id ? 'selected' : '' }}>{{ $livro->titulo }}</option>
                    @endforeach
                </select>
            </label>
            <label>Status:
                <select name="status_emprestimo">
                    <option value="aprovado" {{ old('status_emprestimo', $emprestimo->status_emprestimo) == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                    <option value="devolvido" {{ old('status_emprestimo', $emprestimo->status_emprestimo) == 'devolvido' ? 'selected' : '' }}>Devolvido</option>
                    <option value="atrasado" {{ old('status_emprestimo', $emprestimo->status_emprestimo) == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
                </select>
            </label>
            <label>Data do Empréstimo:
                <input type="date" name="data_emprestimo" value="{{ old('data_emprestimo', $emprestimo->data_emprestimo) }}">
            </label>
            <label>Data de Devolução:
                <input type="date" name="data_devolucao" value="{{ old('data_devolucao', $emprestimo->data_devolucao) }}">
            </label>
            <button type="submit">Salvar Alterações</button>
        </form>
        <a href="{{ route('emprestimos.index') }}">Voltar</a>
        @if($errors->any())
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>