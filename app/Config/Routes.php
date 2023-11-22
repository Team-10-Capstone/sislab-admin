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
// $routes->setDefaultController('Pages');
// $routes->setDefaultMethod('index');
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

$routes->get('/', 'IndexController::index', ['filter' => 'authGuard']);
$routes->get('/register', 'RegisterController::index', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'RegisterController/store', 'RegisterController::store');
$routes->match(['get', 'post'], 'LoginController/loginAuth', 'LoginController::loginAuth');
$routes->get('/login', 'LoginController::index', ['filter' => 'noauth']);
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);

$routes->get('/admin', 'AdminController::index', ['filter' => 'authGuard']);
$routes->post('/admin/add', 'AdminController::create', ['filter' => 'authGuard']);
$routes->post('/admin/edit/(:num)', 'AdminController::edit/$1', ['filter' => 'authGuard']);
$routes->get('/admin/delete/(:num)', 'AdminController::delete/$1', ['filter' => 'authGuard']);

$routes->get('/ppk', 'PpkController::index', ['filter' => 'authGuard']);

$routes->get('/fppc', 'FppcController::index', ['filter' => 'authGuard']);
$routes->get('/fppc/create', 'FppcController::create', ['filter' => 'authGuard']);
$routes->get('/fppc/verify', 'FppcController::verify', ['filter' => 'authGuard']);
$routes->get('/fppc/verify-status/(:num)/(:num)', 'FppcController::updateStatus/$1/$2', ['filter' => 'authGuard']);
$routes->post('/fppc/store', 'FppcController::store', ['filter' => 'authGuard']);
$routes->get('/fppc/delete/(:segment)', 'FppcController::delete/$1', ['filter' => 'authGuard']);
$routes->get('/fppc/index', 'FppcController::index', ['filter' => 'authGuard']);

$routes->get('/disposisi-penyelia', 'DisposisiController::index', ['filter' => 'authGuard']);
$routes->get('/disposisi-penyelia/create/(:num)', 'DisposisiController::createDisposisiViews/$1', ['filter' => 'authGuard']);
$routes->get('/disposisi-penyelia', 'DisposisiController::verify', ['filter' => 'authGuard']);
$routes->post('/disposisi-penyelia/store', 'DisposisiController::store', ['filter' => 'authGuard']);

$routes->get('/disposisi-analis', 'AnalisController::index', ['filter' => 'authGuard']);
$routes->get('/disposisi-analis/create/(:num)', 'AnalisController::createDisposisiViews/$1', ['filter' => 'authGuard']);
$routes->post('/disposisi-analis/store', 'AnalisController::store', ['filter' => 'authGuard']);

$routes->get('/wadah', 'WadahController::index', ['filter' => 'authGuard']);
$routes->post('/wadah/create', 'WadahController::create', ['filter' => 'authGuard']);
$routes->post('/wadah/edit/(:num)', 'WadahController::edit/$1', ['filter' => 'authGuard']);
$routes->get('/wadah/delete/(:num)', 'WadahController::delete/$1', ['filter' => 'authGuard']);

$routes->get('/bentuk', 'BentukController::index', ['filter' => 'authGuard']);
$routes->post('/bentuk/create', 'BentukController::create', ['filter' => 'authGuard']);
$routes->post('/bentuk/edit/(:num)', 'BentukController::edit/$1', ['filter' => 'authGuard']);
$routes->get('/bentuk/delete/(:num)', 'BentukController::delete/$1', ['filter' => 'authGuard']);

$routes->get('/parameter', 'ParameterUjiController::index', ['filter' => 'authGuard']);
$routes->post('/parameter/create', 'ParameterUjiController::create', ['filter' => 'authGuard']);
$routes->post('/parameter/edit/(:num)', 'ParameterUjiController::edit/$1', ['filter' => 'authGuard']);
$routes->get('/parameter/delete/(:num)', 'ParameterUjiController::delete/$1', ['filter' => 'authGuard']);

$routes->get('/pengujian', 'PengujianController::index', ['filter' => 'authGuard']);
$routes->get('/pengujian/input-hasil/(:num)', 'PengujianController::input/$1', ['filter' => 'authGuard']);
$routes->get('/pengujian/selesai/(:num)', 'PengujianController::selesaikan/$1', ['filter' => 'authGuard']);
$routes->post('/pengujian/reset/(:num)', 'PengujianController::reset/$1', ['filter' => 'authGuard']);

$routes->post('/hasil-uji/create', 'HasilUjiController::create', ['filter' => 'authGuard']);

$routes->get('/lhus', 'LhusController::index', ['filter' => 'authGuard']);
$routes->get('/lhus/ajukan/(:num)', 'LhusController::ajukanPage/$1', ['filter' => 'authGuard']);
$routes->get('/lhus/ajukan-lhus/(:num)', 'LhusController::ajukanLhus/$1', ['filter' => 'authGuard']);
$routes->get('/lhus/verifikasi', 'LhusController::VerifikasiIndex', ['filter' => 'authGuard']);
$routes->get('/lhus/verifikasi/(:num)', 'LhusController::VerifikasiDetails/$1', ['filter' => 'authGuard']);
$routes->post('/lhus/perbaikan/(:num)', 'LhusController::perbaikanLhus/$1', ['filter' => 'authGuard']);
$routes->post('/lhus/verifikasi/(:num)', 'LhusController::verifikasiLhus/$1', ['filter' => 'authGuard']);

$routes->get('/uploads/(:segment)', 'ImageController::show/$1');

$routes->get('/lhu', 'LhuController::index', ['filter' => 'authGuard']);

$routes->get('/print-lhu/(:num)', 'LhuController::print/$1', ['filter' => 'authGuard']);
$routes->get('/print-lhus/(:num)/(:num)', 'LhusController::print/$1/$2', ['filter' => 'authGuard']);





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