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
$route['ajax_login'] = 'Welcome/ajax_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Welcome'] = 'Welcome';

$route['logout'] = 'Welcome/logout';
$route['logout2'] = 'Welcome/logout2';

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

$route['bt-pap'] = F_BTALION.'Btalion/pap_bat';

$route['bt-checkarm'] = F_BTALION.'Btalion/checkarm';

$route['bt-add-arm'] = F_BTALION.'Btalion/addarm';

$route['bt-issueextra'] = F_BTALION.'Btalion/issueextra';

$route['bt-issuemunition'] = F_BTALION.'Btalion/issuemunition';

$route['bt-issueextraid/(:num)'] = F_BTALION.'Btalion/issueextraid/$1';

$route['bt-issuedeposit'] = F_BTALION.'Btalion/issuedeposit';

$route['bt-depositdis'] = F_BTALION.'Btalion/depositdis';

$route['bt-depositdisview'] = F_BTALION.'Btalion/depositdisview';

$route['bt-depositdesown'] = F_BTALION.'Btalion/depositdesown';



//$route['bt-issuedepositid/(:num)'] = F_BTALION.'Btalion/issuedepositid/$1';
$route['bt-issuedepositid/(:num)'] = 'Weapon/Weapon/issuedepositid/$1';

$route['bt-depostreport'] = F_BTALION.'Btalion/depostreport';

$route['bt-nodeldeposit'] = F_BTALION.'Btalion/nodeldeposit';

$route['bt-nodeldepositp'] = F_BTALION.'Btalion/nodeldepositp';

$route['bt-tsser'] = F_BTALION.'Btalion/tsser';

$route['bt-tsprc'] = F_BTALION.'Btalion/tsprc';

$route['bt-nodeldepositid/(:num)/(:num)'] = F_BTALION.'Btalion/nodellist/$1/$2';

$route['bt-nodellistwep'] = F_BTALION.'Btalion/nodellistwep';

$route['bt-cawep'] = F_BTALION.'Btalion/cawep';

$route['bt-nodellistp/(:num)/(:num)'] = F_BTALION.'Btalion/nodellistp/$1/$2';


$route['bt-serannureport'] = F_BTALION.'Btalion/serannureport';

$route['bt-pracreport'] = F_BTALION.'Btalion/pracreport';

$route['bt-issueholder-name'] = F_BTALION.'Btalion/issueholder_name';

$route['bt-issueholder-namelist'] = F_BTALION.'Btalion/issueholder_namelist';

$route['bt-blist'] = F_BTALION.'Btalion/blist';

$route['bt-ammunitiontype'] = F_BTALION.'Btalion/ammunitiontype';

$route['bt-qty-ammu'] = F_BTALION.'Btalion/qty_ammu';


$route['bt-add-parm'] = F_BTALION.'Btalion/addparm';

$route['bt-editparm/(:num)'] = F_BTALION.'Btalion/editparm/$1';

$route['bt-depositparm/(:num)'] = F_BTALION.'Btalion/depositparm/$1';


$route['bt-addissuearm/(:num)'] = F_BTALION.'Btalion/addissuearm/$1';


$route['bt-view-arm'] = F_BTALION.'Btalion/view_arms';

$route['bt-view-paparm'] = F_BTALION.'Btalion/view_pap_arms';

$route['bt-view-paphorse'] = F_BTALION.'Btalion/view_paphorse';

$route['bt-add-ammunitionbt'] = F_BTALION.'Btalion/add_ammunitionbt';

$route['bt-add-ammunitionprcbt'] = F_BTALION.'Btalion/add_ammunitionprcbt';

$route['bt-add-ammunitionprc'] = F_BTALION.'Btalion/add_ammunitionprc';

$route['bt-add-munitionammu'] = F_BTALION.'Btalion/add_munitionammu';



$route['bt-issue-arm'] = F_BTALION.'Btalion/issue_arms';

$route['bt-ammu-aj'] = F_BTALION.'Btalion/ammu_aj';

$route['bt-ammu-ajs'] = F_BTALION.'Btalion/ammu_ajs';

$route['bt-ins-arm'] = F_BTALION.'Btalion/arm_ins';

$route['bt-ins-ammu'] = F_BTALION.'Btalion/ammus_ins';


//$route['bt-ins-ammu'] = F_BTALION.'Btalion/ammu_ins';

$route['bt-ins-vic'] = F_BTALION.'Btalion/ins_vic';

$route['bt-view-issue-arm'] = F_BTALION.'Btalion/view_issue_arms';

$route['bt-deposit-arm/(:num)'] = F_BTALION.'Btalion/deposit_arm/$1';

$route['bt-addarmbat'] = F_BTALION.'Btalion/addarmbat';

$route['bt-view-deposit-arm'] = F_BTALION.'Btalion/view_deposit_arm';

$route['bt-deposit-ammu'] = F_BTALION.'Btalion/deposit_ammu';

$route['bt-holder-name'] = F_BTALION.'Btalion/holder_name';

$route['bt-holder-nameo'] = F_BTALION.'Btalion/holder_nameho';



$route['bt-view-deposit-arm'] = F_BTALION.'Btalion/view_deposit_arm';

$route['bt-weapon-con'] = F_BTALION.'Btalion/weapon_constatus';

$route['bt-weapon-update'] = F_BTALION.'Btalion/weapon_update';


$route['bt-ammu-weapon-con'] = F_BTALION.'Btalion/ammuweapon_constatus';


$route['bt-view-issue-ammu'] = F_BTALION.'Btalion/view_issueammunition';

$route['bt-add-ammunition'] = F_BTALION.'Btalion/add_ammunition';

$route['bt-add-munition'] = F_BTALION.'Btalion/add_munition';



$route['bt-add-ammuser'] = F_BTALION.'Btalion/add_ammuser';


$route['bt-view-ammunition'] = F_BTALION.'Btalion/view_ammunition';

$route['bt-update-ammunition/(:num)'] = F_BTALION.'Btalion/update_ammunition/$1';

$route['bt-recieved-ammunition'] = F_BTALION.'Btalion/recieved_ammunition';

$route['bt-view-recieved-ammunition'] = F_BTALION.'Btalion/viewrecieved_ammunition';

$route['bt-add-officer'] = F_BTALION.'Btalion/add_officer';

