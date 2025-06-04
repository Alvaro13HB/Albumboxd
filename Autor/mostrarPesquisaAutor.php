<?php
    require_once "../init.php";

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    if(empty($nome)){
        header("Location: exibirAutor.php");
    }
    $pesquisa = '%' . $nome . '%';
    
    $PDO = db_connect();
    $sql = "SELECT idAutor, nmAutor FROM Autor 
    WHERE upper(nmAutor) LIKE :pesquisa ORDER BY nmAutor ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':pesquisa', $pesquisa, PDO::PARAM_STR);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autors</title>
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
            <h4 class="mb-0">Autores Pesquisados</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th class="text-center" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($autor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $autor['idAutor']; ?></td>
                            <td><?php echo $autor['nmAutor']; ?></td>
                            <td class="text-center">
                                <a href="formEditAutor.php?idAutor=<?php echo $autor['idAutor']; ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                   Editar
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="deleteAutor.php?idAutor=<?php echo $autor['idAutor']; ?>" 
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