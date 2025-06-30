        <?php
            if (session('user')) {
                return redirect()->to('/');
            }
         ?>

 <!DOCTYPE html>
 <html lang="es">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Iniciar Sesion</title>
     <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="<?php echo base_url() ?>boostrap/js/bootstrap.bundle.min.js"></script>
     <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
     <link href="<?php echo base_url() ?>style/login.css" rel="stylesheet">
 </head>

 <body>

 
     <div class="login min-vh-100 position-relative">

    <div class="position-absolute start-0 top-0 m-3">
        <a href="<?php echo base_url() ?>" class="btn btn-secondary p-2">Volver al Inicio</a>
    </div>

         <div class="login-box shadow-lg p-4 bg-white rounded w-75 h-50">

             <!-- Bloque superior con ícono y SVG -->
             <div class="d-flex flex-column align-items-center mb-3">
                 <a href="<?php echo base_url() ?>" class="d-inline-flex align-items-center mb-2 mb-lg-0 text-success text-decoration-none fs-2">
                     <img class="icono" src="<?php echo base_url() ?>img\LOGOFP.png" alt="LOGOFP" />
                 </a>
                 <h2 class="text-secondary">Iniciar Sesion</h2>
             </div>



             <!-- Mensaje de error -->
             <?php if (session()->getFlashdata('msg')): ?>
                 <div class="alert alert-warning">
                     <?= session()->getFlashdata('msg') ?>
                 </div>
             <?php endif; ?>

             <!-- Formulario de inicio de sesión -->
             <form method="post" action="<?php echo base_url() ?>login/loginAutenticacion">


                 <!-- Grupo usuario -->
                 <div class="usuario">
                     <div class="mb-3">
                         <label for="codigo" class="form-label">Codigo</label>
                         <input type="text" class="form-control" id="codigo" aria-describedby="Codigo de usuario" placeholder="ing-xxxxxxxxx" required name="codigo">
                         <div id="codigo" class="form-text">Ingrese su codigo.</div>
                     </div>
                 </div>

                 <!-- Grupo contraseña -->
                 <div class="mb-3">
                     <label for="Password" class="form-label">Contraseña</label>
                     <input type="password" class="form-control" id="Password" name="password" required>



                 </div>


                 <!-- Botones de acción -->

                 <div class="d-flex mb-3 ">
                     <button type="submit" class="btn btn-warning">Ingresar</button>
                     <a href="<?php echo base_url() ?>registro" class="btn btn-success ms-auto p-2">Registrarse</a>

                 </div>


             </form>



         </div>



         <script src="<?php echo base_url() ?>js/popper.min.js"></script>
         <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
 </body>

 </html>