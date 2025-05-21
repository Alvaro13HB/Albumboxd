<?php
    function db_connect(){
        try{
            $PDO = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        }
        catch(PDOException $e){
            header("Location: ../index.html");
        }
    }

    function converteData($data){
        $dataCorrigida = implode("/", array_reverse(explode("-", $data)));
        return $dataCorrigida;
    }
?>