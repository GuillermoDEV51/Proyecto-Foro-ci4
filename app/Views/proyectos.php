<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Proyectos – Forum de Proyectos</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
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
      <a href="<?= base_url() ?>login" class="login-link"><i class="fas fa-user"></i> Iniciar Sesión</a>
    </div>
  </header>

  <!-- Barra de navegación -->
  <nav>
    <div class="nav-container">
      <a href="<?= base_url() ?>">Inicio</a>
      <a href="<?= base_url() ?>proyectos">Proyectos</a>
      <a href="<?= base_url() ?>ayuda">Ayuda</a>
      <a href="<?= base_url() ?>contacto">Contacto</a>
    </div>
  </nav>

  <!-- Contenido principal: Proyectos -->

<main class="main-content">
  
  <!-- Filtros de búsqueda -->
  <div class="filters-container">
      <div class="filters-title">
          <i class="fas fa-filter"></i> Filtrar Proyectos
      </div>
      <div class="filters-grid">
          <div class="filter-group">
              <label class="filter-label" for="search-input">Buscar por título</label>
              <input 
                  type="text" 
                  id="search-input" 
                  class="filter-input" 
                  placeholder="Escribe el nombre del proyecto..."
                  value="<?= isset($q) ? esc($q) : '' ?>"
                  onkeyup="applyFilters()"
              />
          </div>

          <div class="filter-group">
              <label class="filter-label" for="year-filter">Año</label>
              <select id="year-filter" class="filter-select" onchange="applyFilters()">
                  <option value="">Todos los años</option>
                  <?php for ($year = date('Y'); $year >= 2000; $year--): ?>
                   <option value="<?= $year ?>" <?= (isset($anio) && $anio == $year) ? 'selected' : '' ?>><?= $year ?></option>
                  <?php endfor; ?>
              </select>
          </div>

          <div class="filter-group">
              <label class="filter-label" for="career-filter">Carrera</label>
              <select id="career-filter" class="filter-select" onchange="applyFilters()">
                  <option value="">Todas las carreras</option>
             

<option value="Ingeniería Informática" <?= (isset($carrera) && $carrera == 'Ingeniería Informática') ? 'selected' : '' ?>>Ingeniería de Informática</option>
<option value="Ingeniería Marítima" <?= (isset($carrera) && $carrera == 'Ingeniería Marítima') ? 'selected' : '' ?>>Ingeniería Marítima</option>

              </select>
          </div>
      </div>
  </div>

<!-- Contenedor para el desplazamiento de proyectos -->
<div id="projects-scroll" class="projects-scroll-container">

  <div class="cards-grid">
    <?php if (!empty($proyectos)): ?>
      <?php foreach ($proyectos as $p): ?>
        <div class="project-card card" data-title="<?= strtolower(esc($p['titulo'])) ?>" data-year="<?= esc($p['anio']) ?>" data-career="<?= esc($p['carrera']) ?>">
          <a href="<?= base_url('proyectos/visor/' . $p['id']) ?>">
            <img src="<?= base_url('img/proyectos/' . (isset($p['imagen']) && !empty($p['imagen']) ? $p['imagen'] : 'placeholder.jpg')) ?>" alt="<?= esc($p['titulo']) ?>" loading="lazy">

          </a>
          <div class="card-body">
            <div class="card-title"><?= esc($p['titulo']) ?></div>
            <div class="card-meta">
              Autor: <?= esc($p['autor']) ?> · <?= esc($p['anio']) ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No se encontraron proyectos.</p>
    <?php endif; ?>
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
    let allProjects = [];
    let filteredProjects = [];

    // Inicializar al cargar la página
