<?php
include 'bdcrud.php';

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: indexcrud.php");
    exit;
}

// Obtener datos actuales del usuario
$query = "SELECT * FROM clientes WHERE id = $1";
$result = pg_query_params($conexion, $query, array($id));
$usuario = pg_fetch_assoc($result);

if (!$usuario) {
    header("Location: indexcrud.php?mensaje=Usuario no encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    
    $query = "UPDATE clientes SET nombre = $1, correo = $2 WHERE id = $3";
    $result = pg_query_params($conexion, $query, array($nombre, $correo, $id));
    
    if ($result) {
        header("Location: indexcrud.php?mensaje=Usuario actualizado correctamente");
        exit;
    } else {
        $error = "Error al actualizar usuario";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuario - Spotify</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo2.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header text-center">
        <img src="spotifylogo.png" alt="Spotify Logo" class="logo">
        <h2>Editar Usuario #<?= $id ?></h2>
      </div>
      <div class="card-body">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Nuevo Nombre:</label>
            <input type="text" name="nombre" class="form-control bg-dark text-white" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nuevo Correo:</label>
            <input type="email" name="correo" class="form-control bg-dark text-white" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Actualizar</button>
          <a href="indexcrud.php" class="btn btn-secondary w-100 mt-2">Volver</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>