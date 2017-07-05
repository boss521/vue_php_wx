<?php
header('Access-Control-Allow-Origin:*');
//	创建连接
@$conn = new mysqli('localhost', 'root', '0404', 'weixin');
//	检测链接
if ($conn -> connect_error) {
	die('连接数据库失败');
}
?>