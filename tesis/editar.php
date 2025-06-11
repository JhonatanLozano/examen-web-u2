<?php 
$id = $_GET["id"];

require_once("./../Conexion.php");
$objConn = new Conexion();
$conn = $objConn->getConexion();

if (!isset($_GET['id'])) header("Location: ./listar.php");
$id = intval($_GET['id']);
$resultado = $conn->query("SELECT * FROM tesis WHERE id = $id");

if ($resultado && $resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
} else {
    header("Location: ./listar.php");
}



// Actualizar datos si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST["titulo"]; 
    $linea_investigacion = $_POST["linea_investigacion"]; 
    $resumen = $_POST["resumen"]; 
    $objetivos = $_POST["objetivos"]; 
    $fecha_inicio = $_POST["fecha_inicio"] ;
    $fecha_fin = $_POST["fecha_fin"]; 
    $id_tesista = (int)$_POST["id_tesista"]; 
   //echo "<pre>".$fecha_inicio."</pre>" ;
    if(new DateTime($fecha_inicio)> new DateTime($fecha_fin)) {
        header("Location: ./editar.php?id=".$id."&success=false");
    }else{

        

        $sql = "UPDATE tesis 
                SET titulo = '$titulo', 
                linea_investigacion= '$linea_investigacion', 
                resumen = '$resumen' ,
                objetivos = '$objetivos',  
                fecha_inicio = '$fecha_inicio',  
                fecha_fin = '$fecha_fin'  ,
                id_tesista = '$id_tesista'  
                WHERE id=$id";

        if ($conn->query($sql)) {
            $mensaje = "Tesis actualizada correctamente.";
            header("Location: ./listar.php");
        } else {
            $mensaje = "Error al actualizar: " ;
            header("Location: ./editar.php?id=".$id);
        }

        
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
     <?php 
        if(isset($_GET["success"]) && $_GET["success"]== "false") echo "<p>Error :No se Edito</p>";

    ?>
    <form method="POST" class="tabla">
        <h1>Editar Usuario</h1>

        <label>Titulo:</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($usuario['titulo']) ?>" required><br><br>
        
        <label for="linea_investigacion">Linea_investigacion:</label>
         <select name="linea_investigacion" id="linea_investigacion" value="<?= htmlspecialchars($usuario['linea_investigacion']) ?>">
            <option value="Ing. Software">Ing. Software</option>
            <option value="Redes">Redes</option>
            <option value="Gestion TI">Gestion Ti</option>
            <option value="Robotica e IA">Robotica e IA</option>
            <option value="Seguridad informatica">Seguridad informatica</option>
        </select> <br><br>

        <!-- <label>Resumen:</label>
        <input type="text" name="resumen" value="<?= htmlspecialchars($usuario['resumen']) ?>" required><br>
        <label>Objetivos:</label>
        <input type="text" name="objetivos" value="<?= htmlspecialchars($usuario['objetivos']) ?>" required><br>
        <label for="fecha_inicio">Fecha Inicio</label> -->

        <label for="resumen">Resumen:</label>
        <textarea name="resumen" id="resumen" cols="30" rows="3"  required><?= htmlspecialchars($usuario['resumen']) ?></textarea><br><br>
        <label for="objetivos">Objetivos:</label>
        <textarea name="objetivos" id="objetivos" cols="30" rows="3"  required><?= htmlspecialchars($usuario['objetivos']) ?></textarea><br><br>
        
        <label for="fecha_fin">Fecha Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?= htmlspecialchars($usuario['fecha_inicio']) ?>" required><br><br>

        <label for="fecha_fin">Fecha Fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" value="<?= htmlspecialchars($usuario['fecha_fin']) ?>" required><br><br>

        <label for="id_tesista">ID del Tesista</label>
        <input type="number" name="id_tesista" id="id_tesista" min="1" value="<?= htmlspecialchars($usuario['id_tesista']) ?>" required>
        <br>
        <button type="submit">Guardar Cambios</button>
</form>
    
</body>
</html>