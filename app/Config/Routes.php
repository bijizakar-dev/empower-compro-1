<?php

namespace Config;

$routes = Services::routes();

// ---------------------------------------------------------
// SYSTEM DEFAULTS
// ---------------------------------------------------------
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(false); // ← AUTO ROUTES DIMATIKAN
// $routes->setAutoRoute(true); // ← JIKA MAU AKTIF LAGI

// ---------------------------------------------------------
// MAIN ROUTES
// ---------------------------------------------------------
$routes->get('/', 'Home::getMain');
$routes->get('adm', 'Home::getDashboardAdmin', ['filter' => 'auth']);

// ---------------------------------------------------------
// ADM GROUP
// ---------------------------------------------------------
$routes->group('adm', ['namespace' => 'App\Controllers\Adm'], function ($routes) {

    // Account
    $routes->get('account', 'Account::index');

    // Setting
    $routes->get('setting', 'Setting::index');
    $routes->post('setting/update', 'Setting::update');

    // Masterdata Services
    $routes->group('masterdata/service', function ($routes) {
        $routes->get('/',               'ServiceController::index',  ['filter' => 'auth']);
        $routes->get('create',          'ServiceController::create', ['filter' => 'auth']);
        $routes->get('edit/(:num)',     'ServiceController::edit/$1',   ['filter' => 'auth']);
        $routes->get('delete/(:num)',   'ServiceController::delete/$1', ['filter' => 'auth']);

        $routes->post('store',          'ServiceController::store',    ['filter' => 'auth']);
        $routes->post('update/(:num)',  'ServiceController::update/$1', ['filter' => 'auth']);
    });

    // Masterdata Portfolio Category
    $routes->group('masterdata/portfolio-category', function ($routes) {
        $routes->get('/',                 'PortfolioCategoryController::index',  ['filter' => 'auth']);
        $routes->get('create',            'PortfolioCategoryController::create', ['filter' => 'auth']);
        $routes->get('edit/(:num)',       'PortfolioCategoryController::edit/$1',   ['filter' => 'auth']);
        $routes->get('delete/(:num)',     'PortfolioCategoryController::delete/$1', ['filter' => 'auth']);

        $routes->post('store',            'PortfolioCategoryController::store',    ['filter' => 'auth']);
        $routes->post('update/(:num)',    'PortfolioCategoryController::update/$1', ['filter' => 'auth']);
    });

    // Masterdata Portfolio & Media
    $routes->group('masterdata/portfolio', function ($routes) {
        // Portfolio
        $routes->get('/',               'PortfolioController::index', ['filter' => 'auth']);
        $routes->get('create',          'PortfolioController::create', ['filter' => 'auth']);
        $routes->post('store',          'PortfolioController::store', ['filter' => 'auth']);
        $routes->get('edit/(:num)',     'PortfolioController::edit/$1', ['filter' => 'auth']);
        $routes->post('update/(:num)',  'PortfolioController::update/$1', ['filter' => 'auth']);
        $routes->get('delete/(:num)',   'PortfolioController::delete/$1', ['filter' => 'auth']);

        // Portfolio Media
        $routes->post('media-upload/(:num)',    'PortfolioController::uploadMedia/$1', ['filter' => 'auth']);
        $routes->post('media-add-url/(:num)',   'PortfolioController::addMediaUrl/$1', ['filter' => 'auth']);
        $routes->get('media-delete/(:num)',     'PortfolioController::deleteMedia/$1', ['filter' => 'auth']);
    });

    // Masterdata PriceList
    $routes->group('masterdata/pricelist', function ($routes) {
        $routes->get('/',                 'PriceListController::index',  ['filter' => 'auth']);
        $routes->get('create',            'PriceListController::create', ['filter' => 'auth']);
        $routes->get('edit/(:num)',       'PriceListController::edit/$1',   ['filter' => 'auth']);
        $routes->get('delete/(:num)',     'PriceListController::delete/$1', ['filter' => 'auth']);

        $routes->post('store',            'PriceListController::store',    ['filter' => 'auth']);
        $routes->post('update/(:num)',    'PriceListController::update/$1', ['filter' => 'auth']);
    });

    // Masterdata Team 
    $routes->group('masterdata/team', function ($routes) {
        $routes->get('/',               'TeamController::index');
        $routes->get('create',          'TeamController::create');
        $routes->get('edit/(:num)',     'TeamController::edit/$1');
        $routes->get('delete/(:num)',   'TeamController::delete/$1');

        $routes->post('store',          'TeamController::store');
        $routes->post('update/(:num)',  'TeamController::update/$1');
    });

    // Layanan Contact Request 
    $routes->group('contact-request', function ($routes) {
        $routes->get('/',                 'ContactRequestController::index',  ['filter' => 'auth']);
        $routes->get('detail/(:num)',     'ContactRequestController::detail/$1', ['filter' => 'auth']);
        $routes->get('delete/(:num)',     'ContactRequestController::delete/$1', ['filter' => 'auth']);
    });
});

$routes->post('contact/send', 'ContactController::send');

