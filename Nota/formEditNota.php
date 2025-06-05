<?php
    require_once "../init.php";
    $idA = isset($_GET['idAlbum']) ? $_GET['idAlbum'] : null;
    $idU = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

    if(empty($idA) || empty($idU)){
        echo "<script>alert('ID da nota não fornecido.');</script>";
        exit;
    }

    $PDO = db_connect();

    $sqlU = "SELECT idUsuario, nmUsuario FROM usuario ORDER BY nmUsuario ASC";
    $stmtU = $PDO->prepare($sqlU);
    $stmtU->execute();

    $sqlA = "SELECT idAlbum, nmAlbum FROM album ORDER BY nmAlbum ASC";
    $stmtA = $PDO->prepare($sqlA);
    $stmtA->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Nota</title>
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
    <h3 class="text-center">Editar Nota</h3>
    <form action="editNota.php" method="POST">
        <div class="form-group mt-3">
            <label for="nota">Nota</label>
            <input type="number" class="form-control" id="nota" name="nota" placeholder="Digite a nota" required>
        </div>
        <div class="form-group mt-3">
            <label for="usuario">Usuário</label>
            <select name="usuario" id="usuario" class="form-control form-select" required>
                <option value="" disabled selected>Selecione o Usuário</option>
                <?php while($usuario = $stmtU->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value=<?php echo $usuario['idUsuario']; ?> ><?php echo $usuario['nmUsuario']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="album">Álbum</label>
            <select name="album" id="album" class="form-control form-select" required>
                <option value="" disabled selected>Selecione o Álbum</option>
                <?php while($album = $stmtA->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value=<?php echo $album['idAlbum']; ?> ><?php echo $album['nmAlbum']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Atualizar</button>
    </form>
</div>
</body>
</html>