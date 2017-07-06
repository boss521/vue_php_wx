<?php
@include ('connect_sql.php');
$sql = "select * from user";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$give_data[] = $row;
	}
}
echo json_encode($give_data);
$conn -> close();
?>
