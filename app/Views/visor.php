<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Visor de PDFs - Forum de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  
  <!-- PDF.js Library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

  <style>
    /* -------------------------------
       Variables de color
       ------------------------------- */
    :root {
      --color-acento: rgb(255, 94, 0);
      --color-fondo: #f5f5f5;
      --color-texto: #333333;
      --color-header: #ffffff;
      --color-nav: #ffffff;
      --color-botones: rgb(255, 94, 0);
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
    }
    a {
      text-decoration: none;
      color: inherit;
    }
    ul {
      list-style: none;
    }

    /* -------------------------------
       Header principal
       ------------------------------- */
    header {
      background-color: var(--color-header);
      border-bottom: 1px solid #e0e0e0;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 4px var(--sombra-card);
    }
    .header-container {
      max-width: 1200px;
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
    .header-actions {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .btn-back {
      background-color: var(--color-botones);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: var(--radio-bordes);
      font-size: 0.9rem;
      transition: background-color 0.2s;
    }
    .btn-back:hover {
      background-color: rgb(230, 85, 0);
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
       Contenedor principal del visor
       ------------------------------- */
    .viewer-container {
      flex: 1;
      display: flex;
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
      min-height: calc(100vh - 120px);
      background-color: white;
      box-shadow: 0 2px 8px var(--sombra-card);
      border-radius: var(--radio-bordes);
      overflow: hidden;
      margin-top: 1rem;
      margin-bottom: 1rem;
    }

    /* -------------------------------
       Panel lateral de información
       ------------------------------- */
    .info-panel {
      width: 320px;
      background-color: #fafafa;
      border-right: 1px solid #e0e0e0;
      padding: 1.5rem;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }
    
    .document-info {
      background-color: white;
      padding: 1.5rem;
      border-radius: var(--radio-bordes);
      box-shadow: 0 1px 3px var(--sombra-card);
    }
    
    .document-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--color-texto);
      margin-bottom: 1rem;
      line-height: 1.4;
    }
    
    .document-meta {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }
    
    .meta-item {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.9rem;
      color: #666;
    }
    
    .meta-item i {
      color: var(--color-acento);
      width: 16px;
    }
    
    .document-description {
      background-color: white;
      padding: 1.5rem;
      border-radius: var(--radio-bordes);
      box-shadow: 0 1px 3px var(--sombra-card);
    }
    
    .description-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 0.75rem;
      color: var(--color-texto);
    }
    
    .description-text {
      font-size: 0.9rem;
      line-height: 1.6;
      color: #555;
    }
    
    .action-buttons {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }
    
    .btn {
      padding: 0.75rem 1rem;
      border: none;
      border-radius: var(--radio-bordes);
      font-size: 0.9rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    
    .btn-primary {
      background-color: var(--color-botones);
      color: white;
    }
    
    .btn-primary:hover {
      background-color: rgb(230, 85, 0);
    }
    
    .btn-secondary {
      background-color: transparent;
      color: var(--color-texto);
      border: 1px solid #ddd;
    }
    
    .btn-secondary:hover {
      background-color: #f5f5f5;
    }

    /* -------------------------------
       Visor PDF principal
       ------------------------------- */
    .pdf-viewer {
      flex: 1;
      display: flex;
      flex-direction: column;
      background-color: #f8f9fa;
    }
    
    .pdf-toolbar {
      background-color: white;
      border-bottom: 1px solid #e0e0e0;
      padding: 0.75rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
    }
    
    .toolbar-left {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .toolbar-right {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .page-controls {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.9rem;
    }
    
    .page-input {
      width: 60px;
      padding: 0.25rem 0.5rem;
      border: 1px solid #ddd;
      border-radius: 3px;
      text-align: center;
      font-size: 0.9rem;
    }
    
    .zoom-controls {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .zoom-value {
      min-width: 50px;
      text-align: center;
      font-size: 0.9rem;
      font-weight: 500;
    }
    
    .toolbar-btn {
      background-color: transparent;
      border: 1px solid #ddd;
      color: var(--color-texto);
      padding: 0.5rem;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.2s;
      font-size: 0.9rem;
      min-width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .toolbar-btn:hover {
      background-color: #f5f5f5;
      border-color: var(--color-acento);
    }
    
    .toolbar-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }
    
    .pdf-canvas-container {
      flex: 1;
      overflow: auto;
      padding: 2rem;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      background-color: #e9ecef;
      position: relative;
    }
    
    /* Estilos para pantalla completa del PDF */
    .pdf-canvas-container:fullscreen {
      background-color: #000;
      padding: 1rem;
    }
    
    .pdf-canvas-container:-webkit-full-screen {
      background-color: #000;
      padding: 1rem;
    }
    
    .pdf-canvas-container:-moz-full-screen {
      background-color: #000;
      padding: 1rem;
    }
    
    .pdf-canvas-container:-ms-fullscreen {
      background-color: #000;
      padding: 1rem;
    }
    
   .pdf-canvas {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 4px;
  background-color: white;
  max-width: none; /* Cambiar de 100% a none */
  height: auto;
  display: block;
  margin: 0 auto;
}
    
    .loading-message {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      color: #666;
      font-size: 1.1rem;
    }
    
    .loading-spinner {
      width: 40px;
      height: 40px;
      border: 4px solid #f3f3f3;
      border-top: 4px solid var(--color-acento);
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin-bottom: 1rem;
    }

    .pdf-canvas-container::before {
  content: "Mantén Ctrl + rueda del ratón para hacer zoom";
  position: absolute;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  font-size: 0.8rem;
  opacity: 0;
  transition: opacity 0.3s;
  pointer-events: none;
  z-index: 10;
}

.pdf-canvas-container:hover::before {
  opacity: 1;
}
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* -------------------------------
       Responsive Design
       ------------------------------- */
    @media (max-width: 768px) {
      .viewer-container {
        flex-direction: column;
        margin: 0.5rem;
      }
      
      .info-panel {
        width: 100%;
        max-height: 300px;
        order: 2;
      }
      
      .pdf-viewer {
        order: 1;
        min-height: 60vh;
      }
      
      .pdf-toolbar {
        flex-direction: column;
        gap: 0.5rem;
      }
      
      .toolbar-left,
      .toolbar-right {
        width: 100%;
        justify-content: center;
      }
      
      .pdf-canvas-container {
        padding: 1rem;
      }
    }
    
    @media (max-width: 480px) {
      .header-container {
        padding: 0.5rem;
      }
      
      .logo span {
        font-size: 1.2rem;
      }
      
      .info-panel {
        padding: 1rem;
      }
      
      .document-info,
      .document-description {
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
        <img src="<?php echo base_url() ?>img/LOGOFP.png" alt="LOGOFP" />
        <span>Foro de Proyectos</span>
      </div>
      <div class="header-actions">
        <a href="index.php" class="btn-back">
          <i class="fas fa-arrow-left"></i> Volver al Inicio
        </a>
        <a href="login.php" class="login-link">
          <i class="fas fa-user"></i> Iniciar Sesión
        </a>
      </div>
    </div>
  </header>

  <!-- Contenedor principal del visor -->
  <div class="viewer-container">
    <!-- Panel lateral de información -->
    <aside class="info-panel">
      <div class="document-info">
        <h1 class="document-title" id="documentTitle">
          Cargando documento...
        </h1>
        <div class="document-meta">
          <div class="meta-item">
            <i class="fas fa-user"></i>
            <span id="documentAuthor">Autor no disponible</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-calendar"></i>
            <span id="documentDate">Fecha no disponible</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-graduation-cap"></i>
            <span id="documentCareer">Carrera no disponible</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-file-pdf"></i>
            <span id="documentPages">-- páginas</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-download"></i>
            <span id="documentSize">Tamaño no disponible</span>
          </div>
        </div>
      </div>
      
      <div class="document-description">
        <h3 class="description-title">Descripción</h3>
        <p class="description-text" id="documentDescription">
          Cargando descripción del documento...
        </p>
      </div>
    
    </aside>

    <!-- Visor PDF principal -->
    <main class="pdf-viewer">
      <div class="pdf-toolbar">
        <div class="toolbar-left">
          <div class="page-controls">
            <button class="toolbar-btn" id="prevPage" onclick="previousPage()">
              <i class="fas fa-chevron-left"></i>
            </button>
            <input type="number" class="page-input" id="pageInput" min="1" onchange="goToPage()">
            <span>de <span id="totalPages">--</span></span>
            <button class="toolbar-btn" id="nextPage" onclick="nextPage()">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>
        
        <div class="toolbar-right">
          <div class="zoom-controls">
            <button class="toolbar-btn" onclick="zoomOut()">
              <i class="fas fa-minus"></i>
            </button>
            <span class="zoom-value" id="zoomValue">100%</span>
            <button class="toolbar-btn" onclick="zoomIn()">
              <i class="fas fa-plus"></i>
            </button>
            <button class="toolbar-btn" onclick="fitToWidth()">
              <i class="fas fa-arrows-alt-h"></i>
            </button>
            <button class="toolbar-btn" onclick="toggleFullscreen()">
              <i class="fas fa-expand"></i>
            </button>
          </div>
        </div>
      </div>
      
      <div class="pdf-canvas-container" id="pdfContainer">
        <div class="loading-message">
          <div class="loading-spinner"></div>
          <p>Cargando documento PDF...</p>
          <p style="font-size: 0.9rem; margin-top: 0.5rem; color: #888;">
            Por favor, espere mientras se procesa el archivo.
          </p>
        </div>
      </div>
    </main>
  </div>

  <script>
    // Variables globales para PDF.js
    let pdfDoc = null;
    let pageNum = 1;
    let pageIsRendering = false;
    let pageNumIsPending = null;
    let scale = 1.0;
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const MAX_PAGES_ALLOWED = 7; // Limitación de páginas para vista previa
    
    // Configurar PDF.js worker
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    // Función para cargar PDF (simulación - aquí conectarías con tu base de datos)
    async function loadPDF() {
      try {
        // Simular carga de datos del documento desde la base de datos
        const documentData = await fetchDocumentData();
        
        // Actualizar información del documento
        updateDocumentInfo(documentData);
        
        // Cargar PDF desde base64 o URL
        const loadingTask = pdfjsLib.getDocument(documentData.pdfUrl || documentData.pdfBase64);
        pdfDoc = await loadingTask.promise;
        
        // Limitar páginas disponibles para vista previa
        const totalPages = pdfDoc.numPages;
        const availablePages = Math.min(totalPages, MAX_PAGES_ALLOWED);
        
        // Actualizar total de páginas (mostrar limitación)
        const pagesText = totalPages > MAX_PAGES_ALLOWED 
          ? `${availablePages} de ${totalPages} (Vista previa)`
          : `${availablePages} páginas`;
        
        document.getElementById('totalPages').textContent = availablePages;
        document.getElementById('pageInput').max = availablePages;
        document.getElementById('documentPages').textContent = pagesText;
        
        // Mostrar mensaje de limitación si es necesario
        if (totalPages > MAX_PAGES_ALLOWED) {
          showPreviewLimitation(totalPages);
        }
        
        // Renderizar primera página
        renderPage(pageNum);
        
        // Habilitar controles
        updatePageControls();
        
      } catch (error) {
        console.error('Error cargando PDF:', error);
        showError('Error al cargar el documento PDF');
      }
    }

    // Función simulada para obtener datos del documento
    async function fetchDocumentData() {
      // Aquí harías la consulta real a tu base de datos
      // return await fetch('/api/documento/' + documentId).then(r => r.json());
      
      // Datos simulados
      return {
        title: "Análisis de Sistemas de Información Gerencial",
        author: "María González Rodríguez",
        date: "2024",
        career: "Ingeniería en Informática",
        description: "Este documento presenta un análisis exhaustivo de los sistemas de información gerencial en empresas medianas, enfocándose en la implementación de soluciones tecnológicas que optimicen los procesos de toma de decisiones.",
        size: "2.5 MB",
        // En producción, aquí tendrías la URL del PDF o el base64
        pdfUrl: "https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf" // PDF de ejemplo
      };
    }

    // Actualizar información del documento en el panel lateral
    function updateDocumentInfo(data) {
      document.getElementById('documentTitle').textContent = data.title;
      document.getElementById('documentAuthor').textContent = data.author;
      document.getElementById('documentDate').textContent = data.date;
      document.getElementById('documentCareer').textContent = data.career;
      document.getElementById('documentDescription').textContent = data.description;
      document.getElementById('documentSize').textContent = data.size;
    }

    // Renderizar página específica
    async function renderPage(num) {
      if (pageIsRendering) {
        pageNumIsPending = num;
        return;
      }
      
      pageIsRendering = true;
      
      try {
        const page = await pdfDoc.getPage(num);
        const viewport = page.getViewport({ scale: scale });
        
  canvas.height = viewport.height;
canvas.width = viewport.width;
canvas.style.width = viewport.width + 'px';
canvas.style.height = viewport.height + 'px';
        
        const renderContext = {
          canvasContext: ctx,
          viewport: viewport
        };
        
        await page.render(renderContext).promise;
        
        // Reemplazar contenido del contenedor
        const container = document.getElementById('pdfContainer');
        container.innerHTML = '';
        canvas.className = 'pdf-canvas';
        container.appendChild(canvas);
        
        pageNum = num;
        document.getElementById('pageInput').value = num;
        
        pageIsRendering = false;
        
        if (pageNumIsPending !== null) {
          renderPage(pageNumIsPending);
          pageNumIsPending = null;
        }
        
        updatePageControls();
        
      } catch (error) {
        console.error('Error renderizando página:', error);
        pageIsRendering = false;
      }
    }

    // Control de páginas
    function previousPage() {
      if (pageNum <= 1) return;
      renderPage(pageNum - 1);
    }

    function nextPage() {
      const maxPage = Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED);
      if (pageNum >= maxPage) return;
      renderPage(pageNum + 1);
    }

    function goToPage() {
      const inputPage = parseInt(document.getElementById('pageInput').value);
      const maxPage = Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED);
      if (inputPage >= 1 && inputPage <= maxPage) {
        renderPage(inputPage);
      } else {
        document.getElementById('pageInput').value = pageNum;
      }
    }

    // Control de zoom
    function zoomIn() {
      if (scale < 3) {
        scale += 0.25;
        renderPage(pageNum);
        updateZoomDisplay();
      }
    }

    function zoomOut() {
      if (scale > 0.5) {
        scale -= 0.25;
        renderPage(pageNum);
        updateZoomDisplay();
      }
    }

function fitToWidth() {
  const container = document.getElementById('pdfContainer');
  const containerWidth = container.clientWidth - 100; // padding
  
  // Obtener las dimensiones naturales de la página
  pdfDoc.getPage(pageNum).then(page => {
    const viewport = page.getViewport({ scale: 1.0 });
    scale = containerWidth / viewport.width;
    renderPage(pageNum);
    updateZoomDisplay();
  });
}

    function updateZoomDisplay() {
      document.getElementById('zoomValue').textContent = Math.round(scale * 100) + '%';
    }

    // Actualizar controles de página
    function updatePageControls() {

      const maxPage = Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED);
      document.getElementById('prevPage').disabled = pageNum <= 1;
      document.getElementById('nextPage').disabled = pageNum >= maxPage;
    }

    // Mostrar mensaje de limitación de vista previa
    function showPreviewLimitation(totalPages) {
      const infoPanel = document.querySelector('.info-panel');
      const limitationMessage = document.createElement('div');
      limitationMessage.className = 'preview-limitation';
      limitationMessage.innerHTML = `
        <div style="background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 4px; padding: 1rem; margin-bottom: 1rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
            <i class="fas fa-info-circle" style="color: #856404;"></i>
            <strong style="color: #856404;">Vista Previa Limitada</strong>
          </div>
          <p style="font-size: 0.9rem; color: #856404; margin: 0; line-height: 1.4;">
            Este documento tiene ${totalPages} páginas, pero solo puedes ver las primeras ${MAX_PAGES_ALLOWED} páginas como vista previa.
          </p>
          <button class="btn btn-primary" onclick="requestFullAccess()" style="margin-top: 0.75rem; font-size: 0.85rem; padding: 0.5rem 1rem;">
            <i class="fas fa-unlock"></i> Obtener Acceso Completo
          </button>
        </div>
      `;
      
      // Insertar después del document-info
      const documentInfo = infoPanel.querySelector('.document-info');
      documentInfo.insertAdjacentElement('afterend', limitationMessage);
    }

    // Función para solicitar acceso completo
function requestFullAccess() {
  // Obtener la URL actual para regresar después del login
  const currentUrl = encodeURIComponent(window.location.href);
  
  // Redirigir al login con parámetro de retorno
  window.location.href = `login.php?redirect=${currentUrl}`;
}
    // Funciones de acción
    function downloadPDF() {
      // Implementar descarga del PDF
      alert('Función de descarga - Conectar con backend');
    }

    function sharePDF() {
      // Implementar compartir
      if (navigator.share) {
        navigator.share({
          title: document.getElementById('documentTitle').textContent,
          url: window.location.href
        });
      } else {
        // Fallback para navegadores sin soporte
        navigator.clipboard.writeText(window.location.href);
        alert('Enlace copiado al portapapeles');
      }
    }

    function printPDF() {
      window.print();
    }

    function toggleFullscreen() {
      const pdfContainer = document.getElementById('pdfContainer');
      
      if (!document.fullscreenElement) {
        // Entrar en pantalla completa del contenedor PDF
        if (pdfContainer.requestFullscreen) {
          pdfContainer.requestFullscreen();
        } else if (pdfContainer.webkitRequestFullscreen) {
          pdfContainer.webkitRequestFullscreen();
        } else if (pdfContainer.msRequestFullscreen) {
          pdfContainer.msRequestFullscreen();
        }
      } else {
        // Salir de pantalla completa
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    }

    function showError(message) {
      const container = document.getElementById('pdfContainer');
      container.innerHTML = `
        <div class="loading-message">
          <i class="fas fa-exclamation-triangle" style="font-size: 2rem; color: #dc3545; margin-bottom: 1rem;"></i>
          <p style="color: #dc3545;">${message}</p>
          <button class="btn btn-primary" onclick="loadPDF()" style="margin-top: 1rem;">
            Reintentar
          </button>
        </div>
      `;
    }

    // Inicializar cuando se carga la página
    document.addEventListener('DOMContentLoaded', function() {
      // Simular un pequeño delay para mostrar el loading
      setTimeout(() => {
        loadPDF();
      }, 1000);
    });

    // Manejar redimensionamiento de ventana y cambios de pantalla completa
    window.addEventListener('resize', function() {
      if (pdfDoc && !pageIsRendering) {
        renderPage(pageNum);
      }
    });

    // Detectar cambios de pantalla completa para ajustar el canvas
    document.addEventListener('fullscreenchange', function() {
      setTimeout(() => {
        if (pdfDoc && !pageIsRendering) {
          renderPage(pageNum);
        }
      }, 100);
    });

    document.addEventListener('webkitfullscreenchange', function() {
      setTimeout(() => {
        if (pdfDoc && !pageIsRendering) {
          renderPage(pageNum);
        }
      }, 100);
    });

    document.addEventListener('mozfullscreenchange', function() {
      setTimeout(() => {
        if (pdfDoc && !pageIsRendering) {
          renderPage(pageNum);
        }
      }, 100);
    });
    // Función para manejar clicks en el canvas del PDF
function setupPDFClickNavigation() {
setupMouseWheelZoom();
  const pdfContainer = document.getElementById('pdfContainer');
  
  // Agregar event listener para clicks en el canvas
  pdfContainer.addEventListener('click', function(event) {
    // Solo funcionar si hay un PDF cargado y no estamos renderizando
    if (!pdfDoc || pageIsRendering) return;
    
    // Verificar que el click fue en el canvas del PDF
    const canvas = pdfContainer.querySelector('.pdf-canvas');
    if (!canvas || event.target !== canvas) return;
    
    // Obtener las dimensiones del canvas y la posición del click
    const rect = canvas.getBoundingClientRect();
    const clickX = event.clientX - rect.left;
    const canvasWidth = rect.width;
    
    // Dividir el canvas en zonas
    const leftZone = canvasWidth * 0.3;   // 30% izquierdo para página anterior
    const rightZone = canvasWidth * 0.7;  // 30% derecho para página siguiente
    
    const maxPage = Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED);
    
    if (clickX < leftZone) {
      // Click en zona izquierda - página anterior
      if (pageNum > 1) {
        previousPage();
      }
    } else if (clickX > rightZone) {
      // Click en zona derecha - página siguiente
      if (pageNum < maxPage) {
        nextPage();
      }
    }
  });
  
  // Agregar indicadores visuales de las zonas de click
  pdfContainer.addEventListener('mousemove', function(event) {
    const canvas = pdfContainer.querySelector('.pdf-canvas');
    if (!canvas || event.target !== canvas) {
      canvas.style.cursor = 'default';
      return;
    }
    
    const rect = canvas.getBoundingClientRect();
    const mouseX = event.clientX - rect.left;
    const canvasWidth = rect.width;
    const leftZone = canvasWidth * 0.3;
    const rightZone = canvasWidth * 0.7;
    
    if (mouseX < leftZone && pageNum > 1) {
      canvas.style.cursor = 'w-resize'; // Cursor para ir atrás
      canvas.title = 'Click para página anterior';
    } else if (mouseX > rightZone && pageNum < Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED)) {
      canvas.style.cursor = 'e-resize'; // Cursor para ir adelante
      canvas.title = 'Click para página siguiente';
    } else {
      canvas.style.cursor = 'default';
      canvas.title = '';
    }
  });
}

// MODIFICACIÓN DE LA FUNCIÓN loadPDF() EXISTENTE
// Busca esta función en tu código y reemplázala con esta versión:

async function loadPDF() {
  try {
    // Simular carga de datos del documento desde la base de datos
    const documentData = await fetchDocumentData();
    
    // Actualizar información del documento
    updateDocumentInfo(documentData);
    
    // Cargar PDF desde base64 o URL
    const loadingTask = pdfjsLib.getDocument(documentData.pdfUrl || documentData.pdfBase64);
    pdfDoc = await loadingTask.promise;
    
    // Limitar páginas disponibles para vista previa
    const totalPages = pdfDoc.numPages;
    const availablePages = Math.min(totalPages, MAX_PAGES_ALLOWED);
    
    // Actualizar total de páginas (mostrar limitación)
    const pagesText = totalPages > MAX_PAGES_ALLOWED 
      ? `${availablePages} de ${totalPages} (Vista previa)`
      : `${availablePages} páginas`;
    
    document.getElementById('totalPages').textContent = availablePages;
    document.getElementById('pageInput').max = availablePages;
    document.getElementById('documentPages').textContent = pagesText;
    
    // Mostrar mensaje de limitación si es necesario
    if (totalPages > MAX_PAGES_ALLOWED) {
      showPreviewLimitation(totalPages);
    }
    
    // Renderizar primera página
    renderPage(pageNum);
    
    // Habilitar controles
    updatePageControls();
    
    // *** NUEVA LÍNEA AGREGADA ***
    // Configurar navegación por clicks en el PDF
    setupPDFClickNavigation();
    updateZoomDisplay(); // Para mostrar el zoom inicial
    
  } catch (error) {
    console.error('Error cargando PDF:', error);
    showError('Error al cargar el documento PDF');
  }
}

// Función para manejar zoom con rueda del ratón
function setupMouseWheelZoom() {
  const pdfContainer = document.getElementById('pdfContainer');
  
  pdfContainer.addEventListener('wheel', function(event) {
    // Solo funcionar si hay un PDF cargado y no estamos renderizando
    if (!pdfDoc || pageIsRendering) return;
    
    // Prevenir el scroll normal de la página
    if (event.ctrlKey || event.metaKey) {
      event.preventDefault();
      
      // Determinar dirección del zoom
      const delta = event.deltaY;
      const zoomStep = 0.1; // Paso de zoom más suave que los botones
      
      if (delta < 0) {
        // Rueda hacia arriba - zoom in
        if (scale < 3) {
          scale += zoomStep;
          renderPage(pageNum);
          updateZoomDisplay();
        }
      } else {
        // Rueda hacia abajo - zoom out
        if (scale > 0.5) {
          scale -= zoomStep;
          renderPage(pageNum);
          updateZoomDisplay();
        }
      }
    }
  }, { passive: false });
}
  </script>
</body>
</html>