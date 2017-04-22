<?php
/**
 * demo\postCurl.php
 * post请求demo
 *
 * @copyright	(c) 2013-2099 All Rights Reserved
 * @author		jellycheng <42282367@qq.com>
 * @created		2013-10-30
 * @version		$Id$
 */
require '../phplib/_init.php';
$_cur_url = $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
$apiUrl = "http://{$_cur_url}/gpc.php?a=1&b=2";

$postCurl = new \phplib\curl\postCurl();
$result = $postCurl->request($apiUrl, array('data'=>array(
													'参数1'=>'值',
													'参数2'=>'值',
													)), true);
header("Content-type:text/html; charset=utf-8");
echo $result;
