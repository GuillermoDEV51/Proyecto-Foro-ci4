<?php
// ayuda.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ayuda – Foro de Proyectos</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>style/ayuda.css" rel="stylesheet">

  

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const questions = document.querySelectorAll('.faq-question');

    questions.forEach(q => {
      q.addEventListener('click', function () {
        const item = this.closest('.faq-item');
        item.classList.toggle('active');
      });
    });
  });
</script>


</head>

<body>
  <!-- Header principal -->
  <header>
    <div class="header-container">
    <a href="<?= base_url() ?>" class="logo">
      <img src="<?= base_url() ?>img/LOGOFP.png" alt="LOGOFP" />
      <span>Foro de Proyectos</span>
    </a>
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
          <li><a href="nuestramision.php">Nuestra Misión</a></li>
          <li><a href="equipo.php">Equipo</a></li>
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
      <p>&copy; 2025 Foro de Proyectos. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>
