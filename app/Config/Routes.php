<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override(function () {
    return view('/pages/error404', ['title' => 'Page Not Found']);
});
$routes->setAutoRoute(true);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'Home::index');

$routes->get('/', 'Pages::index', ['filter' => 'authGuard']);
$routes->get('/register', 'RegisterController::index', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'RegisterController/store', 'RegisterController::store');
$routes->match(['get', 'post'], 'LoginController/loginAuth', 'LoginController::loginAuth');
$routes->get('/login', 'LoginController::index', ['filter' => 'noauth']);
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);
$routes->get('/daftar-lhu', 'DaftarLhuController::index', ['filter' => 'authGuard']);
$routes->get('/user', 'UserController::index', ['filter' => 'authGuard']);
$routes->get('/user/add', 'UserController::add', ['filter' => 'authGuard']);
$routes->get('/user/edit/(:num)', 'UserController::edit/$1', ['filter' => 'authGuard']);

$routes->get('/ppk', 'PpkController::index', ['filter' => 'authGuard']);

$routes->get('/fppc', 'FppcController::index', ['filter' => 'authGuard']);
$routes->get('/fppc/create', 'FppcController::create', ['filter' => 'authGuard']);
$routes->get('/fppc/verify', 'FppcController::verify', ['filter' => 'authGuard']);
$routes->post('/fppc/updateStatus', 'FppcController::updateStatus', ['filter' => 'authGuard']);
$routes->post('/fppc/store', 'FppcController::store', ['filter' => 'authGuard']);

$routes->get('/disposisi-penyelia', 'DisposisiController::index', ['filter' => 'authGuard']);
$routes->get('/disposisi-penyelia/create', 'DisposisiController::create', ['filter' => 'authGuard']);
$routes->get('/disposisi-penyelia', 'DisposisiController::verify', ['filter' => 'authGuard']);




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}