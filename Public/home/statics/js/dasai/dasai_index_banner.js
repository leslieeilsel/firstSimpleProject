define(function(require, exports, module) {
	var fnTool=require('fnTool.js');
    exports.index_banner=function (id,iw,ih,itime){
       fnCarousel(id,iw,ih,itime);
	   function fnCarousel(id,iw,ih,itime){
			var ready=true;
			var oDiv=document.getElementById(id);
			var oUl=oDiv.children[2];
			var aLi=oUl.children;
			var aImg=oUl.getElementsByTagName('img');
			var oOl=oDiv.children[3];
			var aOli=oOl.children;
			var oPrev=oDiv.children[0];
			var oNext=oDiv.children[1];
			var maxNum=aOli.length-1;
			var iNow=0;
			var n;
			var zIndex=99;
			var timer=null;
			var iTargetAll=aLi[0].offsetWidth;
			//alert(aImg.length);
			for(var i=0; i<aLi.length; i++){
				aLi[i].style.left=iTargetAll+'px';
				aOli[i].nIndex=i;
				var oImg=new Image();
				oImg.index=i;
				oImg.onload=function(){
					aImg[this.index].src=this.src;
					aImg[this.index].style.width=iw+'px';
					aImg[this.index].style.height=ih+'px';
					aImg[this.index].style.marginTop='0';
					//alert(11);
				};
				oImg.src=aImg[i].getAttribute('_src');
			};
			aLi[iNow].style.left=0;
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
					var oldNow=fnTool.fnbyclass(oOl,'active')[0].nIndex;
					if(nowLi.nIndex!=oldNow){
						n=nowLi.nIndex-oldNow;
					    show(n,iTargetAll);
					};	
				};
			};
			timer=setInterval(function(){
				n=1;
				if(aLi.length<2)return;
				show(n,iTargetAll);
			},itime);
			oDiv.onmouseover=function(){
				clearInterval(timer);
			};
			oDiv.onmouseout=function(){
				timer=setInterval(function(){
					n=1;
					if(aLi.length<2)return;
					show(n,iTargetAll);
				},itime);
			};
			function show(num,iTarget){
				if(ready==false)return;
				ready=false;
				if(iNow==0){
					aLi[aLi.length-1].style.left=-iTargetAll+'px';
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
				aLi[oldNow].style.zIndex=maxNum;
				//alert(aOli.length);
				if(iNow!=oldNow){
					if(iNow>oldNow){
						if(iNow==maxNum&&oldNow==0){
							aLi[iNow].style.left=-iTarget+'px';
						}else{
							aLi[iNow].style.left=iTarget+'px';
						};				
					}else{
						if(iNow==0&&oldNow==maxNum){
							aLi[iNow].style.left=iTarget+'px';
						}else{
							aLi[iNow].style.left=-iTarget+'px';
						};
					};
				};
				
				fnTool.startmove(aLi[iNow],{left:'0'},{end:function(){
					ready=true;
				},time:800});
			};
		};
	};
});