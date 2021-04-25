<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LanguageController');
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
$routes->get('locale/(:segment)', 'Locale::set/$1');
$routes->get('/', 'ReservationController::index');
$routes->get('/reservation/create', 'ReservationController::create');
$routes->post('/reservation/store', 'ReservationController::store');
$routes->get('/reservation/edit/(:num)', 'ReservationController::edit/$1');
$routes->post('/reservation/update/(:num)', 'ReservationController::update/$1');
$routes->post('/reservation/list', 'ReservationController::sortByDataTable');
$routes->post('/reservation/favorite/(:num)', 'ReservationController::favorite/$1');
$routes->post('/reservation/rating', 'ReservationController::rating');

$routes->get('/contacts', 'ContactController::index');
$routes->post('/contacts/list', 'ContactController::getLists');
$routes->get('/contact/create', 'ContactController::create');
$routes->post('/contact/store', 'ContactController::store');
$routes->get('/contact/edit/(:num)', 'ContactController::edit/$1');
$routes->post('/contact/update/(:num)', 'ContactController::update/$1');

//TODO fix
$routes->get('/contact/delete/(:num)', 'ContactController::delete/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
