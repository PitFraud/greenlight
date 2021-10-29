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
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Company'] = 'Settings/Company';
$route['addCompany'] = 'Settings/addCompany';
$route['getCompany'] = 'Settings/getCompany';
$route['deleteCompany'] = 'Settings/deleteCompany';
$route['CompanyinfoEdit/(:num)'] = 'Settings/CompanyinfoEdit/$1';

$route['FinYear'] = 'Settings/FinYear';
$route['Finyearget']= 'Settings/Finyearget';
$route['addFinYear']= 'Settings/addFinYear';
$route['FinyearEdit/(:num)'] = 'Settings/FinyearEdit/$1';
$route['FinyearDelete'] = 'Settings/FinyearDelete';

$route['ChangePassword'] = 'Settings/ChangePassword';
$route['resetPassword'] = 'Settings/resetPassword';


$route['Privacy'] = 'Privacy/PrivacyDetail';

$route['addProfile'] ='Profile/insertUserProfile';

//Home Page
$route['product_json'] = "Home/product_json";
$route['submenu'] = "Home/submenu";
$route['loctab'] = "Home/loctab";


//Sell Page
$route['addSellProduct/(:num)'] = "Sell/addSellProduct/$1";
$route['insertSellProduct'] = "Sell/insertSellProduct";

//Single Product
$route['singleProduct/(:num)'] = "Productpage/singleProduct/$1";

//wishlist
$route['wishlist'] = "Wishlist/Wishlistpage";
$route['deletewishlist/(:num)'] = "Wishlist/DeleteWishlist/$1";

//Help
$route['help'] = "Help/Helppage";

// Category Menu
$route['category/(:num)'] = "Category/CategoryMenu/$1";

//About_us
$route['about_us'] = "Aboutus/aboutDetail";

//Terms_and_Condition
$route['Terms_Condition'] = "TermCondition/TermAndCondition";

//Payment_Policy
$route['Payment_Policy'] = "Paymentpolicy/Payment_policy";

// Sub Category Menu
$route['SubCategory/(:num)'] = "SubCategory/SubCategoryMenu/$1";

// Subscription
$route['Subscription'] = 'Subscription/getSubscription';

//Payment
$route['Payment/(:num)'] = 'Payment/getPayment/$1';
$route['addPayment'] = 'Payment/addPayment';
