<?php ?>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 内容系统 - 文章列表</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="../../layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="../../layuiadmin/style/admin.css" media="all">
</head>
<body>

  
  <div align="center" style="margin: 50px;">

    <?php
	// header('Content-type:text/html;charset=utf-8');

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
    ?>
    <table class="layui-table" style="margin-top: 50px;" lay-filter="test">
    	<option class="layui-table-tips" style="font-size: 30px;">图书信息</option>
    	<!--<colgroup>
      <col width="100">
      <col width="100">
      <col width="100">
      <col width="100">
      <col width="100">
      <col width="100">
      <col width="100">
      <col width="100">
    </colgroup>-->
     <thead>
        <tr>
            <th lay-data="{field:'id'}">ID</th>
            <th lay-data="{field:'bh'}">编 号</th>
            <th lay-data="{field:'sm'}">书 名</th>
            <th lay-data="{field:'sjlx'}">书籍类型</th>
            <th lay-data="{field:'jycs'}">借阅次数</th>
            <th lay-data="{field:'sl'}">数 量</th>
            <th lay-data="{field:'lib'}">所属图书馆</th>
            <th>其他</th>
            <th>其他</th>
        </tr>
       </thread>
        <?php
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
                    <th><a class="layui-btn layui-btn-xs" id="update">编辑</a></th>
                    <th><a class="layui-btn layui-btn-danger layui-btn-xs" id="delete">删除</a></th>


                </tr>
                </tbady>
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
      
      
			
			});
			</script>
</body>



