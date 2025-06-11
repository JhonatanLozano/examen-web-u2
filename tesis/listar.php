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
                <th>titulo</th>
                <th>linea_investigacion</th>
                <th>resumen</th>
                <th>objetivos</th>
                <th>fecha_inicio</th>
                <th>fecha_fin</th>
                <th>tesista</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require_once("./../Conexion.php");
            $sql = "SELECT t.id, 
                            t.titulo,
                            t.linea_investigacion,
                            t.resumen,
                            t.objetivos,
                            t.fecha_inicio,
                            t.fecha_fin,
                            ts.id as id_tesista ,
                            ts.dni
                            FROM tesis t INNER JOIN tesista as ts ON
            t.id_tesista = ts.id where t.estado = 1 ";
            
            $objConn = new Conexion();

            $conn = $objConn->getConexion();

            

            $result = $conn->query($sql);
            
            if($result->num_rows > 0 ){

                while($fila= $result->fetch_assoc() ){
                    //var_dump($fila);exit;
                    echo "<tr>";
                    echo "<td>".$fila["titulo"]."</td>";
                    echo "<td>".$fila["linea_investigacion"]."</td>";
                    echo "<td>".$fila["resumen"]."</td>";
                    echo "<td>".$fila["objetivos"]."</td>";
                    echo "<td>".$fila["fecha_inicio"]."</td>";
                    echo "<td>".$fila["fecha_fin"]."</td>";
                    echo "<td>".$fila["dni"]."</td>";
                    echo "<td>
                            <a href='./editar.php?id=".$fila["id"]."'>Editar</a>
                            <a href='./eliminar.php?id=".$fila["id"]."'>Eliminar</a>
                            </td>";
                    echo "</tr>";
                }
                
            }else{
                echo "<tr> <td colspan='8'> 0  resultados </td></tr>";
            }?>
        </tbody>
    
    </table>
     <div>
        <a href="./formulario.php"><button>Formulario</button></a>
     <a href="./../index.php"><button>Menu Principal</button></a>
     </div>
</body>
</html>