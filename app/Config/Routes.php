<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 //routas de home
$routes->get('/', 'Home::index');

/* */

// routas para
$routes->get('/proyectos', 'proyectos::index');





// routas para el login
$routes->get('/login', 'login::index');




// rutas del admin 
$routes->get('/dashAdmin', 'dashAdmin::index');