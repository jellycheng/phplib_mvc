<?php
/**
 * phplib\tpl\phpTpl.php
 * 
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-22
 * @version		$Id$
 */
namespace phplib\tpl;

require_once dirname(__FILE__).'/tplAbstract.php';

class phpTpl extends tplAbstract {
	
	protected $template_dir;

    public function __construct() {
		$this->template_dir = $this->normalizeDirectory(APP_ROOT) . 'template/';
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
        $tplFile = substr($tplFile, -4)=='.php' ? $tplFile : $tplFile . '.tpl.php';
		$tplFile = $this->template_dir . $tplFile;
		if(file_exists($tplFile)) {
			extract($this->data, EXTR_OVERWRITE);
			include $tplFile;
		} else if(defined('DEBUG_TPL')){
			exit('模板文件未找到: ' . $tplFile);
		}

    }

    public function fetch($tplFile) {
		//todo
        return '';
    }

	protected function normalizeDirectory($directory) {
		$last = $directory[strlen($directory) - 1];
		if (in_array($last, array('/', '\\'))) {
			$directory[strlen($directory) - 1] = DIRECTORY_SEPARATOR;
			return $directory;
		}
		$directory .= DIRECTORY_SEPARATOR;
		return $directory;
	}

}

