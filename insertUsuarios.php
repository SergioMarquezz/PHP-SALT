<?php
	

	if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["rol"]) && isset($_POST["correo"]) && isset($_POST["contrasenia"])) {
		
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$rol = $_POST["rol"];
		$email = $_POST["correo"];
		$clave = $_POST["contrasenia"];

		require 'conexionMySQL.php';

		$registroUser = mysqli_query($conexion,"call agregarUsuarios('$nombre','$apellido','$rol','$email','$clave')");
        
		if ($registroUser) {
			
			$consulta = "SELECT * FROM usuarios WHERE nombre = '{$nombre}'";
			$resultado = mysqli_query($conexion,$consulta);

			if ($registro = mysqli_fetch_array($resultado)) {
				$json['usuario'] = $registro;
			}

			mysqli_close($conexion);
			echo json_encode($json);
		}

		else{
			$resulta["nombre"] = 'No registra';
			$resulta["apellido"] = 'No registra';
			$resulta["rol"] = 'No registra';
			$resulta["contrasenia"] = 'No registra';

			$json['usuario'] = $resulta;
			echo json_encode($json);
		}
	}

	else{
			$resulta["nombre"] = 'No retorna';
			$resulta["apellido"] = 'No retorna';
			$resulta["rol"] = 'No retorna';
			$resulta["contrasenia"] = 'No retorna';

			$json['usuario'] = $resulta;
			echo json_encode($json);
		
	}
	
?>