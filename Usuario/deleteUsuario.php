<?php
    require_once "../init.php";
    $id = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

    if(empty($id)){
        echo "<script>alert('ID do usuário não fornecido.');</script>";
        exit;
    }

    $PDO = db_connect();
    $sql = "DELETE FROM usuario WHERE idUsuario = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        header("Location: exibirUsuario.php");
    } else {
        echo "<script>alert('Erro ao excluir usuário.');</script>";
        print_r($stmt->errorInfo());
    }
?>