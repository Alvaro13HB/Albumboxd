<?php 
    require_once "../init.php";

    $nota = $_POST['nota'];
    $idAlbum = $_POST['album'];
    $idUsuario = $_POST['usuario'];
       
    $PDO = db_connect();
    $sql = "INSERT INTO nota (nota, idAlbum, idUsuario) VALUES (:nota, :idAlbum, :idUsuario)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nota', $nota);
    $stmt->bindParam(':idAlbum', $idAlbum);
    $stmt->bindParam(':idUsuario', $idUsuario);
    if($stmt->execute()){
        header("Location: exibirNota.php");
    } else {
        echo "<script>alert('Erro ao cadastrar nota.');</script>";
    }

?>