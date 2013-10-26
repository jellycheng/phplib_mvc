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

	static protected function _init() {

	}

	static protected function _run() {
		
	}
	
	static public function createStatic(){
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
		\phplib\phplib::setEnv('config', $_config);
		
		if(!empty($_config['default_timezone'])) {
			date_default_timezone_set($_config['default_timezone']);
		}
		
		\phplib\phplib::setEnv('appClassName', get_called_class());

		static::_init();
		self::$_app = self::createStatic();
		return self::$_app;
	}


	static public function run() {
		
		static::_run();
	}

    static public function load_ext_file($file = '') {
        $files = array();
        if(is_string($file) && file_exists($file)) {
            $files = include $file;
        } else if(!is_array($file)) {
            return false;
        }
        foreach ($files as $_f) {
            if(file_exists($_f)) include_once $_f;
        }
        return true;
    }

}
