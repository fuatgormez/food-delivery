<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$frontend = 'frontend';

//frontend
$route['select-store/(:num)'] = $frontend . '/store/select/$1';
$route['all-store'] = $frontend . '/store/all';
$route['product'] = $frontend . '/product';

//frontend account
$route['account'] = $frontend . '/account/dashboard';
$route['account/dashboard'] = $frontend . '/account/dashboard';
$route['account/signin'] = $frontend . '/account/signin';
$route['account/signup'] = $frontend . '/account/signup';
$route['account/logout'] = $frontend . '/account/logout';
$route['account/forgot-password'] = $frontend . '/account/forgot-password';
$route['account/reset-password'] = $frontend . '/account/reset-password';
// $route['account/verification/(:any)'] = $frontend . '/account/verification/$1';
$route['account/verification(/:any)?'] = $frontend . '/account/verification$1';
$route['account/verification-otp'] = $frontend . '/account/verification-otp';
$route['account/verification-email'] = $frontend . '/account/verification-email';
$route['account/verify'] = $frontend . '/account/verify';
// $route['account/mobile-verification/(:num)'] = $frontend . '/account/mobile-verification/$1';
$route['account/new-password'] = $frontend . '/account/new-password';
$route['account/add-address'] = $frontend . '/account/add-address';
$route['account/update-address'] = $frontend . '/account/update-address';
$route['account/delete-address'] = $frontend . '/account/delete-address';
$route['account/get-address'] = $frontend . '/account/get-address';

// $route['product/(:any)/(:any)/(:num)'] = 'shop/product/index/$1/$2/$3';
// $route['(:any)/(:num)'] = 'shop/product/category/$1/$2';


//backend
$route['backend'] = 'backend/dashboard';