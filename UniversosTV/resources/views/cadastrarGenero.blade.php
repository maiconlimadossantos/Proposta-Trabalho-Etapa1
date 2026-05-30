<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1>Cadastro de Genero</h1>
    <form action="/cadastrarGenero" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="descricao">descricao</label>
        <input type="text" id="descricao" name="descricao" required><br><br>
        

        <button type="submit">Cadastrar</button>
</body>
</html>