<?php
    require_once "../init.php";

    $id = $_POST['idAlbum'];
    $nome = $_POST['nome'];
    $dtAlbum = $_POST['data'];
    $qtdfaixas = $_POST['qtdfaixas'];
    $idAutor = $_POST['autor'];

    $PDO = db_connect();
    $sql = "UPDATE Album SET nmAlbum = :nome, dtAlbum = :dtAlbum, qtdfaixasAlbum = :qtdfaixas, idAutor = :idAutor  WHERE idAlbum = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':dtAlbum', $dtAlbum);
    $stmt->bindParam(':qtdfaixas', $qtdfaixas);
    $stmt->bindParam(':idAutor', $idAutor);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        header("Location: exibirAlbum.php");
    } else {
        echo "<script>alert('Erro ao atualizar álbum.');</script>";
        print_r($stmt->errorInfo());
    }

?>