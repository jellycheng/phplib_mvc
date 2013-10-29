<?php
/**
 * demo\smarty.php
 * 
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-29
 * @version		$Id$
 */
require '../phplib/_init.php';

define('APP_ROOT', __DIR__ . '/');
$smarty = phplib\tpl\tplFactory::factory('smarty');

$smarty->assign("title","模板测试");
$smarty->assign("Name","Fred Irving Johnathan Bradley Peppergill");

$smarty->assign("FirstName",array("John","Mary","James","Henry"));
$smarty->assign("LastName",array("Doe","Smith","Johnson","Case"));

$smarty->display('index');
