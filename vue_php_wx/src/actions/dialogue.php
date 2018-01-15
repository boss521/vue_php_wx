<?php
@include('connect_sql.php');
$user=$_GET['user'];
$sql="select headerImg from user where userid='{$user}'";
$result=$conn->query($sql);
$row = $result->type;
echo $row ;
print_r($result);
?>