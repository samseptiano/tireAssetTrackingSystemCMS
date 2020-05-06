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

defined('APPNAME')      OR define('APPNAME', 'CMS'); // highest automatically-assigned error code
defined('APPVERSION')      OR define('APPVERSION', 'v.1.0.0'); // highest automatically-assigned error code
defined('DEVELOPER')      OR define('DEVELOPER', 'Techarmony'); // highest automatically-assigned error code


//TOKEN
defined('TOKEN')      OR define('TOKEN', 'IaTLBlNT3NImtLRqNmvzmRP9cm2I7SMrSwFIPWUIeagFZW98j9ex1kxb3B21IkKd'); 
defined('UTOKEN')      OR define('UTOKEN', '4mQ43NX9JC3V29yeEtXFk265EcLY7gTNzCH4BSpa3m5ZsFZzYX8b52gG9YLtRHp'); 


//TOKEN
defined('ADMIN')      OR define('ADMIN', 'A-'); 
defined('USER')      OR define('USER', 'U-'); 
defined('CUSTOMER')      OR define('CUSTOMER', 'C-'); 
defined('DC')      OR define('DC', 'DC-');
defined('BAN')      OR define('BAN', 'BAN-');  
defined('HARGA')      OR define('HARGA', 'H-');  
defined('KENDARAAN')      OR define('KENDARAAN', 'KDR-');  
defined('MEREKBAN')      OR define('MEREKBAN', 'MK-');  
defined('UKURANBAN')      OR define('UKURANBAN', 'UK-');  
defined('ALASANBAN')      OR define('ALASANBAN', 'AL-');  
defined('PATTERN')      OR define('PATTERN', 'PT-');  
defined('AXLE')      OR define('AXLE', 'AX-');  
defined('ROLE')      OR define('ROLE', 'R-'); 
defined('TEKANANANGIN')      OR define('TEKANANANGIN', 'TK-'); 


defined('ADMINROLE')      OR define('ADMINROLE', 'ADM'); 
defined('TEKNISIROLE')      OR define('TEKNISIROLE', 'TKNS'); 
defined('SUPERADMINROLE')      OR define('SUPERADMINROLE', 'SADM'); 
defined('CHECKFLEETROLE')      OR define('CHECKFLEETROLE', 'CHCKFLT'); 
defined('TRUCKSERVICEROLE')      OR define('TRUCKSERVICEROLE', 'TRCKSRVC'); 


//HOME
defined('LOGIN')      OR define('LOGIN', 'Login'); // highest automatically-assigned error code
defined('LOGOUT')      OR define('LOGOUT', 'Logout'); // highest automatically-assigned error code

//HOME
defined('HOME')      OR define('HOME', 'Home'); // highest automatically-assigned error code

// MASTER
defined('MSTR')      OR define('MSTR', 'Master'); // highest automatically-assigned error code
defined('MSTRPLNGGN')      OR define('MSTRPLNGGN', 'Master Pelanggan'); // highest automatically-assigned error code
defined('MSTRDC')      OR define('MSTRDC', 'Master DC'); // highest automatically-assigned error code
defined('MSTRTKNS')      OR define('MSTRTKNS', 'Master Teknisi'); // highest automatically-assigned error code
defined('MSTRUSR')      OR define('MSTRUSR', 'Master User'); // highest automatically-assigned error code
defined('MSTRMRKBN')      OR define('MSTRMRKBN', 'Master Merek Ban'); // highest automatically-assigned error code
defined('MSTRBN')      OR define('MSTRBN', 'Master Ban'); // highest automatically-assigned error code
defined('MSTRDLR')      OR define('MSTRDLR', 'Master Dealer'); // highest automatically-assigned error code
defined('MSTRFLT')      OR define('MSTRFLT', 'Master Fleet'); // highest automatically-assigned error code
defined('MSTRKNDRN')      OR define('MSTRKNDRN', 'Master Kendaraan'); // highest automatically-assigned error code
defined('MSTRUKBN')      OR define('MSTRUKBN', 'Master Ukuran Ban'); // highest automatically-assigned error code
defined('MSTRALBN')      OR define('MSTRALBN', 'Master Alasan Ban'); // highest automatically-assigned error code
defined('MSTRHRG')      OR define('MSTRHRG', 'Master Harga'); // highest automatically-assigned error code
defined('MSTRAXL')      OR define('MSTRAXL', 'Master Axle'); // highest automatically-assigned error code
defined('MSTRROLE')      OR define('MSTRROLE', 'Master Role'); // highest automatically-assigned error code
defined('MSTRTKNAGN')      OR define('MSTRTKNAGN', 'Master Tekanan Angin'); // highest automatically-assigned error code
defined('MSTRPTTR')      OR define('MSTRPTTR', 'Master Pattern'); // highest automatically-assigned error code


