<?php
@include ('connect_sql.php');
$user = $_POST['user'];
$myNamesql = "select userid,name,header from user where userid='{$user}'";
$name = $conn -> query($myNamesql);
$name = $name -> fetch_array();
echo json_encode($name);
?>