<?php
    require_once "../init.php";
    $idA = isset($_GET['idAlbum']) ? $_GET['idAlbum'] : null;
    $idU = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

    if(empty($idA) || empty($idU)){
        echo "<script>alert('ID do nota não fornecido.');</script>";
        exit;
    }

    $PDO = db_connect();
    $sql = "DELETE FROM nota WHERE idAlbum = :idAlbum AND idUsuario = :idUsuario";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':idAlbum', $idA);
    $stmt->bindParam(':idUsuario', $idU);
    if($stmt->execute()){
        header("Location: exibirNota.php");
    } else {
        echo "<script>alert('Erro ao excluir nota.');</script>";
        print_r($stmt->errorInfo());
    }
?>