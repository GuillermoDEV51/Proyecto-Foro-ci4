<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nuestro Equipo - Foro de Proyectos</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>style/EstilosUser/equipo.css" rel="stylesheet">
 
</head>

<body>

<!-- Header principal -->
<header>
  <div class="header-container">
    <div class="logo">
      <a href="<?= base_url() ?>" class="logo">
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
  <!-- Contenido Principal -->
  <main class="main-content">
    <!-- Encabezado de la Página -->
    <div class="page-header">
      <h1 class="page-title">Nuestro Equipo</h1>
      <p class="page-subtitle">
        Las personas que hacen posible el Foro de Proyectos
      </p>
    </div>

    <!-- Miembros del Equipo -->
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
          <a href="#" class="social-link copy-email" data-email="alarconbooking1@gmail.com">
            <i class="fas fa-envelope"></i>
          </a>
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
          <a href="#" class="social-link copy-email" data-email="guillermobooking1@gmail.com">
            <i class="fas fa-envelope"></i>
          </a>
        </div>
      </div>

      <div class="team-member">
        <div class="member-avatar">
          <i class="fas fa-palette"></i>
        </div>
        <h3 class="member-name">Alexis Vasquez</h3>
        <p class="member-role">Desarrollador de Base de Datos</p>
        <p class="member-description">
          Diseñador de base de datos y optimización de consultas. Asegura la integridad y rendimiento de los datos.
        </p>
        <div class="member-social">
          <a href="#" class="social-link copy-email" data-email="alexisbooking1@gmail.com">
            <i class="fas fa-envelope"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Call to Action -->
    <section class="cta-section">
      <h2 class="cta-title">¿Quieres unirte?</h2>
      <p class="cta-text">
        Buscamos talento apasionado por la educación y la tecnología para hacer la diferencia.
      </p>
      <a href="<?php echo base_url() ?>contacto" class="cta-button">
        Contáctanos
      </a>
    </section>
  </main>

  <footer>
    <div class="footer-content">
      <div class="footer-links">
        <a href="<?php echo base_url() ?>user/nuestramisionusuario">Nuestra Misión</a>
        <a href="<?php echo base_url() ?>user/equipousuario">Equipo</a>
        <a href="<?php echo base_url() ?>user/contactousuario">Contacto</a>
      </div>
      <p>&copy; 2025 Foro de Proyectos. Todos los derechos reservados.</p>
    </div>
  </footer>

  <script>
    document.querySelectorAll('.copy-email').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault(); // Previene que la página se recargue

        const email = link.getAttribute('data-email');
        if (!email) return;

        // Copiar al portapapeles
        navigator.clipboard.writeText(email).then(() => {
          // Cambiar el ícono a un "check" temporalmente
          const originalIcon = link.innerHTML;
          link.innerHTML = '<i class="fas fa-check"></i>';
          setTimeout(() => {
            link.innerHTML = originalIcon;
          }, 1500);
        }).catch(err => {
          console.error('Error al copiar el correo:', err);
        });
      });
    });
  </script>
</body>
</html>
