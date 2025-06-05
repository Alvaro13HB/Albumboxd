<?php
    require_once "../init.php";
    $idA = isset($_GET['idAlbum']) ? $_GET['idAlbum'] : null;
    $idU = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

    if(empty($idA) || empty($idU)){
        echo "<script>alert('ID do nota não fornecido.');</script>";
        exit;
    }

    $nota = $_POST['nota'];
    $idAlbum = $_POST['album'];
    $idUsuario = $_POST['usuario'];

    $PDO = db_connect();
    $sql = "UPDATE nota SET nota = :nota, idAlbum = :idAlbum, idUsuario = :idUsuario WHERE idAlbum = :idAlbum AND idUsuario = :idUsuario";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nota', $nota);
    $stmt->bindParam(':idAlbum', $idAlbum);
    $stmt->bindParam(':idUsuario', $idUsuario);
    if($stmt->execute()){
        header("Location: exibirNota.php");
    } else {
        echo "<script>alert('Erro ao atualizar nota.');</script>";
        print_r($stmt->errorInfo());
    }

?>