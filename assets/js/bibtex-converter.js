/**
 * Conversor de BibTeX a HTML con Bootstrap
 * 
 * Este script analiza archivos BibTeX y los convierte a HTML con formato Bootstrap.
 * Soporta múltiples referencias y diversos tipos de entradas BibTeX.
 */

// Función para analizar registros BibTeX y convertirlos a HTML
function bibtexToHTML(bibtexString) {
  // Separar cada registro de BibTeX
  const entries = [];
  let currentEntry = null;
  let inEntry = false;
  let braceCount = 0;
  let quoteCount = 0;
  let currentContent = '';

  // Dividir el texto de entrada en líneas
  const lines = bibtexString.split('\n');
  
  // Procesar cada línea
  for (let i = 0; i < lines.length; i++) {
    const line = lines[i].trim();
    
    // Saltar líneas vacías o comentarios fuera de entradas
    if (!inEntry && (line === '' || line.startsWith('%'))) {
      continue;
    }
    
    // Detectar inicio de entrada
    if (line.startsWith('@')) {
      // Si ya estábamos procesando una entrada, la guardamos primero
      // (esto maneja casos donde falta la llave de cierre)
      if (inEntry && currentEntry) {
        processEntryContent(currentEntry, currentContent);
        entries.push(currentEntry);
      }
      
      // Iniciar nueva entrada
      inEntry = true;
      let typeEndIndex = line.indexOf('{');
      if (typeEndIndex === -1) typeEndIndex = line.indexOf('(');
      
      // Verificar que se encontró el delimitador de apertura
      if (typeEndIndex === -1) continue;
      
      currentEntry = {
        type: line.substring(1, typeEndIndex).toLowerCase().trim(),
        fields: {}
      };
      
      // Extraer la clave de la entrada
      const restOfLine = line.substring(typeEndIndex + 1);
      const commaIndex = restOfLine.indexOf(',');
      if (commaIndex !== -1) {
        currentEntry.key = restOfLine.substring(0, commaIndex).trim();
      } else {
        // En caso de que la clave y la coma estén en la siguiente línea
        currentEntry.key = restOfLine.trim();
      }
      
      // Inicializar contadores y buffer
      braceCount = 1; // Contar la apertura inicial
      quoteCount = 0;
      currentContent = '';
      
      // Agregar el resto de la línea después de la clave al contenido
      if (commaIndex !== -1) {
        currentContent += restOfLine.substring(commaIndex + 1) + '\n';
        
        // Actualizar contadores para el resto de la línea
        for (let j = commaIndex + 1; j < restOfLine.length; j++) {
          if (restOfLine[j] === '{') braceCount++;
          if (restOfLine[j] === '}') braceCount--;
          if (restOfLine[j] === '"') quoteCount = 1 - quoteCount; // Alternar entre 0 y 1
        }
      }
    } 
    // Procesar el contenido de la entrada
    else if (inEntry) {
      currentContent += line + '\n';
      
      // Contar apertura y cierre de llaves, evitando las que están dentro de comillas
      for (let j = 0; j < line.length; j++) {
        // Controlar comillas
        if (line[j] === '"') {
          quoteCount = 1 - quoteCount; // Alternar entre 0 y 1
          continue;
        }
        
        // Solo contar llaves si no estamos dentro de comillas
        if (quoteCount === 0) {
          if (line[j] === '{') braceCount++;
          if (line[j] === '}') braceCount--;
        }
      }
      
      // Si se cerró la entrada, procesarla
      if (braceCount === 0) {
        processEntryContent(currentEntry, currentContent);
        entries.push(currentEntry);
        inEntry = false;
        currentEntry = null;
      }
    }
  }
  
  // Procesar la última entrada si no se cerró correctamente
  if (inEntry && currentEntry) {
    processEntryContent(currentEntry, currentContent);
    entries.push(currentEntry);
  }
  
  // Función para procesar el contenido de una entrada
  function processEntryContent(entry, content) {
    // Buscar campos con el formato campo = {valor} o campo = "valor"
    // También maneja valores que pueden contener llaves anidadas
    const fieldRegex = /(\w+)\s*=\s*(?:\{([^{}]*(?:\{[^{}]*\}[^{}]*)*)\}|"([^"]*)")/g;
    let match;
    
    while ((match = fieldRegex.exec(content)) !== null) {
      const fieldName = match[1].trim().toLowerCase();
      // El valor puede estar en el grupo 2 (llaves) o en el grupo 3 (comillas)
      const fieldValue = (match[2] !== undefined ? match[2] : match[3]).trim();
      entry.fields[fieldName] = fieldValue;
    }
  }

  // Formatear entradas como HTML con Bootstrap
  let htmlOutput = `
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Referencias Bibliográficas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <style>
    /* Estilos generales */
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 1140px;
    }
    
    /* Estilos de los controles superiores */
    .bib-top-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }
    .bib-reference-count {
      background-color: #f8f9fa;
      padding: 0.5rem 1rem;
      border-radius: 0.25rem;
      margin-bottom: 1rem;
      font-weight: 500;
    }
    .bib-filter-container {
      flex-grow: 1;
      max-width: 400px;
      margin-left: 1rem;
    }
    .bib-filter-input {
      border-radius: 20px;
      padding-left: 1rem;
    }
    
    /* Estilos de la tarjeta de referencia */
    .bib-reference {
      margin-bottom: 1rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      border: 1px solid rgba(0,0,0,0.125);
      border-radius: 0.375rem;
      transition: all 0.2s ease-in-out;
    }
    .bib-reference:hover {
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transform: translateY(-2px);
    }
    .bib-reference .card-header {
      background-color: rgba(0,0,0,0.03);
      padding: 0.75rem 1rem;
    }
    .bib-reference-type {
      text-transform: capitalize;
    }
    .bib-reference-key {
      font-family: monospace;
      font-size: 0.8rem;
    }
    
    /* Estilos del contenido */
    .bib-title {
      font-weight: 600;
      color: #212529;
      margin-bottom: 0.75rem;
    }
    .bib-authors {
      font-weight: 500;
      margin-bottom: 0.75rem;
    }
    .bib-authors-list {
      color: #495057;
    }
    .bib-details {
      color: #6c757d;
      font-size: 0.95rem;
    }
    .bib-journal, .bib-booktitle, .bib-publisher {
      font-weight: 500;
      color: #495057;
    }
    .bib-volume, .bib-number, .bib-pages, .bib-year, .bib-address {
      color: #6c757d;
    }
    
    /* Estilos para abstract y keywords */
    .bib-abstract-summary {
      cursor: pointer;
      color: #007bff;
      font-weight: 500;
    }
    .bib-abstract-summary:hover {
      text-decoration: underline;
    }
    .bib-abstract-text {
      font-size: 0.9rem;
      color: #495057;
      padding: 0.5rem;
      background-color: #f8f9fa;
      border-radius: 0.25rem;
    }
    .bib-keywords-label {
      font-weight: 600;
    }
    .bib-keywords-text {
      color: #6c757d;
    }
    
    /* Estilos para el pie de la tarjeta */
    .bib-footer {
      background-color: #f8f9fa;
      border-top: 1px solid rgba(0,0,0,0.125);
      padding: 0.75rem 1rem;
    }
    .bib-links {
      display: flex;
      gap: 0.5rem;
    }
    
    /* Estilos para cuando no hay referencias */
    .bib-no-references {
      padding: 3rem;
      text-align: center;
      background-color: #f8f9fa;
      border-radius: 0.375rem;
      color: #6c757d;
      border: 1px dashed #dee2e6;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="mb-4">Referencias Bibliográficas</h1>
    <div class="bib-top-controls">
      <div class="bib-reference-count">
        Total de referencias: <span class="badge bg-primary">${entries.length}</span>
      </div>
      <div id="filter-container" class="bib-filter-container">
        <input type="text" id="filter-input" class="form-control bib-filter-input" placeholder="Filtrar referencias...">
      </div>
    </div>
    <div class="bib-references">`;

  // Formatear cada entrada como una card de Bootstrap
  entries.forEach((entry, index) => {
    const f = entry.fields;
    
    htmlOutput += `      <div class="card mb-3 bib-reference" id="ref-${entry.key || index}">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span class="bib-reference-type badge bg-primary">${entry.type}</span>
          <span class="bib-reference-key badge bg-secondary">[${entry.key || `ref-${index}`}]</span>
        </div>
        <div class="card-body">`;

    // Formatear título como encabezado de la card
    if (f.title) {
      htmlOutput += `          <h5 class="card-title bib-title">${f.title}</h5>`;
    }

    // Formatear autores
    if (f.author) {
      const authors = f.author.split(' and ').map(author => author.trim());
      htmlOutput += `          <p class="card-text bib-authors">
            <i class="bi bi-people"></i>
            <span class="bib-authors-list">${authors.join(', ')}</span>
          </p>`;
    }

    // Información específica según el tipo de entrada
    htmlOutput += `          <div class="bib-details">`;
    
    switch (entry.type) {
      case 'article':
        if (f.journal) {
          htmlOutput += `
            <p class="card-text bib-journal-info">
              <span class="bib-journal">${f.journal}</span>`;
          
          if (f.volume) {
            htmlOutput += `, <span class="bib-volume">Vol. ${f.volume}</span>`;
            
            if (f.number) {
              htmlOutput += `<span class="bib-number">(${f.number})</span>`;
            }
          }
          
          if (f.pages) {
            htmlOutput += `, <span class="bib-pages">pp. ${f.pages}</span>`;
          }
          
          if (f.year) {
            htmlOutput += `, <span class="bib-year">${f.year}</span>`;
          }
          
          htmlOutput += `
            </p>`;
        }
        break;
        
      case 'book':
        if (f.publisher || f.year) {
          htmlOutput += `
            <p class="card-text bib-book-info">`;
          
          if (f.publisher) {
            htmlOutput += `<span class="bib-publisher">${f.publisher}</span>`;
          }
          
          if (f.address && f.publisher) {
            htmlOutput += `, <span class="bib-address">${f.address}</span>`;
          } else if (f.address) {
            htmlOutput += `<span class="bib-address">${f.address}</span>`;
          }
          
          if (f.year && (f.publisher || f.address)) {
            htmlOutput += `, <span class="bib-year">${f.year}</span>`;
          } else if (f.year) {
            htmlOutput += `<span class="bib-year">${f.year}</span>`;
          }
          
          htmlOutput += `
            </p>`;
        }
        break;
        
      case 'inproceedings':
      case 'incollection':
        if (f.booktitle) {
          htmlOutput += `
            <p class="card-text bib-proceedings-info">
              <span class="bib-booktitle">En: ${f.booktitle}</span>`;
          
          if (f.pages) {
            htmlOutput += `, <span class="bib-pages">pp. ${f.pages}</span>`;
          }
          
          if (f.year) {
            htmlOutput += `, <span class="bib-year">${f.year}</span>`;
          }
          
          htmlOutput += `
            </p>`;
        }
        break;
        
      default:
        // Para otros tipos, mostrar información básica
        if (f.year) {
          htmlOutput += `
            <p class="card-text bib-basic-info">
              <span class="bib-year">${f.year}</span>
            </p>`;
        }
    }
    
    // Añadir datos adicionales si existen
    let additionalInfo = '';
    
    if (f.abstract) {
      additionalInfo += `
            <div class="bib-abstract mt-2">
              <details>
                <summary class="bib-abstract-summary">Abstract</summary>
                <p class="bib-abstract-text mt-1">${f.abstract}</p>
              </details>
            </div>`;
    }
    
    if (f.keywords) {
      additionalInfo += `
            <div class="bib-keywords mt-2">
              <small class="text-muted bib-keywords-label">Keywords: </small>
              <small class="bib-keywords-text">${f.keywords}</small>
            </div>`;
    }
    
    if (additionalInfo) {
      htmlOutput += additionalInfo;
    }
    
    htmlOutput += `
          </div>`;

    // Añadir pie de card con enlaces
    let hasFooterLinks = f.doi || f.url;
    
    if (hasFooterLinks) {
      htmlOutput += `
        </div>
        <div class="card-footer bib-footer">
          <div class="bib-links">`;
      
      // Añadir DOI como enlace si está disponible
      if (f.doi) {
        htmlOutput += `
            <a href="https://doi.org/${f.doi}" class="btn btn-sm btn-outline-primary bib-doi-link" target="_blank">
              <span class="bib-doi-text">DOI: ${f.doi}</span>
            </a>`;
      }
      
      // Añadir URL como enlace si está disponible
      if (f.url) {
        htmlOutput += `
            <a href="${f.url}" class="btn btn-sm btn-outline-secondary bib-url-link ms-1" target="_blank">
              <span class="bib-url-text">Ver recurso</span>
            </a>`;
      }
      
      htmlOutput += `
          </div>
        </div>`;
    } else {
      htmlOutput += `
        </div>`;
    }

    htmlOutput += `
      </div>`;
  });

  // Mostrar mensaje si no hay referencias
  if (entries.length === 0) {
    htmlOutput += `
      <div class="bib-no-references">
        <h4>No se encontraron referencias en el archivo</h4>
        <p>El archivo BibTeX no contiene entradas válidas o no se pudo analizar correctamente.</p>
      </div>
    `;
  }

  // Cerrar el HTML
      htmlOutput += `
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Funcionalidad de filtrado
    document.addEventListener('DOMContentLoaded', function() {
      const filterInput = document.getElementById('filter-input');
      const references = document.querySelectorAll('.bib-reference');
      
      filterInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        let visibleCount = 0;
        
        references.forEach(function(reference) {
          const text = reference.textContent.toLowerCase();
          if (text.includes(searchTerm)) {
            reference.style.display = '';
            visibleCount++;
          } else {
            reference.style.display = 'none';
          }
        });
        
        // Actualizar contador
        document.querySelector('.bib-reference-count .badge').textContent = visibleCount;
      });
    });
  </script>
</body>
</html>`;

  return htmlOutput;
}

