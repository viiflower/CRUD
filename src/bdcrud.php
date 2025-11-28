<?php
$conexion = pg_connect("host=localhost dbname=CRUDtabla user=postgres password=Contrasena123");
if (!$conexion) {
  die("Error de conexión con la base de datos.");
}
?>