$route['bt-view-officer'] = F_BTALION.'Btalion/view_officer';

$route['bt-add-vehicle'] = F_BTALION.'Btalion/add_vehicle';

$route['bt-issue-vehicle'] = F_BTALION.'Btalion/issue_vehicle';

$route['bt-add-pol'] = F_BTALION.'Btalion/add_pol';

$route['bt-add-repair'] = F_BTALION.'Btalion/add_repair';

$route['bt-pap-vehicle'] = F_BTALION.'Btalion/view_papvehicle';

$route['bt-deposit-vehicle'] = F_BTALION.'Btalion/deposit_vichel';

$route['bt-update-vehicle/(:num)'] = F_BTALION.'Btalion/update_vichel/$1';

$route['bt-view-vehicle'] = F_BTALION.'Btalion/view_vehicle';

$route['bt-view-vehicle/(:num)'] = F_BTALION.'Btalion/view_vehicle/$1';

$route['bt-view-v-details/(:num)'] = F_BTALION.'Btalion/view_vehicle_details/$1';

$route['bt-vicheldein'] = F_BTALION.'Btalion/vicheldein';

$route['bt-update-vechile'] = F_BTALION.'Btalion/update_vechile';


$route['bt-pol-update/(:num)'] = F_BTALION.'Btalion/pol_update/$1';

$route['bt-pol-viewlist'] = F_BTALION.'Btalion/pol_viewlist';


$route['bt-add-material'] = F_BTALION.'Btalion/add_material';

$route['bt-edit-material/(:num)'] = F_BTALION.'Btalion/edit_material/$1';


$route['bt-view-material'] = F_BTALION.'Btalion/view_material';

$route['bt-view-m-details/(:num)'] = F_BTALION.'Btalion/view_material_details/$1';

$route['bt-add-pmaterial/(:num)'] = F_BTALION.'Btalion/dep_pmaterial/$1';

$route['bt-view-pmaterial'] = F_BTALION.'Btalion/view_pmaterial';

$route['bt-msk-aj'] = F_BTALION.'Btalion/msk_aj';

$route['bt-msk-ajss'] = F_BTALION.'Btalion/msk_ajss';
/* dalwinder */
$route['bt-msk-ajss2'] = F_BTALION.'Btalion/msk_ajss2';

$route['bt-msk-ajssfilter'] = F_BTALION.'Btalion/msk_ajssfilter';

$route['bt-msk-ajlist'] = F_BTALION.'Btalion/msk_ajlist';

//$route['bt-add-manpower'] = F_BTALION.'Btalion/add_manpower';

//$route['bt-updates-manpower/(:num)'] = F_BTALION.'Btalion/updates_manpower/$1';
$route['bt-updates-manpower/(:num)'] = 'Osi/updates_manpower_two/$1';	//09.11.2020

$route['bt-st-aj'] = F_BTALION.'Btalion/st_aj';

$route['bt-sti-aj'] = F_BTALION.'Btalion/sti_aj';
$route['getDistrictsAjax'] = 'Osi/getDistricts2';		//08.09.2022
$route['getDistrictsAjaxPa'] = 'Osi/getDistrictsPa2';	//Permanent Address 30.10.2020



$route['bt-sti-list'] = F_BTALION.'Btalion/sti_list';


$route['bt-sti-ajfilter'] = F_BTALION.'Btalion/st_ajfilter';

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

$route['bt-alotedit-quater/(:num)'] = F_BTALION.'Btalion/alotedit_quater/$1';

$route['bt-view-horse'] = F_BTALION.'Btalion/view_horse';

$route['bt-view-horse-details/(:num)'] = F_BTALION.'Btalion/view_horse_details/$1';

$route['bt-alot-horse'] = F_BTALION.'Btalion/alot_horse';

$route['bt-edit-horse/(:num)'] = F_BTALION.'Btalion/edit_horse/$1';

$route['bt-edit-horses/(:num)'] = F_BTALION.'Btalion/edit_horses/$1';

$route['bt-view-alot-horse'] = F_BTALION.'Btalion/view_alot_horse';


$route['bt-update-horse'] = F_BTALION.'Btalion/update_horse';

//$route['bt-view-alot-horse'] = F_BTALION.'Btalion/view_alothorse';

$route['bt-view-deposit-horse'] = F_BTALION.'Btalion/view_deposit_horse';

$route['bt-view-quater'] = F_BTALION.'Btalion/view_quater';

$route['bt-evo-quater'] = F_BTALION.'Btalion/evo_quater';

$route['bt-update-quater'] = F_BTALION.'Btalion/update_quater';

$route['bt-view-alot-quater'] = F_BTALION.'Btalion/view_alot_quater';

$route['bt-view-quate-details/(:num)'] = F_BTALION.'Btalion/view_quate_details/$1';

$route['bt-edit-quate-details/(:num)'] = F_BTALION.'Btalion/edit_quater/$1';

$route['bt-alot-pmaterial'] = F_BTALION.'Btalion/alot_pmaterial';

$route['bt-p-ammu'] = F_BTALION.'Btalion/preammu';

$route['bt-preammuicom'] = F_BTALION.'Btalion/preammuicom';

$route['bt-ser-ammui'] = F_BTALION.'Btalion/serammui';

$route['bt-p-ammui'] = F_BTALION.'Btalion/preammui';

$route['bt-khc'] = F_BTALION.'Btalion/khc_olddataall';

$route['bt-khc/(:num)'] = F_BTALION.'Btalion/khc_olddataall/$1';

$route['bt-khc-cammu'] = F_BTALION.'Btalion/cammu_olddataall';

$route['bt-figarm'] = F_BTALION.'Btalion/figarm';

$route['bt-khc-ammu'] = F_BTALION.'Btalion/ammu_olddataall';

$route['bt-khc-ammuss'] = F_BTALION.'Btalion/ammu_oldsdataall';

$route['bt-khc-cammuss'] = F_BTALION.'Btalion/cammu_oldsdataall';


$route['bt-riflealrs'] = F_BTALION.'Btalion/riflealrs';

$route['bt-horse-helth'] = F_BTALION.'Btalion/horse_helth';

$route['bt-horse-dein'] = F_BTALION.'Btalion/horse_dein';

$route['bt-horse-deinview'] = F_BTALION.'Btalion/horse_deinview';




