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
$route['default_controller'] = 'Admin';

# Login
$route['auth/admin/try/login'] = 'auth/adminLogin';
$route['admin/try/logout'] = 'admin/logout';

$route['admin/customers'] = 'admin/customers';
$route['admin/create/customer'] = 'admin/create_customer';
$route['admin/edit/customer/(:any)'] = 'admin/edit_customer/$1';
$route['admin/update/customer'] = 'admin/update_customer';

$route['admin/users'] = 'admin/users';
$route['admin/create/user'] = 'admin/create_user';
$route['admin/edit/user/(:any)'] = 'admin/edit_user/$1';
$route['admin/update/user'] = 'admin/update_user';
$route['admin/delete/user/(:any)'] = 'admin/delete_user/$1';

$route['admin/projects'] = 'admin/projects';
$route['admin/project/(:any)'] = 'admin/project/$1';
$route['admin/create/project'] = 'admin/create_project';
$route['admin/edit/project/(:any)'] = 'admin/edit_project/$1';
$route['admin/update/project'] = 'admin/update_project';
// $route['admin/delete/project/(:any)'] = 'admin/delete_project/$1';

$route['admin/flats'] = 'admin/flats';
$route['admin/flat/(:any)'] = 'admin/flat/$1';
$route['admin/create/flat'] = 'admin/create_flat';
$route['admin/edit/flat/(:any)'] = 'admin/edit_flat/$1';
$route['admin/update/flat'] = 'admin/update_flat';

$route['admin/utilities'] = 'admin/utilities';
$route['admin/create/utility'] = 'admin/create_utility';
$route['admin/edit/utility/(:any)'] = 'admin/edit_utility/$1';
$route['admin/update/utility'] = 'admin/update_utility';
$route['admin/delete/utility/(:any)'] = 'admin/delete_utility/$1';

$route['admin/invoice/book/flats'] = 'admin/book_flats';
$route['admin/create/book/flat'] = 'admin/create_book_flats';
$route['admin/ajax/unsold/flat'] = 'admin/get_unsold_flats';
$route['admin/ajax/flat'] = 'admin/get_flat';
$route['admin/ajax/branch'] = 'admin/get_branch';

$route['admin/invoice/sold/flats'] = 'admin/sold_flats';
$route['admin/invoice/sold/flat/(:any)'] = 'admin/sold_flat/$1';


$route['admin/invoice/receipt/books'] = 'admin/receipt_books';
$route['admin/ajax/flats'] = 'admin/get_project_flats';
$route['admin/create/receipt/book'] = 'admin/create_receipt_book';

$route['admin/invoice/projects'] = 'admin/project_invoice';

$route['admin/banks'] = 'admin/get_banks';
$route['admin/create/bank'] = 'admin/create_bank';
$route['admin/create/branch'] = 'admin/create_branch';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
