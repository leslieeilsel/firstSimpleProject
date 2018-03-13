<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>国家地理</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="/NG-ThinkPHP/favicon.ico"/>
<link href="/NG-ThinkPHP/Public/admin/css/main.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/NG-ThinkPHP/Public/admin/css/style.css" />
<link href="/NG-ThinkPHP/Public/admin/css/viewer.min.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/NG-ThinkPHP/Public/admin/js/kindeditor/themes/simple/simple.css" />
<script charset="utf-8" src="/NG-ThinkPHP/Public/admin/js/jquery.js"></script>
<script charset="utf-8" src="/NG-ThinkPHP/Public/admin/js/viewer.min.js"></script>

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
	<a href=""><img src="/NG-ThinkPHP/Public/admin/images/logo.png" alt="进入前台页面" title="进入前台页面"/></a>
</div>
<div class="content clear">
	<div class="L">
		<div class="sideMenu">
			<ul>
				<li class="nLi on">
					<h3>文章管理</h3>
					<ul class="sub">
						<li><a href="/NG-ThinkPHP/index.php/Admin/Photo/add">发布图文</a></li>
						<li><a href="/NG-ThinkPHP/index.php/Admin/Photo/oper">图文列表</a></li>
					</ul>
				</li>
				<li class="nLi on">
					<h3>每日一图</h3>
					<ul class="sub">
						<li><a href="/NG-ThinkPHP/index.php/Admin/Photo/day">每日一图</a></li>
						<li><a href="/NG-ThinkPHP/index.php/Admin/Photo/daylist">管理</a></li>
					</ul>
				</li>
				<li class="nLi on">
					<h3>栏目</h3>
					<ul class="sub">
						<li><a href="/NG-ThinkPHP/index.php/Admin/Category/add">栏目添加</a></li>
						<li><a href="/NG-ThinkPHP/index.php/Admin/Category/oper">栏目管理</a></li>
					</ul>
				</li>
				<li class="nLi on">
					<h3>回收站</h3>
					<ul class="sub">
						<li><a href="/NG-ThinkPHP/index.php/Admin/Photo/recycle">已删除图文</a></li>
					</ul>
				</li>
				<li class="nLi on">
					<h3>管理员</h3>
					<ul class="sub">
						<li><a href="/NG-ThinkPHP/index.php/Admin/Admin/add">添加管理员</a></li>
						<li><a href="/NG-ThinkPHP/index.php/Admin/Admin/oper">已有管理员</a></li>
					</ul>
				</li>
				<li class="nLi">
					<h3>留言</h3>
					<ul class="sub">
						<li><a href="">管理</a></li>
						<li><a href="">管理</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- 滑动 展开隐藏效果 -->
		<script type="text/javascript">
		    $(function(){
		        $(".sideMenu .nLi h3").click(function(){
		            if($(this).parent(".nLi").hasClass("on")){
		                $(this).next(".sub").slideUp(300,function(){
		                    $(this).parent(".nLi").removeClass("on")
		                });
		            }else{
		                $(this).next(".sub").slideDown(300,function(){
		                    $(this).parent(".nLi").addClass("on")
		                });
		            }
		        })
		    })
		</script>
		<!-- 百叶窗效果
		<script type="text/javascript">
		    $(function(){
		        $(".L .sideMenu .nLi h3").click(function(){
		            if($(this).parent(".nLi").hasClass("on")){
		                //当前状态展开的时候，继续点击无效
		            }else{
		                $(this).parents("ul").find(".sub").slideUp(300,function(){
		                    $(this).parents("ul").find(".nLi").removeClass("on");
		                });
		                $(this).next(".sub").slideDown(300,function(){
		                    $(this).parent(".nLi").addClass("on");
		                });
		            }
		        })
		    })
		</script> -->
	</div>
	<div class="R">
		<div class="main">
		<script charset="utf-8" src="/NG-ThinkPHP/Public/admin/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/NG-ThinkPHP/Public/admin/js/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});				
});
</script>
<div class="fixed">
	<div class="nav"><h1>当前操作:修改图文</h1></div>
</div>
<!-- <div class="ishere">当前位置：</div> -->
<div class="tab">
	<form action="<?php echo U('Admin/Photo/dusave');?>" method="post" enctype="multipart/form-data">
	<table width=100% class="table">
		<tr>
			<th>标题:</th>
			<td><input value="<?php echo ($arr["title"]); ?>" type="text" name="title"/></td>
		</tr>
		
		<tr>
			<th>图片:</th>
			<td><input type="file" name="image" value=""/>
			<img src="/NG-ThinkPHP/Public/upload/dayone/<?php echo ($arr["imagename"]); ?>" alt="" width="150px" height="150px"/></td>
		</tr>
		<tr>
			<th>内容:</th>
			<td><textarea name="content" style="height:270px;width:90%;"><?php echo ($arr["content"]); ?></textarea></td>
		</tr>
	</table>
	<table class="submit">
	<tr>
		<td colspan="2">
			<input type="hidden" name="imagename" value="<?php echo ($arr["imagename"]); ?>" />
			<input type="hidden" name="id" value="<?php echo ($arr["id"]); ?>"/>
			<input type="submit" value="提交" id="submit"/>
		</td>
	</tr>
	</table>
	</form>
</div>
		</div>
	</div>
</div>
</body>
</html>