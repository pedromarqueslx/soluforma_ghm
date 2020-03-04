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

$route['artigos_oficina/create'] = 'artigos_oficina/create';
$route['artigos_oficina/(:any)'] = 'artigos_oficina/view/$1';
$route['artigos_oficina'] = 'artigos_oficina';

$route['combustivel/create'] = 'combustivel/create';
$route['combustivel/(:any)'] = 'combustivel/view/$1';
$route['combustivel'] = 'combustivel';

$route['equipamentos/create'] = 'equipamentos/create';
$route['equipamentos/(:any)'] = 'equipamentos/view/$1';
$route['equipamentos'] = 'equipamentos';

$route['funcionarios/create'] = 'funcionarios/create';
$route['funcionarios/(:any)'] = 'funcionarios/view/$1';
$route['funcionarios'] = 'funcionarios';

$route['imposto_selo/create'] = 'imposto_selo/create';
$route['imposto_selo/(:any)'] = 'imposto_selo/view/$1';
$route['imposto_selo'] = 'imposto_selo';

$route['multas/create'] = 'multas/create';
$route['multas/(:any)'] = 'multas/view/$1';
$route['multas'] = 'multas';

$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

$route['pneus/create'] = 'pneus/create';
$route['pneus/(:any)'] = 'pneus/view/$1';
$route['pneus'] = 'pneus';

$route['pneus_incidencia/create'] = 'pneus_incidencia/create';
$route['pneus_incidencia/(:any)'] = 'pneus_incidencia/view/$1';
$route['pneus_incidencia'] = 'pneus_incidencia';

$route['seguros_carga/create'] = 'seguros_carga/create';
$route['seguros_carga/(:any)'] = 'seguros_carga/view/$1';
$route['seguros_carga'] = 'seguros_carga';

$route['seguros_equipamento/create'] = 'seguros_equipamento/create';
$route['seguros_equipamento/(:any)'] = 'seguros_equipamento/view/$1';
$route['seguros_equipamento'] = 'seguros_equipamento';

$route['seguros_funcionario/create'] = 'seguros_funcionario/create';
$route['seguros_funcionario/(:any)'] = 'seguros_funcionario/view/$1';
$route['seguros_funcionario'] = 'seguros_funcionario';

$route['servicos/create'] = 'servicos/create';
$route['servicos/(:any)'] = 'servicos/view/$1';
$route['servicos'] = 'servicos';

$route['viaverde/create'] = 'viaverde/create';
$route['viaverde/(:any)'] = 'viaverde/view/$1';
$route['viaverde'] = 'viaverde';

$route['utilizadores/create'] = 'utilizadores/create';
$route['utilizadores/(:any)'] = 'utilizadores/view/$1';
$route['utilizadores'] = 'utilizadores';

//$route['(:any)'] = 'pages/view/$1';
//$route['default_controller'] = 'pages/index';
$route['default_controller'] = 'users/login';



//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;
