<?php

class Conexion {
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $db_name = "examenweb";
    private $conexion ;

    public function __construct(){
        try {
            $this->conexion = new mysqli(
                $this->serverName,
                $this->userName,
                $this->password,
                $this->db_name
            );
            //echo "Conectado.....";
        } catch (PDOException $e) {
            echo "Error : {$e->getMessage()}";
        }
    }


    public function getConexion(){
        return $this->conexion;
    }
    public function __destruct() {
        $this->conexion->close();
    }

}