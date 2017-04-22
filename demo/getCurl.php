<?php
/**
 * demo\getCurl.php
 * get请求demo
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-30
 * @version		$Id$
 */
require '../phplib/_init.php';

$apiUrl = 'http://www.qq.com';
$getCurl = new \phplib\curl\getCurl();
$result = $getCurl->request($apiUrl);

echo $result;
