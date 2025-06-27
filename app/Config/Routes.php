<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas principales
$routes->get('/', 'Home::index');
$routes->get('proyectos', 'Proyectos::index');
$routes->get('/ayuda', 'Ayuda::index');
$routes->get('/contacto', 'Contacto::index');
$routes->get('/login', 'Login::index');
$routes->match(['get', 'post'], 'login/loginAutenticacion', 'Login::loginAutenticacion');
$routes->get('/equipo', 'Equipo::index');
$routes->get('/visor', 'Visor::index');
$routes->get('/nuestramision', 'Nuestramision::index');

// Rutas para visor con ID
$routes->get('proyectos/visor/(:num)', 'Proyectos::visor/$1');

$routes->get('proyecto', 'Proyecto::index');
$routes->get('proyecto/visor/(:num)', 'Proyecto::visor/$1');

