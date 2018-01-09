<?php
@include ('connect_sql.php');
$cook = $_GET['cook'];
//echo "$cook";
$sql = "select user.name,user.headerImg from friends left join user on friends.friendid=user.userid where friends.userid = '{$cook}'";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$give_data[] = $row;
	}
	echo json_encode($give_data);
} else {
	echo 0;
}

$conn -> close();
?>
