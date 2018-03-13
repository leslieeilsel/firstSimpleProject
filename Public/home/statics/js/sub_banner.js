define(function(require, exports, module) {  
   var fnTool=require('fnTool.js');
   exports.sum_sub_banner=function (id2){
   	    fnCarousel(id2);
	   	function fnCarousel(id){
			var ready=true;
			var oDiv=document.getElementById(id);
			var oUl=oDiv.children[2];
			var aLi=oUl.children;
			var oOl=oDiv.children[3];
			var aOli=oOl.children;
			var oPrev=oDiv.children[0];
			var oNext=oDiv.children[1];
			var iNow=0;
			var n;
			var zIndex=99;
			var timer=null;
			var iTargetAll=aLi[0].offsetWidth;
			for(var i=0; i<aLi.length; i++){
				aOli[i].nIndex=i;
			};
			oNext.onclick=function(){
				n=1;
				show(n,iTargetAll);
			};
			oPrev.onclick=function(){
				n=-1;
				show(n,iTargetAll);
			};
			var nowLi=null;
			oOl.onclick=function(ev){
				var oEvent=ev || event;
				var target=oEvent.srcElement || oEvent.target;
				var This=this;
				if(target.tagName=='LI'){
					nowLi=target;
					var oldNow=getByClass(oOl,'active')[0].nIndex;
					n=nowLi.nIndex-oldNow;
					show(n,iTargetAll);
				};
			};
			timer=setInterval(function(){
				n=1;
				show(n,iTargetAll);
			},5000);
			oDiv.onmouseover=function(){
				clearInterval(timer);
			};
			oDiv.onmouseout=function(){
				timer=setInterval(function(){
					n=1;
					show(n,iTargetAll);
				},5000);
			};
			function show(num,iTarget){
				if(ready==false)return;
				ready=false;
				if(iNow==0){
				};
				var oldNow=iNow;
				iNow+=num;
				if(iNow==aLi.length){
					iNow=0;
				};
				if(iNow==-1){
					iNow=aLi.length-1;
				};		
				for(var i=0; i<aOli.length; i++){
					aOli[i].className='';
					aLi[i].style.zIndex='';
				};	
				aOli[iNow].className='active';
				aLi[iNow].style.zIndex=zIndex;
				aLi[oldNow].style.zIndex=3;
				if(iNow!=oldNow){
					if(iNow>oldNow){
						fnOpacity(3,0);				
					}else{
						fnOpacity(0,3);
					};
				};
				function fnOpacity(n1,n2){
					if(iNow==n1&&oldNow==n2){
						aLi[iNow].style.opacity=0;
						aLi[iNow].style.filter='alpha(opacity:0)';
					}else{
						aLi[iNow].style.opacity=0;
						aLi[iNow].style.filter='alpha(opacity:0)';
					};		
				};
				startMove(aLi[iNow],{opacity:100},{end:function(){
					ready=true;
				}});
			};
		};
	};
});  