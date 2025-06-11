<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Bem-vindo</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1350&q=80');
      background-position: center;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      backdrop-filter: brightness(0.6);
    }

    .card {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 60px;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      text-align: center;
      max-width: 400px;
      width: 90%;
    }

    .card h1 {
      font-size: 2rem;
      color: #111;
      margin-bottom: 20px;
    }

    .card p {
      font-size: 1.1rem;
      color: #444;
      margin-bottom: 30px;
    }

    .card a {
      display: inline-block;
      padding: 12px 28px;
      background-color: #000;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .card a:hover {
      background-color: #333;
    }
  </style>
</head>
<body>
  <div class="card">
    <h1>Bem-vindo à Biblioteca Virtual</h1>
    <p>Faça seu login para acessar o acervo.</p>
    <a href="{{ route('login') }}">Acessar</a>
  </div>
</body>
</html>