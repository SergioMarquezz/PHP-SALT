<?php
    require 'Conexion.php';

    $total = $_POST['pagar-monto'];
    $fecha_pago = $_POST['fecha-pago-modal'];
    $seguro_id = $_POST['seguro-id'];

    $foto_recibo = $_FILES['foto-recibo']['name'];

    //Extension de imagenes
    $extension_imagen_recibo = explode('.',$foto_recibo);
    $extension_recibo = end($extension_imagen_recibo);

    $nombre_recibo ='seguro-'.$seguro_id.'-fecha pago-'.$fecha_pago.".".$extension_recibo;

    //Declaración ruta a guardar
    $rutaRecibo = "../img/recibos-seguros/".$nombre_recibo;   

    if(move_uploaded_file($_FILES["foto-recibo"]["tmp_name"], $rutaRecibo)){
         
        $consulta = 'Call update_seguro(?,?,?,?)';
        $sql = $conexion->prepare($consulta);

        $sql->bindParam(1,$fecha_pago);
        $sql->bindParam(2,$vehiculo_id);
        $sql->bindParam(3,$total);
        $sql->bindParam(4,$nombre_recibo);

        echo $sql->execute() ? "Registrado con exito" : "Error de registro";

    }

       

?>