<?php
/**
 * webapp/appcommon/_init.php
 * 各子站点通用业务 初始化
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-26
 * @version		$Id$
 */
defined('APPCOMMON_PATH') or define('APPCOMMON_PATH', __DIR__ . '/');
define('APPCOMMON_COMMON_PATH', APPCOMMON_PATH . 'common/');
define('APPCOMMON_CONFIG_PATH', APPCOMMON_PATH . 'config/');
define('APPCOMMON_MODEL_PATH', APPCOMMON_PATH . 'model/');
define('APPCOMMON_THIRD_PATH', APPCOMMON_PATH . 'third/');
include APPCOMMON_COMMON_PATH . 'public.fun.php';
