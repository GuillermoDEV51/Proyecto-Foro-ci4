<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Proyectos extends BaseController
{
    private array $proyectos = [
        [
            'id' => 101,
            'titulo' => 'Tecnologia Digital',
            'autor'  => 'Jonathan Alarcon',
            'anio'   => 2024,
            'carrera' => 'Ingeniería Informática',
            'pdf'    => 'Tecnologia.pdf',
            'descripcion' => 'Este documento presenta un sumador en TEC.',
        ],

        
    [
        'id' => 102,
        'titulo' => 'Sistemas Distribuidos',
        'autor' => 'María Fernanda Rivas',
        'anio' => 2023,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'PRACTICA.pdf',
        'descripcion' => 'Análisis de arquitectura cliente-servidor y su implementación en Java.'
    ],
    [
        'id' => 103,
        'titulo' => 'Algoritmos Genéticos Aplicados',
        'autor' => 'Carlos Mendoza',
        'anio' => 2022,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'AlgoritmosGeneticos.pdf',
        'descripcion' => 'Estudio sobre la optimización de rutas usando algoritmos evolutivos.'
    ],
    [
        'id' => 104,
        'titulo' => 'Seguridad en Redes',
        'autor' => 'Ana Sofía Delgado',
        'anio' => 2024,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'SeguridadRedes.pdf',
        'descripcion' => 'Propuesta de un sistema de detección de intrusos basado en firmas.'
    ],
    [
        'id' => 105,
        'titulo' => 'Compiladores y Lenguajes',
        'autor' => 'Luis Alberto Torres',
        'anio' => 2023,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'Compiladores.pdf',
        'descripcion' => 'Diseño de un compilador básico para un lenguaje de programación personalizado.'
    ],
    [
        'id' => 106,
        'titulo' => 'Inteligencia Artificial en Videojuegos',
        'autor' => 'Valeria Contreras',
        'anio' => 2025,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'IA_Videojuegos.pdf',
        'descripcion' => 'Implementación de algoritmos de IA para mejorar la experiencia del jugador.'
    ],
    [
        'id' => 107,
        'titulo' => 'Optimización de Bases de Datos',
        'autor' => 'José Manuel Ortega',
        'anio' => 2024,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'OptimizacionBD.pdf',
        'descripcion' => 'Estudio de índices y consultas eficientes en MySQL.'
    ],
    [
        'id' => 108,
        'titulo' => 'Aplicaciones Web Responsivas',
        'autor' => 'Camila Pérez',
        'anio' => 2023,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'WebResponsiva.pdf',
        'descripcion' => 'Diseño de interfaces adaptables con HTML5, CSS3 y JavaScript.'
    ],
    [
        'id' => 109,
        'titulo' => 'Criptografía Moderna',
        'autor' => 'Andrés Salazar',
        'anio' => 2025,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'Criptografia.pdf',
        'descripcion' => 'Análisis de algoritmos criptográficos y su aplicación en la seguridad digital.'
    ],
    [
        'id' => 110,
        'titulo' => 'Automatización con Python',
        'autor' => 'Lucía Herrera',
        'anio' => 2024,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'AutomatizacionPython.pdf',
        'descripcion' => 'Desarrollo de scripts para automatizar tareas administrativas.'
    ],
    [
        'id' => 111,
        'titulo' => 'Desarrollo de APIs RESTful',
        'autor' => 'Miguel Ángel Suárez',
        'anio' => 2025,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'APIsRESTful.pdf',
        'descripcion' => 'Creación de servicios web RESTful con autenticación JWT en Laravel.'
    ],
    [
        'id' => 112,
        'titulo' => 'Machine Learning con Python',
        'autor' => 'Daniela Paredes',
        'anio' => 2024,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'ML_Python.pdf',
        'descripcion' => 'Clasificación de datos usando algoritmos supervisados en scikit-learn.'
    ],
    [
        'id' => 113,
        'titulo' => 'Despliegue en la Nube con Docker',
        'autor' => 'Esteban Rojas',
        'anio' => 2023,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'DockerCloud.pdf',
        'descripcion' => 'Contenerización de aplicaciones y despliegue en AWS usando Docker.'
    ],
    [
        'id' => 114,
        'titulo' => 'Interfaces Hombre-Máquina',
        'autor' => 'Natalia Gómez',
        'anio' => 2025,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'IHM.pdf',
        'descripcion' => 'Diseño de interfaces accesibles para usuarios con discapacidad visual.'
    ],
    [
        'id' => 115,
        'titulo' => 'Blockchain y Contratos Inteligentes',
        'autor' => 'Jorge Linares',
        'anio' => 2024,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'Blockchain.pdf',
        'descripcion' => 'Implementación de contratos inteligentes en Ethereum con Solidity.'
    ]
    ];
        // Puedes añadir más proyectos aquí...

    public function index()
    {
        helper('url');

        return view('proyectos', ['proyectos' => $this->proyectos]);
    }

 public function visor($id = null)
{
    helper('url');

    $proyecto = null;

    foreach ($this->proyectos as $p) {
        if ($p['id'] == $id) {
            $proyecto = $p;
            break;
        }
    }

    if ($proyecto === null) {
        throw PageNotFoundException::forPageNotFound("Proyecto con ID $id no encontrado.");
    }

// Ruta al archivo PDF
$filePath = WRITEPATH . '../public/uploads/' . $proyecto['pdf'];

if (file_exists($filePath)) {
    $sizeInBytes = filesize($filePath);
    $proyecto['size'] = $this->formatSizeUnits($sizeInBytes);
} else {
    $proyecto['size'] = 'Desconocido';
}


    return view('visor', ['documento' => $proyecto]);
}
private function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        return $bytes . ' bytes';
    } elseif ($bytes == 1) {
        return '1 byte';
    } else {
        return '0 bytes';
    }
}

 }