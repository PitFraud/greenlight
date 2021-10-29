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
$route['default_controller'] = 'Login';
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

$route['Category'] = 'Administration/Category';
$route['addCategory']= 'Administration/addCategory';
$route['getCategory'] = 'Administration/getCategory';
$route['categoryDelete'] = 'Administration/categoryDelete';
$route['categoryEdit/(:num)'] = 'Administration/categoryEdit/$1';

$route['Designation'] = 'Administration/Designation';
$route['getDesignation'] = 'Administration/getDesignation';
$route['addDesignation'] = 'Administration/addDesignation';
$route['designationEdit/(:num)'] = 'Administration/designationEdit/$1';
$route['designationDelete'] = 'Administration/designationDelete';

$route['Employee'] = 'Administration/Employee';
$route['getEmployee'] = 'Administration/getEmployee';
$route['addEmployeeDes'] = 'Administration/addEmployeeDes';

$route['Events']='Administration/Events';
$route['addEvent']='Administration/addEvent';

$route['Offers'] = 'Administration/Offers';
$route['getOffers'] = 'Administration/getOffers';
$route['addOffer'] = 'Administration/addOffer';
$route['offerEdit/(:num)'] = 'Administration/offerEdit/$1';
$route['offerDelete'] = 'Administration/offerDelete';
$route['prodOffer'] = 'Administration/prodOffer';

//Logo
$route['ChangeLogo'] = 'Settings/ChangeLogo';
$route['getLogo'] = 'Settings/getLogo';
$route['addLogo'] = 'Settings/addLogo';
$route['editLogo/(:num)'] = 'Settings/editLogo/$1';
$route['LogoDelete'] = 'Settings/LogoDelete';


$route['Locations'] = 'Administration/Locations';
$route['getLocation'] = 'Administration/getLocation';
$route['addLocation'] = 'Administration/addLocation';
$route['locationEdit/(:num)'] = 'Administration/locationEdit/$1';
$route['locationDelete'] = 'Administration/locationDelete';

$route['Subcategory'] = 'Administration/Subcategory';
$route['addSubcategory']= 'Administration/addSubcategory';
$route['getSubcategory'] = 'Administration/getSubcategory';
$route['subcategoryEdit/(:num)'] = 'Administration/subcategoryEdit/$1';


//Voucher Head
$route['Voucherhead'] = 'Accounts/Voucherhead';
$route['getVoucherhead'] = 'Accounts/getVoucherhead';
$route['addVoucherhead'] = 'Accounts/addVoucherhead';
$route['editVoucherhead/(:num)'] = 'Accounts/editVoucherhead/$1';
$route['deleteVoucherhead'] = 'Accounts/deleteVoucherhead';

//Voucher Entry
$route['VoucherEntry'] = 'Accounts/VoucherEntry';
$route['getVoucherEntry'] = 'Accounts/getVoucherEntry';
$route['get_vouchhead'] = 'Accounts/get_vouchhead';
$route['addVoucherEntry'] = 'Accounts/addVoucherEntry';
$route['editVoucherEntry/(:num)'] = 'Accounts/editVoucherEntry/$1';
$route['deleteVoucherEntry'] = 'Accounts/deleteVoucherEntry';


//Receipt Entry
$route['ReceiptEntry'] = 'Accounts/ReceiptEntry';
$route['getReceiptEntry'] = 'Accounts/getReceiptEntry';
$route['get_vouchhead'] = 'Accounts/get_vouchhead';
$route['get_receipthead_receipt_entry'] = 'Accounts/get_receipthead_receipt_entry';
$route['addReceiptEntry'] = 'Accounts/addReceiptEntry';
$route['editReceiptEntry/(:num)'] = 'Accounts/editReceiptEntry/$1';
$route['deleteReceiptEntry'] = 'Accounts/deleteReceiptEntry';

//Receipt Head
$route['Receipthead'] = 'Accounts/Receipthead';
$route['getReceipthead'] = 'Accounts/getReceipthead';
$route['addReceipthead'] = 'Accounts/addReceipthead';
$route['editReceipthead/(:num)'] = 'Accounts/editReceipthead/$1';
$route['deleteReceipthead'] = 'Accounts/deleteReceipthead';

