<?php
     include("conexion_crud_registro_con_imagen.php");
     $conexion=conectar();

     $sql="SELECT * FROM carga_de_usuarios";
     $query= mysqli_query($conexion,$sql);

     $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="utf-8" /> <!-- tipos de caracter -->
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
      <link rel="stylesheet" href="../../../CSS/estilo_menu_horizontal.css"/>
      <link rel="stylesheet" href="../../../CSS/estilo_registro.css"/>

      <title> Estacion Quilmes</title> <!-- titulo de la pagina -->
    </head>

    <header>
      <nav class="navMenu">
            <li><a href="../../admi_general/Inicio.php" >Inicio</a></li>
            <li><a href="tabla_crud_registro_con_imagen.php">Tabla de Personal</a></li>
            <li><a href="../../../logout.php" >Cerrar Sesion</a></li>
      </nav>
    </header>
    
    <body>
      <div class="form_carga">
        <form action="insertar_en_bd_registro_con_imagen.php" method="POST" enctype="multipart/form-data" class="form" >

          <h1 class="titulo">Ingrese los datos</h1>
          <div class="inputContainer">
            <label class="label">Legajo:</label>
            <input class="input" type="number" name="legajo" placeholder="Legajo">
          </div>

          <div class="inputContainer">
            <label class="label">Apellidos:</label>
            <input type="text" name="apellido" placeholder="Aprellido" class="input">
          </div>

          <div class="inputContainer">
            <label class="label">Nombres:</label>
            <input type="text" name="nombre" placeholder="Nombre" class="input"> <!-- name tiene que llevar el mismo nombre del campo de la base de datos-->
          </div>

          <div class="inputContainer">
            <label class="label">D.N.I:</label>
            <input class="input" type="number" name="dni" placeholder="D.N.I sin puntos">
          </div>

          <div class="inputContainer">
            <label class="label">Fecha de nacimiento:</label>
            <input class="input" type="date" name="fecha_de_nacimiento" placeholder="Fecha de nacimiento">
          </div>

          <div class="inputContainer">
            <label class="label">Direccion:</label>
            <input class="input" type="text" name="direccion" placeholder="Direccion">
          </div>

          <div class="inputContainer">
            <label class="label">Celular:</label>
            <input class="input" type="tel" name="celular" placeholder="Celular">
          </div>

          <div class="inputContainer">
            <label class="label">Correo Electronico:</label>
            <input class="input" type="email" name="mail" placeholder="Correo Electronico">
          </div>

          <div class="inputContainer">
            <label class="label">Puesto:</label>
            <input class="input" type="text" name="puesto" placeholder="Puesto">
          </div>

          <div class="inputContainer">
            <label class="label">Habilitaciones:</label>
            <input class="input" type="text" name="habilitaciones" placeholder="Separarlas por coma">
          </div>

          <div class="inputContainer">
            <label class="label">Supervisor a cargo del sector:</label>
            <input class="input" type="text" name="supervisor_cargo" placeholder="Supervisor a cargo">
          </div>

          <div class="inputContainer">
            <label class="label">Fecha de ingreso a la empresa:</label>
            <input class="input" type="date" name="fecha_de_ingreso_a_la_empresa" placeholder="Nombre">
          </div> 

          <div class="inputContainer">
            <label class="label">Foto del usuario</label> <!-- falta esto -->
            <input class="input" type="file" name="imagen" accept="imagen/*">
          </div> 

          <input class="boton-subir" type="submit"  value="subir" name="subir">
        
        </form>
      </div>
    </body>
</html>