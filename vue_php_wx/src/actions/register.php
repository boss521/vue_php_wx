<?php
@include ('connect_sql.php');
//获取客户端传来数据
$user = $_POST["user"];
$psw = $_POST["password"];
//查询该用户是否已经存在
$sql = "select userid from user where userid='{$user}'";
$result = $conn -> query($sql);
$row = $result -> fetch_row();
if ($row) {
	echo 1;
} else {
	$insertdb = "INSERT INTO user (userid, password) VALUES ('{$user}','{$psw}')";
	if ($conn -> query($insertdb) === TRUE) {
		echo "新用户注册成功";
	} else {
		echo "Error: " . $sql . "<br>" . $conn -> error;
	}
}
?>
