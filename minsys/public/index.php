<?php
$_env_name = isset($_SERVER['ENV_NAME']) ? $_SERVER['ENV_NAME'] : get_cfg_var('env_name');
define('ENVIRONMENT', $_env_name ? $_env_name : 'dev');

switch (ENVIRONMENT) {
	case 'dev':
	default:	
			error_reporting(E_ALL | E_STRICT);
			ini_set('display_errors', 1);
		break;
}

define('APP_ROOT', dirname(__DIR__) . '/');
require dirname(dirname(__DIR__)) . '/phplib/_init.php';
\phplib\core\webApp::init(require APP_ROOT . 'config/config.php')->run();
