<?php
    require_once "../init.php";
    $id = isset($_GET['idAutor']) ? $_GET['idAutor'] : null;

    if(empty($id)){
        echo "<script>alert('ID do usuário não fornecido.');</script>";
        exit;
    }

    $PDO = db_connect();
    $sql = "DELETE FROM Autor WHERE idAutor = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        header("Location: exibirAutor.php");
    } else {
        echo "<script>alert('Erro ao excluir usuário.');</script>";
        print_r($stmt->errorInfo());
    }
?>