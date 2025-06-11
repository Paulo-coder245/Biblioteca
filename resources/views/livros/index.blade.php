<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
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
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            min-height: 100vh;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 32px;
            color: #ffffff;
            text-align: center;
        }

        table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            background-color: #1e1e1e;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.4);
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
        }

        th {
            background-color: #2a2a2a;
            color: #ffffff;
            font-weight: 600;
            border-bottom: 2px solid #3b3b3b;
        }

        td {
            border-bottom: 1px solid #2c2c2c;
        }

        tr:hover {
            background-color: #2a2a2a;
        }

        a.button {
            display: inline-block;
            margin-top: 30px;
            background-color: #3b82f6;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #2563eb;
        }

        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            th {
                display: none;
            }

            tr {
                margin-bottom: 16px;
                background: #1e1e1e;
                border-radius: 8px;
                overflow: hidden;
            }

            td {
                padding: 12px;
                border: none;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #aaa;
                display: block;
                margin-bottom: 4px;
            }
        }
    </style>
</head>
<body>
    <h1>Livros Cadastrados</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td data-label="ID">{{ $livro->id }}</td>
                    <td data-label="Título">{{ $livro->titulo }}</td>
                    <td data-label="Autor">{{ $livro->autor }}</td>
                    <td data-label="Ano">{{ $livro->ano_publicacao }}</td>
                    <td data-label="Status">{{ ucfirst($livro->status_livro) }}</td>
                    <td>
                        <a href="{{ route('livros.edit', $livro) }}" style="
                            background-color: #f59e42;
                            color: #fff;
                            border: none;
                            padding: 8px 12px;
                            border-radius: 6px;
                            font-weight: 600;
                            cursor: pointer;
                            text-decoration: none;
                            margin-right: 6px;
                            display: inline-block;
                        ">Editar</a>
                        <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este livro?')" style="
                                background-color: #ef4444;
                                color: #fff;
                                border: none;
                                padding: 8px 12px;
                                border-radius: 6px;
                                font-weight: 600;
                                cursor: pointer;
                            ">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="button">Voltar</a>
</body>
</html>