<?php

$databaseHost = 'localhost';
$databaseName = 'db_usuario';
$databaseUsername = 'root';
$databasePassword = '';

$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(!$connect){
    echo '¡Error de conexión!';
}
?>