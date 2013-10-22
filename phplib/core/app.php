<?php
/**
 * phplib\core\app.php
 * 应用程序类 - 基础
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-19
 * @version		$Id$
 * <code>
 * \phplib\core\app::init('./config/xxx.php')->run();
 * \phplib\core\app::init(require './config/xxx.php')->run();
 * </code>
 */
namespace phplib\core;

class app extends base {
	
	static $_app;

	static function _init() {

	}

	static function _run() {
		
	}
	
	public static function createStatic(){
		return new static();
	}

	static public function init($config=null) {
		if(self::$_app) {
			return self::$_app;
		}
		if(is_array($config)) {
			$_config = $config;
		} else if($config && is_string($config)) {
			$_config = include $config;
		}
		if(isset($_config['default_timezone'])) {
			date_default_timezone_set($_config['default_timezone']);
		}

		static::_init();
		self::$_app = self::createStatic();
		return self::$_app;
	}


	static public function run() {
		//todo
		echo 'rrr';
		static::_run();
	}


}
