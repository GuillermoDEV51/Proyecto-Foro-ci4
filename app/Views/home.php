<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forum de Proyectos</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>boostrap/js/bootstrap.bundle.min.js"></script>
  <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>style/home.css" rel="stylesheet">

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
    <form class="search-container" method="GET" action="<?= base_url('proyectos') ?>"> <!-- Aquí apuntamos a la página de proyectos -->
        <input type="text" name="q" value="<?= isset($q) ? esc($q) : '' ?>" placeholder="Buscar proyectos..." />

        <select name="anio">
            <option value="">Seleccionar Año</option>
            <?php for ($year = date('Y'); $year >= 2000; $year--): ?>
                <option value="<?= $year ?>" <?= (isset($anio) && $anio == $year) ? 'selected' : '' ?>><?= $year ?></option>
            <?php endfor; ?>
        </select>

        <select name="carrera">
            <option value="">Carrera</option>
            <option value="informatica" <?= (isset($carrera) && $carrera == 'informatica') ? 'selected' : '' ?>>Ingenieria Informática</option>
            <option value="maritima" <?= (isset($carrera) && $carrera == 'maritima') ? 'selected' : '' ?>>Ingenieria Marítima</option>
        </select>

        <button type="submit"><i class="fas fa-search"></i> Buscar</button>
    </form>
</section>


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




<!--<section class="cards-grid">
  <div class="card">
    <img src="imagen1.jpg" alt="Documento 1">
    <div class="card-body">
      <h3 class="card-title">Tecnología Digital</h3>
      <p class="card-meta">Autor: Ana Laura Rivoir · 2024</p>
    </div>
  </div>

  <div class="card">
    <img src="imagen2.jpg" alt="Documento 2">
    <div class="card-body">
      <h3 class="card-title">Optimización de Procesos Industriales</h3>
      <p class="card-meta">Autor: Jeyson Patricio Egas García · 2023</p>
    </div>
  </div>

  <div class="card">
    <img src="imagen3.jpg" alt="Documento 3">
    <div class="card-body">
      <h3 class="card-title">Algoritmos Genéticos Aplicados</h3>
      <p class="card-meta">Autor: ...</p>
    </div>
  </div>
</section>
-->
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
<li><a href="<?= base_url('nuestramision') ?>">Nuestra Misión</a></li>
<li><a href="<?= base_url('equipo') ?>">Equipo</a></li>
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