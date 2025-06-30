<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Visor de PDFs - Foro de Proyectos | <?= esc($documento['titulo']) ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="<?= base_url('style/EstilosUser/visor.css') ?>" />

  <!-- PDF.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
</head>
<body>

  <header>
    <div class="header-container">
      <a href="<?= base_url() ?>" class="logo">
        <img src="<?= base_url() ?>img/LOGOFP.png" alt="LOGOFP" />
        <span>Foro de Proyectos</span>
      </a>
      <div class="header-actions">
        <a href="<?= base_url('/') ?>" class="btn-back">
          <i class="fas fa-arrow-left"></i> Volver al Inicio
        </a>
        <a href="<?= base_url('login') ?>" class="login-link">
          <i class="fas fa-user"></i> Iniciar Sesión
        </a>
      </div>
    </div>
  </header>

  <div class="viewer-container">
    <aside class="info-panel">
      <div class="document-info">
        <h1 class="document-title" id="documentTitle"><?= esc($documento['titulo']) ?></h1>
        <div class="document-meta">
          <div class="meta-item">
            <i class="fas fa-user"></i>
            <span id="documentAuthor"><?= esc($documento['autor']) ?></span>
          </div>
          <div class="meta-item">
            <i class="fas fa-calendar"></i>
            <span id="documentDate"><?= esc($documento['anio']) ?></span>
          </div>
          <div class="meta-item">
            <i class="fas fa-graduation-cap"></i>
            <span id="documentCareer"><?= esc($documento['carrera']) ?></span>
          </div>
          <div class="meta-item">
            <i class="fas fa-file-pdf"></i>
            <span id="documentPages">-- páginas</span>
          </div>
 <div class="meta-item">
    <i class="fas fa-download"></i>
    <span id="documentSize"><?= esc($documento['size']) ?></span>
</div>

        </div>
      </div>

      <div class="document-description">
        <h3 class="description-title">Descripción</h3>
        <p class="description-text" id="documentDescription"><?= esc($documento['descripcion']) ?></p>
      </div>
    </aside>

    <main class="pdf-viewer">
      <div class="pdf-toolbar">
        <div class="toolbar-left">
          <div class="page-controls">
            <button class="toolbar-btn" id="prevPage" onclick="previousPage()">
              <i class="fas fa-chevron-left"></i>
            </button>
           <input type="number" class="page-input" id="pageInput" min="1" max="1000" onchange="goToPage()" />

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
  const documentData = {
    title: <?= json_encode($documento['titulo']) ?>,
    author: <?= json_encode($documento['autor']) ?>,
    date: <?= json_encode($documento['anio']) ?>,
    career: <?= json_encode($documento['carrera']) ?>,
    description: <?= json_encode($documento['descripcion']) ?>,
    size: <?= json_encode($documento['size'] ?? 'Desconocido') ?>,

pdfUrl: "<?= base_url('uploads/' . $documento['pdf']) ?>"

  };

    // Resto del código JavaScript para PDF.js (igual que en tu visor, adaptado)...

    let pdfDoc = null,
      pageNum = 1,
      pageIsRendering = false,
      pageNumIsPending = null,
      scale = 1.0;

    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const MAX_PAGES_ALLOWED = Number.MAX_VALUE; // Cambia esto si quieres limitar el número de páginas visibles
    // const MAX_PAGES_ALLOWED = 7; // Descomentar si quieres limitar a 7 páginas

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    async function loadPDF() {
      try {
        document.getElementById('documentTitle').textContent = documentData.title;
        document.getElementById('documentAuthor').textContent = documentData.author;
        document.getElementById('documentDate').textContent = documentData.date;
        document.getElementById('documentCareer').textContent = documentData.career;
        document.getElementById('documentDescription').textContent = documentData.description;
        document.getElementById('documentSize').textContent = documentData.size;

        const loadingTask = pdfjsLib.getDocument(documentData.pdfUrl);
        pdfDoc = await loadingTask.promise;

        const totalPages = pdfDoc.numPages;
     const availablePages = totalPages;

const pagesText = `${totalPages} páginas`;

          if (totalPages > MAX_PAGES_ALLOWED) {
  const notice = document.createElement('p');
  notice.textContent = `Estás viendo una vista previa pública. Inicia sesión para ver el documento completo.`;
  notice.style.fontSize = '0.9rem';
  notice.style.color = '#888';
  document.querySelector('.document-meta').appendChild(notice);
}


        document.getElementById('totalPages').textContent = availablePages;
        document.getElementById('pageInput').max = availablePages;
        document.getElementById('documentPages').textContent = pagesText;

        if (totalPages > MAX_PAGES_ALLOWED) {
          // Puedes implementar mensaje de limitación si quieres
        }

        renderPage(pageNum);
        updatePageControls();
        updateZoomDisplay();
        setupPDFClickNavigation();

      } catch (error) {
        console.error('Error cargando PDF:', error);
        showError('Error al cargar el documento PDF');
      }
    }

