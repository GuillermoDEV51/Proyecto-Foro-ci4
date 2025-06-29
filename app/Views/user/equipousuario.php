<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nuestro Equipo - Foro de Proyectos</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>style/EstilosUser/EquipoUsuario.css" rel="stylesheet">
 
</head>

<body>

  <!-- Header principal -->
<header>
  <div class="header-container">
    <div class="logo">
      <img src="LOGOFP.png" alt="LOGOFP" />
      <span>Foro de Proyectos</span>
    </div>
    <div class="user-actions">
      <span class="user-status">
        <i class="fas fa-user-check"></i> Usuario Conectado
      </span>
      <a href="index.php" class="logout-link">
        <i class="fas fa-sign-out-alt"></i>
      </a>
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
      <?php  ?>
      
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

  <!-- Main Content -->
  <main class="main-content">
    
    <!-- Page Header -->
    <div class="page-header">
      <h1 class="page-title">Nuestro Equipo</h1>
      <p class="page-subtitle">
        Las personas que hacen posible el Foro de Proyectos
      </p>
    </div>

    <!-- Team Members -->
    <div class="team-grid">
      
      <div class="team-member">
        <div class="member-avatar">
          <i class="fas fa-user-tie"></i>
        </div>
        <h3 class="member-name">Jonathan Alarcon</h3>
        <p class="member-role">Director de Frontend</p>
        <p class="member-description">
          Especialista en gestión de proyectos educativos. Lidera la visión estratégica del foro.
        </p>
        <div class="member-social">
          <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
        </div>
      </div>

      <div class="team-member">
        <div class="member-avatar">
          <i class="fas fa-code"></i>
        </div>
        <h3 class="member-name">Guillermo Mendoza</h3>
        <p class="member-role">Desarrollador Backend</p>
        <p class="member-description">
          Ingeniero en sistemas responsable de la arquitectura técnica de la plataforma.
        </p>
        <div class="member-social">
          <a href="#" class="social-link"><i class="fab fa-github"></i></a>
          <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
        </div>
      </div>

      <div class="team-member">
        <div class="member-avatar">
          <i class="fas fa-code"></i>
        </div>
        <h3 class="member-name">Alexis Vasquez</h3>
        <p class="member-role">Desarrollador de Base de Datos</p>
        <p class="member-description">
          Diseñador de base de datos y optimización de consultas. Asegura la integridad y rendimiento de los datos.
        </p>
        <div class="member-social">
          <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
          <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
        </div>
      </div>

    </div>

    <!-- Call to Action -->
    <section class="cta-section">
      <h2 class="cta-title">¿Quieres unirte?</h2>
      <p class="cta-text">
        Buscamos talento apasionado por la educación y la tecnología para hacer la diferencia.
      </p>
      <a href="contactousuario.php" class="cta-button">
        Contáctanos
      </a>
    </section>

  </main>
