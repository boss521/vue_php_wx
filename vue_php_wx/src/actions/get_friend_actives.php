<?php
@include ('connect_sql.php');
$user=$_GET['user'];
$sql = "SELECT c.send_id,c.contents,c.send_time,u.name,u.header FROM `content` c LEFT JOIN user u ON c.send_id = u.id WHERE c.send_id in (select  friendsid from friend where userid = '{$user}' or c.send_id = '{$user}') ORDER BY c.send_time desc";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$give_data[] = $row;
	}
}
echo json_encode($give_data);
$conn -> close();
?>
