<?php 

$titulo = $_POST["titulo"]; 
$linea_investigacion = $_POST["linea_investigacion"]; 
$resumen = $_POST["resumen"]; 
$objetivos = $_POST["objetivos"]; 
$fecha_inicio = $_POST["fecha_inicio"]; 
$fecha_fin = $_POST["fecha_fin"]; 
$id_tesista = (int)$_POST["id_tesista"]; 

if(new DateTime($fecha_inicio)> new DateTime($fecha_fin)) {
    header("Location: ./formulario.php?success=false");
}else{

require_once("./../Conexion.php");
$objConn = new Conexion();

$conn = $objConn->getConexion();
$sql = "INSERT INTO tesis 
( titulo ,linea_investigacion, resumen,objetivos,fecha_inicio,fecha_fin, id_tesista) 
values('$titulo', 
        '$linea_investigacion',
        '$resumen', 
        '$objetivos', 
        '$fecha_inicio', 
        '$fecha_fin', 
        '$id_tesista') ";

if($conn->query($sql)){
    echo "Registro exitoso";
    header("Location: ./listar.php?success=true");
}else{
    header("Location: ./listar.php?success=false");
}
}