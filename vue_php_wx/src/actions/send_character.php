<?php
@include ('connect_sql.php');
@$cont = $_GET['contents'];
//echo $cont;
date_default_timezone_set('PRC'); 
$date=date('Y/m/d H:i:s');
$insertContents = "INSERT INTO Content (send_id,contents,send_time) VALUES ('sunyuan','{$cont}','{$date}')";
if ($conn -> query($insertContents) === TRUE) {
	echo "插入内容成功啦";
} else {
	echo "插入内容失败啦";
//	echo "Error: " . $sql . "<br>" . $conn -> error;
};
?>

