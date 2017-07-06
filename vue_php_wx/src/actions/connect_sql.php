<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');
//	创建连接
$localhost = 'localhost';
$root = 'root';
$password = '0404';
$mysql = 'weixin';
@$conn = new mysqli($localhost, $root, $password, $mysql);
//	检测链接
if ($conn -> connect_error) {
	die('连接数据库失败');
}
?>