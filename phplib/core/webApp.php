<?php
/**
 * phplib\core\webApp.php
 * web应用程序类
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-19
 * @version		$Id$
 */
namespace phplib\core;

class webApp extends app {

	static protected function _init() {
		dispatcher::start();
		
	}

	static protected function _run() {
		$className = $partFileName = '';
		$_config = \phplib\phplib::getEnv('config');
		$mod = \phplib\phplib::getEnv('mod');
		$act = \phplib\phplib::getEnv('act');
		
		
		$_controller_namespace = '\\';
		if(isset($_config['controller_namespace']) && $_config['controller_namespace']) {
			$_controller_namespace = $_config['controller_namespace'];
		}
		if(preg_match('/_/', $mod)) {
			$partFileName = str_replace('_', '/', $mod);
			$className = substr($mod, strrpos($mod, '_') + 1) . 'Control';
		} else {
			$partFileName = $mod;
			$className = $mod . 'Control';
		}
		
		$_file = APP_ROOT . "control/{$partFileName}Control.php";
		if(file_exists($_file)) {
			include $_file;
			$className = rtrim($_controller_namespace, '\\') . '\\' . $className;
			$_obj = new $className();
			//$_obj->$act();
			$act .= 'Act';
			call_user_func(array(&$_obj, $act));
		} else {
			#404 todo
			
		}

	}

}
