<?php
    require_once "../init.php";
    $PDO = db_connect();
    $sql = "SELECT idUsuario, nickUsuario, nmUsuario, emailUsuario, dtnascUsuario FROM usuario ORDER BY nickUsuario ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

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
            <h4 class="mb-0">Usuários</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Código</th>
                        <th>Nickname</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th class="text-center" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $user['idUsuario']; ?></td>
                            <td><?php echo $user['nickUsuario']; ?></td>
                            <td><?php echo $user['nmUsuario']; ?></td>
                            <td><?php echo $user['emailUsuario']; ?></td>
                            <td><?php echo converteData($user["dtnascUsuario"]); ?></td>
                            <td class="text-center">
                                <a href="formEditUsuario.php?idUsuario=<?php echo $user['idUsuario']; ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                   Editar
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="deleteUsuario.php?idUsuario=<?php echo $user['idUsuario']; ?>" 
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