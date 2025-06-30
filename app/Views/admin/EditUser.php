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

             <form action="<?= base_url('AdminUser/'.$user['id']) ?>" class="row g-3" method="post" autocomplete="off">

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <div class="col-md-4">
                    <label for="clave" class="form-label">codigo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?= $user['codigo'] ?>" required autofocus>
                </div>

                <div class="col-md-8">
                    <label for="nombre" class="form-label">contraseña</label>
                    <input type="password" class="form-control" id="password" name="contraseña" value="<?= $user['contraseña'] ?>" required>
                </div>

                

                <div class="form-group">
                        <label>rol</label>
                        <select name="role" class="form-control">
                            <option value="">Seleccionar rol</option>
                            <?php foreach ($roles as $rol): ?>
                                <option value="<?= $rol['id'] ?>" <?php echo($rol['id'] == $user['id_rol']) ? 'selected':''; ?>><?= $rol['Rol'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($validation) && $validation->getError('role')): ?>
                            <div class="alert alert-danger mt-2"><?= $validation->getError('role') ?></div>
                        <?php endif; ?>
                    </div>
                
                <div class="col-12">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="mostrarPass" onclick="mostrarPassword()">
                        <label class="form-check-label" for="mostrarPass">
                            Mostrar contraseña
                        </label>
                    </div>
                </div>

               

                <div class="col-12">
                    <a href="<?= base_url() ?>admin/AdminUser" class="btn btn-secondary">Volver</a>
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