<?php
    require_once "../init.php";

    $id = $_POST['idUsuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $dtNasc = $_POST['dtNasc'];
    $senha = $_POST['senha'];

    $PDO = db_connect();
    $sql = "UPDATE Usuario SET nome = :nome, email = :email, cpf = :cpf, dtNasc = :dtNasc, senha = :senha WHERE idUsuario = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':dtNasc', $dtNasc);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        header("Location: exibirUsuario.php");
    } else {
        echo "<script>alert('Erro ao atualizar usuário.');</script>";
        print_r($stmt->errorInfo());
    }

?>