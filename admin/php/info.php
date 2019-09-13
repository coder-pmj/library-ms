<?php
session_start();
$k = $_SESSION['user'];
require ('conn.php');
$sql = "select *  from  tb_admin where uname='$k'";
$result = $db -> query($sql);
$row = $result -> fetch_row();
?>
<head>
	<meta charset="utf-8">
	<title>设置我的资料</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="../../layuiadmin/layui/css/layui.css" media="all">
	<link rel="stylesheet" href="../../layuiadmin/style/admin.css" media="all">
</head>
<body>

	<div class="layui-fluid">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md12">
				<div class="layui-card">
					<div class="layui-card-header">
						设置我的资料
					</div>
					<div class="layui-card-body" pad15>

						<form class="layui-form" lay-filter="formd">
							<div class="layui-form-item">
								<label class="layui-form-label">我的角色</label>
								<div class="layui-input-inline">
									<select name="role" lay-verify="">
										<option value="1" selected>超级管理员</option>
										<option value="2" disabled>普通用户</option>
									</select>
								</div>
								<div class="layui-form-mid layui-word-aux">
									当前角色不可更改为其它角色
								</div>
							</div>

							<div class="layui-form-item">
								<label class="layui-form-label">用户名</label>
								<div class="layui-input-inline">
									<input type="text" name="username" value="<?php echo $row['1']; ?>" readonly class="layui-input">
								</div>
								<div class="layui-form-mid layui-word-aux">
									不可修改。一般用于后台登入名
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">工号</label>
								<div class="layui-input-inline">
									<input type="text" name="num" disabled value="<?php echo $row['3']; ?>" autocomplete="off" placeholder="请输入昵称" class="layui-input">
								</div>
								<div class="layui-form-mid layui-word-aux">
									不可修改。一般用于后台登入名
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">性别</label>
								<div class="layui-input-block">
									<?php
									if ($row['5'] == '男') {
										echo '<div class="layui-input-inline">
									<input type="radio" name="sex" value="男" title="男" checked>
									<input type="radio" name="sex" value="女" title="女" disabled>
									</div>
									<div class="layui-form-mid layui-word-aux">
									性别不可更改
									</div>';
									}

									if ($row['5'] == '女') {
										echo '<div class="layui-input-inline">
									<input type="radio" name="sex" value="男" title="男" disabled>
									<input type="radio" name="sex" value="女" title="女" checked>
									</div>
									<div class="layui-form-mid layui-word-aux">
									性别不可更改
									</div>';
									}
									?>
								</div>

							</div>

							<div class="layui-form-item">
								<label class="layui-form-label">手机</label>
								<div class="layui-input-inline">
									<input type="text" name="cellphone" value="<?php echo $row['4']; ?>" lay-verify="phone" autocomplete="off" class="layui-input">
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">邮箱</label>
								<div class="layui-input-inline">
									<input type="text" name="email" value="<?php echo $row['6']; ?>" lay-verify="email" autocomplete="off" class="layui-input">
								</div>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">备注</label>
								<div class="layui-input-block">
									<textarea name="remarks" placeholder="请输入内容" class="layui-textarea"><?php echo $row['7']; ?></textarea>
								</div>
							</div>
							<div class="layui-form-item">
								<div class="layui-input-block">
									<button class="layui-btn" lay-submit lay-filter="setmyinfo">
									确认修改
									</button>
									<button type="reset" class="layui-btn layui-btn-primary">
									重新填写
									</button>
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="../../layuiadmin/layui/layui.js"></script>
	<script>layui.config({
	base: '../../layuiadmin/' //静态资源所在路径
}).extend({
	index: 'lib/index' //主入口模块
}).use(['index', 'set', 'form', 'jquery'], function() {
	var layer = layui.layer,
		form = layui.form,
		$ = layui.$;

	form.on('submit(setmyinfo)', function(data) {
		//console.log(data.field);
		$.ajax({
			url: 'infochange.php',
			data: data.field,
			dataType: 'text',
			type: 'post',
			success: function(s) {

				if(s== '1') {

					layer.msg('修改成功', {
						offset: '15px',
						icon: 6,
						time: 1000
					});

				}
			}
		});
		return false;
	})

});</script>
</body>