//Daybook Entry
$route['DayBook'] = 'Accounts/DayBook';
$route['get_sumDayBook'] = 'Accounts/get_sumDayBook';
$route['get_sum_DayBook'] = 'Accounts/get_sum_DayBook';
$route['get_opening_DayBook'] = 'Accounts/get_opening_DayBook';
$route['getDayBook'] = 'Accounts/getDayBook';
$route['updateDayBook'] = 'Accounts/updateDayBook';
$route['editReceiptEntry/(:num)'] = 'Accounts/editReceiptEntry/$1';
$route['deleteVoucherEntry'] = 'Accounts/deleteVoucherEntry';

//Ledger Entry
$route['Ledger'] = 'Accounts/Ledger';
$route['get_sumLedger'] = 'Accounts/get_sumLedger';
$route['get_sum_Ledger'] = 'Accounts/get_sum_Ledger';
$route['get_opening_Ledger'] = 'Accounts/get_opening_Ledger';
$route['get_Ledger'] = 'Accounts/get_Ledger';
$route['updateLedger'] = 'Accounts/updateLedger';

$route['Seller'] = 'Administration/Seller';
$route['getSeller'] = 'Administration/getSeller';
$route['addSeller'] = 'Administration/addSeller';
$route['sellerEdit/(:num)'] = 'Administration/sellerEdit/$1';

$route['Buyer'] = 'Administration/Buyer';
$route['getBuyer'] = 'Administration/getBuyer';

// Product Category
$route['ProductCat'] = 'Administration/ProductCat';
$route['getProductCat'] = 'Administration/getProductCat';
$route['addProductCat'] = 'Administration/addProductCat';
$route['ProductCatEdit/(:num)'] = 'Administration/ProductCatEdit/$1';
$route['ProductCatDelete'] = 'Administration/ProductCatDelete';

// Product Sub Category
$route['ProductSubCat'] = 'Administration/ProductSubCat';
$route['getProductSubCat'] = 'Administration/getProductSubCat';
$route['addProductSubCat'] = 'Administration/addProductSubCat';
$route['ProductSubCatEdit/(:num)'] = 'Administration/ProductSubCatEdit/$1';
$route['ProductSubCatDelete'] = 'Administration/ProductSubCatDelete';

// Product List Category
$route['ProductListCat'] = 'Administration/ProductListCat';
$route['getProductListCat'] = 'Administration/getProductListCat';
$route['addProductListCat'] = 'Administration/addProductListCat';
$route['ProductListCatEdit/(:num)'] = 'Administration/ProductListCatEdit/$1';
$route['ProductListCatDelete'] = 'Administration/ProductListCatDelete';

//front_End Pages
$route['Banners'] = 'Front_end/banners';
$route['getBanners'] = 'Front_end/getBanners';
$route['addBanners'] = 'Front_end/addBanner';
$route['bannerEdit/(:num)'] = 'Front_end/bannerEdit/$1';
$route['bannerDelete'] = 'Front_end/bannerDelete';

//menu
$route['Menus'] = 'Front_end/menus';
$route['getMenus'] = 'Front_end/getMenus';
$route['addMenus'] = 'Front_end/addMenu';
$route['menusEdit/(:num)'] = 'Front_end/menusEdit/$1';
$route['menusDelete'] = 'Front_end/menusDelete';

//submenu
$route['Submenus'] = 'Front_end/submenus';
$route['getSubmenus'] = 'Front_end/getSubmenus';
$route['addSubmenus'] = 'Front_end/addSubmenus';
$route['submenusEdit/(:num)'] = 'Front_end/submenusEdit/$1';
$route['submenusDelete'] = 'Front_end/submenusDelete';

//browse by product
$route['ProductScroll'] = 'Front_end/ProductScroll';
$route['getProductScroll'] = 'Front_end/getProductScroll';
$route['addProductScroll'] = 'Front_end/addProductScroll';
$route['productscrollEdit/(:num)'] = 'Front_end/productscrollEdit/$1';
$route['productscrollDelete'] = 'Front_end/productscrollDelete';

// Menu Category
$route['MenuCategory'] = 'Front_end/MenuCategory';
$route['getMenuCategory'] = 'Front_end/getMenuCategory';
$route['addMenuCategory'] = 'Front_end/addMenuCategory';
$route['MenuCategoryEdit/(:num)'] = 'Front_end/MenuCategoryEdit/$1';
$route['MenuCategoryDelete'] = 'Front_end/MenuCategoryDelete';

// Hot Deals
$route['HotDeals'] = 'Front_end/HotDeals';
$route['getHotDeals'] = 'Front_end/getHotDeals';
$route['addHotDeals'] = 'Front_end/addHotDeals';
$route['HotDealsEdit/(:num)'] = 'Front_end/HotDealsEdit/$1';
$route['HotDealsDelete'] = 'Front_end/HotDealsDelete';

