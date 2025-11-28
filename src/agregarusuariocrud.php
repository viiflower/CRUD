<?php
include 'bdcrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    
    $query = "INSERT INTO clientes (nombre, correo) VALUES ($1, $2)";
    $result = pg_query_params($conexion, $query, array($nombre, $correo));
    
    if ($result) {
        header("Location: indexcrud.php?mensaje=Usuario agregado correctamente");
        exit;
    } else {
        $error = "Error al agregar usuario";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Usuario - Spotify </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo2.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header text-center">
        <img src="spotifylogo.png" alt="Spotify Logo" class="logo">
        <h2>Agregar Usuario</h2>
      </div>
      <div class="card-body">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control bg-dark text-white" placeholder="Escribe el nombre" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Correo:</label>
            <input type="email" name="correo" class="form-control bg-dark text-white" placeholder="Escribe el correo" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Guardar</button>
          <a href="indexcrud.php" class="btn btn-secondary w-100 mt-2">Volver</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>