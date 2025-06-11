<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            margin-bottom: 24px;
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
            text-align: center;
        }

        form label {
            display: block;
            margin-bottom: 16px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px 12px;
            border: none;
            border-radius: 8px;
            background-color: #2a2a2a;
            color: #e0e0e0;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2563eb;
        }

        .success,
        .errors {
            margin-top: 20px;
            font-size: 14px;
        }

        .success {
            color: #4ade80;
        }

        .errors {
            color: #f87171;
        }

        .errors li {
            margin-bottom: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Livro</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('livros.store') }}" method="POST">
            @csrf
            <label>Título:
                <input type="text" name="titulo" value="{{ old('titulo') }}">
            </label>
            <label>Autor:
                <input type="text" name="autor" value="{{ old('autor') }}">
            </label>
            <label>Ano de Publicação:
                <input type="number" name="ano_publicacao" value="{{ old('ano_publicacao') }}" min="1000" max="{{ date('Y') }}">
            </label>
            <label>Status:
                <select name="status_livro">
                    <option value="disponivel" {{ old('status_livro') == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                    <option value="emprestado" {{ old('status_livro') == 'emprestado' ? 'selected' : '' }}>Emprestado</option>
                </select>
            </label>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="{{ route('dashboard') }}" style="
            display: block;
            margin-top: 16px;
            text-align: center;
            background-color: #6b7280;
            color: #fff;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        " onmouseover="this.style.backgroundColor='#374151'" onmouseout="this.style.backgroundColor='#6b7280'">
            Voltar
        </a>

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