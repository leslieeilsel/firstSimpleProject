<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>My Project</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="keywords" content="国家地理,国家地理中文网,美国国家地理,美国国家地理中文网,地理杂志,每日新闻,每日一图,华夏地理,摄影大赛,地理,国家地理视频,图片,摄影,动物,环境,旅行,探险,装备,杂志,科技新知">
<meta name="description" content="美国国家地理中文网是由《华夏地理》杂志与美国国家地理版权合作的科技人文线上平台，美国国家地理中文网囊括了生物与环境、历史与文化、旅游与探险等众多极具特色的专题栏目，将以影像和视频的呈现方式，倚靠雄厚的科技人文资源，深度发掘全球文化，在多元化的差异中展现真实的人文底蕴。美国国家地理中文网力求为您带来每日最新、最鲜活的人文与科学资讯。">
<link href="/Holland/NG-ThinkPHP/Public/home/statics/css/public_new.css" rel="stylesheet" type="text/css">
<link href="/Holland/NG-ThinkPHP/Public/home/statics/css/index_new.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/Holland/NG-ThinkPHP/favicon.ico"/>
<script src="/Holland/NG-ThinkPHP/Public/home/statics/js/sea.js"></script>
<script>
   	var sUrl=window.location.href;
   	var sUrlArr=sUrl.split('?from=');
	var is_mobi = /Mobile/i.test(navigator.userAgent);
   	if(!sUrlArr[1]){
		if(is_mobi) {
			   window.location.href="http://m.nationalgeographic.com.cn/";
		}
   	};
</script>
</head>
<body>
	<div class="page">
	<div class="head">
	
		<div class="log_box">
<div class="log-div">
<div class="log"><a href="http://www.nationalgeographic.com.cn/"><img src="/Holland/NG-ThinkPHP/Public/home/statics/images/dili/logo.png" width="153" height="53" alt="国家地理中文网"/></a></div>
<div class="reseach">
<form action="http://www.nationalgeographic.com.cn/index.php" method="get" target="_blank" id="subform">
<input type="text" class="gSearch_text" name="q" id="q"/>
<span>搜索</span>
<b></b>
<input type="hidden" name="m" value="search"/>
<input type="hidden" name="c" value="index"/>
<input type="hidden" name="a" value="init"/>
<input type="hidden" name="typeid" value="0" id="typeid"/>
<input type="hidden" name="siteid" value="1" id="siteid"/>
</form>
</div>
<div id="erWeiMa" class="erweima"> <img src="/Holland/NG-ThinkPHP/Public/home/statics/images/dili/erweima.png" width="88" height="88" alt="二维码"/> </div>
<div class="top_icon_box"> <a class="i_bg1" href="http://weibo.com/geochannel" target="_blank"></a> <a class="i_bg2" id="topIconBtn" href="javascript:;"></a> <a class="i_bg3" href="http://www.nationalgeographic.com.cn/index.php?m=content&c=feed" target="_blank"></a> </div>
</div>
</div>
<div id="topNavBox" class="Nav top">
<ul>
<li class="first-li "> <a class="nav_btn" href="/Holland/NG-ThinkPHP/Public/home/index.php" target="_self">首页</a> </li>
<?php if(is_array($cateOne)): foreach($cateOne as $key=>$v): if($v["fid"] == 0): ?><li class="third-li NaVLi"> <a class="nav_btn" href="" target="_blank"><?php echo ($v["cname"]); ?></a><?php endif; ?>
	<div class="Front-box video">
		<div class="left-info">
		<dl class="video-left-dd bottom-line">
		<?php if($v["fid"] != 1): ?><a href="" style="color:#000000;"><dd><?php echo ($v["cname"]); ?></dd></a><?php endif; ?>
		</dl>
		</div>
	<div class="right-info">
	<?php if($v["fid"] == 0): ?><div class="top-div"><?php echo ($v["cname"]); ?></div>
		<div class="bottom-div"><a href=""><img src="" width="199" height="150" alt="photography"/></a></div><?php endif; ?>
	</div>
	</div>
	</li><?php endforeach; endif; ?>

