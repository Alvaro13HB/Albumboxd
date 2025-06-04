<?php
    require_once "../init.php";

    $PDO = db_connect();
    $sql = "SELECT idAutor, nmAutor FROM Autor ORDER BY nmAutor ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute()
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Álbuns</title>
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
    <h3 class="text-center">Cadastrar Álbum</h3>
    <form action="addAlbum.php" method="POST">
        <div class="form-group mt-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do Album" required>
        </div>
        <div class="form-group mt-3">
            <label for="data">Data de Lançamento</label>
            <input type="date" class="form-control" id="data" name="data" placeholder="Digite a data do Album" required>
        </div>
        <div class="form-group mt-3">
            <label for="qtdfaixas">Quantidade de Faixas</label>
            <input type="number" class="form-control" id="qtdfaixas" name="qtdfaixas" placeholder="Digite a quantidade de faixas" required>
        </div>
        <select name="autor" id="autor">
            <?php while($autor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <option value=<?php echo $autor['idAutor']; ?> ><?php echo $autor['nmAutor']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit" class="btn btn-primary w-100 mt-4">Cadastrar</button>
    </form>
</div>
</body>
</html>