<?php
    require_once "../init.php";

    $id = $_POST['idAutor'];
    $nome = $_POST['nome'];

    $PDO = db_connect();
    $sql = "UPDATE Autor SET nmAutor = :nome WHERE idAutor = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        header("Location: exibirAutor.php");
    } else {
        echo "<script>alert('Erro ao atualizar usuário.');</script>";
        print_r($stmt->errorInfo());
    }

?>