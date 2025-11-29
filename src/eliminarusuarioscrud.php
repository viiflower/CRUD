<?php
include 'bdcrud.php';

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['confirmar'])) {
    $query = "DELETE FROM clientes WHERE id = $1";
    $result = pg_query_params($conexion, $query, array($id));
    
    if ($result) {
        header("Location: index.php?mensaje=Usuario eliminado correctamente");
        exit;
    } else {
        $error = "Error al eliminar usuario";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminar Usuario - Spotify </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo2.css">
</head>
<body>
  <div class="container mt-5 text-center">
    <div class="card shadow-lg">
      <div class="card-header text-center">
        <img src="spotifylogo.png" alt="Spotify Logo" class="logo">
        <h2>Eliminar Usuario</h2>
      </div>
      <div class="card-body">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <p class="fs-5">¿Seguro que deseas eliminar al usuario <strong>#<?= $id ?></strong>?</p>
        
        <form method="POST">
          <button type="submit" name="confirmar" class="btn btn-danger w-50">Sí, eliminar</button>
        </form>
        <a href="indexcrud.php" class="btn btn-secondary w-50 mt-2">Cancelar</a>
      </div>
    </div>
  </div>
</body>
</html>