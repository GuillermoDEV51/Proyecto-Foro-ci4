<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 //routas de home
$routes->get('/', 'Home::index');

/* */

// routas para proyectos
$routes->get('/proyectos', 'proyectos::index');

// routas para ayuda
$routes->get('/ayuda', 'ayuda::index');

// routas para contacto
$routes->get('/contacto', 'contacto::index');


// routas para el login
$routes->get('/login', 'login::index');
$routes->match(['get', 'post'], 'login/loginAutenticacion', 'login::loginAutenticacion');


// routas para el login
$routes->get('/equipo',  'equipo::index');

// rutas del visor de proyectos 
$routes->get('/visor', 'visor::index');
// rutas de nuestra misión
$routes->get('/nuestramision', 'nuestramision::index');

// rutas del visor de proyectos con ID
$routes->get('visor/(:num)', 'VisorController::index/$1');
$routes->get('proyecto', 'Proyecto::index');
$routes->get('proyecto/visor/(:num)', 'Proyecto::visor/$1');




$routes->get('testdb', 'TestDB::index');
$routes->get('TestDB2', 'TestDB2::index');




