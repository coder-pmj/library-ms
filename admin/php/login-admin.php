<?php
session_start();
//获取post的数据
$account = $_POST['account'];
$pwd = $_POST['password'];
//$remember=$_POST['remember'];
//连接数据库
require('conn.php');
$sql = "select *  from  tb_admin  where uname='$account'  or teacher_id='$account' or number='$account'";
 
$result = $db->query($sql);
$row = $result->fetch_row();
 
 
if(!empty($row)&&$pwd == $row[2]){
    $_SESSION['user'] = $row[1];
    echo '1';
}else{
    echo '0';
}


?>