<?php
    require_once "../init.php";

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    if(empty($nome)){
        header("Location: exibirAlbum.php");
    }
    $pesquisa = '%' . $nome . '%';
    
    $PDO = db_connect();
    $sql = "SELECT A.idAlbum, A.nmAlbum, A.dtAlbum, A.qtdfaixasAlbum, T.nmAutor FROM album A INNER JOIN autor T ON A.idAutor = T.idAutor
    WHERE upper(nmAlbum) LIKE :pesquisa ORDER BY nmAlbum ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':pesquisa', $pesquisa, PDO::PARAM_STR);
    $stmt->execute();
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
    <style>
        body {
            background-color: #f8f9fa;
        }
        .page-header {
            background-color: #fff;
            padding: 1rem 1.5rem;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }
        .table thead th {
            background-color: #f1f1f1;
            border-bottom: 2px solid #dee2e6;
        }
        .btn {
            font-size: 0.875rem;
            padding: 0.4rem 0.75rem;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("../navbar/navbar.html");
            });
        });
    </script>
</head>
<body>
    <div id="menu"></div>
    <div class="container">
        <div class="page-header text-center">
            <h4 class="mb-0">Álbuns Pesquisados</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Data de Lançamento</th>
                        <th>Quantidade de Faixas</th>
                        <th>Autor</th>
                        <th class="text-center" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($album = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $album['idAlbum']; ?></td>
                            <td><?php echo $album['nmAlbum']; ?></td>
                            <td><?php echo converteData($album['dtAlbum']); ?></td>
                            <td><?php echo $album['qtdfaixasAlbum']; ?></td>
                            <td><?php echo $album['nmAutor']; ?></td>
                            <td class="text-center">
                                <a href="formEditAlbum.php?idAlbum=<?php echo $Album['idAlbum']; ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                   Editar
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="deleteAlbum.php?idAlbum=<?php echo $Album['idAlbum']; ?>" 
                                   onclick="return confirm('Tem certeza que deseja remover?')" 
                                   class="btn btn-sm btn-outline-danger">
                                   Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>