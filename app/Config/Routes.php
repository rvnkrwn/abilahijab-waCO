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
$routes->setDefaultController('Pages');
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
$routes->get('/', 'Pages::index');
$routes->get('/shop', 'Pages::shop');
$routes->get('/detail/(:segment)', 'Pages::detail/$1');
$routes->get('/about', 'Pages::about');
$routes->get('/login', 'Pages::login');
$routes->get('/register', 'Pages::register');
$routes->post('/checkout', 'Pages::checkout');


// CRUD Controller
$routes->post('/register', 'Users::saveData');
$routes->post('/login', 'Users::checkData');
$routes->get('/logout', 'Users::logout');



// Admin Routes
$routes->get('/admin','Admins::index');
$routes->get('/admin/users','Admins::users');
$routes->get('/admin/products','Admins::products');
$routes->get('/admin/reports','Admins::reports');


// CRUD Controller Admin
$routes->post('/admin/register', 'Admins::newUser');
$routes->post('/admin/new-product', 'Admins::newProduct');
$routes->get('/admin/delete/(:segment)', 'Admins::deleteUser/$1');
$routes->get('/admin/delete-product/(:segment)', 'Admins::deleteProduct/$1');
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
