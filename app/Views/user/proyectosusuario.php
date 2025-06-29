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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>/style/EstilosUser/proyectosusuario.css"/>

  <style>
    
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
            <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
            <option value="Administración">Administración</option>
            <option value="Diseño Gráfico">Diseño Gráfico</option>
            <option value="Marketing">Marketing</option>
            <option value="Arquitectura">Arquitectura</option>
          </select>
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
      
      <div class="projects-horizontal" id="projects-scroll">
        <?php
          // Ejemplo estático de proyectos con más datos.
          $proyectos = [
            [
              'titulo' => 'Sistema de Gestión Académica',
              'autor'  => 'Laura Gómez',
              'anio'   => 2024,
              'carrera' => 'Ingeniería de Sistemas',
              'imagen' => 'https://source.unsplash.com/collection/190731/300x200'
            ],
            [
              'titulo' => 'Optimización de Procesos Industriales',
              'autor'  => 'Carlos Méndez',
              'anio'   => 2023,
              'carrera' => 'Ingeniería Industrial',
              'imagen' => 'https://source.unsplash.com/collection/190732/300x200'
            ],
            [
              'titulo' => 'Identidad Visual Corporativa',
              'autor'  => 'Ana Torres',
              'anio'   => 2022,
              'carrera' => 'Diseño Gráfico',
              'imagen' => 'https://source.unsplash.com/collection/190733/300x200'
            ],
            [
              'titulo' => 'Plan de Marketing Digital',
              'autor'  => 'Luis Ramírez',
              'anio'   => 2021,
              'carrera' => 'Marketing',
              'imagen' => 'https://source.unsplash.com/collection/190734/300x200'
            ],
            [
              'titulo' => 'Aplicación Web de E-commerce',
              'autor'  => 'María González',
              'anio'   => 2024,
              'carrera' => 'Ingeniería de Sistemas',
              'imagen' => 'https://source.unsplash.com/collection/190735/300x200'
            ],
            [
              'titulo' => 'Análisis Financiero Empresarial',
              'autor'  => 'Pedro Martínez',
              'anio'   => 2023,
              'carrera' => 'Administración',
              'imagen' => 'https://source.unsplash.com/collection/190736/300x200'
            ],
            [
              'titulo' => 'Diseño Arquitectónico Sostenible',
              'autor'  => 'Sofia Vargas',
              'anio'   => 2024,
              'carrera' => 'Arquitectura',
              'imagen' => 'https://source.unsplash.com/collection/190737/300x200'
            ],
            [
              'titulo' => 'Sistema de Control de Calidad',
              'autor'  => 'Miguel Angel',
              'anio'   => 2022,
              'carrera' => 'Ingeniería Industrial',
              'imagen' => 'https://source.unsplash.com/collection/190738/300x200'
            ],
            [
              'titulo' => 'Campaña Publicitaria Integral',
              'autor'  => 'Valentina Cruz',
              'anio'   => 2023,
              'carrera' => 'Marketing',
              'imagen' => 'https://source.unsplash.com/collection/190739/300x200'
            ],
            [
              'titulo' => 'Portfolio Digital Interactivo',
              'autor'  => 'Diego Morales',
              'anio'   => 2021,
              'carrera' => 'Diseño Gráfico',
              'imagen' => 'https://source.unsplash.com/collection/190740/300x200'
            ]
          ];

          foreach ($proyectos as $p) {
            echo '
            <div class="project-card" data-year="' . htmlspecialchars($p['anio']) . '" data-career="' . htmlspecialchars($p['carrera']) . '" data-title="' . htmlspecialchars(strtolower($p['titulo'])) . '">
              <img src="' . htmlspecialchars($p['imagen']) . '" alt="' . htmlspecialchars($p['titulo']) . '" />
              <div class="project-body">
                <div class="project-title">' . htmlspecialchars($p['titulo']) . '</div>
                <div class="project-meta">
                  <div><strong>Autor:</strong> ' . htmlspecialchars($p['autor']) . '</div>
                  <div><strong>Año:</strong> ' . htmlspecialchars($p['anio']) . '</div>
                  <div><strong>Carrera:</strong> ' . htmlspecialchars($p['carrera']) . '</div>
                </div>
              </div>
            </div>
            ';
          }
        ?>
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
          <li><a href="nuestramision.php">Nuestra Misión</a></li>
          <li><a href="equipo.php">Equipo</a></li>
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