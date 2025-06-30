<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum de Proyectos</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="<?php

                use App\Controllers\Admin\AdminUser;

                echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>boostra/js/bootstrap.bundle.min.js"></script>
    <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>style/home.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/EstilosAdmin/vistacrud.css') ?>">

</head>

<body>


    <!-- Header principal -->
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="<?= base_url() ?>img/LOGOFP.png" alt="Logo Foro de Proyectos" class="logo-header">
        <a href="<?= base_url() ?>admin/VistaCRUD"><i class="fa-solid fa-user-tie p-2"></i>Dashbord</a>
        <a href="<?= base_url() ?>admin/EditarProyecto"><i class="fas fa-upload me-2"></i>Subir Proyecto</a>
        <a href="<?= base_url() ?>user/indexusuario" class="text-warning fw-bold mt-5 ms-3 d-block">← Volver al Inicio</a>
    </div>

    <!-- Encabezado -->
    <header class="content d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="<?= base_url() ?>img/LOGOFP.png" alt="Logo Foro de Proyectos" class="logo-header">
            <span class="admin-title">Panel de Administración</span>
        </div>
        <form action="<?php echo base_url() ?>login/logout" method="POST">
            <button class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i> Salir</button>
        </form>
    </header>




    <main class="content">


        <div class="card-body">

            <form action="<?= base_url('AdminProyect/' . $proyecto['id']) ?>" class="row g-3" method="post" enctype="multipart/form-data" autocomplete="off">

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="<?= $proyecto['id'] ?>">

                <div class="col-md-4">
                    <label for="clave" class="form-label">titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $proyecto['titulo'] ?>" required autofocus>
                </div>

                <div class="col-md-8">
                    <label for="nombre" class="form-label">autor</label>
                    <input type="text" class="form-control" id="autor" name="autor" value="<?= $proyecto['autor'] ?>" required>
                </div>

                <div class="col-md-8">
                    <label for="nombre" class="form-label">año</label>
                    <input type="number" class="form-control" id="anio" name="anio" value="<?= $proyecto['anio'] ?>" required>
                </div>

                <div class="form-group">
                    <!-- Documento actual -->
                    <?php if (!empty($proyecto['pdf'])): ?>
                        <p>Documento actual: <a href="<?= base_url('uploads/' . $proyecto['pdf']) ?>" target="_blank"><?= $proyecto['pdf'] ?></a></p>
                        <input type="hidden" name="pdf_actual" value="<?= $proyecto['pdf'] ?>">
                    <?php endif; ?>

                    <!-- Nuevo documento -->
                    <div class="form-group">
                        <label for="documento">Nuevo documento (opcional)</label>
                        <input type="file" class="form-control" id="documento" name="documento" accept=".pdf,.doc,.docx">
                        <?php if (isset($validation) && $validation->getError('documento')): ?>
                            <div class="alert alert-danger mt-2"><?= $validation->getError('documento') ?></div>
                        <?php endif; ?>
                    </div>
                </div>





                <div class="form-group">
                    <label>carrera</label>
                    <select name="carrera" class="form-control">
                        <option value="">Seleccionar carrera</option>
                        <option value="Ingeniería de Informatica" <?= $proyecto['carrera'] == 'Ingeniería de Informatica' ? 'selected' : '' ?>>Ingeniería de Informatica
                        <option value="Ingeniería de Maritima" <?= $proyecto['carrera'] == 'Ingeniería de Maritima' ? 'selected' : '' ?>>Ingeniería de Maritima</option>
                        <option value="Ingeniería de Maritima" <?= $proyecto['carrera'] == 'Ingeniería de Maritima' ? 'selected' : '' ?>>Ingeniería de Maritima</option>

                    </select>
                    <?php if (isset($validation) && $validation->getError('carrera')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('carrera') ?></div>
                    <?php endif; ?>
                </div>




                <div class="col-12">
                    <a href="<?= base_url() ?>admin/AdminProyect" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>










    </main>







    <script>
        function mostrarPassword() {
            var input = document.getElementById("password");
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>


</body>

</html>