<?php
    require_once "../init.php";
    $id = isset($_GET['idAlbum']) ? $_GET['idAlbum'] : null;
    $PDO = db_connect();

    $sql = "SELECT idAlbum, nmAlbum, dtAlbum, qtdfaixasAlbum FROM album ORDER BY nmAlbum ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();

    $sqlAutor = "SELECT * FROM autor ORDER BY nmAutor ASC";
    $stmtAutor = $PDO->prepare($sqlAutor);
    $stmtAutor->execute();

    $album = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!is_array($album)){
        header("Location: exibirAlbum.php");
    }
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
    <h3 class="text-center">Editar Álbum</h3>
    <form action="editAlbum.php" method="POST">
        <input type="hidden" name="idAlbum" value="<?php echo $album['idAlbum']; ?>">
        <div class="form-group mt-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do Album" value=<?php echo $album["nmAlbum"] ?> required>
        </div>
        <div class="form-group mt-3">
            <label for="data">Data de Lançamento</label>
            <input type="date" class="form-control" id="data" name="data" placeholder="Digite a data do Album" value=<?php echo $album["dtAlbum"] ?> required>
        </div>
        <div class="form-group mt-3">
            <label for="qtdfaixas">Quantidade de Faixas</label>
            <input type="number" class="form-control" id="qtdfaixas" name="qtdfaixas" placeholder="Digite a quantidade de faixas" value=<?php echo $album["qtdfaixasAlbum"] ?> required>
        </div>
        <div class="form-group mt-3">
            <label for="autor">Autor</label>
            <select name="autor" id="autor" class="form-control form-select" required>
                <option value="" disabled selected>Selecione o Autor</option>
                <?php while($autor = $stmtAutor->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value=<?php echo $autor['idAutor']; ?> ><?php echo $autor['nmAutor']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Atualizar</button>
    </form>
</div>
</body>
</html>