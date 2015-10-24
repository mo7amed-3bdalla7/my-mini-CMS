<?php
// buffering
ob_start ();


// error reporting&handeling
ini_set ( 'display_errors', 1 );
error_reporting ( E_ALL & ~ E_STRICT & ~ E_NOTICE );

// turn off registers globals
ini_set ( 'register_globdddals', 0 );

// project Paths
define ( 'DS', DIRECTORY_SEPARATOR );
define ( PS, PATH_SEPARATOR );

// sites dirs
define ( 'HOST_NAME', "http://{$_SERVER['HTTP_HOST']}/project/" );
define ( 'WEB_CSS_DIR', HOST_NAME . 'template/web/css/' );
define ( 'WEB_JS_DIR', HOST_NAME . 'template/web/js/' );
define ( 'CPANEL_DIR', HOST_NAME . 'template/cpanel/' );
// actual paths
define ( 'APP_PATH', realpath ( dirname ( __FILE__ ) ) . DS );
define ( 'WEB_TEMPLATE_PATH', APP_PATH . 'template' . DS . 'web' . DS );
define ( 'CPANEL_TEMPLATE_PATH', APP_PATH . 'template' . DS . 'cpanel' . DS );
define ( 'LIBS', APP_PATH . 'libs' );
define ( 'MODELS', APP_PATH . 'models' . DS );
define ( 'VIEWS', APP_PATH . 'views' . DS );
define ( 'WEB_VIEWS', APP_PATH . 'views' . DS . 'web' . DS );
define ( 'CPANEL_VIEWS', APP_PATH . 'views' . DS . 'cpanel' . DS );
define ( 'WEB_CSS', WEB_TEMPLATE_PATH . 'css' . DS );
define ( 'WEB_JS', WEB_TEMPLATE_PATH . 'js' . DS );
// ////security sault////
define ( 'SAULT', 'mohamed' );
// /email
// ini_set("SMTP","smtp.gmail.com");
// ini_set("smtp_port","465");

// ini_set('sendmail_from', 'mo7amed.3bdalla7@gmail.com');

// auto loading
$path = get_include_path () . PS . LIBS . PS . MODELS;
set_include_path ( $path );
function myAutoload($class) {
	
		require_once strtolower ( $class ) . '.class.php';
}
spl_autoload_register ( 'myAutoload' );

// database Auth
define ( 'DB_NAME', '****' );
define ( 'DB_HOST', '****' );
define ( 'DB_ROOT', '****' );
define ( 'DB_PASS', '****' );

// Database Connection
$dbo = database::get_instance ();
// $user=new user('mohamedvv', md5(12345), 'mohamedvv@yahoo.com', 1, 2, 1);
// $user->add(); */
//start session
session_start();
///calling template
if (preg_match ( '/cpanel/i', $_SERVER ['REQUEST_URI'] )) {
	new adminTemplate ();
} else {
	new template ();
}


ob_flush ();

