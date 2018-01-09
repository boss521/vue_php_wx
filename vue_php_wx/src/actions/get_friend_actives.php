<?php
@include ('connect_sql.php');
$user = $_GET['user'];
$sql = "SELECT c.send_id,c.contents,c.address,c.send_time,u.name,u.headerImg FROM `content` c LEFT JOIN user u ON c.send_id = u.userid WHERE c.send_id in (select friendid from friends where userid = '{$user}' or c.send_id = '{$user}') ORDER BY c.send_time desc";
$myNamesql = "select name,headerImg from user where userid='{$user}'";
$name = $conn -> query($myNamesql);
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$give_data[] = $row;
	}
}
$name = $name -> fetch_row();
echo json_encode(array_merge($name, $give_data));
$conn -> close();
?>
