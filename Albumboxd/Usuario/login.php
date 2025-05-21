<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("../navbar/navbar.html");
            });
        });
    </script>
    <style>
        body {
            background-color: #f6f8fa;
        }
        .form-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: white;
            border: 1px solid #d0d7de;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.03);
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="menu"></div>
    <div class="form-container">
        <h3 class="text-center">Entre no Albumboxd</h3>
        <form action="loginUsuario.php" method="POST">
            <div class="form-group mt-3">
                <label for="nick">Nickname</label>
                <input type="text" class="form-control" id="nick" name="nick" placeholder="Digite seu nickname" required>
            </div>
            <div class="form-group mt-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-4">Entrar</button>
            <p class="mt-3 text-center">
                Não possui uma conta? <a href="formAddUsuario.html">Crie uma conta</a>
            </p>
        </form>
    </div>
</body>
</html>

<?php

        








?>