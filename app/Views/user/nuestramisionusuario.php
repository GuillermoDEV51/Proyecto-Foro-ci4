<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nuestra Misión - Foro de Proyectos</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>/style/EstilosUser/nuestramision.css"/>

  <style>
    
  </style>
</head>

<body>
  
<!-- Header principal -->
<header>
  <div class="header-container">
    <div class="logo">
      <a href="<?= base_url('user/indexusuario') ?>" class="logo">

        <img src="<?= base_url() ?>img/LOGOFP.png" alt="LOGOFP" />
        <span>Foro de Proyectos</span>
      </a>
    </div>

    <div class="user-actions">
     <div class="user-status">
  <i class="fas fa-user-check"></i> 
  <p>Bienvenido, <?= esc(session()->get('user')) ?>!</p>
      </span>
      <form action="<?= base_url('login/logout') ?>" method="POST">
        <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Salir</button>
      </form>
    </div>
  </div>
</header>




  <!-- Barra de navegación -->
   <nav>
    <div class="nav-container">
      <a href="<?php echo base_url() ?>user/indexusuario">Inicio</a>
      <a href="<?php echo base_url() ?>user/proyectosusuario">Proyectos</a>
      <a href="<?php echo base_url() ?>user/ayudausuario">Ayuda</a>
      <a href="<?php echo base_url() ?>user/contactousuario">Contacto</a>
       <?php $role = session()->get('rol'); ?>
        <?php if ($role === '1'): ?>

            <!-- Opciones para admin -->

            <a href="<?php echo base_url() ?>admin/VistaCRUD">Dashboard Admin</a>


        <?php elseif ($role === '2'): ?>

            <!-- Opciones para estudiante -->

        <?php else: ?>

            <!-- Opciones para visitante -->
            
        <?php endif; ?>

      
    </div>
 </nav>

  <!-- Contenido principal -->
  <main class="main-content">
    
    <!-- Título principal -->
    <h1 class="page-title">Nuestra Misión</h1>

    <!-- Contenido de la misión -->
    <section class="mission-content">
      <p class="mission-intro">
        "Democratizar el acceso al conocimiento académico y fomentar la colaboración estudiantil"
      </p>
      
      <p class="mission-text">
        En el Foro de Proyectos creemos que el conocimiento debe ser accesible para todos. Somos una plataforma donde estudiantes y académicos pueden compartir, descubrir y colaborar en proyectos que impulsen el desarrollo académico y profesional.
      </p>
      
      <p class="mission-text">
        Eliminamos las barreras que separan a los estudiantes del conocimiento valioso. Facilitamos el intercambio de tesis, proyectos de investigación y recursos educativos que sirven como base para futuras investigaciones.
      </p>
    </section>

    <!-- Valores -->
    <section class="values-section">
      
      <div class="value-item">
        <div class="value-icon">
          <i class="fas fa-users"></i>
        </div>
        <h3 class="value-title">Colaboración</h3>
        <p class="value-description">
          Fomentamos el intercambio de ideas y conocimientos que enriquece a toda la comunidad académica.
        </p>
      </div>
      
      <div class="value-item">
        <div class="value-icon">
          <i class="fas fa-lightbulb"></i>
        </div>
        <h3 class="value-title">Innovación</h3>
        <p class="value-description">
          Promovemos el pensamiento innovador como motor del progreso académico y social.
        </p>
      </div>
      
      <div class="value-item">
        <div class="value-icon">
          <i class="fas fa-medal"></i>
        </div>
        <h3 class="value-title">Excelencia</h3>
        <p class="value-description">
          Mantenemos altos estándares de calidad en todos los contenidos y servicios de nuestra plataforma.
        </p>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="call-to-action">
      <h2 class="cta-title">¿Listo para ser parte del cambio?</h2>
      <p class="cta-text">
        Únete a nuestra comunidad de estudiantes y académicos comprometidos con la excelencia.
      </p>
      <a href="proyectos.php" class="cta-button">
        <i class="fas fa-rocket"></i> Explorar Proyectos
      </a>
    </section>

  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h3>Acerca de</h3>
        <ul>
        <li><a href="<?= base_url('user/nuestramisionusuario') ?>">Nuestra Misión</a></li>
        <li><a href="<?= base_url('user/equipousuario') ?>">Equipo</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Redes Sociales</h3>
        <ul>
          <li><a href="#"><i class="fab fa-instagram"></i> </a></li>
          <li><a href="#"><i class="fab fa-linkedin-in"></i> </a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Forum de Proyectos. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>