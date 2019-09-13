<?php
session_start();
$a = $_SESSION['user'];
$old = $_POST['oldPassword'];
$pwd = $_POST['password'];
$repwd = $_POST['repassword'];
require ('conn.php');
$sql = "select * from tb_admin where (uname='$a')";
$result = $db -> query($sql);
$row = $result -> fetch_row();
if ($row['2'] == $old) {
	$sql = "update tb_admin set password='$pwd' where (uname='$a')";
	mysqli_query($db, $sql);
	mysqli_close($db);
	echo "1";
}else{
	echo '0';
}
?>