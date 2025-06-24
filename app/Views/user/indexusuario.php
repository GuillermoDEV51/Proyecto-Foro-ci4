<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forum de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="<?php echo base_url() ?>style/EstilosUser/IndexUsuario.css" rel="stylesheet">

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
      <a href="indexusuario.php">Inicio</a>
      <a href="proyectosusuario.php">Proyectos</a>
      <a href="ayudausuario.php">Ayuda</a>
      <a href="contactousuario.php">Contacto</a>
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

  <!-- Contenido principal: Documentos Destacados -->
  <main class="main-content">
    <h2 class="section-title">Documentos Destacados</h2>
    <div class="cards-grid">
      <!-- Card 1 -->
      <div class="card">
        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" alt="Documento 1" />
        <div class="card-body">
          <div class="card-title">Título del Documento 1</div>
          <div class="card-meta">Autor: Juan Pérez · 2024</div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="card">
        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" alt="Documento 2" />
        <div class="card-body">
          <div class="card-title">Título del Documento 2</div>
          <div class="card-meta">Autor: María López · 2023</div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="card">
        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" alt="Documento 3" />
        <div class="card-body">
          <div class="card-title">Título del Documento 3</div>
          <div class="card-meta">Autor: Luis García · 2022</div>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="card">
        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" alt="Documento 4" />
        <div class="card-body">
          <div class="card-title">Título del Documento 4</div>
          <div class="card-meta">Autor: Ana Torres · 2021</div>
        </div>
      </div>
      <!-- Card 5 -->
      <div class="card">
        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" alt="Documento 5" />
        <div class="card-body">
          <div class="card-title">Título del Documento 5</div>
          <div class="card-meta">Autor: Carlos Mendoza · 2020</div>
        </div>
      </div>
      <!-- Card 6 -->
      <div class="card">
        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" alt="Documento 6" />
        <div class="card-body">
          <div class="card-title">Título del Documento 6</div>
          <div class="card-meta">Autor: Sofía Ramírez · 2019</div>
        </div>
      </div>
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