$route['bt-horse-old'] = F_BTALION.'Btalion/horse_olddata';

$route['bt-horse-olds'] = F_BTALION.'Btalion/horse_olddatas';

$route['bt-vichele-old'] = F_BTALION.'Btalion/vichele_olddata';

$route['bt-vichele-viewdata'] = F_BTALION.'Btalion/vichele_viewdata';

$route['bt-vichele-olds'] = F_BTALION.'Btalion/vichele_olddatas';

$route['bt-vichele-oldall'] = F_BTALION.'Btalion/vichele_olddataall';

$route['bt-vichele-oldall/(:num)'] = F_BTALION.'Btalion/vichele_olddataall/$1';


$route['bt-quaters-old'] = F_BTALION.'Btalion/quaters_olddata';

$route['bt-quaters-oldl'] = F_BTALION.'Btalion/quaters_olddatal';

$route['quaters-fullview/(:any)'] = F_BTALION.'Btalion/quaters_fullview/$1';

$route['bt-quaters-olds'] = F_BTALION.'Btalion/quaters_olddatas';

$route['bt-quaters-olds/(:num)'] = F_BTALION.'Btalion/quaters_olddatas/$1';

$route['bt-msk-old'] = F_BTALION.'Btalion/msk_olddata';

$route['bt-msk-old/(:num)'] = F_BTALION.'Btalion/msk_olddata/$1';

$route['bt-condemlistmsk'] = F_BTALION.'Btalion/condemlistmsk';

$route['bt-condemlistmskaction'] = F_BTALION.'Btalion/condemlistmskaction';

$route['bt-condemlistmskactions/(:num)'] = F_BTALION.'Btalion/condemlistmskactions/$1';

$route['bt-mskauctionlists/(:num)'] = F_BTALION.'Btalion/condemlistmskactionslist/$1';

$route['bt-mskbackstores/(:num)'] = F_BTALION.'Btalion/mskbackstores/$1';

$route['bt-mskbackstore/(:num)'] = F_BTALION.'Btalion/mskbackstore/$1';

$route['bt-msk-oldissued'] = F_BTALION.'Btalion/msk_olddataissued'; 

$route['bt-msk-oldissued/(:num)'] = F_BTALION.'Btalion/msk_olddataissued/$1';

$route['bt-msk-coldissued'] = F_BTALION.'Btalion/msk_colddataissued'; 

$route['bt-msk-coldissued/(:num)'] = F_BTALION.'Btalion/msk_colddataissued/$1';

$route['bt-msk-olddatadeposit'] = F_BTALION.'Btalion/msk_olddatadeposit';

$route['bt-msk-olds'] = F_BTALION.'Btalion/msk_olddatas';

$route['bt-msk-oldall'] = F_BTALION.'Btalion/msk_olddataall';

$route['bt-msk-oldall/(:num)'] = F_BTALION.'Btalion/msk_olddataall/$1';

//$route['bt-osi-old'] = F_BTALION.'Btalion/osi_olddata';


//$route['bt-osi-old/(:num)'] = F_BTALION.'Btalion/osi_olddata/$1';
$route['bt-osi-old/(:num)'] = 'Osi/osi_olddataall/$1';

$route['bt-osi-tempost'] = F_BTALION.'Btalion/osi_tempost';

$route['bt-osi-tempostview'] = F_BTALION.'Btalion/osi_tempostview';

$route['bt-osi-dep'] = F_BTALION.'Btalion/osi_dep';

$route['bt-osi-dep/(:num)'] = F_BTALION.'Btalion/osi_dep/$1';

$route['bt-osi-olds'] = F_BTALION.'Btalion/osi_olddatas';

$route['bt-osi-olds/(:num)'] = F_BTALION.'Btalion/osi_olddatas/$1';

$route['bt-osi-oldall'] = F_BTALION.'Btalion/osi_olddataall';
//$route['bt-osi-oldall'] = 'Osi/osi_olddataall';
//$route['bt-osi-old'] = 'Osi/osi_olddataall';
$route['bt-osi-old'] = 'Osi/osi_olddataall2';

$route['bt-osi-oldall/(:num)'] = F_BTALION.'Btalion/osi_olddataall/$1';

//$route['bt-cso-all'] = F_BTALION.'Btalion/cso_data';

$route['bt-cso-qtr'] = F_BTALION.'Btalion/quaters_cso';

//$route['bt-cso-qtr'] = F_BTALION.'Btalion/quaters_cso';

$route['bt-update-manpower'] = F_BTALION.'Btalion/update_manpower';

$route['bt-updatemanpowerlist'] = F_BTALION.'Btalion/updatemanpowerlist';

$route['bt-recall/(:num)/(:num)'] = F_BTALION.'Btalion/recall/$1/$2';


$route['bt-moverelived/(:num)'] = F_BTALION.'Btalion/moverelived/$1';

$route['bt-all-reports'] = F_BTALION.'Btalion/adreport';

$route['bt-all-reportpap'] = F_BTALION.'Btalion/adreportpap';

$route['bt-helpdesk'] = F_BTALION.'Btalion/helpdesk';



$route['bt-msk-aj'] = F_BTALION.'Btalion/msk_aj';

$route['bt-import-msk'] = F_BTALION.'Btalion/impoertmsk';

$route['bt-import-osi'] = F_BTALION.'Btalion/impoertosi';

$route['bt-import-osiss'] = F_BTALION.'Btalion/impoertosiss';

$route['bt-import-mt'] = F_BTALION.'Btalion/impoertmt';

$route['bt-import-qt'] = F_BTALION.'Btalion/impoertqt';

$route['bt-import-khc'] = F_BTALION.'Btalion/impoertkhc';

$route['bt-password'] = F_BTALION.'Btalion/password';

$route['bt-special-unit'] = F_BTALION.'Btalion/special_unit';

$route['bt-irb'] = F_BTALION.'Btalion/irb';

$route['bt-cdo'] = F_BTALION.'Btalion/cdo';

$route['bt-papall'] = F_BTALION.'Btalion/papall';

$route['bt-allirb'] = F_BTALION.'Btalion/allirb';

$route['bt-allcdo'] = F_BTALION.'Btalion/allcdo';

$route['bt-allquantityreports'] = F_BTALION.'Btalion/allquantityreports';

