<?php
/**
 * phplib\tpl\phplibTpl.php
 * 
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-22
 * @version		$Id$
 */
namespace phplib\tpl;

require_once dirname(__FILE__).'/tplAbstract.php';

class phplibTpl extends tplAbstract {

    public function __construct() {

    }
    
    public function assign($key, $var=null) {
        if (is_array($key) && $var===null) {
            $this->data = array_merge($this->data, $key);
        } elseif (is_object($key) && $var===null) {
            $this->data = array_merge($this->data, (array)$key);
        } else {
            $this->data[$key] = $var;
        }
    }

    public function display($tplFile) {
        //todo
		
    }

    public function fetch($tplFile) {
		//todo
        return '';
    }
    
}

