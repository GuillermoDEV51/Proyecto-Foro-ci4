<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas principales
$routes->get('/', 'Home::index');
$routes->get('proyectos', 'Proyectos::index');
$routes->get('ayuda', 'Ayuda::index');
$routes->get('contacto', 'Contacto::index');
$routes->get('equipo', 'Equipo::index');
$routes->get('visor', 'Visor::index');
$routes->get('nuestramision', 'Nuestramision::index');
$routes->get('login', 'Login::index');
$routes->match(['get', 'post'], 'login/loginAutenticacion', 'Login::loginAutenticacion');
$routes->get('registro', 'Registro::index');


// Rutas para visor con ID
$routes->get('proyectos/visor/(:nsum)', 'Proyectos::visor/$1');

$routes->get('proyecto', 'Proyecto::index');
$routes->get('proyecto/visor/(:num)', 'Proyecto::visor/$1');
$routes->post('login/logout', 'Login::logout');


// Rutas usuario y admin
$routes->get('user/indexusuario', 'indexusuario::index');
$routes->get('user/proyectosusuario', 'proyectosusuario::index');
$routes->get('user/equipousuario', 'equipousuario::index');
$routes->get('user/nuestramisionusuario', 'nuestramisionusuario::index');
$routes->get('user/contactousuario', 'contactousuario::index');
$routes->get('user/ayudausuario', 'ayudausuario::index');
$routes->get('user/enviar_contactousuario', 'enviarcontactousuario::index');
$routes->get('user/visorusuario', '::index');

$routes->get('admin/VistaCRUD', 'VistaCRUD::index');


