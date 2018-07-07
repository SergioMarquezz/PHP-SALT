<?php
    $hostname = "localhost";
    $database = "id6320204_salt";
    $username = "id6320204_miguel";
    $password = "12345678";

    $conexion = mysqli_connect($hostname,$username,$password) or die('No se pudo conectar al servidor: ' . mysqli_error());

    echo 'Conexión satisfactoria al servidor </br>';

    mysqli_select_db($conexion,$database) or die('Problemas al conectar con la base de datos');

    echo 'Base de datos conectada</br>';
    
?>