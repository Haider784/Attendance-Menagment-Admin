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
$route['default_controller'] = 'welcome';
$route['dashboard'] = 'welcome/index';
$route['profiles'] = 'welcome/profile';
$route['Attendance'] = 'welcome/attsndance';
$route['attsndance_table'] = 'welcome/veiw';
$route['register'] = 'welcome/register';
$route['add-employees'] = 'welcome/employes';
$route['employees-list'] = 'welcome/employes_list';
$route['departments'] = 'welcome/departmen';
$route['department_list'] = 'welcome/department';
$route['add_expenses'] = 'welcome/expnse';
$route['expnses_list'] = 'welcome/expnses';
$route['add_leave'] = 'welcome/leave';
$route['leav_list'] = 'welcome/leav';
$route['add_salary'] = 'welcome/ad_salary';
$route['salary_list'] = 'welcome/salay_list';
$route['total_expenses'] = 'welcome/t_expenses';
$route['total_expenses_report'] = 'welcome/t_expenses_report';
$route['login'] = 'loginController/index';
$route['log'] = 'loginController/logout';
$route['Accounts'] = 'welcome/acount';
$route['add_wages'] = 'welcome/wages';
$route['Pay_slip'] = 'welcome/slip';
$route['setting'] = 'welcome/settings';
$route['footer'] = 'welcome/foter';
$route['attendance/create'] = 'AttendanceController/create';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['(:any)'] = 'welcome/slugs';
