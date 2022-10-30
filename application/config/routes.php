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
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['menu/(:num)']='menu/update_user/$1'; 
$route['homeadmin']='menu/home';
$route['loginadmin']='menu/process_login';
$route['v_loginadmin']='menu/index';


// new link view
$route['home']='Home/index';
$route['news']='News/index';
$route['news']='About/index';
$route['news']='Radio/index';
$route['news']='Sk/index';
//end new link

$route['create_about']='Create_document_about/view_create_docabout';
$route['create_tokoh']='Create_document_tokoh/view_create_doctokoh';
$route['create_staff']='Create_document_staff/view_create_docstaff';
$route['create_news']='Create_document/view_create_docnews';
$route['create_agenda']='Create_document_agenda/view_create_docagenda';
$route['create_opini']='Create_document_opini/view_create_docopini';

$route['about']='Create_document_about/index';
$route['tokoh']='Create_document_tokoh/index';
$route['staff']='Create_document_staff/index';
$route['news']='Create_document/index';
$route['agenda']='Create_document_agenda/index';
$route['opini']='Create_document_opini/index';
$route['image_v']='Create_document_image/index';
$route['video_v']='Create_document_video/index';

$route['data_news']='Create_document/v_all_doc_news';
$route['data_opini']='Create_document_opini/v_all_doc_opini';
$route['data_agenda']='Create_document_agenda/v_all_doc_agenda';
