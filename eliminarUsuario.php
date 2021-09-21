<?php

    if($_GET["user"]){
        require_once('conexion.php');

        $user = $_GET["user"];
        
        $con = new Conexion();
        $c = $con->getConexion();
        $sql = "DELETE FROM usuario WHERE idUsuario = ${user}";

        try{
            $ps = $c->prepare($sql);        
            $ps->execute();
            header("location: usuarios.php");
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
