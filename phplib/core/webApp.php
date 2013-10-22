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
		
		$mod = \phplib\phplib::getEnv('mod');
		$act = \phplib\phplib::getEnv('act');
		echo "mod={$mod} act={$act}   todo...";
	}

}
