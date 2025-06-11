<?php 

$nombre = $_POST["nombres"]; 
$apellidos = $_POST["apellidos"]; 
$dni = $_POST["dni"]; 
$escuela_profesional = $_POST["escuela_profesional"]; 
 

require_once("./../Conexion.php");
$objConn = new Conexion();

$conn = $objConn->getConexion();
$sql = "INSERT INTO tesista ( apellidos, nombres , dni, escuela_profesional) 
values('$apellidos', 
        '$nombre',
        '$dni', 
        '$escuela_profesional') ";

if($conn->query($sql)){
    echo "Registro exitoso";
    header("Location: ./listar.php?success=true");
}else{
    header("Location: ./listar.php?success=false");
}