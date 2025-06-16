<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empréstimos</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #121212;
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            min-height: 100vh;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 32px;
            color: #fff;
            text-align: center;
        }

        table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            background: #1e1e1e;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.4);
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
        }

        th {
            background: #2a2a2a;
            color: #fff;
            font-weight: 600;
            border-bottom: 2px solid #3b3b3b;
        }

        td {
            border-bottom: 1px solid #2c2c2c;
        }

        tr:hover {
            background: #2a2a2a;
        }

        .button {
            display: inline-block;
            background: #3b82f6;
            color: #fff;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
            margin: 0 10px;
        }

        .button:hover {
            background: #2563eb;
        }

        .button-orange {
            background: #f97316;
        }

        .button-orange:hover {
            background: #ea580c;
        }

        .button-group {
            margin-top: 32px;
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .success {
            color: #4ade80;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .actions a,
        .actions form {
            display: inline-block;
        }

        .actions a {
            background: #f59e42;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            margin-right: 6px;
        }

        .actions a:hover {
            background: #d97706;
        }

        .actions button {
            background: #ef4444;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }

        .actions button:hover {
            background: #b91c1c;
        }

        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr { display: block; }
            th { display: none; }
            tr { margin-bottom: 16px; background: #1e1e1e; border-radius: 8px; overflow: hidden; }
            td { padding: 12px; border: none; position: relative; }
            td::before { content: attr(data-label); font-weight: bold; color: #aaa; display: block; margin-bottom: 4px; }
        }
    </style>
</head>
<body>
    <h1>Empréstimos Registrados</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Livro</th>
                <th>Status</th>
                <th>Data Empréstimo</th>
                <th>Data Devolução</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprestimos as $emprestimo)
                <tr>
                    <td data-label="ID">{{ $emprestimo->id }}</td>
                    <td data-label="Usuário">{{ $emprestimo->usuario->nome ?? '-' }}</td>
                    <td data-label="Livro">{{ $emprestimo->livro->titulo ?? '-' }}</td>
                    <td data-label="Status">{{ ucfirst($emprestimo->status_emprestimo) }}</td>
                    <td data-label="Data Empréstimo">{{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y') }}</td>
                    <td data-label="Data Devolução">{{ $emprestimo->data_devolucao ? \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y') : '-' }}</td>
                    <td class="actions">
                        <a href="{{ route('emprestimos.edit', $emprestimo) }}">Editar</a>
                        <form action="{{ route('emprestimos.destroy', $emprestimo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este empréstimo?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="button-group">
        <a href="{{ route('emprestimos.create') }}" class="button button-orange">Novo Empréstimo</a>
        <a href="{{ route('dashboard') }}" class="button">Voltar</a>
    </div>
</body>
</html>