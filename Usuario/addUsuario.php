<?php 
    require_once "../init.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $dtNasc = $_POST['dtNasc'];
    $senha = $_POST['senha'];
       
    $PDO = db_connect();
    $sql = "INSERT INTO Usuario (nome, email, cpf, dtNasc, senha) VALUES (:nome, :email, :cpf, :dtNasc, :senha)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':dtNasc', $dtNasc);
    $stmt->bindParam(':senha', $senha);
    if($stmt->execute()){
        header("Location: exibirUsuario.php");
    } else {
        echo "<script>alert('Erro ao cadastrar usuário.');</script>";
    }

?>