document.addEventListener('DOMContentLoaded', function() {
  const scrollContainer = document.getElementById('projects-scroll');
  const scrollbar = document.getElementById('scrollbar');
  const cardsGrid = document.querySelector('.cards-grid');

  // Almacenar los valores iniciales
  const totalWidth = cardsGrid.scrollWidth;
  const visibleWidth = scrollContainer.offsetWidth;

  let isScrolling = false;

  // Función para actualizar la barra de desplazamiento
  function updateScrollbar() {
    const totalWidth = cardsGrid.scrollWidth;
    const visibleWidth = scrollContainer.offsetWidth;
    const scrollbarWidth = (visibleWidth / totalWidth) * 100;
    scrollbar.style.width = `${scrollbarWidth}%`;
  }

  function handleScroll() {
    if (!isScrolling) {
      window.requestAnimationFrame(function() {
        const scrollPosition = scrollContainer.scrollLeft;
        const scrollbarPosition = (scrollPosition / (totalWidth - visibleWidth)) * 100;
        scrollbar.style.transform = `translateX(${scrollbarPosition}%)`;
        isScrolling = false;
      });
      isScrolling = true;
    }
  }

  updateScrollbar(); // Inicializa la barra de desplazamiento

  scrollContainer.addEventListener('scroll', handleScroll);
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

    // Generamos el URL con los parámetros de búsqueda
    const url = new URL(window.location.href);
    const params = url.searchParams;

    if (searchTerm) params.set('q', searchTerm);
    else params.delete('q');
    
    if (selectedYear) params.set('anio', selectedYear);
    else params.delete('anio');
    
    if (selectedCareer) params.set('carrera', selectedCareer);
    else params.delete('carrera');
    
    window.history.replaceState(null, '', url);

    // Llamar al servidor para obtener los proyectos filtrados
    fetch(url.toString())
        .then(response => response.text())
        .then(html => {
            document.querySelector('.cards-grid').innerHTML = new DOMParser().parseFromString(html, 'text/html').querySelector('.cards-grid').innerHTML;
        });
        
    // Filtramos los proyectos
    filteredProjects = allProjects.filter(project => {
        const title = project.getAttribute('data-title');
        const year = project.getAttribute('data-year');
        const career = project.getAttribute('data-career');

        const titleMatch = !searchTerm || title.includes(searchTerm);
        const yearMatch = !selectedYear || year === selectedYear;
        const careerMatch = !selectedCareer || career === selectedCareer;

        return titleMatch && yearMatch && careerMatch;
        
    });

    displayFilteredProjects();
    updateResultsCount();
}

    function displayFilteredProjects() {
      const container = document.getElementById('projects-scroll');
      const noResultsDiv = document.getElementById('no-results');

      // Aseguramos que todos los proyectos sean visibles
      allProjects.forEach(project => {
        project.style.display = 'none'; // Inicialmente ocultar todos
      });

      // Mostrar los proyectos filtrados
      if (filteredProjects.length === 0) {
        container.style.display = 'none';
        noResultsDiv.style.display = 'block';
      } else {
        container.style.display = 'flex';
        noResultsDiv.style.display = 'none';
        filteredProjects.forEach(project => {
          project.style.display = 'block'; // Mostrar los proyectos filtrados
        });
      }

      container.scrollLeft = 0; // Restablecer la posición al inicio después de aplicar filtros
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


document.addEventListener('DOMContentLoaded', function() {
    initializeProjects();  // Inicializa los proyectos al cargar la página
});

  const scrollContainer = document.getElementById('projects-scroll');
  const scrollbar = document.getElementById('scrollbar');
  const cardsGrid = document.querySelector('.cards-grid');
  
  function updateScrollbar() {
    const totalWidth = cardsGrid.scrollWidth; 
    const visibleWidth = scrollContainer.offsetWidth; 
    const scrollbarWidth = (visibleWidth / totalWidth) * 100; 
    scrollbar.style.width = `${scrollbarWidth}%`;
  }

  updateScrollbar();

  scrollContainer.addEventListener('scroll', function() {
    const scrollPosition = scrollContainer.scrollLeft;
    const totalWidth = cardsGrid.scrollWidth;
    const visibleWidth = scrollContainer.offsetWidth;
    const scrollbarPosition = (scrollPosition / (totalWidth - visibleWidth)) * 100;
    scrollbar.style.transform = `translateX(${scrollbarPosition}%)`;
  });

    let searchTimeout;
    document.getElementById('search-input').addEventListener('input', function() {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(applyFilters, 300);
    });
  </script>
</body>
</html>
