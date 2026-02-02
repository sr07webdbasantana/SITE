<!DOCTYPE html>
<html lang="pt-BR">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>SITE INSTITUCIONAL SETEMERJ!</title>

    <style>
        /* Estilização Geral do Corpo da Página */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5; /* Fundo cinza claro para contraste */
            margin: 0;
            padding: 40px;
            text-align: center;
        }

        /* Classe de Container para centralização e design de "card" */
        .container-custom {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
        }
    </style>
</head>
    <body>
      
       <!-- Linha horizontal para separar seções da página -->
<hr>

<!-- Container Bootstrap: centraliza e limita a largura do conteúdo -->
    <div class="container mt-5">
        <h1>SETEMERJ - INSTITUCIONAL</h1>
        <p>Bem vindo ao SITE INSTITUCIONAL SETEMERJ!</p>
        <hr>

        <div class="row">
    <div class="col-12 border rounded p-4 bg-light">
        <hr>
        <?php
       
    require './vendor/autoload.php';

    $url = new Core\ConfigController();
    ?>
</body>

</html>