$route['bt-osireportone'] = F_BTALION.'Btalion/osireportone';

$route['bt-osireportones'] = F_BTALION.'Btalion/osireportones';

$route['bt-osireportdep'] = F_BTALION.'Btalion/osireportdep';

$route['bt-osireportlist'] = F_BTALION.'Btalion/osireportlist';

$route['bt-mskreportone'] = F_BTALION.'Btalion/mskreportone';

$route['bt-armreportone'] = F_BTALION.'Btalion/armreportone';

$route['bt-serreport'] = F_BTALION.'Btalion/serreport';

$route['bt-tempreport'] = F_BTALION.'Btalion/tempreport';

$route['bt-qtrreportone'] = F_BTALION.'Btalion/qtrreportone';

$route['bt-mtoreportone'] = F_BTALION.'Btalion/mtoreportone';

$route['bt-mtoreporttwo'] = F_BTALION.'Btalion/mtoreporttwo';

$route['bt-mtoreporttwopp'] = F_BTALION.'Btalion/mtoreporttwopp';

$route['bt-mtoreporttwos2/(:any)/(:any)'] = F_BTALION.'Btalion/mtoreporttwos/$1/$2';

$route['bt-mtoreporttwos'] = F_BTALION.'Btalion/mtoreporttwos2';

$route['bt-mtoreporttwospolselect'] = F_BTALION.'Btalion/mtoreporttwospolselect';

$route['bt-mtoreporttwospol/(:any)/(:any)'] = F_BTALION.'Btalion/mtoreporttwospol/$1/$2';

$route['bt-mtoreporttwosigp'] = F_BTALION.'Btalion/mtoreporttwosigp';

$route['bt-mskreporttwo'] = F_BTALION.'Btalion/mskreporttwo';

//$route['bt-mskanti'] = F_BTALION.'Btalion/mskanti';
$route['bt-mskanti'] = 'Equipment/getAntiRiotSecurityEquipments';

$route['bt-mskantis'] = F_BTALION.'Btalion/mskantis';

$route['bt-mskantiss'] = F_BTALION.'Btalion/mskantisth';

$route['bt-mountlist'] = F_BTALION.'Btalion/mountlist';

$route['bt-ammulist'] = F_BTALION.'Btalion/ammulist';

$route['bt-munitionreport'] = F_BTALION.'Btalion/munitionreport';


$route['bt-ammulistigp'] = F_BTALION.'Btalion/ammulistigp';

$route['bt-ammulistp'] = F_BTALION.'Btalion/ammulistp';

$route['bt-ammulistpigp'] = F_BTALION.'Btalion/ammulistpigp';

//$route['bt-weaponlist'] = F_BTALION.'Btalion/weaponlist';
$route['bt-weaponlist'] = 'Weapon/Weapon/weaponlist';

$route['bt-weaponlistipg'] = F_BTALION.'Btalion/weaponlistipg';

$route['bt-hor-report'] = F_BTALION.'Btalion/hor_report';

$route['bt-osireporttwo'] = F_BTALION.'Btalion/osireporttwo';

$route['bt-msksun'] = F_BTALION.'Btalion/msksun';

$route['bt-mskservisable'] = F_BTALION.'Btalion/mskservisable';

$route['bt-mtosun'] = F_BTALION.'Btalion/mtosun';

$route['bt-sammusun'] = F_BTALION.'Btalion/sammusun';

$route['bt-pammusun'] = F_BTALION.'Btalion/pammusun';

$route['bt-armsun'] = F_BTALION.'Btalion/armsun';

$route['bt-armsuni'] = F_BTALION.'Btalion/armsuni';

$route['bt-ammuser'] = F_BTALION.'Btalion/ammuser';

$route['bt-ammuper'] = F_BTALION.'Btalion/ammuper';

//$route['bt-osisun'] = F_BTALION.'Btalion/osisun';

$route['bt-osifoni'] = F_BTALION.'Btalion/osifoni';

$route['bt-osipfpp'] = F_BTALION.'Btalion/osipfpp';

$route['bt-osi-nor'] = F_BTALION.'Btalion/osi_nor';

$route['bt-osi-nord'] = F_BTALION.'Btalion/osi_nord';

$route['bt-osi-ea'] = F_BTALION.'Btalion/osi_ea';

$route['bt-osi-vac'] = F_BTALION.'Btalion/osi_vac';

$route['bt-osiinfo/(:num)'] = F_BTALION.'Btalion/osiinfo/$1';

/*For Battalion routes*/
$route['bt-bkhcarms'] = F_BTALION.'Btalion/bkhcarms';

$route['bt-bkhcarms-edit/(:num)'] = F_BTALION.'Btalion/bkhcarms_edit/$1';
//$route['bt-bkhcarms-edit/(:num)'] = 'Weapon/Weapon/bkhcarms_edit/$1';
//$route['get-weapon-conditions'] = 'Weapon/Weapon/get_weapon_conditions';

$route['bt-bkhcarmsissued'] = F_BTALION.'Btalion/bkhcarmsissued';

$route['bt-khcview/(:num)'] = F_BTALION.'Btalion/khcview/$1';

$route['bt-mtview/(:num)'] = F_BTALION.'Btalion/mtview/$1';

$route['bt-cbkhcarmsissued'] = F_BTALION.'Btalion/cbkhcarmsissued';

$route['bt-igcbkhcarmsissued'] = F_BTALION.'Btalion/igcbkhcarmsissued';

$route['bt-igcbkhcarmsissued/(:num)'] = F_BTALION.'Btalion/igcbkhcarmsissued/$1';

$route['bt-bkhcparmsissued'] = F_BTALION.'Btalion/bkhcparmsissued';

$route['bt-bkhcammu'] = F_BTALION.'Btalion/bkhcammu';

$route['bt-bkhcmmu'] = F_BTALION.'Btalion/bkhcmmu';

$route['bt-bkhcammus'] = F_BTALION.'Btalion/bkhcammus';

$route['bt-binslist/(:num)'] = F_BTALION.'Btalion/binslist/$1';


$route['bt-bkhcammuissue'] = F_BTALION.'Btalion/bkhcammuissue';

$route['bt-bkhcammuprcissue'] = F_BTALION.'Btalion/bkhcammuprcissue';

/*Close*/

