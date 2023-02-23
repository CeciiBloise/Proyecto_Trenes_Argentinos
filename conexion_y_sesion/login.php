<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>       
    </head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;"> <symbol id="check-circle-fill" viewBox="0 0 16 16"> 
         <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path> 
        </symbol> <symbol id="info-fill" viewBox="0 0 16 16"> 
         <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path> 
        </symbol> <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16"> 
         <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path> 
        </symbol> 
    </svg> 
</html>
<?php
/*** VALIDACION DE USUARIO ***/
/**ESTO ANDAAAAAAAAA */
session_start();
include("conexion.php");
$conexion=conectar();

//Condicional por si no hay conexion que muestre el error
if(!$conexion){
    die("NO HAY CONEXION" .mysqli_connect_error());
}

//variables que van a recibir valor por teclado para la validacion
if(isset($_POST['submit'])){
    $usuario=$_POST['legajo'];
    $contraseña=$_POST['contraseña'];
}

//Consulta que le va hacer al SQL, selecciona todo de la tabla usuario
//y buscara coincidencia entre el usuario y la contrasena ingresados con la tabla del SQL
$sql ="SELECT*FROM usuarios 
WHERE legajo='$usuario' AND contraseña='$contraseña'";
$query=mysqli_query($conexion, $sql);

if(mysqli_num_rows($query) == 1)
{
    // Obtener el rol del usuario
    $user = mysqli_fetch_assoc($query);
    $rol_id = $user['id_rol'];
    $sql2 = "SELECT nombre_rol FROM roles WHERE id_rol='$rol_id'";
    $result = mysqli_query($conexion, $sql2);
    $rol = mysqli_fetch_assoc($result)['nombre_rol'];

    // Iniciar sesión y almacenar el rol en la sesión
    $_SESSION['legajo'] = $usuario;
    $_SESSION['id_rol'] = $role;
    // Redirigir al usuario a la página correspondiente al rol
    switch ($rol) {
        case 'Administrador General':
          header("Location: ../Paginas/admi_general/Inicio.php");
          break;
        case 'Administrador Personal':
          header("Location: ../Paginas/admi_personal/inicio_personal.php");
          break;
        case 'Mecanico':
          header("Location: ../Paginas/mecanico/inicio_mecanico.php");
          break;
        default:
          header("Location: ../index.html");
      }
    } else {
      // Mostrar un mensaje de error si el usuario o la contraseña son incorrectos
      ?>
        <body class="p-3 m-0 border-0 bd-example">
       <div class="alert alert-danger d-flex align-items-center" role="alert"> 
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Peligro:">
         <use xlink:href="#exclamation-triangle-fill"></use>
        </svg> 
        <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            La contraseña o usiario son incorrectas. Haz <a href="Index.html" class="alert-link">click aquì</a> para volver a intentarlo.
        </font></font></div> 
       </div> 
        </body>
        <?php
    }