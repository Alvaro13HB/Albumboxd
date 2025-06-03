<?php 
    require_once "../init.php";

    $nome = $_POST['nome'];
       
    $PDO = db_connect();
    $sql = "INSERT INTO Autor (nmAutor) VALUES (:nome)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    if($stmt->execute()){
        header("Location: exibirAutor.php");
    } else {
        echo "<script>alert('Erro ao cadastrar usuário.');</script>";
    }

?>