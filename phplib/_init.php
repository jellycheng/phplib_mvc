<?php
/**
 * phplib\_init.php
 * phplib初始化入口
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-13
 * @version		$Id$
 */
namespace phplib;

if(defined('\\phplib\\VERSION')) {
	return ;
}

if(version_compare(PHP_VERSION, '5.3.0', '<')) {
	exit('php版本必须是5.3.0及以上');
}

# \phplib\VERSION;
const VERSION = '1.0';
const AUTHOR = 'jellycheng';


class phplib {

	public static $_ENV;
	
	/**
	 *
	 * <code>
	 *  \phplib\phplib::getEnv();
	 *  \phplib\phplib::getEnv('abc');
	 * </code>
	 * @return mixed
	 */
	public static function getEnv($index = null) {
		if(!self::$_ENV) {
			self::$_ENV = new \stdClass();
		}
		
		if($index) {
			if(isset(self::$_ENV->$index)) {
				return self::$_ENV->$index;
			} else {
				return null;
			}
		}
		return self::$_ENV;
	}
	
	/**
	 *
	 * <code>
	 *  \phplib\phplib::setEnv($key, $val);
	 *  \phplib\phplib::getEnv()->$key = $val;
	 * </code>
	 * @return object
	 */
	public static function setEnv($key, $val = null) {
		if(!self::$_ENV) {
			self::$_ENV = new \stdClass();
		}
		if(!$key) {
			return false;
		}
		self::$_ENV->$key = $val;
		return self::$_ENV;
	}
	
	/**
	 * 获取phplib目录
	 *
	 * <code>
	 *  \phplib\phplib::getPhplibPath();
	 * </code>
	 * @return string
	 */
	public static function getPhplibPath() {
		$path = __DIR__ . '/';
		return $path;
	
	}

	/**
	 * 获取phplib版本号
	 *
	 * <code>
	 *  \phplib\phplib::getVersion();
	 * </code>
	 * @return string
	 */
	public static function getVersion() {
		return \phplib\VERSION;
	}

}

require_once \phplib\phplib::getPhplibPath() . 'loader/loader.php';
