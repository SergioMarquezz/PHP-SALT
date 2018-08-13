<?php
require ('Conexion.php');

$id_usuario = $_POST["id_usuario"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$rol = $_POST["rol"];
$correo = $_POST["correo"];

try{
    $consulta = ("CALL update_user(?,?,?,?,?)");
    $resultado = $conexion->prepare($consulta);             //Preparación de la consulta
    $resultado->execute(array($id_usuario, $nombre, $apellido, $rol, $correo));
    echo 'Cambios realizados!';
}catch(\Exception $e){
        echo $e->getMessage();
    }

    
    

?>