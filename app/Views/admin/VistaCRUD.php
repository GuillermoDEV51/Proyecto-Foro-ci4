<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración – Foro de Proyectos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Fonts + Bootstrap + FontAwesome -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Estilos CSS -->
  <link rel="stylesheet" href="<?= base_url('style/EstilosAdmin/vistacrud.css') ?>">

  <script src="<?php echo base_url() ?>boostrap/js/bootstrap.bundle.min.js"></script>

  <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <img src="<?= base_url() ?>img/LOGOFP.png" alt="Logo Foro de Proyectos" class="logo-header">
    <a href="<?= base_url() ?>admin/AdminUser"><i class="fas fa-users me-2"></i>Administrar Usuarios</a>
    <a href="<?= base_url() ?>admin/AdminProyect"><i class="fas fa-upload me-2"></i>Administrar Proyecto</a>
    <a href="<?= base_url() ?>user/indexusuario" class="text-warning fw-bold mt-5 ms-3 d-block">← Volver al Inicio</a>
  </div>

  <!-- Encabezado -->
  <header class="content d-flex justify-content-between align-items-center">
    <div class="d-flex justify-content-center align-items-center w-100">
      <img src="<?= base_url() ?>img/LOGOFP.png" alt="Logo Foro de Proyectos" class="logo-header">
      <span class="admin-title">Panel de Administración</span>
    </div>
    <form action="<?php echo base_url() ?>login/logout" method="POST">
      <button class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i> Salir</button>
    </form>
  </header>

  <!-- Contenido principal -->
  <main class="content py-4">
    <!-- Sección Usuarios -->
    <section id="usuarios" class="mb-5">
      <h2 class="section-title text-center mb-4">Usuarios</h2>
      
      <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
      <table class="table table-striped table-bordered shadow-sm">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Rol</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['codigo'] ?></td>
              <td>
                <?php
                foreach ($roles as $rol) {
                    if ($rol['id'] == $user['id_rol']) {
                        echo $rol['Rol'];
                        break;
                    }
                }
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <!-- Sección Proyectos -->
    <section id="proyectos">
      <h2 class="section-title text-center mb-4">Gestión de Proyectos</h2>
      <div class="mb-4 text-center">
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#agregarProyectoModal">
          <i class="fas fa-plus"></i> Agregar Proyecto
        </button>
      </div>
      <table class="table table-striped table-bordered shadow-sm">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>101</td>
            <td>Sistema de Gestión Académica</td>
            <td>Laura Gómez</td>
            <td>2024</td>
            <td>
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarProyectoModal">
                <i class="fas fa-edit"></i> Editar
              </button>
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <!-- Modal Agregar Proyecto -->
  <div class="modal fade" id="agregarProyectoModal" tabindex="-1" aria-labelledby="agregarProyectoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agregarProyectoModalLabel">Agregar Proyecto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Aquí va el formulario para agregar el proyecto -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar Proyecto</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
