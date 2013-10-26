<?php
/**
 * phplib\core\control.php
 * 控制器 - 基础
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-19
 * @version		$Id$
 */
namespace phplib\core;

class control extends base {
	
	protected $controlName = '';


	//视图对象
	protected $v = '';
	
	public function __construct() {
		$_config = \phplib\phplib::getEnv('config');
		$encoding = isset($_config['encoding']) ? $_config['encoding'] : 'utf-8';
		header("Content-type: text/html; charset={$encoding}");
        if(method_exists($this,'_init')) {
            $this->_init();
		}
    }

	protected function getControlName() {
        if(empty($this->controlName)) {
            $this->controlName = get_called_class();
        }
        return $this->controlName;
    }

	/**
     * 模板变量赋值
     * @param mixed $name 要显示的模板变量
     * @param mixed $value 变量的值
     * @return void
     */
	protected function assign($name,$value='') {
        $this->v->assign($name,$value);
    }

	/**
     *
     * 跳转程序
     * @param $url  需要前往的地址
     * @param $delayTime   延迟时间
     */
    public function jump($url, $delayTime = 0){
		echo "<html><head><meta http-equiv='refresh' content='{$delayTime};url={$url}'></head><body></body></html>";
		exit;
    }

	public function __call($name, $args) {
		 if( 0 === strcasecmp($name, \phplib\phplib::getEnv('act') . 'Act')) {
            if(method_exists($this, '_empty')) {
                $this->_empty($name, $args);
            } else if(function_exists('__act_404')) {
                \__act_404();
            } else {
                $str = "控制器类(".get_class($this).")方法 {$name} 未定义！<br />";
				echo $str;
                exit;
            }
        }else{
            switch(strtolower($name)) {
                // 判断哪种提交方式  $this->isPost();
                case 'ispost':
                case 'isget':
                case 'ishead':
                case 'isdelete':
                case 'isput':
                    return strtolower($_SERVER['REQUEST_METHOD']) == strtolower(substr($name, 2));
                // 获取变量 支持过滤和默认值 调用方式 $this->_post($key,$filterFun,$default);
                case '_get': $input =& $_GET;break;
                case '_post':$input =& $_POST;break;
                case '_put': parse_str(file_get_contents('php://input'), $input);break;
                case '_request': $input =& $_REQUEST;break;
                case '_session': $input =& $_SESSION;break;
                case '_cookie':  $input =& $_COOKIE;break;
                case '_server':  $input =& $_SERVER;break;
                case '_globals':  $input =& $GLOBALS;break;
                default:
                    throw exception(__CLASS__ . ":{$name} 不存在！");
            }
            if(isset($input[$args[0]])) {
                $data = $input[$args[0]];
				if(!empty($args[1])) {
					$fun  = $args[1];
					$data = $fun($data);
				}
            } else {
                $data = isset($args[2])?$args[2]:NULL;
            }

            return $data;
        }

	}

}
