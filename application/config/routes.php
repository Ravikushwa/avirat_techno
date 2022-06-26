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
$route['default_controller'] = 'front/login';

$route['login'] = 'front/login';
$route['register'] = 'front/register';
$route['forgetpw'] = 'front/forgetpw';
$route['logout'] = 'front/logout';
$route['admin'] = 'admin/admin';
$route['vendors'] = 'admin/vendors';
$route['profile'] = 'admin/profile';
$route['profile-edit/(:any)'] = 'admin/profileEdit/$1';

//$route['group'] = 'admin/group';
$route['change-password'] = 'admin/changePassword';
$route['users'] = 'admin/users';
$route['supplier'] = 'admin/supplier';
$route['item-group'] = 'admin/item_group';
$route['units'] = 'admin/units';
$route['item-master'] = 'admin/item_master';
$route['process-master'] = 'admin/process_master';
$route['bom-master'] = 'admin/bom';
$route['purchase'] = 'admin/purchase';
$route['jobwork-inward'] = 'admin/jobwork_inward';
$route['material-issue'] = 'admin/material_issue';
$route['dispatch-schedule'] = 'admin/dispatch_schedule';
$route['grnlist'] = 'admin/grnlist';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['workorder'] = 'admin/workorder';
$route['process-opening'] = 'admin/process_opening';
$route['vendor-dispatch-schedule'] = 'admin/vendor_dispatch_schedule';
$route['stock-summary'] = 'admin/stock_summary';
$route['vendor-stock-summary'] = 'admin/vendor_stock_summary';
$route['mis'] = 'admin/mis';
