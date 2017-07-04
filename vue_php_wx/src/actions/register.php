<?php

//	获取客户端传来数据
$user = $_POST["user"];
$psw = $_POST["password"];
//echo "帐号为" . $user . "<br>" . "密码为" . $psw . "<br>";
//	连接数据库的操作
$servername = "localhost";
$username = 'root';
$password = "0404";
$sunyuan = "sunyuan";
//	创建连接
$conn = new mysqli($servername, $username, $password, $sunyuan);
//	检测链接
if ($conn -> connect_error) {
	die('连接失败<br>');
} else {
	echo "连接成功<br>";
}
//开始创建数据库
$sqlsunyuan = "CREATE DATABASE sunyuan";
if (mysqli_query($conn, $sqlsunyuan)) {
	echo "创建数据库sunyuan成功<br>";
} else {
//	echo "创建数据库sunyuan失败" . $conn -> error . "<br>";
}
//开始创建表
$sql = "CREATE TABLE MyUsers (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		username VARCHAR(30) NOT NULL,
		password VARCHAR(30) NOT NULL
	)";

if ($conn -> query($sql) === TRUE) {
//	echo "Table MyUsers created successfully";
} else {
//	echo "创建数据表错误: " . $conn -> error;
}
$insertdb = "INSERT INTO MyUsers (id, username, password)
	VALUES (null, '{$user}','{$psw}')";

if ($conn -> query($insertdb) === TRUE) {
	echo "新记录插入成功";
} else {
//	echo "Error: " . $sql . "<br>" . $conn -> error;
}
?>