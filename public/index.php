<?php
// ini_set('session.save_path', 'tmp');
if (empty(session_id()))
	session_start();
/**
 * Front controller
 *
 * PHP version 7.0
 */
/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';
/**
 * Error and Exception handling
 */
// 2023/04 KhanhDinh - Change for PHP8 [start]
error_reporting(E_ALL);
// set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
// 2023/04 KhanhDinh - Change for PHP8 [end]

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
// $router->add('abc', ['controller' => 'Home', 'action' => 'index']);
// $router->add('{controller}/{action}');

// $router->add('test', ['controller' => 'Home', 'action' => 'test']);

// //test form in php abc.php
// $router->add('testform.php', ['controller' => 'Home', 'action' => 'testform']);

// //test ajax from abc.php
// $router->add('getajax.php', ['controller' => 'Home', 'action' => 'getajax']);

// /////////////////test 210517

// $router->add('certification_common', ['controller' => 'Home', 'action' => 'certification']);

// $router->add('', ['controller' => 'Saagg', 'action' => 'index']);
$router->add('partner/log/?', ['controller' => 'LogController', 'action' => 'index', 'namespace' => 'Maintenance']);

//SAAG/SOSP/SOUP/SOI
$router->add('partner/?', ['controller' => 'RedirectController', 'action' => 'index', 'namespace' => 'Exec']);
$router->add('partner/(saag|sosp|soup|soi)/?', ['controller' => 'RedirectController', 'action' => 'index', 'namespace' => 'Exec']);
$router->add('partner/.+/req/?', ['controller' => 'RedirectController', 'action' => 'req', 'namespace' => 'Exec']);
$router->add('partner/.+/member/?', ['controller' => 'RedirectController', 'action' => 'member', 'namespace' => 'Exec']);
$router->add('partner/.+/member/news.php', ['controller' => 'RedirectController', 'action' => 'news', 'namespace' => 'Exec']);

$router->add('partner/.+/member/download.php', ['controller' => 'RedirectController', 'action' => 'download', 'namespace' => 'Exec']);
$router->add('partner/.+/member/faq.php', ['controller' => 'RedirectController', 'action' => 'faq', 'namespace' => 'Exec']);
$router->add('partner/.+/member/solution.php', ['controller' => 'RedirectController', 'action' => 'solution', 'namespace' => 'Exec']);
$router->add('partner/.+/member/keihi-bank.php', ['controller' => 'RedirectController', 'action' => 'keihi', 'namespace' => 'Exec']);
$router->add('partner/.+/member/seminar.php', ['controller' => 'RedirectController', 'action' => 'seminar', 'namespace' => 'Exec']);
$router->add('partner/.+/member/mag.php', ['controller' => 'RedirectController', 'action' => 'mag', 'namespace' => 'Exec']);
$router->add('partner/.+/member/form/?', ['controller' => 'RedirectController', 'action' => 'form', 'namespace' => 'Exec']);
$router->add('partner/.+/member/contact.php', ['controller' => 'RedirectController', 'action' => 'contact', 'namespace' => 'Exec']);
// $router->adpartner/d('.+/saag_contact_form/?', ['controller' => 'RedirectController', 'action' => 'contact_form', 'namespace' => 'Exec']);
$router->add('partner/.+/search/?', ['controller' => 'RedirectController', 'action' => 'search', 'namespace' => 'Exec']);
// ↓↓ <2022/06/07> <YenNhi>: add route shop search 
$router->add('partner/shop/search/result/?', ['controller' => 'ShopSearchController', 'action' => 'index', 'namespace' => 'Maintenance']);
// ↑↑ <2022/06/07> <YenNhi> 
//excute request from (saag|sosp|soup)/member/contact.php
$router->add('partner/.+/member/contact_form.php', ['controller' => 'ExcuteController', 'action' => 'contact_form', 'namespace' => 'Exec']);

// ↓↓　<2022/11/18> <KhanhDinh> <add route page saag/member/about.php>
//SAAG
$router->add('partner/saag/member/about.php', ['controller' => 'RedirectController', 'action' => 'about', 'namespace' => 'Exec']);
// ↑↑　<2022/11/18> <KhanhDinh> <add route page saag/member/about.php>

//SOSP
$router->add('partner/sosp/member/ordersp.php', ['controller' => 'RedirectController', 'action' => 'ordersp', 'namespace' => 'Exec']);
//excute request from sosp/member/ordersp.php
$router->add('partner/sosp/member/ordersp_form.php', ['controller' => 'ExcuteController', 'action' => 'ordersp_form', 'namespace' => 'Exec']);
$router->add('partner/sosp/member/about.php', ['controller' => 'RedirectController', 'action' => 'about', 'namespace' => 'Exec']);

// $router->add('{id:.+}', ['controller' => 'RedirectController', 'action' => 'index', 'namespace' => 'Exec']);
// $router->add('.+/member/download.php', ['controller' => 'RedirectController', 'action' => 'download', 'namespace' => 'Exec']);

//SOI
$router->add('partner/soi/schedule.php', ['controller' => 'RedirectController', 'action' => 'schedule', 'namespace' => 'Exec']);
$router->add('partner/soi/step.php', ['controller' => 'RedirectController', 'action' => 'step', 'namespace' => 'Exec']);

//check login
$router->add('partner/login/typePage/?', ['controller' => 'LoginController', 'action' => 'login', 'namespace' => 'Auth']);
$router->add('partner/logout/typePage/?', ['controller' => 'LogoutController', 'action' => 'logout', 'namespace' => 'Auth']);

$router->add('partner/compare/?', ['controller' => 'LogoutController', 'action' => 'compare', 'namespace' => 'Auth']);

//iframe
$router->add('partner/policy/?', ['controller' => 'RedirectController', 'action' => 'policy', 'namespace' => 'Exec']);

//ajax form and search SAAG/SOSP/SOUP/SOI
$router->add('partner/form-controller/?', ['controller' => 'FormController', 'action' => 'index', 'namespace' => 'Maintenance']);
$router->add('partner/search-controller/?', ['controller' => 'SearchController', 'action' => 'index', 'namespace' => 'Maintenance']);
$router->add('partner/master-controller/?', ['controller' => 'MasterController', 'action' => 'index', 'namespace' => 'Maintenance']);


//maintenance
$router->add('partner/maintenance/?', ['controller' => 'MaintenanceController', 'action' => 'master', 'namespace' => 'Master']);
$router->add('partner/maintenance/master.php', ['controller' => 'MaintenanceController', 'action' => 'master', 'namespace' => 'Master']);
$router->add('partner/maintenance/login-master.php', ['controller' => 'MaintenanceController', 'action' => 'login', 'namespace' => 'Master']);



$router->dispatch($_SERVER['QUERY_STRING']);
