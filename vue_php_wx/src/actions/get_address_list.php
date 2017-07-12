<?php
@include ('connect_sql.php');
//$sql = "select * from user"; 
$sql= "select user.name,user.header from friend left join user on friend.friendsid=user.id";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$give_data[] = $row;
	}
}
echo json_encode($give_data);
$conn -> close();
?>
