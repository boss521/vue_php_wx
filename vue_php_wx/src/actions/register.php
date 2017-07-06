<?php
@include ('connect_sql.php');
//	获取客户端传来数据
$user = $_POST["user"];
$psw = $_POST["password"];
echo "帐号为" . $user . "<br>" . "密码为" . $psw . "<br>";

$insertdb = "INSERT INTO user (id, password) VALUES ('{$user}','{$psw}')";

if ($conn -> query($insertdb) === TRUE) {
	echo "新记录插入成功";
} else {
		echo "Error: " . $sql . "<br>" . $conn -> error;
}
?>`