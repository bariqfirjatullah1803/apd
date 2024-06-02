<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('PATCH', 'Version 1.2.2 - Update perjalanan dinas dalam daerah pages');
define('MAX_AMOUNT', 30);

// {Define tables name as constant because i bad at remembering thing}
// {Especially because some time i use s prefix sometime not}
// {Ex :} @ durations @ and @ duration @

/**
 * Define DD, LD, and LP as constants
 */
define('ISDD', 'dd');
define('ISLD', 'ld');
define('ISLP', 'lp');

/**
 * Define UH for DD under 8 hours, DD over 8 hours, and LD
 */
define('UH_UNDER_8', '125000');
define('UH_OVER_8', '160000');
define('UH_LD', '410000');

/**
 * ISDEBUGGING is for whole container area
 * 
 */
define('ISDEBUGGING',0);

define('RECAP_BUG', 'recap_bug_report_or_feature_request');
define('RECAP_DUR', 'recap_all_date_and_durations');
define('RECAP_DEST', 'recap_all_destination_information');
define('RECAP_GI', 'recap_all_general_information');
define('RECAP_MON', 'recap_all_money_details');
define('RECAP_MON_LOD', 'recap_all_money_lodging_details');
define('RECAP_MON_MISC', 'recap_all_money_misc_details');
define('RECAP_MON_TRANS', 'recap_all_money_transport_details');
define('RECAP_PEG', 'recap_all_pegawai');
define('RECAP_ASSOC_BAG', 'recap_associative_all_idsubmit_idbagian');
define('RECAP_ASSOC_PEG', 'recap_associative_all_idsubmit_idpegawai');
define('RECAP_ASSOC_TUJ', 'recap_associative_all_idsubmit_idtujuan');
define('RECAP_PLANE_ARR', 'recap_plane_arrival_details');
define('RECAP_PLANE_DEP', 'recap_plane_departure_details');

define('RES_PEG', 'resource_pegawai');

define('REPRESENTASI_DD_BUPATI_WAKIL', 125000);
define('REPRESENTASI_DD_SEKDA_ASISTEN', 75000);
define('REPRESENTASI_LD_BUPATI_WAKIL', 250000);
define('REPRESENTASI_LD_SEKDA_ASISTEN', 150000);
define('REPRESENTASI_LP_BUPATI_WAKIL', 250000);
define('REPRESENTASI_LP_SEKDA_ASISTEN', 150000);

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
