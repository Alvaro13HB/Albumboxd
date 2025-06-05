<?php
    require_once "../init.php";
    $id = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
    $PDO = db_connect();
    $sql = "SELECT idUsuario, nickUsuario, nmUsuario, emailUsuario, dtnascUsuario FROM usuario WHERE idUsuario = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($user)){
        header("Location: exibirUsuario.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
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
</head>
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
    <h3 class="text-center">Edite seus dados</h3>
    <form action="editUsuario.php" method="POST">
        <div class="form-group mt-3">
            <label for="nick">Nickname</label>
            <input type="text" class="form-control" id="nick" name="nick" placeholder="Digite seu nickname" value=<?php echo $user["nickUsuario"] ?> required>
        </div>
        <div class="form-group mt-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" value=<?php echo $user["nmUsuario"] ?> required>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu Email" value=<?php echo $user["emailUsuario"] ?> required>
        </div>
        <div class="form-group mt-3">
            <label for="dtNasc">Data de nascimento</label>
            <input type="date" class="form-control" id="dtNasc" name="dtNasc" value=<?php echo $user["dtnascUsuario"] ?> required>
        </div>
        <div class="form-group mt-3">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Atualizar</button>
    </form>
</div>
</body>
</html>