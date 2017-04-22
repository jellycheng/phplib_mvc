<?php
/**
 * phplib\db\dbFactory.php 数据库工厂
 * 
 * <code>
 *  
 * </code>
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-11-18
 * @version		$Id$
 */
namespace phplib\db;

final class dbFactory {
	
	/**
	 * 当前数据库工厂类静态实例
	 */
	private static $db_factory;
	
	/**
	 * 数据库配置列表
	 */
	protected $db_config = array();
	
	/**
	 * 数据库操作实例化列表
	 */
	protected $db_list = array();
	
	/**
	 * 构造函数
	 */
	public function __construct() {
	}
	

	public static function instance($db_config = '') {
		//todo
	}
	
	/**
	 * 获取数据库操作实例
	 * @param $db_name 数据库配置名称
	 */
	public function get_database($db_name) {
		
	}
	
	/**
	 *  加载数据库驱动
	 * @param $db_name 	数据库配置名称
	 * @return object
	 */
	public function connect($db_name) {
		$object = null;
		switch($this->db_config[$db_name]['type']) {
			case 'mysql' :

				$object = new \phplib\db\mysql();
				break;
			case 'mysqli' :
				$object = \phplib\db\mysqli();
				break;
			case 'access' :
				$object = \phplib\db\access();
				break;
			default :
				$object = new \phplib\db\mysql();
		}
		$object->open($this->db_config[$db_name]);
		return $object;
	}

	/**
	 * 关闭数据库连接
	 * @return void
	 */
	protected function close() {
		foreach($this->db_list as $db) {
			$db->close();
		}
	}
	
	/**
	 * 析构函数
	 */
	public function __destruct() {
		$this->close();
	}
}
?>