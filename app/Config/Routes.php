<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Authentication::login');
$routes->get('/register', 'Authentication::register');
$routes->get('/perizinan', 'C_Perizinan::index');
$routes->get('/user-management', 'C_UserManagement::index');
$routes->get('/user-management/add', 'C_UserManagement::add');
$routes->post('/user-management', 'C_UserManagement::store');
$routes->get('/user-management/edit/(:segment)', 'C_UserManagement::edit/$1');
$routes->put('/user-management/(:segment)', 'C_UserManagement::update/$1');
$routes->delete('/user-management/(:segment)', 'C_UserManagement::destroy/$1');

$routes->get('/korpokla/', 'C_Korpokla::index');
$routes->delete('/korpokla/(:segment)', 'C_Korpokla::destroy/$1');
$routes->get('/korpokla/add', 'C_Korpokla::add');
$routes->post('/korpokla', 'C_Korpokla::store');
$routes->get('/korpokla/edit/(:segment)', 'C_Korpokla::edit/$1');
$routes->put('/korpokla/(:segment)', 'C_Korpokla::update/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
