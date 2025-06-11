<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        body{   
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                height: 100vh;
                display: grid;
                place-items: center;

        }
        caption{
            font-size: 1.5rem;
            font-weight: bold;
        }
        table{
            width: 70%;
            border-collapse: collapse;
        }
        thead{
            background-color: gray;
            border-radius: 1rem;
        }
        tbody > tr{
            background-color: lightsteelblue;
            text-align: center;
            border-bottom: 1px solid  darkslategray;
            border-radius: 1rem;
        }
         
    </style>
<body>
    
    

    
   
    <?php 
        if(isset($_GET["success"]) && $_GET["success"]== "true") echo "<p>Registro con exito</p>";
        if(isset($_GET["success"]) && $_GET["success"]== "false") echo "<p>Error :No se registro</p>";

    ?>
    <table >
        <caption>Listado de Personas</caption>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Dni</th>
                <th>Escuela Profesional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require_once("./../Conexion.php");
            $sql = "SELECT * FROM tesista where estado = 1 ";
            
            $objConn = new Conexion();

            $conn = $objConn->getConexion();

            

            $result = $conn->query($sql);

            if($result->num_rows > 0 ){

                while($fila= $result->fetch_assoc() ){
                    echo "<tr>";
                    echo "<td>".$fila["nombres"]."</td>";
                    echo "<td>".$fila["apellidos"]."</td>";
                    echo "<td>".$fila["dni"]."</td>";
                    echo "<td>".$fila["escuela_profesional"]."</td>";
                    echo "<td>
                            <a href='./editar.php?id=".$fila["id"]."'>Editar</a>
                            <a href='./eliminar.php?id=".$fila["id"]."'>Eliminar</a>
                            </td>";
                    echo "</tr>";
                }
            }else{
                echo "<tr> <td colspan='5'> 0  resultados </td></tr>";
            }?>
        </tbody>
    
    </table>
     <div>
        <a href="./formulario.php"><button>Formulario</button></a>
     <a href="./../index.php"><button>Menu Principal</button></a>
     </div>
</body>
</html>