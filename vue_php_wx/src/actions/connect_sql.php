<?php
//	创建连接
@$conn = new mysqli('localhost', 'root', '0404', 'weixin');
//	检测链接
if ($conn -> connect_error) {
	die('连接失败<br>');
} else {
	echo "连接成功<br>";
}
?>