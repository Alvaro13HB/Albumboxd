<?php
    require_once "../init.php";
    $PDO = db_connect();
    $sql = "SELECT idUsuario, nickUsuario, nmUsuario, emailUsuario, dtnascUsuario FROM Usuario ORDER BY nickUsuario ASC";
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
        <div class="jumbotron">
            <h5 class="card-title" style="text-align: center">Usuários</h5>
        </div>
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nickname</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Nascimento</th>
                    <th style="text-align: center" colspan="2">Ações</th>
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
                        <td>
                            <a href="formEditUsuario.php?idUsuario=<?php echo $user['idUsuario']; ?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="deleteUsuario.php?idUsuario=<?php echo $user['idUsuario']; ?>" 
                               onclick="return confirm('Tem certeza que deseja remover?')"
                               class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>