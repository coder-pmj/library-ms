<?php
session_start();
$counnt=12;
if($_SESSION['user']){
	$counnt++;
}
require('conn.php');
$named = $_POST['title'];
$x = $_POST['sl'];

if ($_POST['role1'] == '2') {
	$lxl = '文史';
} else if ($_POST['role1'] == '1') {
	$lxl = '理工';
}

if ($_POST['role2'] == '2') {
	$as = '逸夫';
} else if ($_POST['role2'] == '1') {
	$as = '主图';
}


//$sql1="INSERT INTO tb_book (name,type,counnt,sl,area) VALUES ('$named', '1','20','$x','4')";
mysqli_query($db,"INSERT INTO tb_book (name,type,counnt,sl,area) VALUES ('$named', '$lxl','$counnt','$x','$as')");
mysqli_close($db);
	



?>