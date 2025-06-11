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
        if(isset($_GET["success"]) && $_GET["success"]== "true") echo "<p>Registro con exito</p>";
        if(isset($_GET["success"]) && $_GET["success"]== "false") echo "<p>Error :No se registro</p>";

    ?>

    <form action="./registrar.php" method="POST">
        <h1>Formulario Registro</h1>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required="required"><br><br>
        <label for="linea_investigacion">Linea Investigacion</label>
        <select name="linea_investigacion" id="linea_investigacion" required>
            <option value="Ing. Software">Ing. Software</option>
            <option value="Redes ">Redes</option>
            <option value="Gestion TI">Gestion Ti</option>
            <option value="Robotica e IA">Robotica e IA</option>
            <option value="Seguridad informatica">Seguridad informatica</option>
        </select><br><br>

        <label for="resumen">Resumen:</label>
        <textarea name="resumen" id="resumen" cols="30" rows="3" required></textarea><br><br>
        <label for="objetivos">Objetivos:</label>
        <textarea name="objetivos" id="objetivos" cols="30" rows="3" required></textarea><br><br>

        <label for="fecha_inicio">Fecha Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" required><br><br>

        <label for="fecha_fin">Fecha Fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" required><br><br>

        <label for="id_tesista">ID del Tesista</label>
        <input type="number" name="id_tesista" id="id_tesista" min="1" required>
        <br><br>
        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <a href="./listar.php"><button > Ver Listado </button></a>

    
</body>
</html>