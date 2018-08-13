<?php

    require 'Conexion.php';
    //Variables para insertar
    $poliza = $_POST['num-poliza'];
    $aseguradora = $_POST['name-aseguradora'];
    $fecha = $_POST['fecha-registro'];
    $vehiculo_id = $_POST['vehiculo-id'];
    $periodo = $_POST['select-periodo'];

    $foto_poliza = $_FILES['foto-poliza']['name'];
    
    //Extension de imagenes
    $extension_imagen_poliza = explode('.',$foto_poliza);
    $extension_poliza = end($extension_imagen_poliza);

    //Cambio de nombre a imagenes
    $nombre_poliza ='vehiculo-'.$vehiculo_id.'-poliza'.".".$extension_poliza;

    //Declaración ruta a guardar
    $rutaPoliza = "../img/polizas/".$nombre_poliza;   

    if(move_uploaded_file($_FILES["foto-poliza"]["tmp_name"], $rutaPoliza)){
                $consulta = 'CALL insert_seguro(?,?,?,?,?,?)';

                 $sql = $conexion->prepare($consulta);

                $sql->bindParam(1,$poliza);
                $sql->bindParam(2,$aseguradora);
                $sql->bindParam(3,$periodo);
                $sql->bindParam(4,$fecha);
                $sql->bindParam(5,$nombre_poliza);
                $sql->bindParam(6,$vehiculo_id);

                echo $sql->execute() ? "Registrado con exito" : "Error de registro";
    }

?>