/*For Battalion comnt routes*/
$route['bt-cdash'] = F_BTALION.'Btalion/cdash';

$route['bt-ckhcarms'] = F_BTALION.'Btalion/ckhcarms';

$route['bt-ckhcammu'] = F_BTALION.'Btalion/ckhcammu';

$route['bt-cmto'] = F_BTALION.'Btalion/cmto';

$route['bt-cosi'] = F_BTALION.'Btalion/cosi';

$route['bt-cosi/(:num)'] = F_BTALION.'Btalion/cosi/$1';

$route['bt-cqtr'] = F_BTALION.'Btalion/cqtr';

$route['bt-cqtrs'] = F_BTALION.'Btalion/cqtrs';

$route['bt-cqtrsigp'] = F_BTALION.'Btalion/cqtrsigp';

$route['bt-cmsk'] = F_BTALION.'Btalion/cmsk';

$route['bt-cmsk/(:num)'] = F_BTALION.'Btalion/cmsk/$1';

$route['bt-cmount'] = F_BTALION.'Btalion/cmount';

$route['bt-osidelete/(:num)'] = F_BTALION.'Btalion/osidelete/$1';

$route['bt-temppostdelete/(:num)'] = F_BTALION.'Btalion/temppostdelete/$1';

$route['bt-khcdeleteii/(:num)'] = F_BTALION.'Btalion/khcdelete/$1';

$route['bt-mskdeletedel/(:num)'] = F_BTALION.'Btalion/mskdelete/$1';

$route['bt-armdgp'] = F_BTALION.'Btalion/armdgp';

$route['bt-armaadgp'] = F_BTALION.'Btalion/armaadgp';

$route['bt-cartage'] = F_BTALION.'Btalion/cartage';

$route['bt-munintion'] = F_BTALION.'Btalion/munintion';

$route['bt-cpomt'] = F_BTALION.'Btalion/cpomt';

$route['bt-mt'] = F_BTALION.'Btalion/mt';

$route['bt-mtdgp'] = F_BTALION.'Btalion/mtdgp';

$route['bt-qt'] = F_BTALION.'Btalion/qt';

$route['bt-msk'] = F_BTALION.'Btalion/msk';

$route['bt-add-ranks/(:num)'] = F_BTALION.'Btalion/add_ranks/$1';

$route['bt-edit-ranks/(:num)'] = F_BTALION.'Btalion/edit_ranks/$1';

$route['bt-add-rank/(:num)'] = F_BTALION.'Btalion/add_rank/$1';

$route['bt-edit-rank/(:num)'] = F_BTALION.'Btalion/edit_rank/$1';

$route['bt-add-pattech/(:num)'] = F_BTALION.'Btalion/add_pattech/$1';

$route['bt-edit-pattech/(:num)'] = F_BTALION.'Btalion/edit_pattech/$1';

$route['bt-all-reportpap'] = F_BTALION.'Btalion/adreportpap';

$route['bt-all-ipwepreport'] = F_BTALION.'Btalion/ipwepreport';

$route['bt-all-ipserreport'] = F_BTALION.'Btalion/ipserreport';

$route['bt-all-ipprcreport'] = F_BTALION.'Btalion/ipprcreport';

$route['bt-all-ipmtreport'] = F_BTALION.'Btalion/ipmtreport';

$route['bt-all-ipmsoreport'] = F_BTALION.'Btalion/ipmsoreport';

$route['bt-all-ipmstreport'] = F_BTALION.'Btalion/ipmstreport';

$route['bt-all-ipmsthreport'] = F_BTALION.'Btalion/ipmsthreport';

$route['bt-all-ipqtrreport'] = F_BTALION.'Btalion/ipqtrreport';

//$route['bt-all-iposioreport'] = F_BTALION.'Btalion/iposioreport';

//$route['bt-all-ipositreport'] = F_BTALION.'Btalion/ipositreport';

$route['bt-all-iposithreport'] = F_BTALION.'Btalion/iposithreport';

$route['bt-all-iposifrreport'] = F_BTALION.'Btalion/iposifrreport';

$route['bt-all-rkhc-rep'] = F_BTALION.'Btalion/rkhc_rep';

$route['bt-all-rser-rep'] = F_BTALION.'Btalion/rser_rep';

$route['bt-all-rprc-rep'] = F_BTALION.'Btalion/rprc_rep';

$route['bt-all-rmt-rep'] = F_BTALION.'Btalion/rmt_rep';

$route['bt-all-rmskone-rep'] = F_BTALION.'Btalion/rmskone_rep';

$route['bt-all-rmsktwo-rep'] = F_BTALION.'Btalion/rmsktwo_rep';

$route['bt-all-rmskhtree-rep'] = F_BTALION.'Btalion/rmskhtree_rep';

$route['bt-all-rqtr-rep'] = F_BTALION.'Btalion/rqtr_rep';

$route['bt-all-rosio-rep'] = F_BTALION.'Btalion/rosio_rep';

$route['bt-all-rosit-rep'] = F_BTALION.'Btalion/rosit_rep';

$route['bt-all-rosith-rep'] = F_BTALION.'Btalion/rosith_rep';

$route['bt-all-rosifr-rep'] = F_BTALION.'Btalion/rosifr_rep';

$route['bt-rtc'] = F_BTALION.'Btalion/rtc';

$route['bt-rtc/(:num)'] = F_BTALION.'Btalion/rtc/$1';

$route['bt-rtctemp'] = F_BTALION.'Btalion/rtctemp';

$route['bt-controltemp'] = F_BTALION.'Btalion/controltemp';

$route['bt-csotemp'] = F_BTALION.'Btalion/csotemp';

$route['bt-mskqunlist'] = F_BTALION.'Btalion/mskqunlist';

$route['bt-mskqunlistadmin'] = F_BTALION.'Btalion/mskqunlistadmin';

$route['bt-mskqunlistadminupdate/(:num)'] = F_BTALION.'Btalion/mskqunlistadminupdate/$1';



$route['bt-tempdele'] = F_BTALION.'Btalion/tempdele';

$route['bt-tempdele/(:num)'] = F_BTALION.'Btalion/tempdeleit/$1';

$route['bt-secdele'] = F_BTALION.'Btalion/secdele';

$route['bt-secdeleit/(:num)'] = F_BTALION.'Btalion/secdeleit/$1';