</ul>
</div>

	
	</div>
	<style>#indexRbox .banner_box{width:340px;height:256px;overflow:hidden;position:relative;}
				 #indexRbox .banner_box ul{width:100%;height:256px;}
				 #indexRbox .banner_box ul li{width:100%;height:256px;display:inline-table;text-align:center;vertical-align:middle;position:absolute;z-index:2;left:340px;}
				 #indexRbox .banner_box ol{width:120px;height:18px;position:absolute;line-height:18px;z-index:99999;text-align:center;left:50%;margin-left:-30px;bottom:50px;display:none;}
				 #indexRbox .banner_box ol li{width:18px;height:18px;background:#ccc;float:left;margin:0 3px;cursor:pointer;background:none;color:#fff;}
				 #indexRbox .banner_box ol li.active{background-position:3px -580px;color:#333;}
                 .prev,.next{width:32px;height:32px;display:none;background:#fff no-repeat left bottom;opacity:0.5;color:#fff;line-height:60px;font-size:13px;text-align:center;position:absolute;top:50%;margin-top:-16px;z-index:99999;}
                 .prev{left:10px;}
                 .next{right:10px;background-position:left top;}
				 #indexRbox .banner_box ul li img{width:30px;height:30px;margin-top:250px;}
				 #indexLbox .banner_box{width:660px;height:495px;overflow:hidden;position:relative;margin-bottom:20px;}
				 #indexLbox .banner_box ul{width:100%;height:100%;}
				 #indexLbox .banner_box ul li{width:100%;height:100%;position:absolute;z-index:2;left:0px;overflow:hidden;background:#fff;}
				 #indexLbox .banner_box ul li img{width:auto;height:100%;}
				 #indexLbox .banner_box ul li p{position:absolute;left:0;bottom:0;padding:0;background:rgba(0,0,0,0.5);height:40px;line-height:40px;font-size:20px;text-indent:10px;width:100%;overflow:hidden;}
				 #indexLbox .banner_box ul li p a{color:#fff;}
				 #indexLbox .banner_box ol{width:66px;height:10px;position:absolute;z-index:99999;text-align:center;right:17px;bottom:14px;}
				 #indexLbox .banner_box ol li{width:10px;height:10px;border-radius:50%;background:#ccc;float:left;margin:0 3px;cursor:pointer;background:#545454;color:#fff;}
				 #indexLbox .banner_box ol li.active{background:#d2ad04;color:#333;}
                 .prev,.next{width:32px;height:32px;display:none;background:#fff no-repeat left bottom;opacity:0.5;color:#fff;line-height:60px;font-size:13px;text-align:center;position:absolute;top:50%;margin-top:-16px;z-index:99999;}
                 .prev{left:10px;}.next{right:10px;background-position:left top;}
				 #bannerBox2{padding:0;}
	</style>
	
	<div id="ajaxMain" class="content">
	
	<div id="indexLbox" class="left">
		<div class="index_banner">
		<div class="banner_box" id="bannerBox"> <a href="javascript:;" class="prev"> &lt; </a> <a href="javascript:;" class="next"> &gt; </a>
		<ul>
		<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><li><a href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><img alt="<?php echo ($v["title"]); ?>" title="<?php echo ($v["title"]); ?>" src="/Holland/NG-ThinkPHP/Public/upload/<?php echo ($v["imagename"]); ?>" style="width: 660px; height: 495px;"/></a>
				<p><a href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p>
			</li><?php endforeach; endif; ?>
		</ul>
		<ol>
		<li class="active"></li>
		<li class=""></li>
		<li class=""></li>
		<li class=""></li>
		</ol>
		</div>
		</div>
		
		<!-- 新闻列表 -->
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><div class="box">
				<a class="l_box_img" href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><img src="/Holland/NG-ThinkPHP/Public/upload/<?php echo ($v["imagename"]); ?>" alt="<?php echo ($v["title"]); ?>" title="<?php echo ($v['title']); ?>" style="width: 660px; height: 495px;"></a>
				<div>
					<h3><a href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></h3>
					<p><a href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["summary"]); ?></a></p>
					<span><a class="index_box_icon" href="" target="_blank"></a></span>
				</div>
			</div><?php endforeach; endif; ?>
	</div>
	
	<div id="indexRbox" class="right">
		<div style="width:340px; height:205px; position:relative;">
		 
		 
		<video controls loop style="width:340px;" poster="/Holland/NG-ThinkPHP/Public/admin/images/33333.jpg">
		<source src="http://image.nationalgeographic.com.cn/video/sheying_video2016.mp4" type="video/mp4"/>
		</video>
		</div>
		<div class="box R-box-two" id="R-box-two2">
		<div class="title R-title">
		<h5>热门新闻</h5>
		<?php if(is_array($hot)): foreach($hot as $key=>$v): ?><em><a href="" target="_blank"><?php echo ($v["title"]); ?></a></em><?php endforeach; endif; ?>
		</div>
		</div>
		<div class="box R-box-two" id="R-box-two" style="display:none;">
		<dl>
		<dd class="dd-img" style="padding:0">
		 
		 
		<div class="banner_box" id="bannerBox2">
		<a href="javascript:;" class="prev"></a> <a href="javascript:;" class="next"></a>
		<ul>
		 
		 
		<li><a href="http://www.prodrone-tech.com" target="_blank"><img src="/Holland/NG-ThinkPHP/Public/home/statics/images/dili/dasai2015/banner_loading.jpg" _src="/Holland/NG-ThinkPHP/Public/home/statics/images/ad_wurenji.jpg" alt="www.prodrone-tech.com"></a></li>
		                
				    </ul>
				    <ol>
				        <li class="active"></li>
				        
				        <!--li class=""></li-->
				    </ol>
				</div>
		          <!-----------首页右侧广告位结束-------------------> 
		        </dd>
		        <!-- <div class="title R-title">
		          <h5>热门新闻</h5>
		           
		     		            		<em><a href="http://www.nationalgeographic.com.cn/adventure/news/001/6816.html" target="_blank">与雪山为伴的夏尔巴人</a></em>
		                         		<em><a href="http://www.nationalgeographic.com.cn/photography/photographers/6826.html" target="_blank">摄影师Paul Nicklen：捕捉大海的野性力量</a></em>
		                         		<em><a href="http://www.nationalgeographic.com.cn/travel/destinations/6812.html" target="_blank">塔县| 一路向上的人间仙境之旅</a></em>
		                         		<em><a href="http://www.nationalgeographic.com.cn/photography/galleries/3342.html" target="_blank">美国总统与爱犬：汪星人竟是化解政治纷争的&ldquo;...</a></em>
		                         		<em><a href="http://www.nationalgeographic.com.cn/photography/galleries/3341.html" target="_blank">影像故事 | 地中海移民的悲惨人生</a></em>
		                         		<em><a href="http://www.nationalgeographic.com.cn/science/earth/6818.html" target="_blank">澳洲漂得太快就像龙卷风，GPS跟不上只好修改</a></em>
		             			        </div> -->
		      </dl>
		    </div>
		    	<?php if(is_array($dayphoto)): foreach($dayphoto as $key=>$v): ?><div class="box R-box">
			    <a class="r_box_img" href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><img src="/Holland/NG-ThinkPHP/Public/upload/dayone/<?php echo ($v["imagename"]); ?>" alt="<?php echo ($v["title"]); ?>" title="<?php echo ($v["title"]); ?>"></a>
			    <div>
			        <h4><a href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></h4>
			    	<p><a href="/Holland/NG-ThinkPHP/index.php/Home/Photo/detail/id/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["content"]); ?></a></p>
			    </div>
			    <ul>
			        <li><a href="" target="_blank">每日一图</a></li>
			        <li><a class="index_box_icon" href="" target="_blank"></a></li>
			    </ul>
		  		</div><?php endforeach; endif; ?>
	</div>
	</div>
	<div id="ajaxBtn" class="load-more">
		<p class="ajax_loading" id="ajaxLoading"><img src="/Holland/NG-ThinkPHP/Public/home/statics/images/wap/ajax_loading.gif" width="100" height="20" alt="loading.gif"></p>
		<p class="ajax_btn" id="ajaxBtn" style="display: block;">显示更多∨</p>
		<p class="ajax_txt" id="ajaxTxt">亲，没有更多图片了</p>
	</div>
	<script>
		seajs.use('dasai/dasai_index_banner.js', function (mod1){
		    mod1.index_banner('bannerBox2',340,256,3000);
		});
	</script>
	<script>
		seajs.use(['index_r_move.js', 'index_l_ajax.js','sub_banner.js'], function (mod1,mod2,mod3){
			mod1.sum_r_move();
			mod2.sum_l_ajax();
			mod3.sum_sub_banner('bannerBox');
		});
	</script>
	  <!--yejiao-->
	  <div class="foot">
    <div class="foot-log"><img src="/Holland/NG-ThinkPHP/Public/home/statics/images/dili/footer-logo.png" alt="footerlogo" width="130" height="46"/></div>
    <ul class="foot-ul">
      <li><a href="http://www.nationalgeographic.com.cn/html/about_us/" target="_blank">关于我们</a></li>
      <li><a href="http://www.nationalgeographic.com.cn/html/contact_us/" target="_blank">联系我们</a></li>
      <li><a href="http://www.nationalgeographic.com.cn/NGM_China.pdf" target="_blank">刊例下载</a></li>
      <li><a href="http://www.nationalgeographic.com.cn/subscribe/" target="_blank">杂志订阅</a></li>
      <li><a href="<?php echo U('Admin/Login/login');?>" target="_blank">我是管理员</a></li>
    </ul>
    <p>2003-2016 国家地理中文网版权所有 <a href="http://www.nationalgeographic.com">NATIONAL GEOGRAPHIC</a> All Rights Resevered.</p>
    <p class="last-p">京ICP备14040104号-1 京公网安备11010502015207</p>
    <div class="weixin_ewm"><img src="/Holland/NG-ThinkPHP/Public/home/statics/images/dili/weixin_ewm.png" alt="weixin_ewm" class="JIATHIS_IMG_NO"></div>
  </div>
	  <!--yejiao end--> 
	  <!--Baidu analytics --> 
	  <script type="text/javascript">
		var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff8f00157b9e7416724a33f0c8e9f6b9d' type='text/javascript'%3E%3C/script%3E"));
	</script> 
	  <!--Baidu analytics end--> 
	</div>
	<script>
		seajs.use('main_js.js', function (mod){
			mod.sum();
		});
	</script>
	<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "//hm.baidu.com/hm.js?6b557bc3a19c2b9ed0b53e6a1f478c5c";
	  var s = document.getElementsByTagName("script")[0];
	  s.parentNode.insertBefore(hm, s);
	})();
	</script>

</body>
</html>