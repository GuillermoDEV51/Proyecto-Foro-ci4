<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Visor de PDFs - Forum de Proyectos</title>
  <!-- Tipografía limpia similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>/style/EstilosUser/visorusuario.css"/>
  
  <!-- PDF.js Library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

</head>

<body>
  <!-- Header principal -->
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="LOGOFP.png" alt="LOGOFP" />
        <span>Foro de Proyectos</span>
      </div>
    <div class="header-actions">
  <a href="indexusuario.php" class="btn-back">
    <i class="fas fa-arrow-left"></i> Volver al Inicio
  </a>
  <div class="user-connected">
    <i class="fas fa-user-check"></i> Usuario Conectado
  </div>
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

  <!-- Sección de Comentarios -->
  <div class="comments-section">
    <div class="comments-container">
      <div class="comments-header">
        <h3><i class="fas fa-comments"></i> Comentarios</h3>
        <span class="comments-count" id="commentsCount">0 comentarios</span>
      </div>

      <!-- Formulario para nuevo comentario -->
      <div class="comment-form">
        <div class="comment-input-group">
          <div class="user-avatar">
            <i class="fas fa-user-circle"></i>
          </div>
          <div class="comment-input-wrapper">
            <textarea 
              id="newComment" 
              placeholder="Escribe tu comentario sobre este documento..."
              maxlength="500"
              rows="3"
            ></textarea>
            <div class="comment-actions">
              <span class="char-counter" id="charCounter">0/500</span>
              <button class="btn btn-primary btn-sm" onclick="addComment()">
                <i class="fas fa-paper-plane"></i> Comentar
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Lista de comentarios -->
      <div class="comments-list" id="commentsList">
        <!-- Los comentarios se cargarán aquí dinámicamente -->
      </div>

      <!-- Mensaje cuando no hay comentarios -->
      <div class="no-comments" id="noComments">
        <i class="fas fa-comment-slash"></i>
        <p>Aún no hay comentarios en este documento.</p>
        <p>¡Sé el primero en compartir tu opinión!</p>
      </div>
    </div>
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
 const MAX_PAGES_ALLOWED = Infinity; // Sin limitación de páginas// Limitación de páginas para vista previa
    
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
        
// Actualizar total de páginas (sin limitación)

// Actualizar total de páginas (mostrar limitación)
const pagesText = totalPages > MAX_PAGES_ALLOWED 
  ? `${availablePages} de ${totalPages} (Vista previa)`
  : `${availablePages} páginas`;

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
    // Al final de loadPDF(), después de todas las otras inicializaciones
initializeComments();
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
// Variables para comentarios
let comments = [];

// Inicializar comentarios al cargar la página
function initializeComments() {
  // Cargar comentarios desde localStorage (simulación)
  loadComments();
  renderComments();
  updateCharCounter();
}

// Cargar comentarios (simulación - aquí conectarías con tu base de datos)
function loadComments() {
  // Simular algunos comentarios de ejemplo
  comments = [
    {
      id: 1,
      author: "Ana García",
      text: "Excelente análisis, muy completo y bien estructurado. Me ayudó mucho para mi proyecto.",
      date: new Date(Date.now() - 2 * 24 * 60 * 60 * 1000), // 2 días atrás
      likes: 3
    },
    {
      id: 2,
      author: "Carlos Rodríguez",
      text: "La metodología presentada es muy interesante. ¿Tienes más documentos sobre este tema?",
      date: new Date(Date.now() - 5 * 60 * 60 * 1000), // 5 horas atrás
      likes: 1
    }
  ];
}

// Renderizar comentarios
function renderComments() {
  const commentsList = document.getElementById('commentsList');
  const noComments = document.getElementById('noComments');
  const commentsCount = document.getElementById('commentsCount');
  
  // Actualizar contador
  commentsCount.textContent = `${comments.length} comentarios`;
  
  if (comments.length === 0) {
    commentsList.style.display = 'none';
    noComments.style.display = 'block';
    return;
  }
  
  commentsList.style.display = 'block';
  noComments.style.display = 'none';
  
  // Ordenar comentarios por fecha (más recientes primero)
  comments.sort((a, b) => new Date(b.date) - new Date(a.date));
  
  commentsList.innerHTML = comments.map(comment => `
    <div class="comment-item">
      <div class="comment-avatar">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="comment-content">
        <div class="comment-header">
          <span class="comment-author">${comment.author}</span>
          <span class="comment-date">${formatCommentDate(comment.date)}</span>
        </div>
        <div class="comment-text">${comment.text}</div>
        <div class="comment-actions-bar">
          <button class="comment-action" onclick="likeComment(${comment.id})">
            <i class="fas fa-thumbs-up"></i> ${comment.likes || 0}
          </button>
          <button class="comment-action">
            <i class="fas fa-reply"></i> Responder
          </button>
        </div>
      </div>
    </div>
  `).join('');
}
// Agregar nuevo comentario
function addComment() {
  const textarea = document.getElementById('newComment');
  const text = textarea.value.trim();
  
  if (!text) {
    alert('Por favor, escribe un comentario antes de enviar.');
    return;
  }
  
  // Crear nuevo comentario
  const newComment = {
    id: Date.now(), // ID simple basado en timestamp
    author: "Usuario Actual", // Aquí usarías el nombre del usuario logueado
    text: text,
    date: new Date(),
    likes: 0
  };
  
  // Agregar al array
  comments.push(newComment);
  
  // Limpiar textarea
  textarea.value = '';
  updateCharCounter();
  
  // Re-renderizar
  renderComments();
  
  // Hacer scroll suave hacia el nuevo comentario
  setTimeout(() => {
    const commentsList = document.getElementById('commentsList');
    commentsList.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }, 100);
}

// Actualizar contador de caracteres
function updateCharCounter() {
  const textarea = document.getElementById('newComment');
  const counter = document.getElementById('charCounter');
  
  textarea.addEventListener('input', function() {
    const length = this.value.length;
    counter.textContent = `${length}/500`;
    
    if (length > 450) {
      counter.style.color = '#ff6b6b';
    } else {
      counter.style.color = '#666';
    }
  });
}

// Formatear fecha del comentario
function formatCommentDate(date) {
  const now = new Date();
  const diffMs = now - date;
  const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
  const diffDays = Math.floor(diffHours / 24);
  
  if (diffHours < 1) return 'Hace unos minutos';
  if (diffHours < 24) return `Hace ${diffHours} horas`;
  if (diffDays < 7) return `Hace ${diffDays} días`;
  
  return date.toLocaleDateString('es-ES');
}

// Dar like a comentario
function likeComment(commentId) {
  const comment = comments.find(c => c.id === commentId);
  if (comment) {
    comment.likes = (comment.likes || 0) + 1;
    renderComments();
  }
}

// Permitir envío con Enter (Ctrl+Enter)
document.addEventListener('DOMContentLoaded', function() {
  const textarea = document.getElementById('newComment');
  if (textarea) {
    textarea.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' && e.ctrlKey) {
        e.preventDefault();
        addComment();
      }
    });
  }
});
  </script>
</body>
</html>