$route['bt-posdele'] = F_BTALION.'Btalion/posdele';

$route['bt-posdeleit/(:num)'] = F_BTALION.'Btalion/posdeleit/$1';

$route['bt-postingfilter'] = F_BTALION.'Btalion/postingfilter';

$route['bt-repairinfo/(:num)'] = F_BTALION.'Btalion/add_repair_info/$1';

$route['bt-rpair-view/(:num)'] = F_BTALION.'Btalion/rpair_view/$1';

$route['bt-rpair-edit/(:num)'] = F_BTALION.'Btalion/edit_repair_info/$1';

$route['bt-add-mrepair'] = F_BTALION.'Btalion/add_repair';

$route['bt-add-monthrepair'] = F_BTALION.'Btalion/add_monthly_repair';


$route['bt-view-mrepair/(:num)'] = F_BTALION.'Btalion/view_mrepair/$1';



$route['bt-munitionadd'] = F_BTALION.'Btalion/add_munition';

$route['bt-munitionadd'] = F_BTALION.'Btalion/add_munition';


//$route['bt-nodellistwep'] = F_BTALION.'Btalion/nodellistwepdjs';

$route['bt-nodellistwep'] = 'Weapon/Weapon/move_to_ca';



/* Weapons starts */
$route['khc'] = 'Weapon/Weapon/move_to_ca';			//DONE
//$route['khc2'] = 'Weapon/Weapon/move_to_ca2';	//under development

//creating a page for fetching detail regarding weapons in battalions
$route['weapon-figures'] = 'Weapon/Weapon/detail';
$route['all-weapon-detail-ajax'] = 'Weapon/Weapon/ajaxDetail';
$route['all-weapon-detail-excel'] = 'Weapon/Weapon/generateExcel';
$route['all-weapon-detail-excel2016'] = 'Weapon/Weapon/generateExcel2016';

$route['khc/(:num)'] = 'Weapon/Weapon/move_to_ca';
$route['get-body-numbers'] = '/Weapon/Weapon/get_body_numbers';	//ajax page provide json object of bodynumbers of weapons
/*weapon endsClose*/

$route['ammunition/service-to-practice'] = 'Ammunition/service_to_practice';
$route['ammunition/conversion-report'] = 'Ammunition/conversion_report';
$route['ammunition/ajax-conversion-report'] = 'Ammunition/ajax_ammunition_conversion_report';

$route['ammunition/test'] =	'Ammunition/test';
$route['ammunition/ajaxGetAmmunitionBores'] =	'Ammunition/ajaxGetAmmunitionBores';


$route['ammunition/get-ammunition-quantity'] = 'Ammunition/get_service_ammu_qty';//ajax
$route['ammunition/destroy-ammunition'] = 'Ammunition/destroy_ammunition';
$route['ammunition/destroyed-ammunition-report'] = 'Ammunition/destroyed_ammunition_report';
$route['ammunition/ajax-destroyed-ammunition-report'] = 'Ammunition/ajax_destroyed_ammunition_report';
$route['ammunition/ajax-destroyed-ammunition-restore'] = 'Ammunition/ajax_destroyed_ammunition_restore';

/***
*	Working on Weapons showwing full view and figure view
*/
$route['download-weapon-figure-view-excel'] = 'Btalion/Btalion/downloadfigureView';
$route['download-weapon-full-view-excel']  =  'Weapon/Weapon/fullView';


/**
MSK
*/
//$route['security-equipments-figure-view'] = 'Btalion/Btalion/securityEquipmentFigureView';
//$route['security-equipments-figure-view'] = 'Equipment/securityEquipmentFigures';
$route['equipment-figures'] = 'Equipment/securityEquipmentFigures';


//AJAX TO FETCH THE ITEM NAMES
$route['get-item-names'] = 'Equipment/getItemNames';

//a new page for viewing consolidated figures of the MT Vehicles
$route['mt-figure-view'] = 'MTVehicles/figure_view';

$route['khc-figures'] = 'Weapon/Weapon/khc_figures';

$route['userloglist'] = 'Userlog/loglist';

$route['quarters'] = 'Quarters/figures';

$route['posting-add'] = 'Postings/add';
$route['posting-delete/(:num)'] = 'Postings/deletePosting/$1';
$route['posting-list'] = 'Postings/listPostings';
$route['ajax-posting-list'] = 'Postings/getData';


//add Postings
$route['posting-edit/(:num)/(:num)'] = 'Postings/edit/$1/$2';
$route['posting-update-history/(:num)/(:num)'] = 'Postings/updateHistory/$1/$2';
$route['get-sub-postings'] = 'Postings/get_sub_postings';		//ajax
$route['get-previous-postings'] = 'Postings/get_previous_postings';	//ajax
//5.5.2021
$route['get-posting-view-in-selected-deployment-report'] = 'Postings/getPostingViewInSelectedDeploymentReport';

//edit postings
$route['get-parent-postings'] = 'Postings/get_parentPostingId_of_parentPosting';
//posting management osi module
$route['get-searched-employees'] = 'Postings/getSearchedEmployees';
$route['get-the-postings'] = 'Postings/getThePostings';	//ajax
$route['get-sub-postings-employee-list'] = 'Postings/getSubPostingsEmployeeList';	//ajax
$route['search-posting'] = 'Postings/searchPosting';	//ajax

$route['add-employees-posting'] = 'Postings/add_employee_posting';
$route['select-posting-demo'] = 'Postings/add_employee_posting2';

$route['postings/getBeltNumbers'] = 'Postings/getBeltNumbers';

//$route['view-employees-posting'] = 'Postings/view_employee_posting';
//$route['deployment-statement'] = 'Postings/view_employee_posting';
$route['deployment-statement'] = 'Postings/view_employee_posting1';
$route['deployment-statement-consolidated'] = 'Postings/view_employee_posting_consolidate';	//consolidated report
$route['deployment-history'] = 'Postings/view_deployment_history';
$route['deployment-history-employee/(:num)'] = 'Postings/view_deployment_history_of_employee/$1';
$route['get-excel'] = 'Postings/getExcel';
$route['ajax-employee-list'] = 'Postings/getEmployeeListAjax';
$route['ajax-employee-deployment-list'] = 'Postings/getEmployeeDeploymentListAjax';
//$route['ajax-employee-deployment-list1'] = 'Postings/view_employee_posting1';

