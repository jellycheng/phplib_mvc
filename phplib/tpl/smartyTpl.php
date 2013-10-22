<?php
/**
 * phplib\tpl\smartyTpl.php
 * 
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-22
 * @version		$Id$
 */
//加载smarty todo

class smartyTpl extends \SmartyBC {
    
    public function __construct($config=array()) {
        parent::__construct();
        $this->template_dir = array(APP_ROOT.'/template/');
        $this->compile_dir  = APP_ROOT.'/template_c/';
        $this->left_delimiter  = '{';
        $this->right_delimiter = '}';
        if (is_array($config)) {
            foreach ($config as $k=>$v) {
                $this->{$k} = $v;
            }
        }
        //todo
    }
    
    public function assign($tplVar, $value = null, $nocache = false) {
        if (is_object($tplVar)) $tplVar = (array)$tplVar;
        parent::assign($tplVar, $value, $nocache);
    }
    
    public function display($tplFile) {
        $tplFile = substr($tplFile, -4)=='.php' ? $tplFile : $tplFile . '.tpl.php';
        return parent::fetch($tplFile);
    }
    
    public function fetch($tplFile) {
        $tplFile = substr($tplFile, -4)=='.php' ? $tplFile : $tplFile . '.tpl.php';
        return parent::fetch($tplFile);
    }
    
}
