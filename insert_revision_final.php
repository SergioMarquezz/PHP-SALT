<?php
    
    session_start();
    
    require 'Conexion.php';

    
    $fecha = $_POST["llegada"];
    $kilometros = $_POST["km-llegada"];
    $kmRecorridos = $_POST["km-recorridos"];
    $motor = $_POST["motor"];
    $trasmicion = $_POST["trasmicion"];
    $congelante = $_POST["congelante"];
    $frenos = $_POST["frenos"];
    $llanta = $_POST["llanta"];
    $llave = $_POST["llave"];
    $veri = $_POST["verificacion"]; 
    $poliza = $_POST["poliza"]; 
    $gato = $_POST["gato"];
    $tarjeta = $_POST["tarjeta"];
    $cinchos = $_POST["cinchosCantidad"];
    $matracas = $_POST["matracasCantidad"];
    $cobi = $_POST["cobijasCantidad"];
    $colchon = $_POST["colchonesCantidad"];
    $limpieza = $_POST["unidad"];
    $rampas = $_POST["rampasCantidad"];
    $gasolina = $_POST["volor-gasolina"];
    $observar = $_POST["observaciones"];
    
    $id_vehiculo = $_SESSION['id_vehiculo'];
    $id_viaje = $_SESSION['id_viaje'];
    
    $frontal = $_FILES["frontal"]["name"];
    $rutaFrontal = "../img/revision-final/".$frontal;
    $trasera = $_FILES["trasera"]["name"];
    $rutaTrasera = "../img/revision-final/".$trasera;
    $izquierda = $_FILES["izquierda"]["name"];
    $rutaIzquierda = "../img/revision-final/".$izquierda;
    $derecha = $_FILES["derecha"]["name"];
    $rutaDerecha = "../img/revision-final/".$derecha;


    if(move_uploaded_file($_FILES["frontal"]["tmp_name"], $rutaFrontal)&&move_uploaded_file($_FILES["trasera"]["tmp_name"], $rutaTrasera)&&
    move_uploaded_file($_FILES["izquierda"]["tmp_name"], $rutaIzquierda)&&move_uploaded_file($_FILES["derecha"]["tmp_name"], $rutaDerecha)){

         $sql = $conexion->prepare("Call insert_revision_final(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $sql->bindParam(1,$fecha);
        $sql->bindParam(2,$kilometros);
        $sql->bindParam(3,$kmRecorridos);
		$sql->bindParam(4,$motor);
		$sql->bindParam(5,$trasmicion);
		$sql->bindParam(6,$congelante);
        $sql->bindParam(7,$frenos);
        $sql->bindParam(8,$llanta);
        $sql->bindParam(9,$llave);
        $sql->bindParam(10,$veri);
        $sql->bindParam(11,$poliza);
        $sql->bindParam(12,$gato);
        $sql->bindParam(13,$tarjeta);
        $sql->bindParam(14,$cinchos);
        $sql->bindParam(15,$matracas);
        $sql->bindParam(16,$cobi);
        $sql->bindParam(17,$colchon);
        $sql->bindParam(18,$limpieza);
        $sql->bindParam(19,$rampas);
        $sql->bindParam(20,$gasolina);
        $sql->bindParam(21,$observar);
        $sql->bindParam(22,$frontal);
        $sql->bindParam(23,$trasera);
        $sql->bindParam(24,$izquierda);
        $sql->bindParam(25,$derecha);
        $sql->bindParam(26,$idViaje);
        
        echo $sql->execute() ? "Registrado con exito" : "Error de registro";
    }

       

    
?>