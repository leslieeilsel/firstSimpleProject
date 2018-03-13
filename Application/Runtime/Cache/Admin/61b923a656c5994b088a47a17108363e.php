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
							<li><a href="/Holland/NG-ThinkPHP/index.php/Admin/Hot/click">点击排行</a></li>
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
			<script type="text/javascript">

function getCateSon(){
	//获取一级栏目选择的栏目id值
	var fcid=$("[name='fcid']").val();
	if(fcid!=0){
	//通过ajax把栏目id传给 控制器news--->actionCate
	$.ajax({
		url:'<?php echo U('Admin/Photo/selectTwo');?>',
		data:'fcid='+fcid,
		success:function(re){
				//ajax处理返回值。
				re="<option value='0'>选择二级</option>"+re;
				$("[name='cateid']").html(re);
				//二级栏目选中
				$("[name='cateid']").val(<?php echo ($cateid); ?>);
			}
		})
	}else{
		$("[name='cateid']").html("<option value='0'>选择二级</option>");
	}
}
</script>

<div class="fixed">
<div class="nav"><h1>栏目管理</h1></div>
<div class="search">
	<form method="get" action="<?php echo U('Admin/Photo/oper');?>">
	    <!-- <input type="hidden" name="r" value="<?php echo U('Admin/Photo/oper');?>"/> -->
	    <div class="fcate">
	    	栏目 : <select onchange="getCateSon();" name="fcid" id="fcid">
			<option value="0">选择一级</option>
			<?php echo ($cateOne); ?>
		</select>
		</div>
		<div class="scate">
			<select name="cateid" id="cateid">
			<option value='0'>选择二级</option>
			<?php echo ($cateTwo); ?>
			</select>&nbsp;
		</div>
		<div class="title">
			标题 : 
			<input type="text" name="title" value="<?php echo ($title); ?>" id="title"/>&nbsp;
		</div>
		
		<div class="wrap">
			<div>推荐 : </div>
				<?php if($v["recommend"] == 0): ?><input type="checkbox" id="checkbox_c1" class="chk_3" name="recommend" value="1"/><label for="checkbox_c1"></label>
				<?php elseif($v["recommend"] == 1): ?>
					<input type="checkbox" id="checkbox_c2" class="chk_3" name="recommend" value="0" checked='checked'/><label for="checkbox_c2"></label><?php endif; ?>
		</div>
		
		<div class="date">
			<div class="inline">
				<div>
					日期区间 :&nbsp;&nbsp;
				</div>
				<input type="text" class="inline laydate-icon" name="starttime" id="start" style="width:150px; margin-right:10px;"/>
				
					-&nbsp;&nbsp;
				
				<input type="text" class="inline laydate-icon" name="endtime" id="end" style="width:150px; margin-right:10px;"/>
			</div>
		</div>
		<div class="tijiao">
			<input type="submit" value="查询" id="tijiao"/>
		</div>	   
	</form>
</div>
</div>
<div class="tab">
	<table style="width:100%" class="table">
		<tr>
			<th width="15%">Id</th>
			<th width="15%">标题</th>
			<th width="15%">栏目</th>
			<th width="15%">点击图片以预览</th>
			<th width="20%">添加时间</th>
			<th width="20%">操作</th>
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
			<th>
				<a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/update/id/<?php echo ($v["id"]); ?>"><img src="/Holland/NG-ThinkPHP/Public/admin/images/rewrite.png" alt="修改" title="修改" width="23px"/></a>&nbsp;&nbsp;
				<a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/del/id/<?php echo ($v["id"]); ?>/deleted/1" onClick="delcfm()"><img src="/Holland/NG-ThinkPHP/Public/admin/images/delete.png" alt="删除" title="删除" width="23px"/></a>&nbsp;&nbsp;
				<?php if($v["recommend"] == 1): ?><a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/change/id/<?php echo ($v["id"]); ?>/recommend/0"><img src="/Holland/NG-ThinkPHP/Public/admin/images/down.png" alt="取消推荐" title="取消推荐" width="23px"/></a>
				<?php elseif($v["recommend"] == 0): ?>
					<a href="/Holland/NG-ThinkPHP/index.php/Admin/Photo/change/id/<?php echo ($v["id"]); ?>/recommend/1"><img src="/Holland/NG-ThinkPHP/Public/admin/images/up.png" alt="推荐" title="推荐" width="23px"/></a><?php endif; ?>
			</th>
		</tr>
		<script type="text/javascript">
			var viewer = new Viewer(document.getElementById('<?php echo ($v["id"]); ?>'), {
				url: 'data-original'
			});
		</script><?php endforeach; endif; ?>
	
	</table>
<div class="yellow"><?php echo ($pageStr); ?></div>
</div>

<script charset="utf-8" src="/Holland/NG-ThinkPHP/Public/admin/js/laydate.js"></script>
<script type="text/javascript">
!function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
	laydate({elem: '#demo'});//绑定元素
}();
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: '2016-01-01', //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: '2016-01-01',
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
laydate(start);
laydate(end);
</script>
<script type="text/javascript">
    function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
</script>
<script type="text/javascript">
	document.getElementById("fcid").value="<?php echo ($fcid); ?>";
	document.getElementById("cateid").value="<?php echo ($cateid); ?>";
	document.getElementById("title").value="<?php echo ($title); ?>";
	document.getElementById("start").value="<?php echo ($starttime); ?>";
	document.getElementById("end").value="<?php echo ($endtime); ?>";
</script>
			</div>
		</div>
	</div>
</div>	
</body>
</html>