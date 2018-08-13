<?php
    
    require 'Conexion.php';
    
    session_start();

    $id_vehiculo = $_SESSION['id_vehiculo'];
    
    //$id_vehiculo = '22';
    $kilometraje = $_POST['kilometraje'];

    try{

        $consulta = ("CALL update_kilometraje(?,?)");
        $resultado = $conexion->prepare($consulta);             
        $resultado->execute(array($id_vehiculo, $kilometraje));
        
        $filas_afectadas = $resultado->rowCount();
        echo ($filas_afectadas);
        if ($filas_afectadas > 0) {
            
            $result['Resultado'] = 'Actualizado';
            print json_encode($result);
        }

    }catch(\Exception $e){
        echo $e->getMessage();
        $result['Resultado'] = 'Error';
        print json_encode($result);
    }




?>