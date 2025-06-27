<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forum de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>boostra/js/bootstrap.bundle.min.js"></script>
  <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>style/home.css" rel="stylesheet">

</head>

<body>

            <
            <!-- Header principal -->
            <header>
                <div class="header-container">
                <div class="logo">
                    <img src="<?php echo base_url() ?>img\LOGOFP.png" alt="LOGOFP" />
                    <span>Foro de Proyectos</span>
                </div>
                <a href="<?php echo base_url() ?>login" class="login-link"><i class="fas fa-user"></i> Iniciar Sesión</a>
                </div>
            </header>
            <!-- Barra de navegación -->
  <nav>
    <div class="nav-container">
      <a href="<?php echo base_url() ?>">Inicio</a>
      <a href="<?php echo base_url() ?>proyectos">Proyectos</a>
      <a href="<?php echo base_url() ?>ayuda">Ayuda</a>
      <a href="<?php echo base_url() ?>contacto">Contacto</a>
      <a href="<?php echo base_url() ?>DashbordAdmin">Admin</a>
      
     <?php $role = session()->get('role'); ?>
<?php if ($role === 'admin'): ?>

    <!-- Opciones para admin -->

    <a href="<?php echo base_url() ?>DashbordAdmin">Admin</a>


<?php elseif ($role === 'estudiante'): ?>

    <!-- Opciones para estudiante -->

<?php else: ?>

    <!-- Opciones para visitante -->
     
<?php endif; ?>

            <div class="container">
                



                <?php

                $validation = \Config\Services::validation();

                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">User Form</div>
                            <div class="col text-right">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url("/crud/add_validation")?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" />
                                <?php
                                if($validation->getError('name'))
                                {
                                    echo '<div class="alert alert-danger mt-2">'.$validation->getError('name').'</div>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" />
                                <?php
                                if($validation->getError('email'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('email')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                <?php

                                if($validation->getError('gender'))
                                {
                                    echo '<div class="alert alert-danger mt-2">
                                    '.$validation->getError("gender").'
                                    </div>';
                                }

                                ?>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>








            </div>
</body>

</html>