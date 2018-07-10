<?php
	
	require 'conexionMySQL.php';


	 $stmt = $conexion->prepare("SELECT marca, modelo FROM vehiculos");
	 
	 $stmt->execute();
	 
	 $stmt->bind_result($marca, $modelo);
	 
	 $vehiculos = array(); 


	 while($stmt->fetch()){

	 $temp = array();
	 $temp['marca'] = $marca;
	 $temp["modelo"] = $modelo; 
	 

	 array_push($vehiculos, $temp);

	 }
	 

	 //displaying the result in json format 
	 echo json_encode($vehiculos);

?>