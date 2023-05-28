<?php
 
namespace Config;
 
// Create a new instance of our RouteCollection class.
$routes = Services::routes();
 
// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
 
/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);
 
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
 
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
 
$routes->get('/auth/(:any)', 'Auth::$1');
$routes->post('/auth/(:any)', 'Auth::$1');
 
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
 
//home
$routes->get('/home/(:any)', 'Home::$1',['filter' => 'authGuard']);
$routes->post('/home/(:any)', 'Home::$1');

 //MAIN
$routes->get('/Main/(:any)', 'Main::$1',['filter' => 'authGuard']);
$routes->post('/Main/(:any)', 'Main::$1');

//POS
$routes->get('/pos/(:any)', 'Pos::$1',['filter' => 'authGuard']);
$routes->post('/pos/(:any)', 'Pos::$1');

$routes->get('/pdf/generate', 'PdfController::generate');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}