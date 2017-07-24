<?php
@include ('connect_sql.php');
$cook=$_GET['cook'];
//echo "$cook";
$sql= "select user.name,user.header from friend left join user on friend.friendsid=user.userid where friend.userid = '{$cook}'";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$give_data[] = $row;
	}
}
echo json_encode($give_data);
$conn -> close();
?>
