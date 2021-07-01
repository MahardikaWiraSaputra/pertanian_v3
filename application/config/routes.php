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
|	https://codeigniter.com/user_guide/general/routing.html
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
// $route['(:any)'] = "pages/detail/$1";
$route['default_controller'] = 'home';
// $route['default_controller'] = 'administrator/dashboard/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//MENU FRONTEND
$route['home'] = 'home/home';
$route['list_produk'] = 'home/produk';
$route['list_produk/(:any)'] = 'home/produk/$1';
$route['produk/(:any)'] = 'home/produk/detail/$1';
// $route['list_umkm'] = 'home/umkm';
// $route['list_umkm/(:any)'] = 'home/umkm/$1';
// $route['umkm/(:any)'] = 'home/umkm/detail/$1';

$route['kategori/(:any)'] = 'home/kategori/detail/$1';


$route['account'] = 'home/account/index';
$route['account/(:any)'] = 'home/account/$1';

$route['cart'] = 'home/cart';
$route['cart/checkout'] = 'home/cart/checkout';











// $route['events'] = 'home/events';
// $route['unduhan'] = 'home/download';
// $route['news'] = 'home/posts';
// $route['news/(:any)'] = 'home/posts/$1';
// $route['news/detail/(:any)'] = 'home/posts/detail/$1';
// $route['news/category/(:any)'] = 'home/posts/kategori/$1';
// $route['(:any)'] = 'home/pages/detail/$1';
