<?php
include("conexion_planos_quilmes.php");
$conexion=conectar();

$id= $_POST['id_plano'];
$nombre= $_POST['nombre_plano'];
$descripcion= $_POST['descripcion'];
$fecha_carga= $_POST['fecha_creacion'];
$archivo= $_FILES['plano'];
$nombre_plano=$archivo['name'];
$type = $archivo['type'];
$url_temporal=$archivo['tmp_name'];

if($nombre_plano != ''){
    $destino="planos_quilmes/";
    $plano_nombre=md5(date('d-m-Y H:m:s')).'_'.$nombre;
    $plano=$plano_nombre.'.pdf';
    $src=$destino.$plano;
}

$sql="INSERT INTO planos(nombre_plano,descripcion,fecha_creacion,plano) VALUES('$nombre','$descripcion','$fecha_carga','$plano')";

$query=mysqli_query($conexion,$sql);

if($query){
    if($plano_nombre != ''){
        move_uploaded_file($url_temporal, $src);
    }
    header("Location: crear_planos_quilmes.php");
}
else{
    echo "ERROR";
}
?> 