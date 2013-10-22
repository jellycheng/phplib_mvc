<?php
/**
 * phplib\tpl\tplAbstract.php
 * 
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-22
 * @version		$Id$
 */
namespace phplib\tpl;

abstract class tplAbstract {

    public $data = array();
    
    abstract public function assign($key, $var=null);
    
    abstract public function display($tplFile);
    
    abstract public function fetch($tplFile);
    
}