$route['ajax-employee-officer-deployment-list'] = 'Postings/getOfficerEmployeeDeploymentListAjax';	//12.06.2021
$route['deployment-history-download-excel'] = 'Postings/downloadDeploymentHistory';
// OSI MODULE Provides a excel file as download containg fixed columns data
$route['user-excel-data'] = 'Osi/allUsersExcel';

//OSI MODULE search of employees
//$route['bt-osi-oldall2'] = 'Osi/osi_olddataall';
//$route['bt-osi-oldall2/(:num)'] = 'Osi/osi_olddataall/$1';
$route['bt-updates-manpower2/(:num)'] = 'Osi/updates_manpower/$1';//From Battalion

//updating the dateofbirth correcting format
//$route['correct-date'] = 'Settings/setDateOfBirth';


//Account Branch ROUTES
	//admin 
	if(false):
$route['account-soes-list'] = 'Accountbranch/soesLIST';
$route['account-soe-add'] = 'Accountbranch/addSoe';
$route['account-soe-edit/(:num)'] = 'Accountbranch/editSoe/$1';
$route['ajax-account-soe-list'] = 'Accountbranch/ajaxSoesList';
$route['ajax-account-soe-delete'] = 'Accountbranch/ajaxSoeDelete';


	
	//accountant
$route['accounts'] = 'Accountbranch/index';
$route['accounts-add-bill'] = 'Accountbranch/addBillDetail';
$route['accounts-edit-bill/(:num)'] = 'Accountbranch/editBillDetail/$1';
$route['ajax-account-bill-list'] = 'Accountbranch/ajax_account_bill_list';
$route['ajax-account-bill-delete'] = 'Accountbranch/ajaxBillDelete';
$route['ajax-accounts-bill-download-excel'] = 'Accountbranch/accountBranchBillDownloadExcel';
endif;
//$route['bt-osi-oldall'] = 'Osi/osi_olddataall';
//$route['bt-updates-manpower2/(:num)'] = 'Osi/updates_manpower/$1';//From Battalion
/* Corrections */
//updating the dateofbirth correcting format
//$route['correct-date'] = 'Settings/setDateOfBirth';
//$route['addOfficerPostings'] = 'Postings/addOfficerPostings';

$route['bt-add-manpower'] = 'Osi/add_manpower';
$route['bt-updates-manpower-two/(:num)'] ='Osi/updates_manpower/$1';//09.11.2020


//ADMIN
//Weapon mgmt
$route['ca-khc-weapon-list'] = 'Weapon/Weapon/weapon_list';
$route['ca-khc-weapon-edit/(:num)'] = 'Weapon/Weapon/weapon_edit/$1';
$route['ca-khc-weapon-add'] = 'Weapon/Weapon/weapon_add';
$route['ca-khc-ajax-weapon-list'] = 'Weapon/Weapon/weapon_list_ajax';
$route['ca-khc-ajax-weapon-sub-categories-list'] = 'Weapon/Weapon/weapon_sub_category_list_ajax';

//Weapon Main Category Mgmt.
$route['ca-khc-weapon-main-category-list'] = 'Weapon/Weapon/weapon_main_category_list';
$route['ca-khc-weapon-main-category-edit/(:num)'] = 'Weapon/Weapon/weapon_main_category_edit/$1';
$route['ca-khc-weapon-main-category-add'] = 'Weapon/Weapon/weapon_main_category_add';
$route['ca-khc-ajax-weapon-main-category-list'] = 'Weapon/Weapon/weapon_main_category_list_ajax';


//weapon sub category mgmt
$route['ca-khc-weapon-sub-category-list'] = 'Weapon/Weapon/weapon_sub_category_list';
$route['ca-khc-weapon-sub-category-edit/(:num)'] = 'Weapon/Weapon/weapon_sub_category_edit/$1';
$route['ca-khc-weapon-sub-category-add'] = 'Weapon/Weapon/weapon_sub_category_add';
$route['ca-khc-weapon-sub-category-list-ajax'] = 'Weapon/Weapon/weapon_sub_category_list_ajax2';

//Battalion update weapon detail ie change the name of weapon
$route['bt-khc-update-weapons'] ='Weapon/Weapon/updateWeaponDetailByBodyNumbers';
$route['ca-khc-ajax-get-weapon-body-numbers'] = 'Weapon/Weapon/ajaxGetWeaponBodyNumbers';

$route['ca-khc-weapon-sub-category-list-ajax2'] = 'Weapon/Weapon/weapon_sub_category_list_ajax_2';
$route['ca-khc-weapon-under-sub-category-list-ajax'] = 'Weapon/Weapon/getWeaponsUnderSubCategoryAjax';

$route['khc-figures-category-wise'] = 'Weapon/Weapon/khcFigureCategoryWise';

//OSI ajax for fetchin data
$route['ajax-osi-users-data'] = 'Osi/ajax_osi_users_data';
$route['ajax-osi-user-download-excel'] = 'Osi/ajax_osi_user_download_excel';

//Osi add posting of employee-deployment-list	15.01.2021
$route['ajax-get-all-posting-by-name'] = 'Postings/getAllPostingByName';

//updating the posting of employee 22-03-2021
$route['battalion/ajax-update-employee-posting'] = 'Postings/ajax_battalion_update_employee_posting';
//ajax data to show posting history on bt-osi-old page ie. page showing all the records of employees in osi module
$route['battalion/ajax-get-all-posting-history-by-employee-id'] = 'Postings/ajaxGetAllPostingHistoryByEmployeeId';

//2021.05.04
$route['ca-deployment-reports'] = 'Postings/caDeploymentReportList';
$route['ajax-deployment-report-list'] = 'Postings/ajaxCaDeploymentReportList';
$route['ca-deployment-reports-add'] = 'Postings/caDeploymentReportAdd';
$route['ca-deployment-reports-edit/(:num)'] = 'Postings/caDeploymentReportEdit/$1';
$route['ca-deployment-reports-delete/(:num)'] = 'Postings/caDeploymentReportDelete/$1';
//17.05.2021
$route['ca-rank-groups'] = 'RankGroups/rankGroupsList';
$route['ca-rank-groups-ajax'] = 'RankGroups/rankGroupsListAjax';
$route['ca-rank-groups-add'] = 'RankGroups/rankGroupsAdd';
$route['ca-rank-groups-edit/(:num)'] = 'RankGroups/rankGroupsEdit/$1';
//$route['ca-rank-groups-delete/(:num)'] = 'RankGroups/rankGroupsDelete/$1';

