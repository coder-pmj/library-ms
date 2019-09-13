<?php ?>
<head>
	<meta charset="utf-8">
	<title>设置我的密码</title>
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
					<form class="layui-form" lay-filter="forms">
						<div class="layui-card-header">
							修改密码
						</div>
						<div class="layui-card-body" pad15>

							<div class="layui-form-item">
								<label class="layui-form-label">当前密码</label>
								<div class="layui-input-inline">
									<input type="password" name="oldPassword" lay-verify="required" lay-verType="tips" class="layui-input">
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">新密码</label>
								<div class="layui-input-inline">
									<input type="password" name="password" lay-verify="pass" lay-verType="tips" autocomplete="off" id="LAY_password" class="layui-input">
								</div>
								<div class="layui-form-mid layui-word-aux">
									6到16个字符
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">确认新密码</label>
								<div class="layui-input-inline">
									<input type="password" name="repassword" lay-verify="repass" lay-verType="tips" autocomplete="off" class="layui-input">
								</div>
							</div>
							<div class="layui-form-item">
								<div class="layui-input-block">
									<button class="layui-btn" lay-submit lay-filter="setmypass">
									确认修改
									</button>
								</div>
							</div>

						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<script src="../../layuiadmin/layui/layui.js"></script>
	<script>layui.config({
	base: '../../layuiadmin/' //静态资源所在路径
}).extend({
	index: 'lib/index' //主入口模块
}).use(['index', 'set', 'form', 'layer','jquery'], function() {
	var layer = layui.layer,
	$=layui.$,
		form = layui.form;

	form.on('submit(setmypass)', function(data) {
		console.log(data.field);
		$.ajax({
			url: 'passchange.php',
			data: data.field,
			dataType: 'text',
			type: 'post',
			success: function(data) {
				if(data == '1') {

					layer.msg('修改成功', {
						offset: '15px',
						icon: 6,
						time: 1000
					});

				} else {
					layer.msg('原密码错误', {
						offset: '15px',
						icon: 5,
						time: 1000
					});
				}
			}
		});
		return false;
	})
});</script>
</body>