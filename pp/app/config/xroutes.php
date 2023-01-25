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

$route['Welcome'] = 'Welcome';

$route['logout'] = 'Welcome/logout';

$route['ca-dashboard'] = F_CA.'Ca';

$route['ca-add-arm'] = F_CA.'Ca/addarm';

$route['ca-view-arm'] = F_CA.'Ca/view_arms';


$route['ca-issue-arm'] = F_CA.'Ca/issue_arms';

$route['ca-view-issue-arm'] = F_CA.'Ca/view_issue_arms';


$route['ca-add-ammunition'] = F_CA.'Ca/add_ammunition';

$route['ca-view-ammunition'] = F_CA.'Ca/view_ammunition';

$route['ca-issue-ammunition'] = F_CA.'Ca/issue_annu';

$route['ca-ammu-aj'] = F_CA.'Ca/ammu_aj';

$route['ca-view-issue-ammunition'] = F_CA.'Ca/view_issue_ammu';

$route['ca-arm-stock'] = F_CA.'Ca/armstock';

$route['ca-ammunition-stock'] = F_CA.'Ca/ammunitionstock';

$route['bt-dashboard'] = F_BTALION.'Btalion';

$route['bt-add-arm'] = F_BTALION.'Btalion/addarm';

$route['bt-view-arm'] = F_BTALION.'Btalion/view_arms';

$route['bt-issue-arm'] = F_BTALION.'Btalion/issue_arms';

$route['bt-ammu-aj'] = F_BTALION.'Btalion/ammu_aj';

$route['bt-ins-arm'] = F_BTALION.'Btalion/arm_ins';

$route['bt-ins-ammu'] = F_BTALION.'Btalion/ammu_ins';

$route['bt-ins-vic'] = F_BTALION.'Btalion/ins_vic';

$route['bt-view-issue-arm'] = F_BTALION.'Btalion/view_issue_arms';

$route['bt-deposit-arm'] = F_BTALION.'Btalion/deposit_arm';

$route['bt-view-deposit-arm'] = F_BTALION.'Btalion/view_deposit_arm';

$route['bt-deposit-ammu'] = F_BTALION.'Btalion/deposit_ammu';

$route['bt-holder-name'] = F_BTALION.'Btalion/holder_name';

$route['bt-view-deposit-arm'] = F_BTALION.'Btalion/view_deposit_arm';

$route['bt-weapon-con'] = F_BTALION.'Btalion/weapon_constatus';

$route['bt-ammu-weapon-con'] = F_BTALION.'Btalion/ammuweapon_constatus';



$route['bt-view-issue-ammu'] = F_BTALION.'Btalion/view_issueammunition';

$route['bt-add-ammunition'] = F_BTALION.'Btalion/add_ammunition';

$route['bt-view-ammunition'] = F_BTALION.'Btalion/view_ammunition';

$route['bt-update-ammunition/(:num)'] = F_BTALION.'Btalion/update_ammunition/$1';

$route['bt-recieved-ammunition'] = F_BTALION.'Btalion/recieved_ammunition';

$route['bt-view-recieved-ammunition'] = F_BTALION.'Btalion/viewrecieved_ammunition';

$route['bt-add-officer'] = F_BTALION.'Btalion/add_officer';

$route['bt-view-officer'] = F_BTALION.'Btalion/view_officer';

$route['bt-add-vehicle'] = F_BTALION.'Btalion/add_vehicle';

$route['bt-issue-vehicle'] = F_BTALION.'Btalion/issue_vehicle';

$route['bt-deposit-vehicle'] = F_BTALION.'Btalion/deposit_vichel';

$route['bt-update-vehicle'] = F_BTALION.'Btalion/update_vichel';

$route['bt-view-vehicle'] = F_BTALION.'Btalion/view_vehicle';

$route['bt-view-v-details/(:num)'] = F_BTALION.'Btalion/view_vehicle_details/$1';

$route['bt-add-material'] = F_BTALION.'Btalion/add_material';

$route['bt-view-material'] = F_BTALION.'Btalion/view_material';

$route['bt-view-m-details/(:num)'] = F_BTALION.'Btalion/view_material_details/$1';

