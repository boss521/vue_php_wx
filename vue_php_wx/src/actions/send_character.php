<?php
@include ('connect_sql.php');
$cont = $_GET['contents'];
$user = $_GET['user'];
date_default_timezone_set('PRC');
//获取时间
$date = date('Y/m/d H:i:s');
//插入数据库
$insertContents = "INSERT INTO Content (send_id,contents,send_time) VALUES ('{$user}','{$cont}','{$date}')";
if ($conn -> query($insertContents) === TRUE) {
	echo "插入内容成功啦";
} else {
	echo "插入内容失败啦";
	echo "Error: " . $sql . "<br>" . $conn -> error;
};
?>

