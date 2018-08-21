<?php

    require 'Conexion.php';
    $id_vehiculo = $_POST['id_vehiculo'];

    try{

             $consulta = 'CALL ultimo_seguro(?)';
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(array($id_vehiculo));

            $row = $resultado->fetchAll(PDO::FETCH_ASSOC);            
            
            if ( $row ) {

                $datos["data"] = $row;
                print json_encode($datos);    
                
            }else{
                $datos["data"] = 'Vacio';
                print json_encode($datos);    
            }

    }catch(\Exception $e){
         echo $e->getMessage();
        $result['Resultado'] = 'Error';
        print json_encode($result);
    }

?>