$route['bt-add-pmaterial'] = F_BTALION.'Btalion/dep_pmaterial';

$route['bt-view-pmaterial'] = F_BTALION.'Btalion/view_pmaterial';

$route['bt-add-manpower'] = F_BTALION.'Btalion/add_manpower';

$route['bt-view-manpower'] = F_BTALION.'Btalion/view_manpower';

$route['bt-view-man-details/(:num)'] = F_BTALION.'Btalion/view_manpower_details/$1';

$route['bt-ser-pol-off'] = F_BTALION.'Btalion/ser_pol_of';

$route['bt-ret-pol-off'] = F_BTALION.'Btalion/ret_pol_of';

$route['bt-ser-civ-off'] = F_BTALION.'Btalion/ser_civ_of';

$route['bt-ret-civ-off'] = F_BTALION.'Btalion/ret_civ_of';

$route['bt-ser-jud-off'] = F_BTALION.'Btalion/ser_jud_of';

$route['bt-ret-jud-off'] = F_BTALION.'Btalion/ret_jud_of';

$route['bt-policital-leader'] = F_BTALION.'Btalion/pol_leader';

$route['bt-thr-per'] = F_BTALION.'Btalion/thr_per';

$route['bt-guardinfo'] = F_BTALION.'Btalion/guardinfo';

$route['bt-quater'] = F_BTALION.'Btalion/quater';

$route['bt-vp_guard'] = F_BTALION.'Btalion/vp_guard';

$route['bt-others'] = F_BTALION.'Btalion/others';

$route['bt-temp-duty'] = F_BTALION.'Btalion/temp_duty';

$route['bt-company'] = F_BTALION.'Btalion/company';

$route['bt-pol-off'] = F_BTALION.'Btalion/pol_off';

$route['bt-view-issue-arms'] = F_BTALION.'Btalion/view_issue_arms';

$route['bt-add-horse'] = F_BTALION.'Btalion/add_horse';

$route['bt-deposit-horse'] = F_BTALION.'Btalion/deposit_horse';

$route['bt-add-quater'] = F_BTALION.'Btalion/add_quater';

$route['bt-alot-quater'] = F_BTALION.'Btalion/alot_quater';

$route['bt-view-horse'] = F_BTALION.'Btalion/view_horse';

$route['bt-view-horse-details/(:num)'] = F_BTALION.'Btalion/view_horse_details/$1';

$route['bt-alot-horse'] = F_BTALION.'Btalion/alot_horse';

$route['bt-update-horse'] = F_BTALION.'Btalion/update_horse';

$route['bt-view-alot-horse'] = F_BTALION.'Btalion/view_alothorse';

$route['bt-view-deposit-horse'] = F_BTALION.'Btalion/view_deposit_horse';

$route['bt-view-quater'] = F_BTALION.'Btalion/view_quater';

$route['bt-evo-quater'] = F_BTALION.'Btalion/evo_quater';

$route['bt-update-quater'] = F_BTALION.'Btalion/update_quater';

$route['bt-view-alot-quater'] = F_BTALION.'Btalion/view_alot_quater';

$route['bt-view-quate-details/(:num)'] = F_BTALION.'Btalion/view_quate_details/$1';

$route['bt-edit-quate-details/(:num)'] = F_BTALION.'Btalion/edit_quater/$1';

$route['bt-alot-pmaterial'] = F_BTALION.'Btalion/alot_pmaterial';

$route['bt-ser-ammu'] = F_BTALION.'Btalion/serammu';

$route['bt-p-ammu'] = F_BTALION.'Btalion/preammu';

$route['bt-riflealr'] = F_BTALION.'Btalion/riflealr';

$route['bt-horse-helth'] = F_BTALION.'Btalion/horse_helth';

$route['bt-horse-old'] = F_BTALION.'Btalion/horse_olddata';

$route['bt-vichele-old'] = F_BTALION.'Btalion/vichele_olddata';

$route['bt-quaters-old'] = F_BTALION.'Btalion/quaters_olddata';

$route['bt-msk-old'] = F_BTALION.'Btalion/msk_olddata';

$route['bt-osi-old'] = F_BTALION.'Btalion/osi_olddata';
