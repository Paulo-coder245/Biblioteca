<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Empréstimo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #121212; color: #e0e0e0; display: flex; justify-content: center; align-items: center; height: 100vh; padding: 20px; }
        .container { background: #1e1e1e; padding: 40px; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.5); width: 100%; max-width: 500px; }
        h1 { margin-bottom: 24px; font-size: 24px; font-weight: 600; color: #fff; text-align: center; }
        form label { display: block; margin-bottom: 16px; font-weight: 500; }
        select, input[type="date"] { width: 100%; padding: 10px 12px; border: none; border-radius: 8px; background: #2a2a2a; color: #e0e0e0; font-size: 16px; }
        button { width: 100%; padding: 12px; margin-top: 20px; background: #3b82f6; color: #fff; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s; }
        button:hover { background: #2563eb; }
        .errors { color: #f87171; margin-top: 20px; font-size: 14px; }
        .errors li { margin-bottom: 6px; }
        a { display: block; margin-top: 16px; text-align: center; background: #6b7280; color: #fff; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background 0.3s; }
        a:hover { background: #374151; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Empréstimo</h1>
        <form action="{{ route('emprestimos.store') }}" method="POST">
            @csrf
            <label>Usuário:
                <select name="usuario_id">
                    <option value="">Selecione</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>{{ $usuario->nome }}</option>
                    @endforeach
                </select>
            </label>
            <label>Livro:
                <select name="livro_id">
                    <option value="">Selecione</option>
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}" {{ old('livro_id') == $livro->id ? 'selected' : '' }}>{{ $livro->titulo }}</option>
                    @endforeach
                </select>
            </label>
            <label>Status:
                <select name="status_emprestimo">
                    <option value="aprovado" {{ old('status_emprestimo') == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                    <option value="devolvido" {{ old('status_emprestimo') == 'devolvido' ? 'selected' : '' }}>Devolvido</option>
                    <option value="atrasado" {{ old('status_emprestimo') == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
                </select>
            </label>
            <label>Data do Empréstimo:
                <input type="date" name="data_emprestimo" value="{{ old('data_emprestimo') }}">
            </label>
            <label>Data de Devolução:
                <input type="date" name="data_devolucao" value="{{ old('data_devolucao') }}">
            </label>
            <button type="submit">Cadastrar</button>
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