<?php

class Conexion{

    private $driver = "mysql";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbName = "neogestion";

    public function getConexion(){

        try{

            $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $ex){
            echo $ex->getMessage();
            return null;
        }

    }



}

?>