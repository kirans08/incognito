<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'pages/view';
$route['leaderboard']='pages/leaderboard';
$route['clues']='pages/clues';
$route['rules']='pages/rules';
$route['profile']='pages/profile';
$route['story']='pages/story';
$route['cluebox']='pages/cluebox';
$route['create'] = "pages/create";
$route['answer'] = "pages/answer";
$route['login'] = "pages/login";
$route['logout'] = "pages/logout";
$route['jumptonext']="pages/jumptonext";
$route['leaderboard/(:any)']='pages/leaderboard';
$route['clues/(:any)']='pages/clues';
$route['rules/(:any)']='pages/rules';
$route['profile/(:any)']='pages/profile';
$route['story/(:any)']='pages/story';
$route['cluebox/(:any)']='pages/cluebox';
$route['create/(:any)'] = "pages/create";
$route['answer/(:any)'] = "pages/answer";
$route['login/(:any)'] = "pages/login";
$route['levels/(:any)'] = "pages/levels";
$route['jumptonext/(:any)']="pages/jumptonext";


/* End of file routes.php */
/* Location: ./application/config/routes.php */