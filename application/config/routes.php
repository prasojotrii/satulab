<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['sysadmin/glassware/(:num)/(:any)/(:num)'] = 'sysadmin/glassware/$1/$2/$3';
$route['api/karantina'] = 'api/index';
$route['api/karantina/(:num)'] = 'api/view/$1';
$route['api/karantina/add'] = 'api/add';
$route['api/karantina/update/(:num)'] = 'api/update/$1';
$route['api/karantina/delete/(:num)'] = 'api/delete/$1';
$route['api/karantina/delete'] = 'api/karantina/deleteby';
$route['analisa/print_labels/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'analisa/print_labels/$1/$2/$3/$4/$5';
$route['api/karantina/insert_data'] = 'api/insert_data_karantina';
$route['api/karantina/update_time_rnd'] = 'api/update_data_pengerjaan_rnd';
$route['api/karantina/delete_data'] = 'api/delete_data_karantina';
$route['api/karantina/get_all_identitas'] = 'api/get_all_identitas';
$route['api/karantina/get_spec_by_id_kar'] = 'api/get_spec_by_id_kar';
$route['api/insert_data_stabilitas'] = 'api/insert_data_stabilitas';
$route['karantina'] = 'analisa';
$route['sample_rnd'] = 'sample/sample_rnd';
$route['export/json'] = 'api/export_json';
$route['api/karantina/hasil_analisa_rnd'] = 'api/add_analisa_rnd';
