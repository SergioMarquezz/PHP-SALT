<?php

require 'Conexion.php';

    try{

        $consulta="CALL select_cars();";

        $comando = $conexion->prepare($consulta);

        $comando->execute();

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