<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,'application/json;charset=utf-8',Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');
//解决会请求两次的问题
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'OPTIONS') {
	exit ;
}
//	创建连接
$localhost = 'localhost';
$root = 'root';
$password = '';
$mysql = 'sunyuan';
@$conn = new mysqli($localhost, $root, $password, $mysql);
$conn->query("set character set 'utf8'");
$conn->query("set names 'utf8'");
//	检测链接
if ($conn -> connect_error) {
	die('连接数据库失败！');
}
?>
