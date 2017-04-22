<?php
/**
 * phplib\curl\abstractCurl.php
 * 
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-30
 * @version		$Id$
 */
namespace phplib\curl;

abstract class abstractCurl {
	
	protected $_ch = null;
	protected $_url = '';
	protected $_ssl = false;
	protected $_options = array(
								CURLOPT_TIMEOUT=>5,
								CURLOPT_CONNECTTIMEOUT=>5,
								CURLOPT_HEADER => false,
								CURLOPT_FOLLOWLOCATION => true,
								CURLOPT_RETURNTRANSFER => true,
								);
	protected $_errCode = 0;
	protected $_errMsg = 0;
	protected $_param = ''; //传入的参数

	public $forceUseCurlSetopt = false;

	protected function __construct() {
		$this->_ch = curl_init();
	}

	abstract protected function _curl();

	protected function _setUrl($url) {
		$this->_url = $url;
		if (false !== strstr($this->_url, 'https://', true)) {
			$this->_ssl = true;
		}
		return curl_setopt($this->_ch, CURLOPT_URL, $this->_url);
	}

	
	/**
	 * 可被子类重写
	 * $url = 请求地址
	 * $param = array('data'=>'请求的参数', 'option'=>array('curl配置'=>值,'curl配置n'=>值n)) 请求参数
	 * $return = 是否返回请求内容
	 */
	protected function _request($url, $param = array(), $return = true) {
		$this->_url = $url;
		$this->_param = $param;
		if (false !== strstr($this->_url, 'https://', true)) {
			$this->_ssl = true;
			curl_setopt($this->_ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($this->_ch, CURLOPT_SSL_VERIFYHOST, true);
		}
		
		$this->_curl();
		$this->set_options(CURLOPT_URL, $this->_url);
		if(!empty($this->_param['option']) && is_array($this->_param['option'])) {
			foreach($this->_param['option'] as $_k => $_v) {
				$this->set_options($_k, $_v);
			}
		}

		if (!function_exists('curl_setopt_array') || $this->forceUseCurlSetopt) {
				$this->curl_setopt_array($this->_ch, $this->_options);
		} else {
			curl_setopt_array($this->_ch, $this->_options);
		}
		$result = curl_exec($this->_ch);
		$this->_errCode = curl_errno($this->_ch);
		if ($this->_errCode) {
			$this->_errMsg = curl_error($this->_ch);
		}
		curl_close($this->_ch);
		if($return) {
			return $result;
		}
	}
	
	protected function curl_setopt_array(&$ch, $curl_options) {
		foreach ($curl_options as $option => $value) {
			if (!curl_setopt($ch, $option, $value)) {
				return false;
			}
		}
		return true;
	}

	public function set_options($key, $val = false) {
		$this->_options[$key] = $val;
	}

	public function get_options($key, $val = false) {
		return $this->_options;
	}

	/**
	 * 可被子类重写
	 * $url = 请求地址
	 * $param = array() 请求参数
	 * $return = 是否返回请求内容
	 */
	final public function request($url, $param = array(), $return = true) {
		
		return $this->_request($url, $param, $return);
	}

	public function geterrCode() {
		return $this->_errCode;
	}
	
	public function geterrMsg() {
		return $this->_errMsg;
	}

}