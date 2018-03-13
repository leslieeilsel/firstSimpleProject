<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Insert title here</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/NG-ThinkPHP/Public/admin/css/main.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="/NG-ThinkPHP/Public/admin/js/jquery.js"></script>
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
	<p><img src="/NG-ThinkPHP/Public/admin/images/logo.png" alt="" width="153px"/><h1>国家地理杂志后台管理系统</h1></p>
</div>
<div class="content clear">
	<div class="L">
		<div class="menu">
			<h3>文章</h3>
			<p><a href="/NG-ThinkPHP/index.php/Admin/Photo/add">新闻添加</a></p>
			<p><a href="">新闻管理</a></p>
			<br />
			<h3>栏目</h3>
			<p><a href="">栏目添加</a></p>
			<p><a href="">栏目管理</a></p>
			<br />
			<h3>管理员</h3>
			<p><a href="">添加管理员</a></p>
			<p><a href="">已有管理员</a></p>
			<br />
			<h3>留言</h3>
			<p><a href="">管理</a></p>
		</div>
	</div>
	<div class="R">
		{__CONTENT__}
	</div>
</div>
</body>
</html>