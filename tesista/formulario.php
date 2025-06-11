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

    <form action="./registrar.php" method="POST">
        <h1>Formulario Registro</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombres" required="required"><br><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" required="required"><br><br>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" required="required"><br><br>
        <label for="escuela_profesional">Escuela Profesional</label>
        <select name="escuela_profesional" id="escuela_profesional">
            <option value="Ing. Sistemas">Ing. Sistemas</option>
            <option value="Ing. Mecanica Electrica">Ing. Mecanica Electrica</option>
            <option value="Ing. Mecatronica">Ing. Mecatronica</option>
            <option value="Ing. Ciberseguridad">Ing. Ciberseguridad</option>
        </select>
        <br>
        <button type="submit">Registrar</button>
        <button type="reset">Limpiar</button>
    </form>

    <a href="./listar.php"><button > Ver Listado </button></a>

    
</body>
</html>