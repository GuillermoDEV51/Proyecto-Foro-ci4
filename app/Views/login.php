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
                    <i class="bi bi-android2 me-2"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-android2" viewBox="0 0 16 16">
                        <path d="m10.213 1.471.691-1.26q.069-.124-.048-.192-.128-.057-.195.058l-.7 1.27A4.8 4.8 0 0 0 8.005.941q-1.032 0-1.956.404l-.7-1.27Q5.281-.037 5.154.02q-.117.069-.049.193l.691 1.259a4.25 4.25 0 0 0-1.673 1.476A3.7 3.7 0 0 0 3.5 5.02h9q0-1.125-.623-2.072a4.27 4.27 0 0 0-1.664-1.476ZM6.22 3.303a.37.37 0 0 1-.267.11.35.35 0 0 1-.263-.11.37.37 0 0 1-.107-.264.37.37 0 0 1 .107-.265.35.35 0 0 1 .263-.11q.155 0 .267.11a.36.36 0 0 1 .112.265.36.36 0 0 1-.112.264m4.101 0a.35.35 0 0 1-.262.11.37.37 0 0 1-.268-.11.36.36 0 0 1-.112-.264q0-.154.112-.265a.37.37 0 0 1 .268-.11q.155 0 .262.11a.37.37 0 0 1 .107.265q0 .153-.107.264M3.5 11.77q0 .441.311.75.311.306.76.307h.758l.01 2.182q0 .414.292.703a.96.96 0 0 0 .7.288.97.97 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h1.343v2.182q0 .414.292.703a.97.97 0 0 0 .71.288.97.97 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h.76q.436 0 .749-.308.31-.307.311-.75V5.365h-9zm10.495-6.587a.98.98 0 0 0-.702.278.9.9 0 0 0-.293.685v4.063q0 .406.293.69a.97.97 0 0 0 .702.284q.42 0 .712-.284a.92.92 0 0 0 .293-.69V6.146a.9.9 0 0 0-.293-.685 1 1 0 0 0-.712-.278m-12.702.283a1 1 0 0 1 .712-.283q.41 0 .702.283a.9.9 0 0 1 .293.68v4.063a.93.93 0 0 1-.288.69.97.97 0 0 1-.707.284 1 1 0 0 1-.712-.284.92.92 0 0 1-.293-.69V6.146q0-.396.293-.68" />
                    </svg>
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

                    <a href="<?php echo base_url() ?>/" class="btn btn-secondary ms-auto p-2">Volver al Inicio</a>
                </div>

                
            </form>



        </div>



        <script src="<?php echo base_url() ?>js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
</body>

</html>