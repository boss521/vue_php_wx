<?php
@include ('connect_sql.php');
$sql = "SELECT c.send_id,c.contents,c.send_time,u.name,u.header FROM `Content` c LEFT JOIN user u ON c.send_id = u.id ORDER BY c.send_time desc";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$give_data[] = $row;
	}
}
echo json_encode($give_data);
$conn -> close();
?>

