<?php
/**
 * phplib\core\base.php
 * 基础累
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-19
 * @version		$Id$
 */
namespace phplib\core;

class base {

	/**
	 * 魔术方法
	 * 当调用一个不可访问方法(如未定义，或者不可见)时, 会被调用
	 * 具体逻辑todo - 构思中
	 * 
	 * @param string $name
	 * @param array $args
	 * @return mixed
	 */
	public function __call($name, $args) {
		/* code */
	}

}
