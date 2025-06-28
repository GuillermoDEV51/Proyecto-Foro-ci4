<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nuestro Equipo - Foro de Proyectos</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    :root {
      --color-acento: rgb(255, 94, 0);
      --color-fondo: #f8f9fa;
      --color-texto: #333333;
      --color-header: #ffffff;
      --radio-bordes: 8px;
      --sombra-card: rgba(0, 0, 0, 0.08);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background-color: var(--color-fondo);
      color: var(--color-texto);
      line-height: 1.6;
      min-height: 100vh;
    }

    /* Header */
    header {
      background-color: var(--color-header);
      border-bottom: 1px solid #e9ecef;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 4px var(--sombra-card);
    }

    .header-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 2rem;
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
    }

    .login-link {
      color: var(--color-texto);
      padding: 0.5rem 1rem;
      border-radius: var(--radio-bordes);
      transition: background-color 0.2s ease;
      font-weight: 500;
    }

    .login-link:hover {
      background-color: #f8f9fa;
    }

    /* Navigation */
    nav {
      background-color: var(--color-header);
      border-bottom: 1px solid #e9ecef;
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      padding: 0.75rem 2rem;
      gap: 2rem;
    }

    .nav-container a {
      color: var(--color-texto);
      font-weight: 500;
      transition: color 0.2s;
      text-decoration: none;
    }

    .nav-container a:hover {
      color: var(--color-acento);
    }

    /* Main Content */
    .main-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 2rem;
    }

    .page-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .page-title {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--color-acento);
      margin-bottom: 1rem;
    }

    .page-subtitle {
      font-size: 1.2rem;
      color: #6c757d;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Team Grid */
    .team-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .team-member {
      background-color: white;
      border-radius: var(--radio-bordes);
      padding: 2rem;
      text-align: center;
      box-shadow: 0 2px 12px var(--sombra-card);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .team-member:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    .member-avatar {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--color-acento), #ff7700);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      color: white;
      font-size: 2rem;
    }

    .member-name {
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--color-texto);
      margin-bottom: 0.5rem;
    }

    .member-role {
      font-size: 1rem;
      color: var(--color-acento);
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .member-description {
      font-size: 0.95rem;
      color: #6c757d;
      line-height: 1.5;
      margin-bottom: 1.5rem;
    }

    .member-social {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
    }

    .social-link {
      width: 36px;
      height: 36px;
      background-color: var(--color-fondo);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-texto);
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .social-link:hover {
      background-color: var(--color-acento);
      color: white;
      transform: translateY(-2px);
    }

    /* Stats Section */
    .stats-section {
      background: linear-gradient(135deg, var(--color-acento), #ff7700);
      border-radius: var(--radio-bordes);
      padding: 3rem 2rem;
      color: white;
      text-align: center;
      margin-bottom: 3rem;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 700;
      display: block;
      margin-bottom: 0.5rem;
    }

    .stat-label {
      font-size: 1rem;
      opacity: 0.9;
    }

    /* CTA Section */
    .cta-section {
      background-color: white;
      border-radius: var(--radio-bordes);
      padding: 3rem 2rem;
      text-align: center;
      box-shadow: 0 2px 12px var(--sombra-card);
    }

    .cta-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--color-acento);
      margin-bottom: 1rem;
    }

    .cta-text {
      font-size: 1.1rem;
      color: #6c757d;
      margin-bottom: 2rem;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }

    .cta-button {
      background-color: var(--color-acento);
      color: white;
      padding: 0.875rem 2rem;
      border: none;
      border-radius: var(--radio-bordes);
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .cta-button:hover {
      background-color: #e55a00;
      transform: translateY(-2px);
    }

    /* Footer */
    footer {
      background-color: var(--color-acento);
      color: white;
      padding: 2rem;
      text-align: center;
      margin-top: 4rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-bottom: 1rem;
    }

    .footer-links a {
      color: white;
      text-decoration: none;
      opacity: 0.9;
      transition: opacity 0.2s;
    }

    .footer-links a:hover {
      opacity: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .header-container,
      .nav-container,
      .main-content {
        padding-left: 1rem;
        padding-right: 1rem;
      }

      .page-title {
        font-size: 2rem;
      }

      .team-grid {
        grid-template-columns: 1fr;
      }

      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .footer-links {
        flex-direction: column;
        gap: 1rem;
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
      <a href="<?php echo base_url() ?>admin/VistaCRUD">Dashboard Admin</a>
      
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
