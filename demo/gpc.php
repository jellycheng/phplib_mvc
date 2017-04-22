<?php
/**
 * demo\gpc.php
 * 接收什么响应什么
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-30
 * @version		$Id$
 */
header("Content-type:text/html; charset=utf-8");

echo '<pre>';

echo 'GET参数: ';
print_r($_GET);

echo 'POST参数: ';
print_r($_POST);

echo '$_SERVER参数: ';
print_r($_SERVER);
