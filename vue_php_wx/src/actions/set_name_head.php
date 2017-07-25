<?php
@include ('connect_sql.php');
//	获取客户端传来数据
$user = $_POST["user"];
$psw = $_POST["password"];

//if (!empty($_COOKIE['user'])) {
//	echo $_COOKIE['user'];
//	$user = $_COOKIE('user');
//	$psw = $_COOKIE('psw');
//}

$name = $_POST["name"];
$head = $_POST["head"];
echo $user . $psw . $name;
if (!empty($name)) {
	$insertdb = "UPDATE user set name='{$name}',header='{$head}' WHERE userid='{$user}' and password='{$psw}'";
	if ($conn -> query($insertdb) === TRUE) {
		echo "name插入成功";
	} else {
		echo "Error: " . $sql . "<br>" . $conn -> error;
	}
}
?>
