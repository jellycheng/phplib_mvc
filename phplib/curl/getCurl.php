<?php
/**
 * phplib\curl\getCurl.php
 * 
 * <code>
 * $getCurl = new \phplib\curl\getCurl();
 * $result = $getCurl->request($apiUrl, array('data' => array('aa'=>'1','参数n'=>'值')), true);
 * </code>
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-30
 * @version		$Id$
 */
namespace phplib\curl;

use \phplib\curl\abstractCurl;

class getCurl extends abstractCurl {

	public function __construct() {
		parent::__construct();
	}
	
	protected function _curl() {
		$param = $this->_param;
		if(!empty($param['data'])) {
			if(is_array($param['data'])) {
				$_getParam = http_build_query($param['data']);
			} else {
				$_getParam = (string)$param['data'];
			}
			
			if(preg_match('/\?/', $this->_url)) {
				$this->_url .= '&' . $_getParam;
			} else {
				$this->_url .= '?' . $_getParam;
			}
		}
	}
}
