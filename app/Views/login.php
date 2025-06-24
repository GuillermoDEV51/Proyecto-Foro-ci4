<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>boostra/js/bootstrap.bundle.min.js"></script>
    <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>style/login.css" rel="stylesheet">
</head>

<body>

    
    <div class="login min-vh-100">

        <div class="login-box shadow-lg p-4 bg-white rounded ">

            <!-- Bloque superior con ícono y SVG -->
            <div class="d-flex flex-column align-items-center mb-3">
                <a href="/" class="d-inline-flex align-items-center mb-2 mb-lg-0 text-success text-decoration-none fs-2">
                    <img class="icono" src="<?php echo base_url() ?>img\LOGOFP.png" alt="LOGOFP" />
                </a>
                <h2 class="text-secondary">Iniciar Sesion</h2>
            </div>


            <!-- Formulario de inicio de sesión -->
            <form method="post" action="<?php echo base_url() ?>/login-validar">


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
                    
                    <!--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                       contenido del SVG 
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg> -->

                </div>


                <!--<div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                </div>-->



                

                <div class="d-flex mb-3 ">
                    <button type="submit" class="btn btn-warning">Ingresar</button>

                    <a href="<?php echo base_url() ?>" class="btn btn-secondary ms-auto p-2">Volver al Inicio</a>
                </div>

                
            </form>



        </div>



        <script src="<?php echo base_url() ?>js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
</body>

</html>