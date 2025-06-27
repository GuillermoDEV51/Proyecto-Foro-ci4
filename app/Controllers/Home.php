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
    'titulo' => 'Tecnologia Digital',
    'autor'  => 'Ana Laura Rivoir',
    'anio'   => 2024,
    'carrera' => 'Ingeniería Informática',
    'imagen' => 'https://images.unsplash.com/photo-1617839625591-e5a789593135?q=80&w=580&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D/300x200'
  ],
  [
    'id' => 102,
    'titulo' => 'Optimización de Procesos Industriales',
    'autor'  => 'Jeyson Patricio Egas Garcia',
    'anio'   => 2023,
    'carrera' => 'Ingeniería Marítima',
    'imagen' => 'https://images.unsplash.com/photo-1568347877321-f8935c7dc5a3?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D/300x200'
  ],
  [
    'id' => 103,
    'titulo' => 'Algoritmos Genéticos Aplicados',
    'autor'  => 'Carlos Mendoza',
    'anio'   => 2022,
    'carrera' => 'Ingeniería Informática',
    'imagen' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  ],
  [
    'id' => 104,
    'titulo' => 'Seguridad en Redes',
    'autor'  => 'Ruben Bustamante',
    'anio'   => 2024,
    'carrera' => 'Ingeniería Informática',
    'imagen' => 'https://images.unsplash.com/photo-1611926653458-09294b3142bf?q=80&w=580&auto=format&fit=crop&ixlib=rb-4.1.0'
  ],


  // Agrega más si lo deseas
    ];

    return view('home', ['destacados' => $destacados]);
}
 }