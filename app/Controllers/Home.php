<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function __construct()
    {
        helper('url');
    }
    
   public function index()
{
    $destacados = [
        [
            'id' => 101,
            'titulo' => 'Tecnología Digital',
            'autor' => 'Jonathan Alarcon',
            'anio' => 2024,
            'imagen' => 'https://images.unsplash.com/photo-1617839625591-e5a789593135?q=80&w=580&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D/300x200',
        ],
        [
            'id' => 102,
            'titulo' => 'Redes Inteligentes',
            'autor' => 'Ana Martínez',
            'anio' => 2023,
            'imagen' => 'https://images.unsplash.com/photo-1617839625591-e5a789593135?q=80&w=580&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D/300x200',
        ],
        [        
        'id' => 103,
        'titulo' => 'Algoritmos Genéticos Aplicados',
        'autor' => 'Carlos Mendoza',
        'anio' => 2022,
        'carrera' => 'Ingeniería Informática',
        'pdf' => 'AlgoritmosGeneticos.pdf',
        'imagen' => 'https://images.unsplash.com/photo-1617839625591-e5a789593135?q=80&w=580&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D/300x200',
        ],
         [
            'id' => 104,
            'titulo' => 'Redes Inteligentes',
            'autor' => 'Ana Martínez',
            'anio' => 2023,
            'imagen' => 'https://images.unsplash.com/photo-1617839625591-e5a789593135?q=80&w=580&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D/300x200',
        ],


  // Agrega más si lo deseas
    ];

    return view('home', ['destacados' => $destacados]);
}
 }