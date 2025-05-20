<?php
    require_once "../init.php";
    $id = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
    $PDO = db_connect();
    $sql = "SELECT idUsuario, nome, email, cpf, dtNasc, senha FROM Usuario WHERE idUsuario = :id";
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
    <title>Cadastro de Usuários</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("../navbar.html");
            });
        });
    </script>
</head>
<body>
    <div id="menu"></div>

    <div class="container">
        <div class="jumbotron">
            <h5 class="card-title" style="text-align: center">Editar Usuário</h5>
        </div>
        <form action="editUsuario.php" method="POST">
            <input type="hidden" name="idUsuario" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $user["nome"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user["email"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" maxlength="14" class="form-control" id="cpf" name="cpf" onkeypress="mascara_cpf('###.###.###-##', this)" value="<?php echo $user["cpf"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="dtNasc">Data de Nascimento:</label>
                <input type="date" class="form-control" id="dtNasc" name="dtNasc" value="<?php echo $user["dtNasc"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $user["senha"]; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
<script>
    function mascara_cpf(mascara, documento){
        let i = documento.value.length;
        let saida = "#";
        let texto = mascara.substring(i);
        while(texto.substring(0, 1) != saida && texto.length){
            documento.value += texto.substring(0, 1);
            i++;
            texto = mascara.substring(i);
        }
    }
</script>
</html>