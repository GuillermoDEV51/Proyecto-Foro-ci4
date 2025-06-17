<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nuestra Misión - Foro de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    /* -------------------------------
       Variables de color
       ------------------------------- */
    :root {
      --color-acento: rgb(255, 94, 0);
      --color-fondo: #f5f5f5;
      --color-texto: #333333;
      --color-header: #ffffff;
      --color-nav: #ffffff;
      --color-botones: rgb(255, 94, 0);
      --radio-bordes: 4px;
      --sombra-card: rgba(0, 0, 0, 0.1);
    }

    /* -------------------------------
       Reglas globales
       ------------------------------- */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    html {
      height: 100%;
    }
    body {
      font-family: 'Roboto', sans-serif;
      background-color: var(--color-fondo);
      color: var(--color-texto);
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow-x: hidden;
    }
    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://images.unsplash.com/photo-1737238110003-a7943a6770cf') center/cover no-repeat;
      opacity: 0.3;
      z-index: -1;
    }
    a {
      text-decoration: none;
      color: inherit;
    }
    ul {
      list-style: none;
    }

    /* -------------------------------
       Header principal
       ------------------------------- */
    header {
      background-color: var(--color-header);
      border-bottom: 1px solid #e0e0e0;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 4px var(--sombra-card);
    }
    .header-container {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.75rem 1rem;
    }
    .logo {
      display: flex;
      align-items: center;
    }
    .logo img {
      height: 32px;
      margin-right: 0.5rem;
    }
    .logo span {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--color-acento);
      letter-spacing: 1px;
    }
    .login-link {
      font-weight: 500;
      color: var(--color-texto);
      padding: 0.5rem 0.75rem;
      border-radius: var(--radio-bordes);
      transition: background-color 0.2s ease;
    }
    .login-link:hover {
      background-color: #f0f0f0;
    }

    /* -------------------------------
       Barra de navegación secundaria
       ------------------------------- */
    nav {
      background-color: var(--color-nav);
      border-bottom: 1px solid #e0e0e0;
    }
    .nav-container {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      padding: 0.5rem 1rem;
      gap: 1.5rem;
    }
    .nav-container a {
      font-weight: 500;
      color: var(--color-texto);
      font-size: 0.95rem;
      transition: color 0.2s, transform 0.2s;
    }
    .nav-container a:hover {
      color: var(--color-acento);
      transform: translateY(-2px);
    }

    /* -------------------------------
       Contenido principal
       ------------------------------- */
    .main-content {
      max-width: 1100px;
      margin: 2rem auto;
      padding: 0 1rem;
      flex: 1;
    }

    .page-title {
      font-size: 2rem;
      font-weight: 700;
      color: var(--color-acento);
      text-align: center;
      margin-bottom: 2rem;
    }

    .mission-content {
      background-color: #ffffff;
      border-radius: var(--radio-bordes);
      box-shadow: 0 2px 8px var(--sombra-card);
      padding: 2rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    .mission-intro {
      font-size: 1.2rem;
      color: var(--color-acento);
      font-weight: 500;
      margin-bottom: 1.5rem;
      font-style: italic;
    }

    .mission-text {
      font-size: 1.1rem;
      line-height: 1.8;
      margin-bottom: 1.5rem;
    }

    .values-section {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .value-item {
      background-color: #ffffff;
      padding: 1.5rem;
      border-radius: var(--radio-bordes);
      box-shadow: 0 2px 8px var(--sombra-card);
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .value-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px var(--sombra-card);
    }

    .value-icon {
      font-size: 2.5rem;
      color: var(--color-acento);
      margin-bottom: 1rem;
    }

    .value-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--color-texto);
      margin-bottom: 0.5rem;
    }

    .value-description {
      font-size: 0.95rem;
      line-height: 1.6;
      color: #666;
    }

    .call-to-action {
      background: linear-gradient(135deg, var(--color-acento), #ff7700);
      color: white;
      text-align: center;
      padding: 2rem;
      border-radius: var(--radio-bordes);
      margin-bottom: 2rem;
    }

    .cta-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .cta-text {
      font-size: 1rem;
      margin-bottom: 1.5rem;
      opacity: 0.95;
    }

    .cta-button {
      background-color: white;
      color: var(--color-acento);
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: var(--radio-bordes);
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.3s, box-shadow 0.3s;
      text-decoration: none;
      display: inline-block;
    }

    .cta-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    /* -------------------------------
       Footer
       ------------------------------- */
    footer {
      background-color: var(--color-acento);
      color: #fff;
      padding: 2rem 1rem;
      width: 100%;
      position: relative;
      z-index: 10;
      margin-top: auto;
    }
    .footer-container {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: space-between;
    }
    .footer-column {
      flex: 1 1 200px;
    }
    .footer-column h3 {
      font-size: 1.1rem;
      margin-bottom: 0.75rem;
    }
    .footer-column ul li {
      margin-bottom: 0.5rem;
    }
    .footer-column a {
      color: #f0f0f0;
      font-size: 0.9rem;
    }
    .footer-column a:hover {
      text-decoration: underline;
    }
    .footer-bottom {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.85rem;
      opacity: 0.9;
    }

    /* -------------------------------
       Responsive
       ------------------------------- */
    @media (max-width: 768px) {
      .page-title {
        font-size: 1.8rem;
      }
      
      .mission-content {
        padding: 1.5rem;
      }
      
      .values-section {
        grid-template-columns: 1fr;
      }
      
      .call-to-action {
        padding: 1.5rem;
      }
    }
  </style>
</head>

<body>
  
  <!-- Header principal -->
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="LOGOFP.png" alt="LOGOFP" />
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
      <p>&copy; 2025 Forum de Proyectos. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>