<?php
@include ('connect_sql.php');
$sql = "SELECT * FROM comment";
$result = $conn -> query($sql);
$row = $result -> fetch_array();
echo $row;
?>

