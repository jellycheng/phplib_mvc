<?php
/**
 * 配置app初始化加载的必须的全局文件列表，不要随意更改哦
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-26
 * @version		$Id$
 */
return array(
            \phplib\phplib::getPhplibPath() . 'util/util.php',
            APPCOMMON_PATH . '_init.php',
            APP_COMMON_PATH . 'public.fun.php',
);