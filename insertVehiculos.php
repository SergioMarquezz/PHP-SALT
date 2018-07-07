<?php

	
	if (isset($_POST["marca"]) && isset($_POST["modelo"]) && isset($_POST["no_serie"]) && isset($_POST["anio"]) && isset($_POST["placa"]) && isset($_POST["capacidad_tanque"]) && isset($_POST["tipo_combustible"]) && isset($_POST["rendimiento"]) && isset($_POST["numero_tarjeta"]) && isset($_POST["estado_tarjeta"]) && isset($_POST["vigencia_tarjeta"]) && isset($_POST["kilometraje"]) && isset($_POST["periodo_mantenimiento"]) && isset($_POST["estado_vehiculo"])){

		$marca = $_POST["marca"];
		$modelo = $_POST["modelo"];
		$numSerie = $_POST["no_serie"];
		$anio = $_POST["anio"];
		$placas = $_POST["placa"];
		$tanque = $_POST["capacidad_tanque"];
		$combustible = $_POST["tipo_combustible"];
		$rendimiento = $_POST["rendimiento"];
		$numTarjeta = $_POST["numero_tarjeta"];
		$estado = $_POST["estado_tarjeta"];
		$vigencia = $_POST["vigencia_tarjeta"];
		$kilometros = $_POST["kilometraje"];
		$mantenimiento = $_POST["periodo_mantenimiento"];
		$vehiEstado = $_POST["estado_vehiculo"];

		require 'conexionMySQL.php'; //Incluye el archvivo de conexión

		$sql = "call agregarVehiculo('$marca','$modelo','$numSerie','$anio','$placas','$tanque','$combustible','$rendimiento','$numTarjeta','$estado','$vigencia','$kilometros','$mantenimiento','$vehiEstado')"; //Se hace la llamada la procedimieto de MYSQL Y se pasan las variables para insertar un vehiculo

		$insertVehiculo = mysqli_query($conexion,$sql); //Se pasan los parametros de la conexion y consulta

		//Si el usuario fue insertado se hace la consulta
			
		if ($insertVehiculo) {
			
			$consulta = "SELECT * FROM vehiculos WHERE marca = '{$marca}'"; //Se realiza la consulta
			$resultado = mysqli_query($conexion,$consulta); //Se pasan los parametros de la conexion y la consulta

			if ($registro = mysqli_fetch_array($resultado)) {
				$json['vehiculos'] = $registro; //Nombre del arreglo 
			}

			mysqli_close($conexion); //Se cierra la conexion al servidor
			echo json_encode($json); //Se convierte el arreglo en formato JSON
		}

		else{
				$resulta["marca"] = 'No registra';
				$resulta["modelo"] = 'No registra';
				$resulta["no_serie"] = 'No registra';
				$resulta["anio"] = 'No registra';
				$resulta["placa"] = 'No registra';
				$resulta["capacidad_tanque"] = 'No registra';
				$resulta["tipo_combustible"] = 'No registra';
				$resulta["rendimiento"] = 'No registra';
				$resulta["numero_tarjeta"] = 'No registra';
				$resulta["estado_tarjeta"] = 'No registra';
				$resulta["vigencia_tarjeta"] = 'No registra';
				$resulta["kilometraje"] = 'No registra';
				$resulta["periodo_mantenimiento"] = 'No registra';
				$resulta["estado_vehiculo"] = 'No registra';


				$json['vehiculos'] = $resulta;
				echo json_encode($json);
		}
	}

	else{
			    $resulta["marca"] = 'No retorna';
				$resulta["modelo"] = 'No retorna';
				$resulta["no_serie"] = 'No retorna';
				$resulta["anio"] = 'No retorna';
				$resulta["placa"] = 'No retorna';
				$resulta["capacidad_tanque"] = 'No retorna';
				$resulta["tipo_combustible"] = 'No retorna';
				$resulta["rendimiento"] = 'No retorna';
				$resulta["numero_tarjeta"] = 'No retorna';
				$resulta["estado_tarjeta"] = 'No retorna';
				$resulta["vigencia_tarjeta"] = 'No retorna';
				$resulta["kilometraje"] = 'No retorna';
				$resulta["periodo_mantenimiento"] = 'No retorna';
				$resulta["estado_vehiculo"] = 'No retorna';
			

			$json['vehiculos'] = $resulta;
			echo json_encode($json);
	}

?>