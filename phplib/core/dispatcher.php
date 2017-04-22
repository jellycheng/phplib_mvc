<?php
/**
 * phplib\core\dispatcher.php
 * url调度器,解析,重写,路由等
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-22
 * @version		$Id$
 */
namespace phplib\core;

class dispatcher {

	
	static public function start() {
			//todo
		
		$_config = \phplib\phplib::getEnv('config');
		$_mod_key = isset($_config['var_mod']) ? $_config['var_mod'] : '';
		$_act_key = isset($_config['var_act']) ? $_config['var_act'] : '';
		\phplib\phplib::setEnv('mod', self::getMod($_mod_key));
		\phplib\phplib::setEnv('act', self::getAct($_act_key));
	}

	static private function getMod($key = 'mod') {
		if(!$key) { 
			$key = 'mod';
		}
        $mod = '';
		if(!empty($_GET[$key])) {
			$mod = trim($_GET[$key]);
		} else if(!empty($_POST[$key])) {
			$mod = trim($_POST[$key]);
		}
		if(!preg_match('/^[A-Za-z][A-Za-z0-9\_]*$/', $mod)) {
			$mod = '';
		}
		if(!$mod) {
			$_config = \phplib\phplib::getEnv('config');
			$mod = isset($_config['default_mod']) ? $_config['default_mod'] : 'index';
		}

        return $mod;
    }

    static private function getAct($key = 'act') {
		if(!$key) { 
			$key = 'act';
		}
        $act = '';
		if(!empty($_GET[$key])) {
			$act = trim($_GET[$key]);
		} else if(!empty($_POST[$key])) {
			$act = trim($_POST[$key]);
		}
		if(!preg_match('/^[A-Za-z][A-Za-z0-9\_]*$/', $act)) {
			$act = '';
		}
		if(!$act) {
			$_config = \phplib\phplib::getEnv('config');
			$act = isset($_config['default_act']) ? $_config['default_act'] : 'index';
		}

        return $act;
    }

}
