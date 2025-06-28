<?php
// proyectos.php
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Proyectos – Forum de Proyectos</title>
  <!-- Tipografía similar a Scribd -->
    <style>

    </style><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link rel="stylesheet" href="<?= base_url('style/proyectos.css') ?>"/>
  
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

  <!-- Contenido principal: Proyectos -->
  <main class="main-content">
    
    <!-- Filtros de búsqueda -->
    <div class="filters-container">
      <div class="filters-title">
        <i class="fas fa-filter"></i>
        Filtrar Proyectos
      </div>
      <div class="filters-grid">
        <div class="filter-group">
          <label class="filter-label" for="search-input">Buscar por título</label>
          <input 
            type="text" 
            id="search-input" 
            class="filter-input" 
            placeholder="Escribe el nombre del proyecto..."
            onkeyup="applyFilters()"
          />
        </div>
        
        <div class="filter-group">
          <label class="filter-label" for="year-filter">Año</label>
          <select id="year-filter" class="filter-select" onchange="applyFilters()">
            <option value="">Todos los años</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
          </select>
        </div>
        
          
          
        <div class="filter-group">
          <label class="filter-label" for="career-filter">Carrera</label>
          <select id="career-filter" class="filter-select" onchange="applyFilters()">
            <option value="">Todas las carreras</option>
            <option value="Ingeniería Informática">Ingeniería de Informática</option>
            <option value="Ingeniería Marítima">Ingeniería Marítima</option>

          </select>

          <!-- Para agregar carreras a futuro -->

        </div>
      </div>
      
      <div style="margin-top: 1rem; display: flex; justify-content: space-between; align-items: center;">
        <button class="clear-filters-btn" onclick="clearAllFilters()">
          <i class="fas fa-times"></i>
          Limpiar Filtros
        </button>
        <div class="results-count" id="results-count">
          Mostrando todos los proyectos
        </div>
      </div>
    </div>
    
    <div class="projects-container">
      <!-- Botones de navegación -->
      <button class="nav-button prev" onclick="scrollProjects(-1)">
        <i class="fas fa-chevron-left"></i>
      </button>
      <button class="nav-button next" onclick="scrollProjects(1)">
        <i class="fas fa-chevron-right"></i>
      </button>
      
<h2 class="section-title">Proyectos</h2>
<div class="cards-grid" id="projects-scroll">
  
  <?php foreach ($proyectos as $p): ?>
<div class="project-card card"
     data-year="<?= htmlspecialchars($p['anio']) ?>"
     data-career="<?= htmlspecialchars($p['carrera']) ?>"
     data-title="<?= htmlspecialchars(strtolower($p['titulo'])) ?>">


  <a href="<?= site_url('proyectos/visor/' . $p['id']) ?>">  


 <?php
$nombreImagen = isset($p['imagen']) && !empty($p['imagen']) ? htmlspecialchars($p['imagen']) : 'placeholder.jpg';
?>
<img src="<?= base_url('img/proyectos/' . $nombreImagen) ?>" alt="<?= htmlspecialchars($p['titulo']) ?>">

    <div class="card-body">
      <h3 class="card-title"><?= htmlspecialchars($p['titulo']) ?></h3>
      
      <div class="card-meta">
        <div class="meta-item"><i class="fas fa-user"></i> <?= htmlspecialchars($p['autor']) ?></div>
        <div class="meta-item"><i class="fas fa-calendar-alt"></i> <?= htmlspecialchars($p['anio']) ?></div>
        <div class="meta-item"><i class="fas fa-graduation-cap"></i> <?= htmlspecialchars($p['carrera']) ?></div>
      </div>
    </div>
  </a>
</div>

  <?php endforeach; ?>
</div>


      <!-- Mensaje cuando no hay resultados -->
      <div class="no-results" id="no-results" style="display: none;">
        <i class="fas fa-search"></i>
        <h3>No se encontraron proyectos</h3>
        <p>Intenta ajustar los filtros de búsqueda para encontrar más resultados.</p>
      </div>
    </div>
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

  <script>
    // Variables globales para los filtros
    let allProjects = [];
    let filteredProjects = [];

    // Inicializar al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
      initializeProjects();
      updateResultsCount();
    });

    function initializeProjects() {
      const projectCards = document.querySelectorAll('.project-card');
      allProjects = Array.from(projectCards);
      filteredProjects = [...allProjects];
    }

    function applyFilters() {
      const searchTerm = document.getElementById('search-input').value.toLowerCase().trim();
      const selectedYear = document.getElementById('year-filter').value;
      const selectedCareer = document.getElementById('career-filter').value;

      filteredProjects = allProjects.filter(project => {
        const title = project.getAttribute('data-title');
        const year = project.getAttribute('data-year');
        const career = project.getAttribute('data-career');

        // Filtro por título
        const titleMatch = !searchTerm || title.includes(searchTerm);
        
        // Filtro por año
        const yearMatch = !selectedYear || year === selectedYear;
        
        // Filtro por carrera
        const careerMatch = !selectedCareer || career === selectedCareer;

        // Para agregar carreras adicionales a futuro

        return titleMatch && yearMatch && careerMatch;
      });

      displayFilteredProjects();
      updateResultsCount();
    }

    function displayFilteredProjects() {
      const container = document.getElementById('projects-scroll');
      const noResultsDiv = document.getElementById('no-results');

      // Ocultar todos los proyectos
      allProjects.forEach(project => {
        project.style.display = 'none';
      });

      if (filteredProjects.length === 0) {
        // Mostrar mensaje de no resultados
        container.style.display = 'none';
        noResultsDiv.style.display = 'block';
      } else {
        // Mostrar proyectos filtrados
        container.style.display = 'flex';
        noResultsDiv.style.display = 'none';
        
        filteredProjects.forEach(project => {
          project.style.display = 'block';
        });
      }

      // Resetear scroll al inicio
      container.scrollLeft = 0;
    }

    function updateResultsCount() {
      const count = filteredProjects.length;
      const total = allProjects.length;
      const countElement = document.getElementById('results-count');

      if (count === total) {
        countElement.textContent = `Mostrando todos los proyectos (${total})`;
      } else if (count === 0) {
        countElement.textContent = 'No se encontraron proyectos';
      } else {
        countElement.textContent = `Mostrando ${count} de ${total} proyectos`;
      }
    }

    function clearAllFilters() {
      // Limpiar todos los campos de filtro
      document.getElementById('search-input').value = '';
      document.getElementById('year-filter').value = '';
      document.getElementById('career-filter').value = '';

      // Mostrar todos los proyectos
      filteredProjects = [...allProjects];
      displayFilteredProjects();
      updateResultsCount();
    }

    function scrollProjects(direction) {
      const container = document.getElementById('projects-scroll');
      const scrollAmount = 300; // Cantidad de píxeles a desplazar
      
      if (direction === 1) {
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
      } else {
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
      }
    }

    // Opcional: Auto-scroll con las teclas de flecha
    document.addEventListener('keydown', function(e) {
      // Solo funcionar si no estamos escribiendo en un input
      if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'SELECT') {
        if (e.key === 'ArrowLeft') {
          scrollProjects(-1);
        } else if (e.key === 'ArrowRight') {
          scrollProjects(1);
        }
      }
    });

    // Función para búsqueda en tiempo real más fluida
    let searchTimeout;
    document.getElementById('search-input').addEventListener('input', function() {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(applyFilters, 300); // 300ms de delay
    });
  </script>
</body>
</html>

