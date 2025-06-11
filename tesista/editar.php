<?php 
$id = $_GET["id"];

require_once("./../Conexion.php");
$objConn = new Conexion();
$conn = $objConn->getConexion();

if (!isset($_GET['id'])) header("Location: ./listar.php");
$id = intval($_GET['id']);
$resultado = $conn->query("SELECT * FROM tesista WHERE id = $id");

if ($resultado && $resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
} else {
    header("Location: ./listar.php");
}



// Actualizar datos si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $escuela_profesional = $_POST['escuela_profesional'];
    $sql = "UPDATE tesista 
            SET nombres = '$nombre', 
            apellidos= '$apellidos', 
            dni = '$dni' ,
            escuela_profesional = '$escuela_profesional'  
             WHERE id=$id";

    if ($conn->query($sql)) {
        $mensaje = "Usuario actualizado correctamente.";
        header("Location: ./listar.php");
    } else {
        $mensaje = "Error al actualizar: " ;
        header("Location: ./editar.php?id=".$id);
    }

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 100vh;
            display: grid;
            place-items: center;
        }
        form{
            width: 400px;
            gap: 1rem;
            align-items: center;
        }
        label{
            padding: 1rem;
            margin-top: 1rem;        
        }
        input{
            padding: .3rem;
        }
    </style>
</head>
<body>
    <form method="POST" class="tabla">
        <h1>Editar Usuario</h1>

        <label>Nombre:</label>
        <input type="text" name="nombres" value="<?= htmlspecialchars($usuario['nombres']) ?>" required><br>

        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="<?= htmlspecialchars($usuario['apellidos']) ?>" required><br>

        <label>DNI:</label>
        <input type="text" name="dni" value="<?= htmlspecialchars($usuario['dni']) ?>" required><br>
        <label for="escuela_profesional">Escuela Profesional</label>
         <select name="escuela_profesional" id="escuela_profesional" value="<?= htmlspecialchars($usuario['escuela_profesional']) ?>">
            <option value="Ing. Sistemas">Ing. Sistemas</option>
            <option value="Ing. Mecanica Electrica">Ing. Mecanica Electrica</option>
            <option value="Ing. Mecatronica">Ing. Mecatronica</option>
            <option value="Ing. Ciberseguridad">Ing. Ciberseguridad</option>
        </select>
        

        <button type="submit">Guardar Cambios</button>
</form>
    
</body>
</html>