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


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Homepage Routes
$route['default_controller'] = 'Home';
$route['login'] = 'Home/login';
$route['\?ref'] = 'Home/signup';
$route['signup'] = 'Home/signup';
$route['do_login'] = 'Home/do_login';
$route['blog'] = 'Home/blog';
$route['blog/:any'] = 'Home/blog_post';

//User Routes
$route['user'] = 'User/index';
$route['deposit'] = 'User/deposit';
$route['market'] = 'User/market';
$route['referral'] = 'User/referral';
$route['transfer'] = 'User/transfer';
$route['profile'] = 'User/profile';
$route['login_history'] = 'User/login_history';
$route['support'] = 'User/support';
$route['logout'] = 'User/logout';

//Admin Routes
$route['vita908/logout'] = 'Admin/logout';
$route['vita908'] = 'Admin/index';
$route['vita908/users'] = 'Admin/users';
$route['vita908/coins'] = 'Admin/coins';
$route['vita908/blog'] = 'Admin/blog';
$route['vita908/testimonial'] = 'Admin/testimonial';
$route['vita908/settings'] = 'Admin/settings';
