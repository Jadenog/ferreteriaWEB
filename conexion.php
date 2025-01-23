<?php 

    $servidor 	= "localhost";
    $usuario 	= "root";
    $contrasena = "";
    $basedatos 	= "ferreteria_bd";

    $conn = new mysqli($servidor, $usuario, $contrasena, $basedatos);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    //mysqli_close($conn);
    ?>