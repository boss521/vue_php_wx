<?php
@include ('connect_sql.php');
$user = $_POST['user'];
$cont = $_POST['contents'];
$address = $_POST['address'];
date_default_timezone_set('PRC');
//获取时间
$date = date('Y/m/d H:i:s');
//插入数据库
$insertContents = "INSERT INTO content (send_id,contents,address,send_time) VALUES ('{$user}','{$cont}','{$address}','{$date}')";
if ($conn -> query($insertContents) === TRUE) {
	echo "插入内容成功啦";
} else {
	echo "插入内容失败啦";
	echo "Error: " . $sql . "<br>" . $conn -> error;
};
?>

