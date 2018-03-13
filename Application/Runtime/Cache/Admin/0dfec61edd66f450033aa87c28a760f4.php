<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
	<title>欢迎登录后台管理系统</title>
	<link href="/Holland/NG-ThinkPHP/Public/admin/css/login.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="/Holland/NG-ThinkPHP/Public/admin/js/jquery.js"></script>
	<style media="screen" type="text/css">
			img { display: none; }
			body { overflow: hidden; }
			#canvas { position: absolute; top: 0px; left: 0px; }
		</style>
		<script src="/Holland/NG-ThinkPHP/Public/admin/js/rainyday.js" type="text/javascript"></script>
		<script type="text/javascript">
 			function demo() {
				var engine = new RainyDay('canvas','rainy', window.innerWidth, window.innerHeight);
				engine.gravity = engine.GRAVITY_NON_LINEAR;
				engine.trail = engine.TRAIL_DROPS;

				engine.rain([
					engine.preset(0, 2, 500)
				]);

				engine.rain([
					engine.preset(3, 3, 0.88),
					engine.preset(5, 5, 0.9),
					engine.preset(6, 2, 1),
				], 100);
 			}
		</script>
		<script type="text/javascript"> 
			setInterval(test,1000); 
			var array = new Array()
			var index=0
			var array = new Array(
					"/Holland/NG-ThinkPHP/Public/admin/images/rainy/1.jpg",
					"/Holland/NG-ThinkPHP/Public/admin/images/rainy/2.jpg",
					"/Holland/NG-ThinkPHP/Public/admin/images/rainy/3.jpg",
					"/Holland/NG-ThinkPHP/Public/admin/images/rainy/4.jpg",
					"/Holland/NG-ThinkPHP/Public/admin/images/rainy/5.jpg"
					);
			function test(){
				var myimg = document.getElementById("rainy"); 
				if(index == array.length-1){
					index=0;
				}else{ 
					index++;
  					} 
				myimg.src = array['index']; 
			} 
		</script> 
		
</head>

<body onLoad="demo();">

	<div class="rain">
		<img id="rainy" src="/Holland/NG-ThinkPHP/Public/admin/images/rainy/1.jpg" />
		<div id="cholder">
			<canvas id="canvas"></canvas>
		</div>
	</div>
	<div class="main-login">	
		<div class="login-content">	
		<h2>用户登录</h2>
		
	    <form action="<?php echo U('Admin/Login/check');?>" method="post" id="login-form" name="login-form">
		    <div class="login-info">
				<span class="user">&nbsp;</span>
				<input name="username" id="username" type="text"  value="" class="login-input"/>
			</div>
		    <div class="login-info">
				<span class="pwd">&nbsp;</span>
				<input name="password" id="password" type="password"  value="" class="login-input"/>
			</div>
		    <div class="login-oper">
				<input style="margin:3px 10px 0px 2px; float:left;" name="" type="checkbox" value="" checked="checked" /><span>记住密码</span>
				</div>
		    <div class="login-oper">
				<input name="" type="submit" value="登 录" class="login-btn"/>
			</div>
	    </form>
	    </div>  
</div>   
</body>

</html>