// ---------------------------------------------------------
// STORAGE STATIC ROUTES
// ---------------------------------------------------------
$routes->get('storage/(:any)', 'Storage::file/$1');
$routes->get('storage/(:any)/(:any)', 'Storage::file/$1/$2');
$routes->get('storage/(:any)/(:any)/(:any)', 'Storage::file/$1/$2/$3');
$routes->get('storage/(:any)/(:any)/(:any)/(:any)', 'Storage::file/$1/$2/$3/$4');

// ---------------------------------------------------------
// AUTH
// ---------------------------------------------------------
$routes->get('auth/login',  'Auth::getLogin');
$routes->post('auth/login', 'Auth::postLogin');
$routes->get('auth/logout', 'Auth::getLogout');

$routes->get('system/user', 'System::getUser');

// ---------------------------------------------------------
// API GROUP (AUTO ROUTE DIGANTI MANUAL SEMUA)
// ---------------------------------------------------------
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function ($routes) {

    // Inventory
    $routes->get('inventory/listItem', 'Inventory::getListItem', ['filter' => 'auth']);
    $routes->delete('inventory', 'Inventory::delete');

    // MASTERDATA API
    $routes->group('masterdata', function ($routes) {

        $routes->get('listDepartment', 'Masterdata::getListDepartment', ['filter' => 'auth']);
        $routes->get('department',     'Masterdata::getDepartment',     ['filter' => 'auth']);
        $routes->post('department',    'Masterdata::postDepartment',    ['filter' => 'auth']);
        $routes->delete('department',  'Masterdata::deleteDepartment',  ['filter' => 'auth']);

        $routes->get('listWarehouse', 'Masterdata::getListWarehouse', ['filter' => 'auth']);
        $routes->get('warehouse',     'Masterdata::getWarehouse',     ['filter' => 'auth']);
        $routes->post('warehouse',    'Masterdata::postWarehouse',    ['filter' => 'auth']);
        $routes->delete('warehouse',  'Masterdata::deleteWarehouse',  ['filter' => 'auth']);

        $routes->get('listUnit',     'Masterdata::getListUnit',  ['filter' => 'auth']);
        $routes->get('unit',         'Masterdata::getUnit',      ['filter' => 'auth']);
        $routes->post('unit',        'Masterdata::postUnit',     ['filter' => 'auth']);
        $routes->delete('unit',      'Masterdata::deleteUnit',   ['filter' => 'auth']);

        $routes->get('listSupplier', 'Masterdata::getListSupplier', ['filter' => 'auth']);
        $routes->get('supplier',     'Masterdata::getSupplier',     ['filter' => 'auth']);
        $routes->post('supplier',    'Masterdata::postSupplier',    ['filter' => 'auth']);
        $routes->delete('supplier',  'Masterdata::deleteSupplier',  ['filter' => 'auth']);

        $routes->get('listSupplierContact', 'Masterdata::getListSupplierContact', ['filter' => 'auth']);
        $routes->get('supplierContact',     'Masterdata::getSupplierContact',     ['filter' => 'auth']);
        $routes->post('supplierContact',    'Masterdata::postSupplierContact',    ['filter' => 'auth']);
        $routes->delete('supplierContact',  'Masterdata::deleteSupplierContact',  ['filter' => 'auth']);

        $routes->get('listEmployee', 'Masterdata::getListEmployee', ['filter' => 'auth']);
        $routes->get('employee',     'Masterdata::getEmployee',     ['filter' => 'auth']);
        $routes->post('employee',    'Masterdata::postEmployee',    ['filter' => 'auth']);
        $routes->delete('employee',  'Masterdata::deleteEmployee',  ['filter' => 'auth']);

        $routes->get('listItem', 'Masterdata::getListItem', ['filter' => 'auth']);
        $routes->get('item',     'Masterdata::getItem',     ['filter' => 'auth']);
        $routes->post('item',    'Masterdata::postItem',    ['filter' => 'auth']);
        $routes->delete('item',  'Masterdata::deleteItem',  ['filter' => 'auth']);

        $routes->get('listFactory', 'Masterdata::getListFactory', ['filter' => 'auth']);
        $routes->get('factory',     'Masterdata::getFactory',     ['filter' => 'auth']);
        $routes->post('factory',    'Masterdata::postFactory',    ['filter' => 'auth']);
        $routes->delete('factory',  'Masterdata::deleteFactory',  ['filter' => 'auth']);
    });

    // SYSTEM API
    $routes->group('system', function ($routes) {
        $routes->get('listUser',          'System::getListUser',          ['filter' => 'auth']);
        $routes->get('user',              'System::getUser',              ['filter' => 'auth']);
        $routes->post('user',             'System::postUser',             ['filter' => 'auth']);
        $routes->delete('user',           'System::deleteUser',           ['filter' => 'auth']);
        $routes->get('checkPasswordUser', 'System::getCheckPasswordUser', ['filter' => 'auth']);
        $routes->post('changePasswordUser','System::postChangePasswordUser',['filter' => 'auth']);
    });
});