<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas principales
$routes->get('/', 'General\Home::index');
$routes->get('proyectos', 'General\Proyectos::index');
$routes->get('ayuda', 'General\Ayuda::index');
$routes->get('contacto', 'General\Contacto::index');
$routes->get('equipo', 'General\Equipo::index');
$routes->get('visor', 'General\Visor::index');
$routes->get('nuestramision', 'General\Nuestramision::index');

// Rutas para logueos y registro
$routes->get('login', 'General\Login::index');
$routes->match(['get', 'post'], 'login/loginAutenticacion', 'General\Login::loginAutenticacion');
$routes->get('registro', 'General\Registro::index');
$routes->match(['get', 'post'], 'registro/registroUsuario', 'General\Registro::registroUsuario');
$routes->post('login/logout', 'General\Login::logout');


// Rutas para visor con ID

$routes->get('proyectos/visor/(:nsum)', 'General\proyectos::visor/$1');
$routes->get('proyecto', 'General\proyectos::index');
$routes->get('proyecto/visor/(:num)', 'General\proyectos::visor/$1');

$routes->get('proyectos/visor/(:nsum)', 'Proyectos::visor/$1');
$routes->get('proyecto', 'Proyecto::index');
$routes->get('proyecto/visor/(:num)', 'Proyecto::visor/$1');
$routes->get('proyectos/visor/(:num)', 'General\Proyectos::visor/$1');




// Rutas usuario y admin
$routes->get('user/indexusuario', 'Usuario\indexusuario::index');
$routes->get('user/proyectosusuario', 'Usuario\proyectosusuario::index');
$routes->get('user/equipousuario', 'Usuario\EquipoUsuario::index');
$routes->get('user/nuestramisionusuario', 'Usuario\NuestraMisionUsuario::index');
$routes->get('user/contactousuario', 'Usuario\ContactoUsuario::index');
$routes->get('user/ayudausuario', 'Usuario\AyudaUsuario::index');
$routes->get('user/enviar_contactousuario', 'Usuario\Enviar_Contacto::index');
$routes->get('user/visorusuario', 'Usuario\::index');
$routes->get('user/visorusuario/(:num)', 'Usuario\VisorUsuario::index/$1');
$routes->get('user/indexusuario', 'UserController::indexusuario');
// Ruta para el logout desde el área de usuario
$routes->get('user/logout', 'Usuario\UserLogoutController::logout');

// Ruta para logout
$routes->get('login/logout', 'General\Login::logout');  // Definir la ruta para logout

// Rutas para login
$routes->get('login', 'General\Login::index');
$routes->match(['get', 'post'], 'login/loginAutenticacion', 'General\Login::loginAutenticacion');


//rutas Admin dashbord

$routes->get('admin/VistaCRUD', 'Admin\VistaCRUD::index');

// Rutas para añadir y gestionar usuarios en el panel de administración
$routes->get('admin/AdminUser', 'Admin\AdminUser::index');
$routes->get('admin/AddUser', 'Admin\AdminUser::new');
$routes->post('AdminUser/create', 'Admin\AdminUser::create');
$routes->get('AdminUser/(:segment)/edit', 'Admin\AdminUser::edit/$1');
$routes->put('AdminUser/(:segment)', 'Admin\AdminUser::update/$1');
$routes->delete('AdminUser/(:segment)', 'Admin\AdminUser::delete/$1');
$routes->get('AdminUser/(:segment)', 'Admin\AdminUser::delete/$1');
$routes->post('AdminUser/(:segment)', 'Admin\AdminUser::delete/$1'); 

// Rutas para editar proyectos en el panel de administración
$routes->get('admin/AdminProyect', 'Admin\AdminProyect::index');
$routes->get('admin/AddProyect', 'Admin\AdminProyect::new');
$routes->post('AdminProyect/create', 'Admin\AdminProyect::create');
$routes->get('AdminProyect/(:segment)/edit', 'Admin\AdminProyect::edit/$1');
$routes->put('AdminProyect/(:segment)', 'Admin\AdminProyect::update/$1');
$routes->delete('AdminProyect/(:segment)', 'Admin\AdminProyect::delete/$1');
$routes->post('AdminProyect/(:segment)', 'Admin\AdminProyect::delete/$1');
$routes->get('AdminProyect/(:segment)', 'Admin\AdminProyect::delete/$1');




$routes->get('proyectos/actualizar-imagenes', 'ProyectosController::actualizarImagenes');

// Rutas para el controlador de proyectos
$routes->get('proyectos/visor/(:num)', 'General\proyectos::visor/$1');
$routes->get('visor/(:num)', 'Visor::visor/$1');