// Función para leer un archivo BibTeX
function readBibFile(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    
    reader.onload = function(event) {
      resolve(event.target.result);
    };
    
    reader.onerror = function() {
      reject(new Error('Error al leer el archivo.'));
    };
    
    reader.readAsText(file);
  });
}

// Configurar eventos cuando la página esté cargada
document.addEventListener('DOMContentLoaded', function() {
  const dropArea = document.getElementById('drop-area');
  const fileInput = document.getElementById('file-input');
  const browseButton = document.getElementById('browse-button');
  const previewContainer = document.getElementById('preview-container');
  const previewFrame = document.getElementById('preview-frame');
  const downloadButton = document.getElementById('download-button');
  const loadingIndicator = document.getElementById('loading');
  
  let currentHTML = '';
  let fileName = '';
  
  // Evento para el botón de selección de archivo
  browseButton.addEventListener('click', function() {
    fileInput.click();
  });
  
  // Eventos para arrastrar y soltar
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
  });
  
  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }
  
  ['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
  });
  
  ['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
  });
  
  function highlight() {
    dropArea.classList.add('dragover');
  }
  
  function unhighlight() {
    dropArea.classList.remove('dragover');
  }
  
  // Procesar archivos
  dropArea.addEventListener('drop', handleDrop, false);
  fileInput.addEventListener('change', handleFileSelect, false);
  
  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    if (files.length > 0 && files[0].name.toLowerCase().endsWith('.bib')) {
      processBibFile(files[0]);
    } else {
      alert('Por favor, selecciona un archivo .bib válido.');
    }
  }
  
  function handleFileSelect(e) {
    const files = e.target.files;
    
    if (files.length > 0 && files[0].name.toLowerCase().endsWith('.bib')) {
      processBibFile(files[0]);
    } else {
      alert('Por favor, selecciona un archivo .bib válido.');
    }
  }
  
  // Procesar el archivo BibTeX
  async function processBibFile(file) {
    fileName = file.name.replace('.bib', '');
    
    // Mostrar indicador de carga
    loadingIndicator.classList.remove('d-none');
    previewContainer.style.display = 'none';
    
    try {
      // Leer y convertir el archivo
      const bibtexString = await readBibFile(file);
      currentHTML = bibtexToHTML(bibtexString);
      
      // Mostrar la vista previa
      const blob = new Blob([currentHTML], { type: 'text/html' });
      const url = URL.createObjectURL(blob);
      
      previewFrame.src = url;
      previewContainer.style.display = 'block';
      
      // Configurar descarga
      downloadButton.onclick = function() {
        const link = document.createElement('a');
        link.href = url;
        link.download = fileName + '.html';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      };
    } catch (error) {
      alert('Error al procesar el archivo: ' + error.message);
      console.error(error);
    } finally {
      // Ocultar indicador de carga
      loadingIndicator.classList.add('d-none');
    }
  }
});