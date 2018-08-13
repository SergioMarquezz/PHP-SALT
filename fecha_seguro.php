<?php
    $id_vehiculo = $_POST['id_vehiculo'];
    $periodo = $_POST['periodo'];
    require 'Conexion.php';
    
         if ($opcion = 'fecha proxima'){
            
            $consulta = 'Call select_fecha(?,?)';
            $respuesta = $conexion->prepare($consulta);
            $respuesta->execute(array($periodo,$id_vehiculo));

            $row = $respuesta->fetchAll(PDO::FETCH_ASSOC);

            if($row){
                $datos["data"] = $row;
                print json_encode($datos);
            }
          
        }

?>