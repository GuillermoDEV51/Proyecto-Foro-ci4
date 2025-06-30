<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum de Proyectos</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>boostrap/js/bootstrap.bundle.min.js"></script>
    <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>style/home.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/EstilosAdmin/vistacrud.css') ?>">

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="<?= base_url() ?>img/LOGOFP.png" alt="Logo Foro de Proyectos" class="logo-header">
        <a href="<?= base_url() ?>admin/VistaCRUD"><i class="fa-solid fa-user-tie p-2"></i>Dashboard</a>
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

    <main class="content">
        <!-- Formulario de agregar proyecto -->
        <div class="card shadow-lg rounded">
            <div class="card-header bg-primary text-white">
                <div class="row">
                    <div class="col">Añadir Proyecto</div>
                </div>
            </div>
            <div class="card-body">

                <form method="post" action="<?php echo base_url("AdminProyect/create") ?>" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" />
                        <?php if (isset($validation) && $validation->getError('titulo')): ?>
                            <div class="alert alert-danger mt-2"><?= $validation->getError('titulo') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" />
                        <?php if (isset($validation) && $validation->getError('autor')): ?>
                            <div class="alert alert-danger mt-2"><?= $validation->getError('autor') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="codigo" class="form-label">Año</label>
                        <input type="number" name="anio" id="anio" class="form-control" />
                        <?php if (isset($validation) && $validation->getError('anio')): ?>
                            <div class="alert alert-danger mt-2"><?= $validation->getError('anio') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="file" name="documento" id="documento" class="form-control" />
                        <?php if (isset($validation) && $validation->getError('documento')): ?>
                            <div class="alert alert-danger mt-2"><?= $validation->getError('documento') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="carrera" class="form-label">Carrera</label>
                        <select name="carrera" id="carrera" class="form-control">
                            <option value="">Seleccionar carrera</option>
                            <option value="Ingeniería de Informática">Ingeniería de Informática</option>
                            <option value="Ingeniería Marítima">Ingeniería Marítima</option>
                            <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                        </select>
                        <?php if (isset($validation) && $validation->getError('carrera')): ?>
                            <div class="alert alert-danger mt-2"><?= $validation->getError('carrera') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Agregar Proyecto</button>
                    </div>

                    <div class="form-group text-center mt-3">
                        <a href="<?= base_url() ?>admin/AdminProyect" class="btn btn-secondary btn-lg">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>
