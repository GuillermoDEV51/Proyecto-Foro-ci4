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

  <style>
    /* -------------------------------
       Variables de color
       ------------------------------- */
    :root {
      --color-acento: rgb(255, 94, 0);       /* Naranja intenso */
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
      background: url('https://images.unsplash.com/photo-1532012197267-da84d127e765') center/cover no-repeat;
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
       Contenido principal: sección de proyectos
       ------------------------------- */
    .main-content {
      max-width: 1100px;
      margin: 2rem auto;
      padding: 0 1rem;
      flex: 1;
    }
    .section-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--color-acento);
      text-align: center;
    }

    /* -------------------------------
       Filtros de búsqueda
       ------------------------------- */
    .filters-container {
      background: #fff;
      border-radius: var(--radio-bordes);
      box-shadow: 0 2px 4px var(--sombra-card);
      padding: 1.5rem;
      margin-bottom: 2rem;
    }

    .filters-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--color-texto);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .filters-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 1rem;
      align-items: end;
    }

    .filter-group {
      display: flex;
      flex-direction: column;
    }

    .filter-label {
      font-size: 0.9rem;
      font-weight: 500;
      color: var(--color-texto);
      margin-bottom: 0.5rem;
    }

    .filter-select, .filter-input {
      padding: 0.6rem 0.8rem;
      border: 2px solid #e0e0e0;
      border-radius: var(--radio-bordes);
      font-size: 0.9rem;
      background: #fff;
      transition: border-color 0.2s;
      font-family: inherit;
    }

    .filter-select:focus, .filter-input:focus {
      outline: none;
      border-color: var(--color-acento);
    }

    .clear-filters-btn {
      background: var(--color-acento);
      color: white;
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: var(--radio-bordes);
      font-size: 0.9rem;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.2s, transform 0.1s;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      justify-self: start;
    }

    .clear-filters-btn:hover {
      background: #e55a00;
      transform: translateY(-1px);
    }

    .results-count {
      text-align: center;
      color: #666;
      font-size: 0.9rem;
      margin-bottom: 1rem;
      font-style: italic;
    }

    .no-results {
      text-align: center;
      padding: 3rem 1rem;
      color: #666;
    }

    .no-results i {
      font-size: 3rem;
      color: #ccc;
      margin-bottom: 1rem;
    }
    
    /* -------------------------------
       Proyectos en formato horizontal
       ------------------------------- */
    .projects-container {
      position: relative;
      margin-top: 1rem;
    }
    
    .projects-horizontal {
      display: flex;
      gap: 1rem;
      overflow-x: auto;
      padding: 1rem 0;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
    }
    
    /* Estilo para la scrollbar */
    .projects-horizontal::-webkit-scrollbar {
      height: 8px;
    }
    
    .projects-horizontal::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 4px;
    }
    
    .projects-horizontal::-webkit-scrollbar-thumb {
      background: var(--color-acento);
      border-radius: 4px;
    }
    
    .projects-horizontal::-webkit-scrollbar-thumb:hover {
      background: #e55a00;
    }
    
    .project-card {
      background-color: #fff;
      border-radius: var(--radio-bordes);
      box-shadow: 0 1px 3px var(--sombra-card);
      overflow: hidden;
      transition: transform 0.2s, box-shadow 0.2s;
      flex: 0 0 280px; /* Ancho fijo para las tarjetas */
      min-height: 320px;
    }
    
    .project-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 8px var(--sombra-card);
    }
    
    .project-card img {
      width: 100%;
      display: block;
      height: 180px;
      object-fit: cover;
    }
    
    .project-body {
      padding: 1rem;
    }
    
    .project-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: var(--color-texto);
      line-height: 1.3;
    }
    
    .project-meta {
      font-size: 0.9rem;
      color: #666;
      line-height: 1.4;
    }
    
    /* Botones de navegación (opcional) */
    .nav-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: var(--color-acento);
      color: white;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 1.2rem;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.2s;
      z-index: 10;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    
    .nav-button:hover {
      background: #e55a00;
    }
    
    .nav-button.prev {
      left: -20px;
    }
    
    .nav-button.next {
      right: -20px;
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
       Responsive tweaks
       ------------------------------- */
    @media (max-width: 768px) {
      .project-card {
        flex: 0 0 250px;
      }
      
      .nav-button {
        display: none; /* Ocultar botones en móvil */
      }

      .filters-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      .clear-filters-btn {
        justify-self: stretch;
        justify-content: center;
      }
    }
    
    @media (max-width: 480px) {
      .project-card {
        flex: 0 0 220px;
      }
      
      .main-content {
        padding: 0 0.5rem;
      }
      
      .projects-horizontal {
        padding: 1rem 0.5rem;
      }

      .filters-container {
        padding: 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Header principal -->
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="LOGOFP.png" alt="Logo Foro de Proyectos" />
        <span>Foro de Proyectos</span>
      </div>
      <a href="login.php" class="login-link"><i class="fas fa-user"></i> Iniciar Sesión</a>
    </div>
  </header>

   <!-- Barra de navegación -->
  <nav>
    <div class="nav-container">
      <a href="index.php">Inicio</a>
      <a href="proyectos.php">Proyectos</a>
      <a href="ayuda.php">Ayuda</a>
      <a href="contacto.php">Contacto</a>
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