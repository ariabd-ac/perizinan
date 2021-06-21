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
// $routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');


$routes->addRedirect('/', 'home');

// $routes->get('/register', 'Authentication::register');


//perizinan routes
$routes->get('/perizinan/request', 'C_Request::index');
$routes->get('/perizinan/(:segment)', 'C_Request::update/$1');
$routes->get('/perizinan/approved/(:segment)', 'C_Request::edit/$1');


$routes->get('/perizinan', 'C_Perizinan::index');
$routes->post('/perizinan', 'C_Perizinan::store');
$routes->post('/perizinan/filter', 'C_Perizinan::filter');
$routes->get('/p/create', 'C_Perizinan::create');


$routes->get('/c_perizinan/ambildata', 'C_Perizinan::ambildata');
$routes->get('c_perizinan/formtambah', 'C_Perizinan::formtambah');
$routes->post('c_perizinan/simpandata', 'C_Perizinan::simpandata');
$routes->post('c_perizinan/updatedata', 'C_Perizinan::updatedata');
$routes->post('c_perizinan/updatedata2', 'C_Perizinan::updatedata2');
$routes->get('c_perizinan/detail/', 'C_Perizinan::detail');
$routes->get('c_perizinan/hapus/', 'C_Perizinan::hapus');
$routes->get('c_perizinan/formpindah', 'C_Perizinan::formpindah');
$routes->get('c_perizinan/formperpanjang', 'C_Perizinan::formperpanjang');


//user-management routes
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

//message routes
$routes->get('/messages', 'C_Messages::index');
$routes->get('/c_messages/detail', 'C_Messages::detail');
$routes->post('/messages/insert', 'C_Messages::insert');
$routes->get('/c_messages/getAll', 'C_Messages::getAll');


// regulasi routes
$routes->get('/regulasi/add', 'C_Regulasi::create');
$routes->post('/regulasi', 'C_Regulasi::save');
$routes->get('/regulasi', 'C_Regulasi::index');
$routes->get('/regulasi/download/(:segment)', 'C_Regulasi::download/$1');
$routes->delete('/regulasi/(:segment)', 'C_Regulasi::destroy/$1');


// 
$routes->get('/informasi', 'C_Informasi::index');

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
