<?php
include 'bdcrud.php';

$query = "SELECT * FROM clientes ORDER BY id";
$result = pg_query($conexion, $query);
$usuarios = pg_fetch_all($result) ?: [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Spotify CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo2.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header text-center">
        <img src="spotifylogo.png" alt="Spotify Logo" class="logo">
        <h2>Spotify</h2>
        <h3>Gestión de Usuarios</h3>
      </div>
      <div class="card-body">
        <a href="agregarusuariocrud.php" class="btn btn-success mb-3">➕ Agregar usuarios</a>

        <?php if (isset($_GET['mensaje'])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_GET['mensaje']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>

        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
              <td><?= $u["id"] ?></td>
              <td><?= htmlspecialchars($u["nombre"]) ?></td>
              <td><?= htmlspecialchars($u["correo"]) ?></td>
              <td>
                <a href="editarcrud.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">💭 Editar</a>
                <a href="eliminarusuarioscrud.php?id=<?= $u['id'] ?>" class="btn btn-danger btn-sm">❌ Eliminar</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>