<?php
    require_once "../init.php";
    $id = isset($_GET['idAlbum']) ? $_GET['idAlbum'] : null;

    if(empty($id)){
        echo "<script>alert('ID do álbum não fornecido.');</script>";
        exit;
    }

    $PDO = db_connect();
    $sql = "DELETE FROM album WHERE idAlbum = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        header("Location: exibirAlbum.php");
    } else {
        echo "<script>alert('Erro ao excluir álbum.');</script>";
        print_r($stmt->errorInfo());
    }
?>