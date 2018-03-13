<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>国家地理</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/Holland/NG-ThinkPHP/Public/admin/css/main.css" type="text/css" rel="stylesheet"/>
<link href="/Holland/NG-ThinkPHP/Public/admin/css/viewer.min.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/Holland/NG-ThinkPHP/Public/admin/js/kindeditor/themes/default/default.css" />
<script type="text/javascript" src="/Holland/NG-ThinkPHP/Public/admin/js/jquery.js"></script>
<script charset="utf-8" src="/Holland/NG-ThinkPHP/Public/admin/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/Holland/NG-ThinkPHP/Public/admin/js/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/Holland/NG-ThinkPHP/Public/admin/js/viewer.min.js"></script>
<script charset="utf-8" src="/Holland/NG-ThinkPHP/Public/admin/js/laydate.js"></script>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});				
});
</script>
<script type="text/javascript">
function setHeight(){
	//alert(1);
	WH=$(window).height();
	$(".L").css("height",WH-90+"px");
	$(".main").css("height",WH-90+"px");
}
$(function(){
	setHeight();
	$(window).resize(setHeight);
});

</script>
</head>
<body>
<div class="head">
	<img src="/Holland/NG-ThinkPHP/Public/admin/images/logo.png" alt="" width="153px"/>
	<h1>国家地理杂志后台管理系统</h1>
</div>
<div class="content clear">
	<div class="L">
		<div class="menu">
			<h3>文章</h3>
			<p><a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/add">发布图文</a></p>
			<p><a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/oper">图文列表</a></p>
			<br />
			<h3>栏目</h3>
			<p><a href="/Holland/NG-ThinkPHP/index.php/Admin/Category/add">栏目添加</a></p>
			<p><a href="/Holland/NG-ThinkPHP/index.php/Admin/Category/oper">栏目管理</a></p>
			<br />
			<h3>管理员</h3>
			<p><a href="/Holland/NG-ThinkPHP/index.php/Admin/Admin/add">添加管理员</a></p>
			<p><a href="/Holland/NG-ThinkPHP/index.php/Admin/Admin/oper">已有管理员</a></p>
			<br />
			<h3>留言</h3>
			<p><a href="">管理</a></p>
		</div>
	</div>
	<div class="R">
		<div class="main">
		<div class="fixed">
	<div class="nav"><h1>搜索结果</h1></div>
	<div class="tab">
		<table width="100%" class="table">
			<tr>
				<th>Id</th>
				<th>标题</th>
				<th>栏目</th>
				<th>点击图片以预览</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
				<th><?php echo ($v["id"]); ?></th>
				<td><?php echo ($v["title"]); ?></td>
				<th><?php echo ($v["cname"]); ?></th>
				<th>
				 <ul id="<?php echo ($v["id"]); ?>">
					<li style="list-style-type:none;">
						<img data-original="/Holland/NG-ThinkPHP/Public/upload/<?php echo ($v["imagename"]); ?>" src="/Holland/NG-ThinkPHP/Public/upload/<?php echo ($v["imagename"]); ?>" alt="" width="60px" height="40px"/>
					</li>
				 </ul>
				</th>
				<th><?php echo ($v["pubtime"]); ?></th>
				<th><a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/update/id/<?php echo ($v["id"]); ?>"><img src="/Holland/NG-ThinkPHP/Public/admin/images/rewrite.png" alt="修改" title="修改" width="23px"/></a>&nbsp;&nbsp;
					<a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/del/id/<?php echo ($v["id"]); ?>"><img src="/Holland/NG-ThinkPHP/Public/admin/images/delete.png" alt="删除" title="删除" width="23px"/></a>&nbsp;&nbsp;
					<a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/recommend/id/<?php echo ($v["id"]); ?>"><img src="/Holland/NG-ThinkPHP/Public/admin/images/up.png" alt="推荐" title="推荐" width="23px"/></a>
				</th>
			</tr>
			<script type="text/javascript">
				var viewer = new Viewer(document.getElementById('<?php echo ($v["id"]); ?>'), {
					url: 'data-original'
				});
			</script><?php endforeach; endif; ?>
		
		</table>
	</div>
</div>
		</div>
	</div>
</div>
</body>
</html>