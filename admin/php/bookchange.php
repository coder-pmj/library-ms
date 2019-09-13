<?php

$code=$_POST['valueCode'];//所选行

require('conn.php');

if($_POST['valuedel']){
    $del=$_POST['valuedel'];//要删除的那一行
    $sql="delete from tb_book where id='$del'";
    mysqli_query($db, $sql);
	mysqli_close($db);
    //echo "1";
}else
if($_POST['valuelib']){
	$lib=$_POST['valuelib'];//修改的所属馆
	$sql="update tb_book set area='$lib' where (id='$code')";
	mysqli_query($db, $sql);
	mysqli_close($db);
    //echo "1";
}else
if($_POST['valuesm']){
	$sm=$_POST['valuesm'];//修改的书名
	$sql="update tb_book set name='$sm' where (id='$code')";
	mysqli_query($db, $sql);
	mysqli_close($db);
    //echo "1";
}
else
if($_POST['valuesjlx']){
	$sjlx=$_POST['valuesjlx'];//修改的书籍类型
	$sql="update tb_book set type='$sjlx' where (id='$code')";
	mysqli_query($db, $sql);
	mysqli_close($db);
    //echo "1";
}

?>