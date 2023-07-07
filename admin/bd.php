<?php
$servidor="localhost";
$baseDeDatos="lubricantesgm";
$usuario="root";
$contraseña=""; 




try {
    $conexion=new PDO ("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña);

    echo "Conexion Realizada...............";
} catch ( Exception $error) {
    echo $error->getMessage();
}



?>
