<?php
@include ('connect_sql.php');
//	获取客户端传来数据
$user = $_POST["user"];
$psw = $_POST["password"];
if (!empty($user)) {
	$selectdb = "SELECT * FROM user WHERE id = '{$user}' and password = '{$psw}'";
	$result = $conn -> query($selectdb);
	$ss = $result -> fetch_array();
	if ($result -> num_rows > 0) {
		$arr[] = $ss;
		echo json_encode($arr);
	} else {
		echo 0;
	}
}
?>
