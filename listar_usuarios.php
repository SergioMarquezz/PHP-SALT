<?php
session_start();
require 'Conexion.php';
    $id_usuario =  $_SESSION['id_usuario'];
    try{

       $consulta="CALL select_users(?)";

        $comando = $conexion->prepare($consulta);

        $comando->execute(array($id_usuario));

        $row = $comando->fetchAll(PDO::FETCH_ASSOC);

    

    }catch(\Exception $e){

        echo $e->getMessage();

    }

    if($row){            

        $datos["data"] = $row;

        print json_encode($datos);   

    } else {

        print json_encode(array(
            
            "Ha ocurrido un error"

        ));

    }

?>