<?php
// ayuda.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ayuda – Foro de Proyectos</title>
  <!-- Tipografía similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    /* -------------------------------
       Variables de color
       ------------------------------- */
    :root {
      --color-acento: rgb(255, 94, 0);       /* Azul intenso */
      --color-fondo: #f5f5f5;                /* Gris muy claro */
      --color-texto: #333333;                /* Gris oscuro */
      --color-header: #ffffff;               /* Blanco para header */
      --color-nav: #ffffff;                  /* Blanco para nav */
      --color-botones: rgb(255, 94, 0);      /* Azul botones */
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
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
      opacity: 0.5;
      z-index: -1;
    }
    a { text-decoration: none; color: inherit; }
    ul { list-style: none; }

    /* -------------------------------
       Header principal
       ------------------------------- */
    header {
      background-color: var(--color-header);
      border-bottom: 1px solid #e0e0e0;
      position: sticky; top: 0; z-index: 100;
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
       Contenido principal: sección de ayuda
       ------------------------------- */
    .main-content {
      max-width: 800px;
      margin: 2rem auto;
      padding: 0 1rem;
      background-color: #ffffff;
      border-radius: var(--radio-bordes);
      box-shadow: 0 1px 3px var(--sombra-card);
    }
    .section-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin: 1.5rem 0;
      color: var(--color-acento);
      text-align: center;
    }
    .faq-item {
      margin-bottom: 1rem;
    }
    .faq-question {
      font-weight: 600;
      cursor: pointer;
      position: relative;
      padding-right: 20px;
    }
    .faq-question::after {
      content: "\25BC";
      position: absolute;
      right: 0;
      transition: transform 0.2s;
    }
    .faq-answer {
      display: none;
      margin-top: 0.5rem;
      color: var(--color-texto);
      line-height: 1.4;
    }

     /* -------------------------------
       Footer - FIJO EN LA PARTE INFERIOR
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
       Responsive tweaks
       ------------------------------- */
    @media (max-width: 600px) {
      .main-content {
        margin: 1rem;
      }
    }
  </style>
  <script>
    // Toggle para mostrar/ocultar respuestas en FAQ
    document.addEventListener('DOMContentLoaded', function() {
      const questions = document.querySelectorAll('.faq-question');
      questions.forEach(q => {
        q.addEventListener('click', function() {
          const answer = this.nextElementSibling;
          const arrow = this.querySelector('.arrow');
          if (answer.style.display === 'block') {
            answer.style.display = 'none';
            this.querySelector('::after');
          } else {
            answer.style.display = 'block';
          }
        });
      });
    });
  </script>
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


  <!-- Contenido principal: Ayuda / FAQs -->
  <main class="main-content">
    <h2 class="section-title">Ayuda & Preguntas Frecuentes</h2>

    <div class="faq-item">
      <div class="faq-question">¿Quienes suben los proyectos?</div>
      <div class="faq-answer">
        Los proyectos lo suben los moderadores del foro, quienes son responsables de revisar y aprobar cada proyecto antes de su publicación.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">¿Qué formatos de archivos se aceptan?</div>
      <div class="faq-answer">
        Aceptamos documentos en PDF, Word (.doc, .docx) e imágenes (.jpg, .png). El tamaño máximo permitido es de 10 MB por archivo.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">¿Cómo filtro la búsqueda por año o carrera?</div>
      <div class="faq-answer">
        En la sección de búsqueda de la página principal, selecciona el año deseado y/o la carrera correspondiente en los menús desplegables, luego presiona "Buscar".
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">¿Se pueden editar los proyectos después de publicarlos?</div>
      <div class="faq-answer">
        No, los proyectos una vez subidos no pueden ser editados. Si necesitas hacer cambios, por favor contacta a un moderador del foro para discutir las modificaciones necesarias.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">¿Cómo contacto al soporte técnico?</div>
      <div class="faq-answer">
        Puedes enviar un correo a <a href="mailto:soporte@forodeproyectos.com">soporte@forodeproyectos.com</a> o utilizar nuestro formulario de contacto en la sección "Contacto".
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h3>Acerca de</h3>
        <ul>
          <li><a href="nuestramisionusuario.php">Nuestra Misión</a></li>
          <li><a href="equipousuario.php">Equipo</a></li>
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