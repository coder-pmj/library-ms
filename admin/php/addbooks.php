<?php ?>
<head>
	<meta charset="utf-8">
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
						图书添加
					</div>
					<div class="layui-card-body" pad15>

						<form class="layui-form" lay-filter="formd">
							<div class="layui-form-item">
								<label class="layui-form-label">图书名称</label>
								<div class="layui-input-inline">
									<input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入书名" class="layui-input">
								</div>
							</div>

							<div class="layui-form-item">
								<label class="layui-form-label">书籍类型</label>
								<div class="layui-input-inline">
									<select name="role1" lay-verify="">
										<option value="1">理工</option>
										<option value="2">文史</option>
									</select>
								</div>
							</div>

							<div class="layui-form-item">
								<label class="layui-form-label">所属图书馆</label>
								<div class="layui-input-inline">
									<select name="role2" lay-verify="">
										<option value="1">主图</option>
										<option value="2">逸夫</option>
									</select>
								</div>
							</div>

							<div class="layui-form-item">
								<label class="layui-form-label">放入数量</label>
								<div class="layui-input-inline">
									<input type="text" name="sl" lay-verify="required" autocomplete="off" placeholder="请输入数量" class="layui-input">
								</div>
							</div>

							<div class="layui-form-item">
								<div class="layui-input-block">
									<button class="layui-btn" lay-submit lay-filter="setmyinf">
									确认添加
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

	form.on('submit(setmyinf)', function(data) {
		
		$.ajax({
			url: 'addbooks-change.php',
			data: data.field,
			//dataType: 'text',
			type: 'post',
			success: function(d) {
             

					layer.msg('添加成功', {
						offset: '15px',
						icon: 6,
						time: 1000
					});

				
			}
		});
		return false;
	})

});</script>
</body>