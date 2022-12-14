<?php
     include("conexion_plan_de_frecuencias.php");
     $conexion=conectar();


    $sql="SELECT * FROM plan_de_frecuencias";
    $query= mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

    //Si toco alguna flecha entro aca para ordenar
    if(isset($_GET['columna'])){
       $where= " where 1=1";
       $order=" ORDER BY ".$_GET['columna']." ".$_GET['tipo'];
       $sql="SELECT*FROM plan_de_frecuencias 
       $where
       $order
       ;
       ";
       $query= mysqli_query($conexion,$sql);
    }
?>

<!DOCTYPE html> 
<html lang="es"> 
    <head>
        <meta charset="utf-8" /> <!-- tipos de caracter -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <link rel="stylesheet" href="../../../../CSS/estilo_menu_horizontal.css"/>
        <link rel="stylesheet" href="../../../../CSS/estilo_tablas.css"/>
        <script src="https://kit.fontawesome.com/3de4daf040.js" crossorigin="anonymous"></script>
        <!-- Estilos -->
        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <header>
      <nav class="navMenu">
            <li><a href="../../mecanico_admi.php" >Inicio</a></li>
            <li><a href="crear_plan_de_frecuencias.php">Carga Plan de Frecuencia</a></li>
            <li><a href="../../../../logout.php" >Cerrar Sesion</a></li>
      </nav>
    </header>

    <style>
        /*ancho del menu*/
        /*.navMenu{
        width: 157rem;
        }
        /*Barra Buscador*/
        .buscador input[type=search]{
            width:300px;
            height:25px;
            border-radius:5px;
            border-color: #5D6D7E;
        }
          
        .buscador{
            /*float:right;*/
            margin:7px;
        }
          
        .boton{
            background-color: #5D6D7E;
            color: white;
            /*float: right;*/
            padding: 5px 10px;
            margin-right: 16px;
            font-size: 30px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>

    <body>

        <div>
            <form accion="buscar.php" method="POST" class="buscador">
                <input type="text" placeholder="" name="buscar">
                <input class="boton" type="submit" value="Buscar">
            </form>
            
            <div>
              <button class="boton"><a href="ver_plano_plan_de_frecuencias.php">Plano</a></button>
            </div>

            <table class="content-table">
            <caption>PLAN DE FRECUENCIAS</caption>
                <thead>     
                    <tr>
                        <th scope="row">Paso a Nivel</th>
                        <th colspan="2">Frecuencia</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <th>Asc</th>
                        <th>Desc</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                    <td scope="col"><?php echo $row['nombre_paso_nivel']?></td>
                    <td nowrap><?php echo $row['frecuencia_asc']?></td>
                    <td nowrap><?php echo $row['frecuencia_desc']?></td>
             
                    <td><a href="ver_mas_info.php?id=<?php echo $row['id_plan_de_frecuencia']?>">Mas Informacion</a></td>
                    </tr>
                    <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>