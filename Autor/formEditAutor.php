<?php
    require_once "../init.php";
    $id = isset($_GET['idAutor']) ? $_GET['idAutor'] : null;
    $PDO = db_connect();
    $sql = "SELECT idAutor, nmAutor FROM Autor WHERE idAutor = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $autor = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($autor)){
        header("Location: exibirAutor.php");
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
    <form action="editAutor.php" method="POST">
        <div class="form-group mt-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" value=<?php echo $autor["nmAutor"] ?> required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Atualizar</button>
    </form>
</div>
</body>
</html>