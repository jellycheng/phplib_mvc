<?php
/**
 * phplib\tpl\smartyTpl.php
 * 
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-22
 * @version		$Id$
 */
namespace phplib\tpl;

//加载smarty
require_once \phplib\phplib::getPhplibPath() . 'third/Smarty/SmartyBC.class.php';

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
    
    public function display($tplFile = null, $cache_id = null, $compile_id = null, $parent = null) {
        $tplFile = substr($tplFile, -4)=='.tpl' ? $tplFile : $tplFile . '.tpl';
        return parent::display($tplFile, $cache_id, $compile_id, $parent);
    }
    
    public function fetch($tplFile = null, $cache_id = null, $compile_id = null, $parent = null, $display = false, $merge_tpl_vars = true, $no_output_filter = false) {
        $tplFile = substr($tplFile, -4)=='.tpl' ? $tplFile : $tplFile . '.tpl';
        return parent::fetch($tplFile, $cache_id, $compile_id, $parent, $display, $merge_tpl_vars, $no_output_filter);
    }
    
}
