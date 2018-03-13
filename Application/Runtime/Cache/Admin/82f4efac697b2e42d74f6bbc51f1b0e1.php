<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>国家地理</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="/Holland/NG-ThinkPHP/favicon.ico"/>
<link href="/Holland/NG-ThinkPHP/Public/admin/css/main.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/Holland/NG-ThinkPHP/Public/admin/css/style.css" />
<link href="/Holland/NG-ThinkPHP/Public/admin/css/viewer.min.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/Holland/NG-ThinkPHP/Public/admin/js/kindeditor/themes/simple/simple.css" />
<script charset="utf-8" src="/Holland/NG-ThinkPHP/Public/admin/js/jquery.js"></script>
<script charset="utf-8" src="/Holland/NG-ThinkPHP/Public/admin/js/viewer.min.js"></script>

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
<div class="national" style="width:100%;">
	<div class="head">
		<a href="<?php echo U('Home/Index/index');?>"><img src="/Holland/NG-ThinkPHP/Public/admin/images/logo.png" alt="进入前台页面" title="进入前台页面" width="100000px"/></a>
		
		<div class="admin">
			<p>管理员 : <a href="#"><?php echo $_COOKIE['username']?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Admin/Login/login');?>" id="out">退出登录</a></p>
		</div> 
	</div>
	<div class="content clear">
		<div class="L" style="overflow-y:auto;">
			<div class="sideMenu">
				<ul>
					<li class="nLi on">
						<h3>文章管理</h3>
						<ul class="sub">
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/add">发布图文</a></li>
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/oper">图文列表</a></li>
						</ul>
					</li>
					<li class="nLi on">
						<h3>每日一图</h3>
						<ul class="sub">
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Dayone/day">每日一图</a></li>
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Dayone/daylist">管理</a></li>
						</ul>
					</li>
					<li class="nLi on">
						<h3>栏目</h3>
						<ul class="sub">
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Category/add">栏目添加</a></li>
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Category/oper">栏目管理</a></li>
						</ul>
					</li>
					<li class="nLi on">
						<h3>回收站</h3>
						<ul class="sub">
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/recycle">已删除图文</a></li>
						</ul>
					</li>
					
					<li class="nLi on">
						<h3>排行</h3>
						<ul class="sub">
							<li><a href="">点击排行</a></li>
							<li><a href="">黑名单</a></li>
						</ul>
					</li>
					
					<li class="nLi on">
						<h3>管理员</h3>
						<ul class="sub">
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Admin/add">添加管理员</a></li>
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Admin/oper">已有管理员</a></li>
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
			<div class="fixed">
	<div class="nav"><h1>添加管理员</h1></div>
</div>
<div class="tab">
	<form action="/Holland/NG-ThinkPHP/index.php/Admin/Admin/save" method="post">
	<table class="table" style="width:100%;">
	    <tr>
			<td style="text-align:right;padding-right:50px;width:50%;">姓名</td>
			<td><input type="text" name="name" value="" id="name"/></td>
		</tr>
		
		<tr>
			<td style="text-align:right;padding-right:50px;width:50%;">员工编号</td>
			<td><input type="text" name="number" value="" id="number"/></td>
		</tr>
		
		<tr>
			<td style="text-align:right;padding-right:50px;width:50%;">用户名</td>
			<td><input type="text" name="username" value="" id="username"/></td>
		</tr>
		
		<tr>
			<td style="text-align:right;padding-right:50px;width:50%;">密码</td>
			<td><input type="password" name="password" value="" id="password"/></td>
		</tr>
		
		<tr>
			<td style="text-align:right;padding-right:50px;width:50%;">验证码</td>
			<td><input type="text" name="verify" value="" id="verify"/>&nbsp;&nbsp;<img src="<?php echo U('Admin/Admin/verify');?>" alt="点击刷新" title="点击刷新" onclick="this.src='<?php echo U('Admin/Admin/verify');?>?'+Math.random()"/>&nbsp;&nbsp;<b><u>视力不好？点击图片刷新</u></b></td>
		</tr>
		
	</table>
	<table class="submit">
	<tr>
		<td colspan="2"><input type="submit" value="提交" id="submit"/></td>
	</tr>
	</table>
	</form>
</div>
			</div>
		</div>
	</div>
</div>	
</body>
</html>