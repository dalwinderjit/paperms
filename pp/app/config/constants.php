<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*Folder start*/
defined('F_SUPERADMIN') OR define('F_SUPERADMIN', 'Superadmin/'); 

defined('F_BTALION')  OR define('F_BTALION', 'Btalion/'); 

defined('F_CA')    OR define('F_CA', 'Ca/'); 

defined('F_HTML')  OR define('F_HTML', 'html/'); 

defined('F_USERINFO')  OR define('F_USERINFO', 'userinfo/'); 
/*Folder Close*/

/*Table*/
defined('T_USERS')    OR define('T_USERS', 'users'); 

defined('T_ARM_MASTER')    OR define('T_ARM_MASTER', 'arms_master'); 

defined('T_ARM_ADD')    OR define('T_ARM_ADD', 'addarm'); 

defined('T_WEAPON_MASTER')    OR define('T_WEAPON_MASTER', 'weapon_master'); 

defined('T_ISSUE_ARM')    OR define('T_ISSUE_ARM', 'issue_arm'); 

defined('T_OFFICER')    OR define('T_OFFICER', 'officer_master'); 

defined('T_VEHICLE')    OR define('T_VEHICLE', 'vehicle_master'); 

defined('T_MATERIAL')    OR define('T_MATERIAL', 'material_master'); 

defined('T_PMATERIAL')    OR define('T_PMATERIAL', 'p_material'); 

defined('T_MANMASTER')    OR define('T_MANMASTER', 'man_power');

defined('T_WEAP_CON')    OR define('T_WEAP_CON', 'weapon_condition'); 

defined('T_IAS')    OR define('T_IAS', 'issuearm_stock');

defined('T_ISSUE_AMMU')    OR define('T_ISSUE_AMMU', 'issue_annu'); 

defined('T_IAMS')    OR define('T_IAMS', 'issueammu_stock'); 

defined('T_BATISSUE')    OR define('T_BATISSUE', 'battallion_issue'); 

defined('T_RETPOLOFF')    OR define('T_RETPOLOFF', 'retpoloff'); 

defined('T_SERPOLOFF')    OR define('T_SERPOLOFF', 'serpoloff'); 

defined('T_SERCIVOFF')    OR define('T_SERCIVOFF', 'sercivoff');

defined('T_RETCIVOFF')    OR define('T_RETCIVOFF', 'retcivoff');

defined('T_SERJUDOFF')    OR define('T_SERJUDOFF', 'serjudoff');

defined('T_RETJUDOFF')    OR define('T_RETJUDOFF', 'retjudoff');

defined('T_POLLEADER')    OR define('T_POLLEADER', 'polleader');

defined('T_THRET')    OR define('T_THRET', 'thretper');

defined('T_GUARD')    OR define('T_GUARD', 'guard');

defined('T_QUATER')    OR define('T_QUATER', 'quater');

defined('T_VGUARD')    OR define('T_VGUARD', 'vp_guard');

defined('T_OTHERS')    OR define('T_OTHERS', 'others');

defined('T_TEMPDUTY')    OR define('T_TEMPDUTY', 'tempduty');

defined('T_COMPANY')    OR define('T_COMPANY', 'company');

defined('T_POLOFF')    OR define('T_POLOFF', 'policeoff');

defined('T_DEPWEP')    OR define('T_DEPWEP', 'deposit_weapon');

defined('T_BATISSUE_AMMU')    OR define('T_BATISSUE_AMMU', 'battallion_issue_ammu'); 

defined('T_BATDIP_AMMU')    OR define('T_BATDIP_AMMU', 'battallion_dip_ammu'); 

defined('T_DIP_AMMU')    OR define('T_DIP_AMMU', 'deposit_ammu'); 

defined('T_HORSE')    OR define('T_HORSE', 'horse');

defined('T_DIP_HORSE')    OR define('T_DIP_HORSE', 'deposit_horse');

defined('T_ADD_QUATER')    OR define('T_ADD_QUATER', 'add_quater');

defined('T_ALOT_QUATER')    OR define('T_ALOT_QUATER', 'alot_quater');

defined('T_ALOT_HORSE')    OR define('T_ALOT_HORSE', 'alot_horse');

defined('T_ALOT_MATERIL')    OR define('T_ALOT_MATERIL', 'alotp_material');

defined('T_OLD_WEP')    OR define('T_OLD_WEP', 'old_weapon');

defined('T_OLD_AMMU')    OR define('T_OLD_AMMU', 'old_ammunation');

defined('T_OLD_AMMUP')    OR define('T_OLD_AMMUP', 'old_ammunationp');

defined('EXCEL_EXTENSION') OR define('EXCEL_EXTENSION','xls');

define("IGP_CDO_ID",211);
 define("IGP_IRB_ID",209);
/*Close Table*/