//17.05.2021
$route['ca-ranks'] = 'RankC/ranksList';
$route['ca-ranks-ajax'] = 'RankC/rankListAjax';
$route['ca-ranks-add'] = 'RankC/rankAdd';
$route['ca-ranks-edit/(:num)'] = 'RankC/rankEdit/$1';
$route['ca-ranks-delete/(:num)'] = 'RankC/rankDelete/$1';

//18.05.2021
$route['sanction-strength'] = 'Postings/sanctionStrengthList';
$route['sanction-strength-add'] = 'Postings/sanctionStrengthAdd';
$route['ajax-sanction-strength-list'] = 'Postings/ajaxSanctionStrengthListAjax';
$route['ajax-sanction-strength-history-list'] = 'Postings/ajaxSanctionStrengthHistoryList';

//21.05.2021
$route['ca-sanction-strength'] = 'Postings/adminSanctionStrengthList';
$route['ca-sanction-strength-ajax'] = 'Postings/adminAjaxSanctionStrengthList';
$route['ca-sanction-strength-edit/(:num)'] = 'Postings/adminSanctionStrengthEdit/$1';
$route['ca-sanction-strength-delete/(:num)'] = 'Postings/adminSanctionStrengthDelete/$1';

//26.05.2021
$route['ajax-induction-mode-strength-list'] = 'Postings/ajaxInductionModeStrengthList';
$route['not-reported-employees'] = 'Postings/notReportedEmployees';
$route['ajax-not-reported-employees'] = 'Postings/ajaxNotReportedEmployees';
$route['ajax-mark-employee-reported-yes'] = 'Postings/ajaxMarkEmplkoyeeReportedYes';

/** Course Management 22.06.2021*/
$route['course/add-course-name'] = 'CourseC/addCourseName';
$route['course/list-course-names'] = 'CourseC/listCourseNames';
$route['course/ajax-list-course-names'] = 'CourseC/ajaxListCourseNames';
$route['course/edit-course-name/(:num)'] = 'CourseC/editCourseName/$1';

/** Training Institute Management */
$route['training-institute/add-institute'] = 'TrainingInstituteC/addInstitute';
$route['training-institute/delete-institute/(:num)'] = 'TrainingInstituteC/deleteInstitute/$1';
$route['training-institute/recover-institute/(:num)'] = 'TrainingInstituteC/recoverInstitute/$1';
$route['training-institute/edit-institute/(:num)'] = 'TrainingInstituteC/editInstitute/$1';
$route['training-institute/institute-list'] = 'TrainingInstituteC/listInstitute';
$route['training-institute/ajax-institute-list'] = 'TrainingInstituteC/ajaxListInstitute';

/** Course Detail Management */
$route['course-detail/add-course-detail'] = 'CourseDetailC/addCourseDetail';
$route['course-detail/delete-course-detail/(:num)'] = 'CourseDetailC/deleteCourseDetail/$1';

//$route['course-detail/edit-course-detail/(:num)'] = 'CourseDetailC/editCourseDetail/$1';
//$route['course-detail/list'] = 'CourseDetailC/listCourseDetails';
//$route['course-detail/ajax-course-detail'] = 'CourseDetailC/ajaxListCourseDetail';
$route['course-detail/add-course-to-employee/(:num)/(:num)'] = 'CourseMemberC/addCourseToEmployee/$1/$2';
$route['course-detail/ajax-add-course-to-employee'] = 'CourseMemberC/ajaxAddCourseToEmployee';
$route['course-detail/ajax-get-professional-course-detail'] = 'CourseDetailC/ajaxGetProfessionalListCourseDetail';
$route['course-detail/ajax-get-course-detail-by-id'] = 'CourseDetailC/ajaxGetCourseDetailById';
//$route['course-detail/ajax-add-course-to-employee'] = 'CourseMemberC/ajaxAddCourseDetailToEmployee';
$route['course-detail/ajax-add-course-detail'] = 'CourseDetailC/ajaxAddCourseDetail';

$route['course/ajax-get-professional-course-history'] = 'CourseC/ajaxGetProfessionalCourseHistory';
$route['course/ajax-get-employees-course-by-id'] = 'CourseMemberC/ajaxGetEmployeesCourseById';
$route['course/ajaxUpdateProfessionalCourseDetail'] = 'CourseMemberC/ajaxUpdateProfessionalCourseDetail';

$route['battalion/ajax-update-employee-leave'] = 'Postings/ajax_battalion_update_employee_leave';
$route['ca-account-login'] = 'Welcome/adminLogin';

$route['course-history'] = 'CourseC/courseHistory';
$route['course/ajax-get-professional-course-history-of-all-employees'] = 'CourseC/ajaxGetProfessionalCourseHistoryOfEmployees1';
$route['course/professional-course-history-download-excel'] = 'CourseC/downloadProfessionalCourseHistoryOfEmployees';

$route['cso'] = 'Osi/cso';

$route['ajaxAddAdditionalPostingType'] = 'Postings/addAdditionalPostingType';
$route['ajaxDeletePostingAdditionalInfoType'] = 'Postings/ajaxDeletePostingAdditionalInfoType';
$route['ajaxRecoverPostingAdditionalInfoType'] = 'Postings/ajaxRecoverPostingAdditionalInfoType';
$route['ajaxUpdateAdditionalPostingType'] = 'Postings/ajaxUpdatePostingAdditionalInfoType';
$route['ajaxGetAdditionalPostingInfo'] = 'Postings/ajaxGetAdditionalPostingInfo';
$route['present-strength'] = 'Osi/getPresentStrength';
$route['getNotification'] = 'Osi/getNotification';
$route['udpateBeltNo'] = 'Osi/udpateBeltNo';


$route['postings/getbeltnumbers2'] = 'BPTController/getBeltNumbers';
$route['BPTDemo'] = 'BPTController/index';
$route['BPT/addEmployee'] = 'BPTController/AddEmployeeToBPT';
$route['BPT/editEmployee/(:num)'] = 'BPTController/EditEmployeeInBPT/$1';
