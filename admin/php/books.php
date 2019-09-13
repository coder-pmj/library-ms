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
    	<option class="layui-table-tips" style="font-size: 30px;">图书信息(点击 书名,书籍类型,所属馆可编辑)</option>
        
     <thead>
        <tr>
            <th lay-data="{field:'id'}">ID</th>
            <th lay-data="{field:'bh'}">编 号</th>
            <th lay-data="{field:'sm',event:'sm'}">书 名</th>
            <th lay-data="{field:'sjlx',event:'sjlx'}">书籍类型</th>
            <th lay-data="{field:'jycs'}">借阅次数</th>
            <th lay-data="{field:'sl'}">数 量</th>
            <th lay-data="{field:'lib',event:'lib'}">所属图书馆</th>
            <th lay-data="{field:'del'}">操作</th>
            <th lay-data="{field:'see'}">查看</th>
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
	$result = mysqli_query($db, "select id from  tb_book");
	//$RecordCount=$result->fetch_row();
	$RecordCount = mysqli_num_rows($result);
	mysqli_free_result($result);

	$PageCount = ceil($RecordCount / $PageSize);
	//$result = $db->query("select * from tb_book");
	$result = mysqli_query($db, "select * from tb_book");
        
        $s=1;
        mysqli_data_seek($result, ($Page - 1) * $PageSize);
        for ($i = 0; $i < $PageSize; $i++) {
            $row = mysqli_fetch_assoc($result);
			//$row=$result->fetch_assoc();
            if ($row) {
                ?>
                <tbody>
                <tr>
                	  <td><?php echo $s++; ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['type'] ?></td>
                    <td><?php echo $row['counnt'] ?></td>
                    <td><?php echo $row['sl'] ?></td>
                    <td><?php echo $row['area'] ?></td>
                    <td><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a></td>
                    <td><a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="see">查看</a></td>
                    
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

		if(obj.event === 'see') {
			layer.open({
				type: 1,
				title: '    图书信息' //显示标题栏
					,
				closeBtn: false,
				area: '300px;',
				shade: 0.8,
				id: 'LAY_layuipro' //设定一个id，防止重复弹出
					,
				btn: '关闭',
				btnAlign: 'c',
				moveType: 1 //拖拽模式，0或者1
					,
				content: "<" + '编号：' + code + "><" + '书名：' + data.sm + "><" + '书籍类型：' + data.sjlx + "><" + '借阅次数：' + data.jycs + "><" + '数量：' + data.sl + "><" + '所属馆：' + data.lib

			});

		} else if(obj.event === 'del') {
			layer.confirm('您确定删除么？', function(index) {
				obj.del();
				layer.close(index);
				$.ajax({
					type: "post",
					url: "bookchange.php",
					data: {
						'valuedel': code
					}, //将图书编号传至后台处理
					//async:true
					success: function(d) {
						//if(d=='1'){
						layer.msg('执行成功');
						//}
					}
				});

			});
		} else

		if(obj.event === 'lib') {
			layer.prompt({
				formType: 3,
				title: '编辑ID为 [' + data.id + '] 的所属馆',
				value: data.lib
			}, function(value, index) {
				layer.close(index);
				//console.log(value);
				//这里一般是发送修改的Ajax请求
				$.ajax({
					type: "post",
					url: "bookchange.php",
					data: {
						'valuelib': value,
						'valueCode': code
					},
					//async:true
					success: function(d) {
						//if(d =='1'){
						layer.msg('保存成功');
						//}
					}
				});
				//同步更新表格和缓存对应的值
				obj.update({
					lib: value
				});
			});
		} else
			///////////////////////////////////////////////		
			if(obj.event === 'sm') {
				layer.prompt({
					formType: 3,
					title: '编辑ID为 [' + data.id + '] 的书名',
					value: data.sm
				}, function(value, index) {
					layer.close(index);

					//这里一般是发送修改的Ajax请求
					$.ajax({
						type: "post",
						url: "bookchange.php",
						data: {
							'valuesm': value,
							'valueCode': code
						},
						//async:true
						success: function(d) {
							//if(d=='1'){
							layer.msg('保存成功');
							//}
						}
					});
					//同步更新表格和缓存对应的值
					obj.update({
						sm: value
					});
				});
			}
		else
			//////////////////////////////////////////////////
			if(obj.event === 'sjlx') {
				layer.prompt({
					formType: 3,
					title: '编辑ID为 [' + data.id + '] 的书籍类型',
					value: data.sjlx
				}, function(value, index) {
					layer.close(index);

					//这里一般是发送修改的Ajax请求
					$.ajax({
						type: "post",
						url: "bookchange.php",
						data: {
							'valuesjlx': value,
							'valueCode': code
						},
						//async:true
						success: function(d) {
							//if(d=='1'){
							layer.msg('保存成功');
							//}
						}
					});
					//同步更新表格和缓存对应的值
					obj.update({
						sjlx: value
					});
				});
			}
		//////////////////////////////////////////////////				
	});

});</script>
</body>



