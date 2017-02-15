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
$route['default_controller'] = 'welcome'; 
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Register'] = 'welcome/register';
$route['Login'] = 'Register/index';
$route['Home']= 'FrontUser/Home';
$route['Logout']='Login/logout';



/** chat application routes **/


$route['messageSave']='FrontUser/chatController/saveMessage';
//load messages to chat
$route['messageLoad']='FrontUser/chatController/loadMessage';
//laod all messages
$route['loadallmessages']='FrontUser/chatController/loadAll';
//update reading status
$route['updateReadStatus']='FrontUser/chatController/updateRead';




$route['profile'] = 'FrontUser/Home/profile';


/** search **/

//search user profiles 
$route['searchProfile']='FrontUser/searchController/searchProf';
// get all children 
$route['getAllChildren']='Child/Children_c/getAllChildren';

/** event **/

//event save
$route['saveEvent']='FrontUser/eventController/saveEvent';
// show event pages
$route['events/(:any)']='FrontUser/eventController/loadEvent/$1';
//show all events
$route['events']='FrontUser/eventController/loadAll';



/** payments **/

//load payment page
$route['donations/(:any)']='FrontUser/paymentController/index/$1';

$route['payments']='FrontUser/paymentController/requestResponse';

$route['payment-successful']='FrontUser/paymentController/paymentSuccess';


/** post **/

//save post
$route['savePost']='FrontUser/postController/savePost';
//load post
$route['loadPost']='FrontUser/postController/loadPost';
//load more posts
$route['loadMorePost/(:any)']='FrontUser/postController/loadMore/$1';





