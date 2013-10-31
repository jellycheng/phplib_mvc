<?php
/**
 * demo\phpTpl.php
 * 使用原生的php代码做为模板
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-29
 * @version		$Id$
 */
require '../phplib/_init.php';
header("Content-type:text/html; charset=utf-8");

define('APP_ROOT', __DIR__ . '/');
define('DEBUG_TPL', true);
$phpTpl = phplib\tpl\tplFactory::factory('php');

$phpTpl->assign("title","模板测试-title变量");
$phpTpl->assign("Name","hello jelly!");

$phpTpl->assign("FirstName",array("John","Mary","James","Henry"));
$phpTpl->assign("LastName",array("Doe","Smith","Johnson","Case"));

$phpTpl->display('index');