//TRANS
defined('TRX')      OR define('TRX', 'Transaksi'); // highest automatically-assigned error code
defined('TRXCKHR')      OR define('TRXCKHR', 'Trans Cek harian'); // highest automatically-assigned error code
defined('TRXMTSBN')      OR define('TRXMTSBN', 'Trans Mutasi Ban'); // highest automatically-assigned error code
defined('TRXRWTBN')      OR define('TRXRWTBN', 'Trans Riwayat Ban'); // highest automatically-assigned error code
defined('TRXSTPBN')      OR define('TRXSTPBN', 'Trans Stempel Ban'); // highest automatically-assigned error code
defined('TRXBNKRM')      OR define('TRXBNKRM', 'Trans Ban Dikirim'); // highest automatically-assigned error code

defined('TRXDTBNTRK')      OR define('TRXDTBNTRK', 'Trans Data Ban DiPakai Ditruk'); // highest automatically-assigned error code
defined('TRXWKTPGTBN')      OR define('TRXWKTPGTBN', 'Trans Waktu Penggantian Ban'); // highest automatically-assigned error code
defined('TRXTTLF')      OR define('TRXTTLF', 'Trans Total Life Ban'); // highest automatically-assigned error code
defined('TRXHSVLN')      OR define('TRXHSVLN', 'History Vulkanisir Ban'); // highest automatically-assigned error code
defined('TRXTTLCST')      OR define('TRXTTLCST', 'Total Cost Harga Ban'); // highest automatically-assigned error code
defined('TRXKRSBN')      OR define('TRXKRSBN', 'Penyebab Kerusakan Ban'); // highest automatically-assigned error code
defined('TRXMTSBNPR')      OR define('TRXMTSBNPR', 'Mutasi Ban per Periode'); // highest automatically-assigned error code
defined('TRXTTLPBLBN')      OR define('TRXTTLPBLBN', 'Total Pembelian Ban per Periode'); // highest automatically-assigned error code
defined('TRXBTTLCSTPR')      OR define('TRXBTTLCSTPR', 'Total Cost Ban per Unit per Periode'); // highest automatically-assigned error code


//USER
defined('OUT')      OR define('OUT', 'Output'); // highest automatically-assigned error code
defined('OUTRWYTBN')      OR define('OUTRWYTBN', 'Output Riwayat Ban'); // highest automatically-assigned error code


defined('CUSTOMERPHOTOPATH')      OR define('CUSTOMERPHOTOPATH', './assets/images/customer/'); // highest automatically-assigned error code
defined('CUSTOMERPHOTOSIZE')      OR define('CUSTOMERPHOTOSIZE', 800); // highest automatically-assigned error code
defined('CUSTOMERPHOTOWIDTH')      OR define('CUSTOMERPHOTOWIDTH', 1500); // highest automatically-assigned error code
defined('CUSTOMERPHOTOHEIGHT')      OR define('CUSTOMERPHOTOHEIGHT', 1200); // highest automatically-assigned error code


defined('MUTASIPHOTOPATH')      OR define('MUTASIPHOTOPATH', './assets/images/mutasiban/'); // highest automatically-assigned error code
defined('MUTASIPHOTOSIZE')      OR define('MUTASIPHOTOSIZE', 3000); // highest automatically-assigned error code
defined('MUTASIPHOTOWIDTH')      OR define('MUTASIPHOTOWIDTH', 4000); // highest automatically-assigned error code
defined('MUTASIPHOTOHEIGHT')      OR define('MUTASIPHOTOHEIGHT', 4000); // highest automatically-assigned error code


defined('DAILYCHECKPHOTOPATH')      OR define('DAILYCHECKPHOTOPATH', './assets/images/checkfleet/'); // highest automatically-assigned error code
defined('DAILYCHECKPHOTOSIZE')      OR define('DAILYCHECKPHOTOSIZE', 3000); // highest automatically-assigned error code
defined('DAILYCHECKPHOTOWIDTH')      OR define('DAILYCHECKPHOTOWIDTH', 4000); // highest automatically-assigned error code
defined('DAILYCHECKPHOTOHEIGHT')      OR define('DAILYCHECKPHOTOHEIGHT', 4000); // highest automatically-assigned error code


defined('AXLEPHOTOPATH')      OR define('AXLEPHOTOPATH', './assets/images/axle/'); // highest automatically-assigned error code
defined('AXLEPHOTOSIZE')      OR define('AXLEPHOTOSIZE', 3000); // highest automatically-assigned error code
defined('AXLEPHOTOWIDTH')      OR define('AXLEPHOTOWIDTH', 4000); // highest automatically-assigned error code
defined('AXLEPHOTOHEIGHT')      OR define('AXLEPHOTOHEIGHT', 4000); // highest automatically-assigned error code
