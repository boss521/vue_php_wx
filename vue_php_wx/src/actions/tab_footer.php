<?php
@include ('connect_sql.php');
//	获取客户端传来数据
$inde = $_POST["inde"];
if (!empty($inde)) {
	$insertdb = "UPDATE content set status='{$inde}'";
	$switch = $conn -> query($insertdb);
	echo $inde;
}
?>
