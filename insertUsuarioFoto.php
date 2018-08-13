<?php

	require 'conexionMySQL.php';

		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$rol = $_POST["rol"]
		$clave = $_POST["contrasenia"];
		$foto = $_POST["foto_perfil"];

		$path = "Uploads/$nombre.jpg";

		$url = "https://$hostname/Android-PHP/$path";

		file_put_contents($path,base64_decode($foto));
		$bytes_foto = file_get_contents($path);

		$sql = "INSERT INTO usuarios VALUES (?,?,?,?,?)";
		$stm = $conexion->prepare($sql);
		
		$stm->mysqli_bind_param($nombre,$apellido,$rol,$clave,$bytes_foto);


		if ($stm->execute()) {
			echo "registrada";
		}
		else{
			echo "no registrada";
		}

?>