<?php
    require_once "../init.php";
    $PDO = db_connect();
    $sql = "SELECT N.nota, U.nmUsuario, U.idUsuario, A.idAlbum, A.nmAlbum FROM nota N INNER JOIN usuario U ON N.idUsuario = U.idUsuario
    INNER JOIN album A ON N.idAlbum = A.idAlbum";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Notas</title>
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
            <h4 class="mb-0">Notas</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nota</th>
                        <th>Usuário</th>
                        <th>Álbum</th>
                        <th class="text-center" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($nota = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $nota['nota']; ?></td>
                            <td><?php echo $nota['nmUsuario']; ?></td>
                            <td><?php echo $nota['nmAlbum']; ?></td>
                            <td class="text-center">
                                <a href="formEditNota.php?idUsuario=<?php echo $nota['idUsuario']; ?>&idAlbum=<?php echo $nota['idAlbum']; ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                   Editar
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="deleteNota.php?idUsuario=<?php echo $nota['idUsuario']; ?>&idAlbum=<?php echo $nota['idAlbum']; ?>" 
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