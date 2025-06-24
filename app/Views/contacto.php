<?php
// contacto.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contacto – Foro de Proyectos</title>
  <!-- Tipografía similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <link href="<?php echo base_url() ?>style/contacto.css" rel="stylesheet">
</head>

<body>
  <!-- Header principal -->
  <header>
    <div class="header-container">
      <div class="logo">
        <img class="icono" src="<?php echo base_url() ?>img\LOGOFP.png" alt="LOGOFP" />
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
    </div>
  </nav>

  <!-- Contenido principal: Formulario de Contacto -->
  <main class="main-content">
    <h2 class="section-title">Contáctanos</h2>
    <form action="enviar_contacto.php" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required />

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required />

      <label for="asunto">Asunto:</label>
      <input type="text" id="asunto" name="asunto" required />

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" required></textarea>

      <button type="submit">Enviar</button>
    </form>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h3>Acerca de</h3>
        <ul>
          <li><a href="<?php echo base_url() ?>nuestramision">Nuestra Misión</a></li>
          <li><a href="<?php echo base_url() ?>equipo">Equipo</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Redes Sociales</h3>
        <ul>
          <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
          <li><a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Foro de Proyectos. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>