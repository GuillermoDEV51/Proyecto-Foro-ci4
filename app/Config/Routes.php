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




// rutas del admin 
$routes->get('/dashAdmin', 'dashAdmin::index');