<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
define('SHOW_DEBUG_BACKTRACE', TRUE);

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
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*Factura Electronica*/

// Server status: "dev" | "prod"
$STATUS = "prod";
define('CUIT_WSAA_TRA', 30595277767);

// Certificates path
$CERT_PROD = "/certificates/walco_7b678101a4809d77.crt";
$PRIV_KEY_PROD = "/certificates/30595277767.key";

$CERT_DEV = "/certificates/30595277767.crt";
$PRIV_KEY_DEV = "/certificates/30595277767.key";

// WSAA URLs
$WSAA_PROD = "https://wsaa.afip.gov.ar/ws/services/LoginCms";
$WSAA_DEV  = "https://wsaahomo.afip.gov.ar/ws/services/LoginCms";

// WSFE URLs
$WSFE_PROD ="https://servicios1.afip.gov.ar/wsfev1/service.asmx";
$WSFE_DEV = "https://wswhomo.afip.gov.ar/wsfev1/service.asmx";

// WSDL addresses
$WSFE_WSDL_PROD = "https://servicios1.afip.gov.ar/wsfev1/service.asmx?WSDL";
$WSFE_WSDL_DEV  = "https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL";

$WSAA_WSDL_PROD = "https://wsaa.afip.gov.ar/ws/services/LoginCms?WSDL";
$WSAA_WSDL_DEV  = "https://wsaahomo.afip.gov.ar/ws/services/LoginCms?WSDL";


// Taken from WSDL
$SOAP_ACTION = "http://ar.gov.afip.dif.facturaelectronica/";

/******** END CONFIG ********/
/**** DO NOT TOUCH BELOW ****/

if ($STATUS == "prod") {
	define('WSAA_WSDL_URL', $WSAA_WSDL_PROD);
	define('WSFE_WSDL_URL', $WSFE_WSDL_PROD);
	define('WSAA_URL', $WSAA_PROD);
	define('WSFE_URL', $WSFE_PROD);
	define('PRIV_KEY', $PRIV_KEY_PROD);
	define('CERT', $CERT_PROD);
	define('PASSPHRASE', '');	
} else {
	define('WSAA_WSDL_URL', $WSAA_WSDL_DEV);
	define('WSFE_WSDL_URL', $WSFE_WSDL_DEV);
	define('WSAA_URL', $WSAA_DEV);
	define('WSFE_URL', $WSFE_DEV);
	define('PRIV_KEY', $PRIV_KEY_DEV);
	define('CERT', $CERT_DEV);
	define('PASSPHRASE', '');
}

/*Factura Electronica*/