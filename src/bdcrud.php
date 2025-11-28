<?php
// Conexión usando variables de entorno
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

$conn_string = "host=$host port=5432 dbname=$dbname user=$user password=$password";
$conexion = pg_connect($conn_string); // Cambiado a $conexion

if (!$conexion) {
    die("Error de conexión con la base de datos: " . pg_last_error());
}
?>