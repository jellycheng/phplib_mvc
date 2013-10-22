<?php
/**
 * phplib\tpl\tplFactory.php
 * 模板类 - 工厂
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-22
 * @version		$Id$
 */
namespace phplib\tpl;

class tplFactory {
	
	private function __construct() {}

    /**
     * 模板工厂
     * 
     * @param string $tplType
     * @param array $config
     * @return object
     */
    static public function factory($tplType = 'phplib', $config = array()) {
        switch ($tplType) {
            case 'php':
                require_once dirname(__FILE__).'/phpTpl.php';
                return new \phplib\tpl\phpTpl($config);
                break;
            case 'smarty':
                require_once dirname(__FILE__).'/smartyTpl.php';
                return new \phplib\tpl\smartyTpl($config);
                break;
			case 'phplib':
                require_once dirname(__FILE__).'/phplibTpl.php';
                return new \phplib\tpl\phplibTpl($config);
                break;
            default:
                throw new exception('not found '.$tplType.' template engine');
                break;
        }
    }


}
