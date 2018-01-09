<?php
@include ('connect_sql.php');
//	获取客户端传来数据
$user = $_POST["user"];
$psw = $_POST["password"];
$name = $_POST["name"];
$headerImg = $_POST["headerImg"];
if (!empty($name)) {
	$insertdb = "UPDATE user set name='{$name}',headerImg='{$headerImg}' WHERE userid='{$user}' and password='{$psw}'";
	if ($conn -> query($insertdb) === TRUE) {
		echo "修改昵称成功";
	} else {
		echo "Error: " . $sql . "<br>" . $conn -> error;
	}
}
?>
