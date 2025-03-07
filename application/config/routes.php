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
$route['default_controller'] = 'Pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about-us'] = 'pages/about';
$route['services'] = 'pages/services';
$route['our-team'] = 'pages/ourTeam';
$route['contact-us'] = 'pages/contact';
$route['blog'] = 'pages/blog'; // Show all blogs
$route['blog/(:any)'] = 'pages/blog_detail/$1'; // Show a specific blog by ID
$route['submit_contact'] = 'admin/Forms/submit_form';

$route['admin/blog'] = 'admin/Blog/index'; // List all blogs
$route['admin/blog/create'] = 'Admin/Blog/create'; // Create new blog
$route['admin/blog/store'] = 'Admin/Blog/store'; // Store blog data
$route['admin/blog/edit/(:num)'] = 'Admin/Blog/edit/$1'; // Edit blog
$route['admin/blog/update/(:num)'] = 'Admin/Blog/update/$1'; // Update blog
$route['admin/blog/delete/(:num)'] = 'Admin/Blog/delete/$1'; // Delete blog

$route['admin/contacts'] = 'admin/Contacts/index'; // List all blogs
$route['admin/contacts/edit/(:num)'] = 'Admin/Contacts/edit/$1'; // Edit blog
$route['admin/contacts/update/(:num)'] = 'Admin/Contacts/update/$1'; // Update blog
$route['admin/contacts/delete/(:num)'] = 'Admin/Contacts/delete/$1'; // Delete blog

$route['admin/settings'] = 'admin/Settings/index'; // List all blogs
$route['admin/save_settings'] = 'admin/Settings/save'; // List all blogs


