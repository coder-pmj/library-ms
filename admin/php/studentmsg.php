<?php ?>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="../../layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="../../layuiadmin/style/admin.css" media="all">
</head>
<body>

  
  <div align="center" style="margin: 50px;">

    <table class="layui-table" style="margin-top: 50px;" lay-filter="test" lay-data="{}">
    	<option class="layui-table-tips" style="font-size: 30px;">学生信息</option>
        
     <thead>
        <tr>
            <th lay-data="{field:'id'}">ID</th>
            <th lay-data="{field:'name'}">姓名</th>
            <th lay-data="{field:'code'}">学号</th>
            <th lay-data="{field:'em'}">邮箱</th>
            <th lay-data="{field:'nm'}">手机号</th>
            <th lay-data="{field:'yj'}">已借</th>   
            <th lay-data="{field:'yh'}">已还</th>    
            <th lay-data="{field:'edit'}">操作</th>
 
        </tr>
       </thread>
        <?php
        
        require ('conn.php');
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$Page = $_GET['page'];
	} else {
		$Page = 1;
	}
	$PageSize = 6;

	//$result = $db->query();
	$result = mysqli_query($db, "select id from  tb_user");
	//$RecordCount=$result->fetch_row();
	$RecordCount = mysqli_num_rows($result);
	mysqli_free_result($result);

	$PageCount = ceil($RecordCount / $PageSize);
	//$result = $db->query("select * from tb_book");
	$result = mysqli_query($db, "select * from tb_user");
        
        $s=1;
        mysqli_data_seek($result, ($Page - 1) * $PageSize);
        for ($i = 0; $i < $PageSize; $i++) {
            $row = mysqli_fetch_assoc($result);
			//$row=$result->fetch_assoc();
            if ($row) {
                ?>
                <tbody>
                <tr>
                	  
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['uname'] ?></td>
                    <td><?php echo $row['student_id'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['number'] ?></td>
                    <td><?php echo $row['yj'] ?></td>
                    <td><?php echo $row['yh'] ?></td>
                    <td><a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="edit">催还</a></td>
                    
                </tr>
                </tbody>
            <?php }
					}
					mysqli_free_result($result);
 ?>
    </table>
    <p><?php
	if ($Page == 1)
		echo "<div class='layui-btn-group'>
            <button class='layui-btn  layui-disabled'>第一页</button>
		<button class='layui-btn  layui-disabled'><i class='layui-icon'></i></button>";
	else
		echo " <div class='layui-btn-group'><button class='layui-btn'><a href='?page=1'>第一页</a></button>
         <button class='layui-btn'><a href='?page=" . ($Page - 1) . "'><i class='layui-icon'></i></a></button> ";

	if ($Page == $PageCount)
		echo " <button class='layui-btn  layui-disabled'><i class='layui-icon'></i></button>
		<button class='layui-btn  layui-disabled'>末页</button>";
	else
		echo " <button class='layui-btn'><a href='?page=" . ($Page + 1) . "'><i class='layui-icon'></i></a></button>
 <button class='layui-btn'><a href='?page=" . $PageCount . "'>末页</a></button> ";
	echo " <button class='layui-btn layui-btn-normal layui-disabled'>&nbsp; 共" . $RecordCount . "条记录&nbsp;</button>";
	echo " <button class='layui-btn layui-btn-normal layui-disabled'>$Page / $PageCount 页</button> </div>";
        ?></p>

</div>

  <script src="../../layuiadmin/layui/layui.js"></script>  
  
  <script>layui.config({
	base: '../../layuiadmin/' //静态资源所在路径
}).extend({
	index: 'lib/index' //主入口模块
}).use(['table', 'jquery'], function() {
	var table = layui.table,
		$ = layui.$;

	table.on('tool(test)', function(obj) {
		var data = obj.data;
		var code = data.bh;

		if(obj.event === 'edit') {
			layer.confirm('确定发送提示短信么？', function(index) {
				btn: ['确定', '取消'],
				layer.close(index);

				layer.load(2);
				setTimeout(function() {
					layer.closeAll('loading');
				}, 2000);
			});
		}

	})

});</script>
</body>



