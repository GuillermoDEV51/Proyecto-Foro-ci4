<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forum de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>boostra/js/bootstrap.bundle.min.js"></script>
  <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>style/home.css" rel="stylesheet">

</head>

<body>
  
  <!-- Header principal -->
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="<?php echo base_url() ?>img\LOGOFP.png" alt="LOGOFP" />
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
      <a href="<?php echo base_url() ?>DashbordAdmin">Admin</a>
      
     <?php $role = session()->get('role'); ?>
<?php if ($role === 'admin'): ?>

    <!-- Opciones para admin -->

    <a href="<?php echo base_url() ?>DashbordAdmin">Admin</a>


<?php elseif ($role === 'estudiante'): ?>

    <!-- Opciones para estudiante -->

<?php else: ?>

    <!-- Opciones para visitante -->
     
<?php endif; ?>



    </div>
  </nav>

  <!-- Sección de búsqueda -->
  <section class="search-section">
    <div class="search-container">
      <input type="text" placeholder="Buscar documentos, tesis, proyectos..." />
      <select>
        <option value="">Seleccionar Año</option>
        <?php
          for ($year = date('Y'); $year >= 2000; $year--) {
            echo "<option value='$year'>$year</option>";
          }
        ?>
      </select>
      <select>
        <option value="">Carrera</option>
        <option value="informatica">Informática</option>
        <option value="maritima">Marítima</option>
        <option value="ambiental">Ambiental</option>
        <option value="turismo">Turismo</option>
        <option value="administracion">Administración</option>
      </select>
      <button type="button"><i class="fas fa-search"></i> Buscar</button>
    </div>
  </section>

<main class="main-content">
  <h2 class="section-title">Documentos Destacados</h2>
  <div class="cards-grid">
    <?php foreach ($destacados as $doc): ?>
      <div class="card">
        <a href="<?= base_url('proyectos/visor/' . $doc['id']) ?>">
          <img src="<?= esc($doc['imagen']) ?>" alt="<?= esc($doc['titulo']) ?>" />
        </a>
        <div class="card-body">
          <div class="card-title"><?= esc($doc['titulo']) ?></div>
          <div class="card-meta">Autor: <?= esc($doc['autor']) ?> · <?= esc($doc['anio']) ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>


    <!-- Sección de frases motivacionales respecto al estudio -->
    <section class="motivational-quotes">
      <h2>Siempre aprende más</h2>
      <div class="quotes-list">
        <div class="quote-item">
          "El aprendizaje es un tesoro que seguirá a su dueño a todas partes." – Proverbio chino
        </div>
        <div class="quote-item">
          "La educación no es preparación para la vida; la educación es la vida misma." – John Dewey
        </div>
        <div class="quote-item">
          "No te rindas. Sufre ahora y vive el resto de tu vida como un campeón." – Muhammad Ali
        </div>
        <div class="quote-item">
          "La inversión en conocimiento paga el mejor interés." – Benjamin Franklin
        </div>
      </div>
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