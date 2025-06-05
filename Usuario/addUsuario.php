<?php 
    require_once "../init.php";

    $nick = $_POST['nick'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dtNasc = $_POST['dtNasc'];
    $senha = $_POST['senha'];
       
    $PDO = db_connect();
    $sql = "INSERT INTO usuario (nickUsuario, nmUsuario, emailUsuario, dtnascUsuario, senhaUsuario) VALUES (:nick, :nome, :email, :dtNasc, :senha)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nick', $nick);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':dtNasc', $dtNasc);
    $stmt->bindParam(':senha', md5($senha));
    if($stmt->execute()){
        header("Location: exibirUsuario.php");
    } else {
        echo "<script>alert('Erro ao cadastrar usuário.');</script>";
    }

?>