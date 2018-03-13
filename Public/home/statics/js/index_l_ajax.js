define(function(require, exports, module) {  
   var fnTool=require('fnTool.js');
   exports.sum_l_ajax=function (){
	   	fnAjax({
			mainId:'ajaxMain',
			btnId:'ajaxBtn',
			ajaxUrl:'/index.php'
		});
		function fnAjax(options){
			options=options || {};
			options.mainId=options.mainId || null;
			options.ajaxUrl=options.ajaxUrl || null;
			if(!options.mainId||!options.ajaxUrl)return;
			var oAjaxMain=document.getElementById(options.mainId);
			if(!oAjaxMain)return;
			var oAjaxBox=oAjaxMain.children[0];
			var oAjaxBox2=oAjaxMain.children[1];
			var oAjaxBtnMain=document.getElementById(options.btnId);
			var oAjaxLoading=oAjaxBtnMain.children[0];
			var oAjaxBtn=oAjaxBtnMain.children[1];
			var oAjaxTxt=oAjaxBtnMain.children[2];
			window.scrollTo(0,0);
			var URL=options.ajaxUrl;
			var bReady=true;
			oAjaxBtn.style.display='block';
			//M
			function getPage(fn){
				if(!bReady)return;
				bReady=false;
				fnTool.fnajax({
					url:URL,
					data:{m:'content',c:'index',a:'getpagenums'},
					succ:function(str){
					   var json=eval('('+str+')');
					   fn&&fn(json);
					},
					complete:function(){
						bReady=true;
					}
				});
			};
			//M2
			function fnAjaxMsg(URL,iNow,oData,fn){
				if(!bReady)return;
				bReady=false;
				fnTool.fnajax({
					url:URL,
					data:oData,
					succ:function(str){
						var jsonArr=eval('('+str+')');
						if(!jsonArr)return;
						if(jsonArr.error){
							alert('错了');	
						}else{
							fn && fn(jsonArr);		
						};
					},
					loading:function(){
						oAjaxLoading.style.display='block';	
					},
					complete:function(){
						oAjaxLoading.style.display='none';
						bReady=true;
						oAjaxLoading.zInow=iNow+=1;
					}
				});
			};
			//V
			function createMsg(jsonArr,oAjaxMain,fn){
				for(var i=0; i<jsonArr.length; i++){
					if(jsonArr[i]){
						var oDiv=document.createElement('div');
						var sImgSrc=jsonArr[i].thumb?jsonArr[i].thumb:'/uploadfile/2014/0916/20140915050230176.jpg';
						fn&&fn(oDiv,i,jsonArr,sImgSrc);
						oAjaxMain.appendChild(oDiv);
					};
				};
			};
			function createHTML(obj,i,jsonArr,boxclass,sImgSrc){
				obj.className=boxclass;		
			    obj.innerHTML = '<a class="l_box_img" href="'+jsonArr[i].url+'"><img src="'+sImgSrc+'"></a>'+
							      '<div>'+
								      '<h3><a href="'+jsonArr[i].url+'">'+jsonArr[i].title+'</a></h3>'+
								      '<p><a href="'+jsonArr[i].url+'">'+jsonArr[i].description+'</a></p>'+
								      '<span><a class="index_box_icon" href="'+jsonArr[i].url+'" target="_blank"></a></span>'+
							      '</div>';		
			};
			function createHTML2(obj,j,jsonArr2,boxclass,sImgSrc){
				obj.className=boxclass;		
			    obj.innerHTML = '<a class="r_box_img" href="'+jsonArr2[j].url+'"><img src="'+sImgSrc+'"></a>'+
								'<div>'+
								  '<h4><a href="'+jsonArr2[j].url+'">'+jsonArr2[j].title+'</a></h4>'+
								  '<p><a href="'+jsonArr2[j].url+'">'+jsonArr2[j].description+'</a></p>'+
								'</div>'+
								'<ul>'+
								  '<li><a href="'+jsonArr2[j].caturl+'">'+jsonArr2[j].catname+'</a></li>'+
								  '<li><a class="index_box_icon" href="'+jsonArr2[j].url+'" target="_blank"></a></li>'+
								'</ul>';	
			};
			//V1
			function fnSrcollMsg(_index,inow){
				if(_index>inow){
					var iNow=oAjaxLoading.zInow;
					var winH=document.documentElement.clientHeight
					var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
					var minHeight=document.documentElement.scrollHeight;
					if(winH+scrollTop>=minHeight){
						fnCreateDiv(iNow);			
					};
				}else{
					oAjaxTxt.style.display='block';
				};
			};	
			//C
			oAjaxBtn.onclick=function(){
				var iNow=1;
				getPage(function(json){
					 oAjaxBtn.zIndex=json;
					 var iPage=oAjaxBtn.zIndex;
					 oAjaxBtn.style.display='none';
					 if(iPage>iNow){		
						fnCreateDiv(iNow);
					 };
				});
			};
			function fnCreateDiv(iNow){
				fnAjaxMsg(URL,iNow,{m:'content',c:'index',a:'getleftnewslist',page:iNow},function(jsonArr){
					createMsg(jsonArr,oAjaxBox,function(obj,i,jsonArr,sImgSrc){
						createHTML(obj,i,jsonArr,'box',sImgSrc);
					});
					fnAjaxMsg(URL,iNow,{m:'content',c:'index',a:'getrgtlist',page:iNow},function(jsonArr){
						 createMsg(jsonArr,oAjaxBox2,function(obj,i,jsonArr,sImgSrc){
							createHTML2(obj,i,jsonArr,'box R-box',sImgSrc);
						});
					});
				});
			};
			//C
			window.onscroll=window.onresize=function(){
			    var _index=oAjaxBtn.zIndex;
				var inow=oAjaxLoading.zInow;
				if(oAjaxBtn.zIndex){
					fnSrcollMsg(_index,inow)
				};
			};
		};
	};
});