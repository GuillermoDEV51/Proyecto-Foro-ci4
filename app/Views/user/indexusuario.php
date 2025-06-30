<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forum de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>style/EstilosUser/home.css" rel="stylesheet">

</head>

<body>
  
  <!-- Header principal -->
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

  <!-- Sección de búsqueda -->
  <section class="search-section">
<form class="search-container" method="GET" action="<?= base_url('proyectos') ?>">
    <input type="text" name="q" value="<?= isset($q) ? esc($q) : '' ?>" placeholder="Buscar proyectos..." />
    <select name="anio">
        <option value="">Seleccionar Año</option>
        <?php for ($year = date('Y'); $year >= 2000; $year--): ?>
            <option value="<?= $year ?>" <?= (isset($anio) && $anio == $year) ? 'selected' : '' ?>><?= $year ?></option>
        <?php endfor; ?>
    </select>
    <select name="carrera">
        <option value="">Carrera</option>
        <option value="informatica" <?= (isset($carrera) && $carrera == 'informatica') ? 'selected' : '' ?>>Ingeniería Informática</option>
        <option value="maritima" <?= (isset($carrera) && $carrera == 'maritima') ? 'selected' : '' ?>>Ingeniería Marítima</option>
    </select>
    <button type="submit"><i class="fas fa-search"></i> Buscar</button>
</form>

  </section>

<script>
  function clearFilters() {
    // Limpiar los valores de los filtros
    document.querySelector('input[name="q"]').value = '';
    document.querySelector('select[name="anio"]').value = '';
    document.querySelector('select[name="carrera"]').value = '';

    // Redirigir a la página de proyectos sin filtros
    window.location.href = '<?= base_url('proyectos') ?>';
  }

  // Script para recargar la página completamente al hacer una búsqueda con filtros
  document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.querySelector('input[name="q"]');
      const yearSelect = document.querySelector('select[name="anio"]');
      const careerSelect = document.querySelector('select[name="carrera"]');
      const searchButton = document.querySelector('button[type="submit"]'); // Botón de búsqueda

      // Aquí quitamos los event listeners automáticos para que no se active la búsqueda al escribir
      // searchInput.addEventListener('input', function() {
      //     applyFilters();
      // });
      // yearSelect.addEventListener('change', function() {
      //     applyFilters();
      // });
      // careerSelect.addEventListener('change', function() {
      //     applyFilters();
      // });

      searchButton.addEventListener('click', function(event) {
          event.preventDefault();  // Evita el envío automático del formulario
          applyFilters();  // Llama a la función solo cuando se haga clic en "Buscar"
      });

      function applyFilters() {
          const query = searchInput.value;
          const year = yearSelect.value;
          const career = careerSelect.value;

          // Construir la URL de la búsqueda
          let url = '<?= base_url('proyectos') ?>?';
          if (query) url += 'q=' + encodeURIComponent(query) + '&';
          if (year) url += 'anio=' + encodeURIComponent(year) + '&';
          if (career) url += 'carrera=' + encodeURIComponent(career) + '&';

          // Recargar la página con los filtros aplicados
          window.location.href = url;
      }
  });
</script>


  <main class="main-content">
    <!-- Sección de documentos destacados -->
    <h2 class="section-title">Documentos Destacados</h2>
    <div class="cards-grid">
        <?php if (!empty($destacados)): ?>
            <?php foreach ($destacados as $doc): ?>
                <div class="card">
                    <a href="<?= base_url('proyectos/visor/' . $doc['id']) ?>">
                        <img src="<?= base_url('img/proyectos/' . $doc['imagen']) ?>" alt="<?= esc($doc['titulo']) ?>">
                    </a>
                    <div class="card-body">
                        <div class="card-title"><?= esc($doc['titulo']) ?></div>
                        <div class="card-meta">
                            Autor: <?= esc($doc['autor']) ?> · <?= esc($doc['anio']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se encontraron proyectos destacados.</p>
        <?php endif; ?>
    </div>

    <!-- Sección para proyectos encontrados -->
    <h2 class="section-title"> </h2>
    <div class="cards-grid">
        <?php if (!empty($proyectos)): ?>
            <?php foreach ($proyectos as $doc): ?>
                <div class="card">
                    <a href="<?= base_url('proyectos/visor/' . $doc['id']) ?>">
                        <img src="<?= base_url('img/proyectos/' . $doc['imagen']) ?>" alt="<?= esc($doc['titulo']) ?>">
                    </a>
                    <div class="card-body">
                        <div class="card-title"><?= esc($doc['titulo']) ?></div>
                        <div class="card-meta">
                            Autor: <?= esc($doc['autor']) ?> · <?= esc($doc['anio']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Solo mostrar este mensaje si se ha realizado una búsqueda -->
            <?php if (isset($q) || isset($anio) || isset($carrera)): ?>
                <p>No se encontraron proyectos que coincidan con los filtros.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
  </main>

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
    </div>
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
    <p>&copy; 2025 Foro de Proyectos. Todos los derechos reservados.</p>
  </div>
</footer>
</body>
</html>
