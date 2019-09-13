<?php
session_start();
$a = $_SESSION['user'];

$tel = $_POST['cellphone'];
$em = $_POST['email'];
$remarks = $_POST['remarks'];
require('conn.php');

$sql="update tb_admin set number='$tel',email='$em',other='$remarks' where (uname='$a')";
mysqli_query($db, $sql);
mysqli_close($db);
echo "1";

?>