async function renderPage(num) {

if (num > Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED)) num = Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED);


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
    
    function goToPage() {
  const inputPage = parseInt(document.getElementById('pageInput').value);
if (inputPage >= 1 && inputPage <= pdfDoc.numPages) {

    renderPage(inputPage);
  } else {
    alert(`Esta es una vista pública. Solo puedes ver hasta ${maxPage} páginas.`);
    document.getElementById('pageInput').value = pageNum;
  }
}


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
      const containerWidth = container.clientWidth - 100;
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

    function updatePageControls() {
      const maxPage = Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED);
      document.getElementById('prevPage').disabled = pageNum <= 1;
      document.getElementById('nextPage').disabled = pageNum >= maxPage;
    }

    function toggleFullscreen() {
      const pdfContainer = document.getElementById('pdfContainer');
      if (!document.fullscreenElement) {
        if (pdfContainer.requestFullscreen) {
          pdfContainer.requestFullscreen();
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        }
      }
    }

    function showError(message) {
      const container = document.getElementById('pdfContainer');
      container.innerHTML = `
        <div class="loading-message">
          <i class="fas fa-exclamation-triangle" style="font-size: 2rem; color: #dc3545; margin-bottom: 1rem;"></i>
          <p style="color: #dc3545;">${message}</p>
          <button class="btn btn-primary" onclick="loadPDF()" style="margin-top: 1rem;">Reintentar</button>
        </div>
      `;
    }

    // Navegación por clicks en el canvas
    function setupPDFClickNavigation() {
      setupMouseWheelZoom();
      const pdfContainer = document.getElementById('pdfContainer');
      pdfContainer.addEventListener('click', function(event) {
        if (!pdfDoc || pageIsRendering) return;
        const canvas = pdfContainer.querySelector('.pdf-canvas');
        if (!canvas || event.target !== canvas) return;
        const rect = canvas.getBoundingClientRect();
        const clickX = event.clientX - rect.left;
        const canvasWidth = rect.width;
        const leftZone = canvasWidth * 0.3;
        const rightZone = canvasWidth * 0.7;
        const maxPage = Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED);
        if (clickX < leftZone) {
          if (pageNum > 1) previousPage();
        } else if (clickX > rightZone) {
          if (pageNum < maxPage) nextPage();
        }
      });
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
          canvas.style.cursor = 'w-resize';
          canvas.title = 'Click para página anterior';
        } else if (mouseX > rightZone && pageNum < Math.min(pdfDoc.numPages, MAX_PAGES_ALLOWED)) {
          canvas.style.cursor = 'e-resize';
          canvas.title = 'Click para página siguiente';
        } else {
          canvas.style.cursor = 'default';
          canvas.title = '';
        }
      });
    }

    function setupMouseWheelZoom() {
      const pdfContainer = document.getElementById('pdfContainer');
      pdfContainer.addEventListener('wheel', function(event) {
        if (!pdfDoc || pageIsRendering) return;
        if (event.ctrlKey || event.metaKey) {
          event.preventDefault();
          const delta = event.deltaY;
          const zoomStep = 0.1;
          if (delta < 0) {
            if (scale < 3) {
              scale += zoomStep;
              renderPage(pageNum);
              updateZoomDisplay();
            }
          } else {
            if (scale > 0.5) {
              scale -= zoomStep;
              renderPage(pageNum);
              updateZoomDisplay();
            }
          }
        }
      }, { passive: false });
    }

    document.addEventListener('DOMContentLoaded', loadPDF);

    window.addEventListener('resize', function() {
      if (pdfDoc && !pageIsRendering) renderPage(pageNum);
    });

    document.addEventListener('fullscreenchange', function() {
      setTimeout(() => {
        if (pdfDoc && !pageIsRendering) renderPage(pageNum);
      }, 100);
    });
    
  </script>

</body>
</html>