// Super Deals
$route['SuperDeals'] = 'Front_end/SuperDeals';
$route['getSuperDeals'] = 'Front_end/getSuperDeals';
$route['addSuperDeals'] = 'Front_end/addSuperDeals';
$route['SuperDealsEdit/(:num)'] = 'Front_end/SuperDealsEdit/$1';
$route['SuperDealsDelete'] = 'Front_end/SuperDealsDelete';


// Special Offers
$route['SpecialOff'] = 'Front_end/SpecialOff';
$route['getSpecialOff'] = 'Front_end/getSpecialOff';
$route['addSpecialOff'] = 'Front_end/addSpecialOff';
$route['SpecialOffEdit/(:num)'] = 'Front_end/SpecialOffEdit/$1';
$route['SpecialOffDelete'] = 'Front_end/SpecialOffDelete';


// Deals of the Day
$route['DealsOfDay'] = 'Front_end/DealsOfDay';
$route['getDealsOfDay'] = 'Front_end/getDealsOfDay';
$route['addDealsOfDay'] = 'Front_end/addDealsOfDay';
$route['DealsOfDayEdit/(:num)'] = 'Front_end/DealsOfDayEdit/$1';
$route['DealsOfDayDelete'] = 'Front_end/DealsOfDayDelete';


// Latest Products
$route['LatestProduct'] = 'Front_end/LatestProduct';
$route['getLatestProduct'] = 'Front_end/getLatestProduct';
$route['addLatestProduct'] = 'Front_end/addLatestProduct';
$route['LatestProductEdit/(:num)'] = 'Front_end/LatestProductEdit/$1';
$route['LatestProductDelete'] = 'Front_end/LatestProductDelete';


// Various Product
$route['VariousPlant'] = 'Front_end/VariousPlant';
$route['getVariousPlant'] = 'Front_end/getVariousPlant';
$route['addVariousPlant'] = 'Front_end/addVariousPlant';
$route['VariousPlantEdit/(:num)'] = 'Front_end/VariousPlantEdit/$1';
$route['VariousPlantDelete'] = 'Front_end/VariousPlantDelete';


// Subscription Charges
$route['SubscriptionCharges'] = 'Administration/SubscriptionCharges';
$route['getSubscriptionCharges'] = 'Administration/getSubscriptionCharges';
$route['addSubscriptionCharges'] = 'administration/addSubscriptionCharges';
$route['SubscriptionChargesEdit/(:num)'] = 'Administration/SubscriptionChargesEdit/$1';
$route['SubscriptionChargesDelete'] = 'Administration/SubscriptionChargesDelete';


// User_Reports
$route['UserReports'] = 'Reports/UserReports';
$route['getUserReports'] = 'Reports/getUserReports';
$route['addSubscriptionCharges'] = 'Reports/addSubscriptionCharges';
$route['SubscriptionChargesEdit/(:num)'] = 'Reports/SubscriptionChargesEdit/$1';
$route['SubscriptionChargesDelete'] = 'Reports/SubscriptionChargesDelete';


//About_Page
$route['Aboutpage'] = 'Aboutpage/Aboutpagedetail';
$route['getAboutpage'] = 'Aboutpage/getAboutpageTable';
$route['addAboutpage'] = 'Aboutpage/addAboutpage';
$route['aboutusEdit/(:num)'] = 'Aboutpage/aboutusEdit/$1';
$route['aboutusDelete'] = 'Aboutpage/aboutusDelete';

//Our_Team
$route['Ourteam'] = 'Ourteam/Ourteamdetails';
$route['getOurTeam'] = 'Ourteam/getOurTeamTable';
$route['addOurteam'] = 'Ourteam/addOurteam';
$route['ourteamEdit/(:num)'] = 'Ourteam/ourteamEdit/$1';
$route['ourteamDelete'] = 'Ourteam/ourteamDelete';


//Footer_details
$route['Footer'] = 'Footer_details/getFooterDetails';
$route['getFooterDetailTable'] = 'Footer_details/getFooterDetailTable';
$route['addFooterDetail'] = 'Footer_details/addFooterDetail';
$route['footerdetailEdit/(:num)'] = 'Footer_details/footerdetailEdit/$1';
$route['footerdetailDelete'] = 'Footer_details/footerdetailDelete';

//My Ads
$route['deleteAdsProduct'] = 'MyAds/deleteAdsProduct';


//edit Ads
$route['editSell/(:num)'] = 'Sell/editSell/$1';
