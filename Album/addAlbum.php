<?php 
    require_once "../init.php";

    $nome = $_POST['nome'];
    $dtAlbum = $_POST['data'];
    $qtdfaixas = $_POST['qtdfaixas'];
    $idAutor = $_POST['autor'];
       
    $PDO = db_connect();
    $sql = "INSERT INTO Album (nmAlbum, dtAlbum, qtdfaixasAlbum, idAutor) VALUES (:nome, :dtAlbum, :qtdfaixas, :idAutor)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':dtAlbum', $dtAlbum);
    $stmt->bindParam(':qtdfaixas', $qtdfaixas);
    $stmt->bindParam(':idAutor', $idAutor);
    if($stmt->execute()){
        header("Location: exibirAlbum.php");
    } else {
        echo "<script>alert('Erro ao cadastrar álbum.');</script>";
    }

?>