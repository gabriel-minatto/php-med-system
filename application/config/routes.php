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

$route['default_controller'] = "pages";


//paciente
$route['precadastro/pacientes'] = "pages/pre_cadastro";
$route['precadastro/salvar'] = "pages/save_pre_cadastro";
$route['consultas/dashboard'] = "pages/consults";
$route['consultas/pagar/(:num)'] = "pages/pay/$1";
$route['consultas/nova'] = "pages/new_consult";
$route['consultas/create'] = "pages/create_consult";
$route['login'] = "pages/patientLogin";
$route['logout'] = "pages/logout";

//medicos
$route['medicos'] = "medicos";
$route['medicos/logar'] = "medicos/login";
$route['medicos/consultas'] = "medicos/consults";
$route['medicos/consultas/realizar/(:num)'] = "medicos/make_consult/$1";
$route['medicos/consultas/salvar/(:num)'] = "medicos/save_consult/$1";

//secretarios
$route['secretarios'] = "secretarios";
$route['secretarios/logar'] = "secretarios/login";
$route['secretarios/consultas'] = "secretarios/consults";
$route['secretarios/consultas/pagar/(:num)'] = "secretarios/pay_consult/$1";
$route['secretarios/medicos'] = "secretarios/doctors";
$route['secretarios/medicos/novo'] = "secretarios/new_doctor";
$route['secretarios/medicos/add'] = "secretarios/add_doctor";
$route['secretarios/medicos/del/(:num)'] = "secretarios/delete_doctor/$1";
$route['secretarios/pacientes'] = "secretarios/patients";
$route['secretarios/pacientes/ativar/(:num)'] = "secretarios/activate_patient/$1";
$route['secretarios/pacientes/del/(:num)'] = "secretarios/delete_patient/$1";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
