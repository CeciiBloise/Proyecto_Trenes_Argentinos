<?php
include("conexion_plan_de_frecuencias.php");
$conexion=conectar();

date_default_timezone_set('america/argentina/buenos_aires');

$id= $_POST['id_plan_de_frecuencia'];
$paso_nivel= $_POST['nombre_paso_nivel'];
$frecuencia_asc=$_POST['frecuencia_asc'];
$frecuencia_desc=$_POST['frecuencia_desc'];
$señal_asc=$_POST['señal_asc'];
$señal_desc=$_POST['señal_desc'];
$tension_asc=$_POST['tension_asc'];
$tension_desc=$_POST['tension_desc'];
$filtro=$_POST['filtro'];
$ubicacion=$_POST['ubicacion'];

$sql="UPDATE plan_de_frecuencias(nombre_paso_nivel,frecuencia_asc,frecuencia_desc,señal_asc,señal_desc,tension_asc,tension_desc,filtro,ubicacion) SET 'nombre_paso_nivel=$paso_nivel',frecuencia_asc='$frecuencia_asc',frecuencia_desc='$frecuencia_desc',señal_asc='$señal_asc',señal_desc=$señal_desc,tension_asc='$tension_asc',tension_desc=$tension_desc,filtro='$filtro',ubicacion='$ubicacion' WHERE id_plan_de_frecuencia='$id'";

$query=mysqli_query($conexion,$sql);

/*if($query){
        header("Location: ver_mas_info.php");
}else{
    echo "ERROR";
}*/
?>