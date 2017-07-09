<?php
@include ('connect_sql.php');
//	获取客户端传来数据
$user = $_POST["user"];
$psw = $_POST["password"];
$name = $_POST["name"];
echo $user . $psw . $name;
if (!empty($name)) {
	$insertdb = "UPDATE user set name='{$name}' WHERE id='{$user}' and password='{$psw}'";
	if ($conn -> query($insertdb) === TRUE) {
		echo "name插入成功";
	} else {
		echo "Error: " . $sql . "<br>" . $conn -> error;
	}
}
?>
