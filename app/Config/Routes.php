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
$routes->set404Override();
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

$routes->get('/', 'Pages::index');
$routes->get('/index', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/accordion', 'Pages::accordion');
$routes->get('/add-product', 'Pages::add-product');
$routes->get('/advanced-forms', 'Pages::advanced-forms');
$routes->get('/alerts', 'Pages::alerts');
$routes->get('/apex-charts', 'Pages::apex-charts');
$routes->get('/avatars', 'Pages::avatars');
$routes->get('/badges', 'Pages::badges');
$routes->get('/blockquotes', 'Pages::blockquotes');
$routes->get('/blog-details', 'Pages::blog-details');
$routes->get('/blog-edit', 'Pages::blog-edit');
$routes->get('/blog', 'Pages::blog');
$routes->get('/breadcrumb', 'Pages::breadcrumb');
$routes->get('/buttons', 'Pages::buttons');
$routes->get('/calendar', 'Pages::calendar');
$routes->get('/cards', 'Pages::cards');
$routes->get('/carousel', 'Pages::carousel');
$routes->get('/cart', 'Pages::cart');
$routes->get('/chartjs', 'Pages::chartjs');
$routes->get('/chat', 'Pages::chat');
$routes->get('/checkout', 'Pages::checkout');
$routes->get('/collapse', 'Pages::collapse');
$routes->get('/columns', 'Pages::columns');
$routes->get('/comingsoon', 'Pages::comingsoon');
$routes->get('/construction', 'Pages::construction');
$routes->get('/contacts', 'Pages::contacts');
$routes->get('/contactus', 'Pages::contactus');
$routes->get('/createpassword-cover', 'Pages::createpassword-cover');
$routes->get('/createpassword-cover2', 'Pages::createpassword-cover2');
$routes->get('/createpassword', 'Pages::createpassword');
$routes->get('/datatables', 'Pages::datatables');
$routes->get('/draggable', 'Pages::draggable');
$routes->get('/dropdown', 'Pages::dropdown');
$routes->get('/echartjs', 'Pages::echartjs');
$routes->get('/edit-product', 'Pages::edit-product');
$routes->get('/edittable', 'Pages::edittable');
$routes->get('/emptypage', 'Pages::emptypage');
$routes->get('/error404', 'Pages::error404');
$routes->get('/error500', 'Pages::error500');
$routes->get('/faqs', 'Pages::faqs');
$routes->get('/file-details', 'Pages::file-details');
$routes->get('/file-upload', 'Pages::file-upload');
$routes->get('/filemanager-list', 'Pages::filemanager-list');
$routes->get('/filemanager', 'Pages::filemanager');
$routes->get('/forgot-cover', 'Pages::forgot-cover');
$routes->get('/forgot-cover2', 'Pages::forgot-cover2');
$routes->get('/forgot', 'Pages::forgot');
$routes->get('/form-checkbox', 'Pages::form-checkbox');
$routes->get('/form-elements', 'Pages::form-elements');
$routes->get('/form-input-group', 'Pages::form-input-group');
$routes->get('/form-layouts', 'Pages::form-layouts');
$routes->get('/form-radio', 'Pages::form-radio');
$routes->get('/form-select', 'Pages::form-select');
$routes->get('/form-switch', 'Pages::form-switch');
$routes->get('/form-validations', 'Pages::form-validations');
$routes->get('/gallery', 'Pages::gallery');
$routes->get('/google-maps', 'Pages::google-maps');
$routes->get('/grid', 'Pages::grid');
$routes->get('/index2', 'Pages::index2');
$routes->get('/index3', 'Pages::index3');
$routes->get('/index4', 'Pages::index4');
$routes->get('/index5', 'Pages::index5');
$routes->get('/index6', 'Pages::index6');
$routes->get('/index7', 'Pages::index7');
$routes->get('/index8', 'Pages::index8');
$routes->get('/index9', 'Pages::index9');
$routes->get('/index10', 'Pages::index10');
$routes->get('/index11', 'Pages::index11');
$routes->get('/index12', 'Pages::index12');
$routes->get('/indicators', 'Pages::indicators');
$routes->get('/invoice-list', 'Pages::invoice-list');
$routes->get('/invoice', 'Pages::invoice');
$routes->get('/landing', 'Pages::landing');
$routes->get('/leaflet-maps', 'Pages::leaflet-maps');
$routes->get('/list-group', 'Pages::list-group');
$routes->get('/list', 'Pages::list');
$routes->get('/lockscreen-cover', 'Pages::lockscreen-cover');
$routes->get('/lockscreen-cover2', 'Pages::lockscreen-cover2');
$routes->get('/lockscreen', 'Pages::lockscreen');
$routes->get('/mail-inbox', 'Pages::mail-inbox');
$routes->get('/mail-settings', 'Pages::mail-settings');
$routes->get('/maintanace', 'Pages::maintanace');
$routes->get('/mega-menu', 'Pages::mega-menu');
$routes->get('/modal', 'Pages::modal');
$routes->get('/navbar', 'Pages::navbar');
$routes->get('/notifications', 'Pages::notifications');
$routes->get('/offcanvas', 'Pages::offcanvas');
$routes->get('/order-details', 'Pages::order-details');
$routes->get('/orders', 'Pages::orders');
$routes->get('/pagination', 'Pages::pagination');
$routes->get('/pricing', 'Pages::pricing');
$routes->get('/product-list', 'Pages::product-list');
$routes->get('/products-details', 'Pages::products-details');
$routes->get('/products', 'Pages::products');
$routes->get('/profile-settings', 'Pages::profile-settings');
$routes->get('/profile', 'Pages::profile');
$routes->get('/progress', 'Pages::progress');
$routes->get('/quil-editor', 'Pages::quil-editor');
$routes->get('/rangeslider', 'Pages::rangeslider');
$routes->get('/ratings', 'Pages::ratings');
$routes->get('/remix-icons', 'Pages::remix-icons');
$routes->get('/reset-cover', 'Pages::reset-cover');
$routes->get('/reset-cover2', 'Pages::reset-cover2');
$routes->get('/reset', 'Pages::reset');
$routes->get('/reviews', 'Pages::reviews');
$routes->get('/scrollspy', 'Pages::scrollspy');
$routes->get('/signin-cover', 'Pages::signin-cover');
$routes->get('/signin-cover2', 'Pages::signin-cover2');
$routes->get('/signin', 'Pages::signin');
$routes->get('/signup-cover', 'Pages::signup-cover');
$routes->get('/signup-cover2', 'Pages::signup-cover2');
$routes->get('/signup', 'Pages::signup');
$routes->get('/skeleton', 'Pages::skeleton');
$routes->get('/spinners', 'Pages::spinners');
$routes->get('/sweetalert', 'Pages::sweetalert');
$routes->get('/tabler-icons', 'Pages::tabler-icons');
$routes->get('/tables', 'Pages::tables');
$routes->get('/tabs', 'Pages::tabs');
$routes->get('/tasks', 'Pages::tasks');
$routes->get('/team', 'Pages::team');
$routes->get('/terms', 'Pages::terms');
$routes->get('/timeline', 'Pages::timeline');
$routes->get('/toast', 'Pages::toast');
$routes->get('/todo', 'Pages::todo');
$routes->get('/tooltip-popovers', 'Pages::tooltip-popovers');
$routes->get('/treeview', 'Pages::treeview');
$routes->get('/vector-maps', 'Pages::vector-maps');
$routes->get('/verfication-cover', 'Pages::verfication-cover');
$routes->get('/verfication-cover2', 'Pages::verfication-cover2');
$routes->get('/verfication', 'Pages::verfication');
$routes->get('/widgets', 'Pages::widgets');
$routes->get('/wishlist', 'Pages::wishlist');

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
