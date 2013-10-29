<?php
/**
 * phplib\util\emptyCls.php
 * 空类,空实现
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-29
 * @version		$Id$
 */
namespace phplib\util;

class emptyCls {

	public function __construct() {
		
	}
	//todo
	public function __call($method, $args) {
		if(defined('DEBUG')) {
			echo  __FILE__ . ' : ' . $method;
		}
	}

}
