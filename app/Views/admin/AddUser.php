<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forum de Proyectos</title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
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
      <button class="btn btn-outline-dark" ><i class="fas fa-sign-out-alt"></i> Salir</button>
    </form>
  </header>

           
  
  
      
   <div class="content">

                <?php

                $validation = \Config\Services::validation();

                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Añadir Usuario</div>
                            <div class="col text-right">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Formulario de añadir usuario -->
                        <form method="post" action="<?php echo base_url("AdminUser/create")?>">


                            <div class="form-group">
                            <!-- Añadir codigo de usuario -->
                                <label>codigo</label>
                                <input type="text" name="codigo" class="form-control" />

                                <!-- Error -->
                                <?php
                                if($validation->getError('codigo'))
                                {
                                    echo '<div class="alert alert-danger mt-2">'.$validation->getError('codigo').'</div>';
                                }
                                ?>
                            </div>


                            <!-- Añadir contraseña de usuario -->
                            <div class="form-group">
                                <label>contraseña</label>
                                <input type="password" name="contraseña" class="form-control" />

                                <!-- Error -->
                                <?php
                                if($validation->getError('password'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('password')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>

                            <!-- asiganar rol -->
                            <div class="form-group">
                                <label>rol</label>
                                <select name="role" class="form-control">
                                    <option value="">Seleccionar rol</option>
                                    <?php
                                    foreach($Rol as $rol):?>
                                        <option value="<?= $rol['id'] ?>"><?= $rol['Rol'] ?></option>

                                    <?php endforeach; ?>
                                </select>

                                <!-- Error -->
                                <?php

                                if($validation->getError('rol'))
                                {
                                    echo '<div class="alert alert-danger mt-2">
                                    '.$validation->getError("rol").'
                                    </div>';
                                }

                                ?>
                            </div>
                        
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="form-group text-right ">
                                <a href="<?= base_url() ?>admin/AdminUser" class="btn btn-secondary">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>

            
     </div>







        
</body>

</html>