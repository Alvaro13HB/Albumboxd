<?php
    require_once "../init.php";

    $id = $_POST['idUsuario'];
    $nick = $_POST['nick'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dtNasc = $_POST['dtNasc'];
    $senha = $_POST['senha'];

    $PDO = db_connect();
    $sql = "UPDATE Usuario SET nickUsuario = :nick, nmUsuario = :nome, emailUsuario = :email, dtnascUsuario = :dtNasc, senhaUsuario = :senha WHERE idUsuario = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nick', $nick);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':dtNasc', $dtNasc);
    $stmt->bindParam(':senha', md5($senha));
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        header("Location: exibirUsuario.php");
    } else {
        echo "<script>alert('Erro ao atualizar usuário.');</script>";
        print_r($stmt->errorInfo());
    }

?>