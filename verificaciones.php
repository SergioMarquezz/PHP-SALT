<?php

    require 'Conexion.php';

    $opcion = $_POST['opcion'];
    $id_vehiculo = $_POST['id_vehiculo'];



    try{

        if ($opcion = 'cargar verificacion') {
            
            $consulta = 'CALL select_verificaciones(?)';
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

        }else if($opcion = 'agregar') {
            
            $consulta = 'CALL insert_verificacion(?)';
            $resultado = $conexion->prepare($id_vehiculo);
            $resultado->execute(array($variables));

        }


        

    }catch(\Exception $e){

        echo $e->getMessage();
        $result['Resultado'] = 'Error';
        print json_encode($result);

    }



?>