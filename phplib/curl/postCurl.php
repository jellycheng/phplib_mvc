<?php
/**
 * phplib\curl\postCurl.php
 * 
 * <code>
 * $postCurl = new \phplib\curl\postCurl();
 * $result = $postCurl->request($apiUrl, array('data'=>array(
													'参数1'=>'值',
													'参数2'=>'值',
													)), true);
 * </code>
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-30
 * @version		$Id$
 */
namespace phplib\curl;
use \phplib\curl\abstractCurl;

class postCurl extends abstractCurl {

	public function __construct() {
		parent::__construct();
	}
	
	protected function _curl() {
		$param = $this->_param;
		curl_setopt($this->_ch, CURLOPT_POST, true);
		if(empty($param['data'])) {
			$_postData = '';
		} else if(is_array($param['data'])) {
			$param['data'] = http_build_query($param['data']);
			$_postData = $param['data'];
		} else {
			$_postData = $param['data'];
		}
		curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $_postData);
	}

}
