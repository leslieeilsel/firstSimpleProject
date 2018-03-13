define(function(require, exports, module) {  
   var fnTool=require('fnTool.js');
   exports.sum_r_move=function (){
         var oRbox=document.getElementById('indexRbox');
         if(!oRbox)return;
         function isParent(oPclass,obj){
     		while(obj){
				if(obj.className==oPclass)return obj;
				obj=obj.parentNode;
			};
			return false;		
     	};
     	function indexRmove(options){
     		if(options){
     			var strClass=options.boxclass;
	         	options.otarget=isParent(strClass,options.otarget);
	         	if(options.otarget.className==strClass){
	         		if(fnTool.ischild(options.otarget,options.ofrom))return;
	         		var oImg=options.otarget.getElementsByTagName('a')[0];
	         		var oDiv=options.otarget.getElementsByTagName('div')[0];
	         		var oP=options.otarget.getElementsByTagName('p')[0];
	         		fnTool.startmove(oImg,{marginTop:options.imgtop});
	         		fnTool.startmove(oDiv,{marginTop:options.divtop});
	         		fnTool.startmove(oP,{height:options.pheight},{time:300});
				}; 
     		};		
     	};
         oRbox.onmouseover=function(ev){
         	var oEvent=ev || event;
         	var target=oEvent.srcElement || oEvent.target;
         	var from=oEvent.fromElement || oEvent.relatedTarget;
			var This=this;
			indexRmove({
				boxclass:'box R-box',
				otarget:target,
				ofrom:from,
				imgtop:-30,
				divtop:-40,
				pheight:60
			});
         	   	
         };
         oRbox.onmouseout=function(ev){
         	var oEvent=ev || event;
         	var target=oEvent.srcElement || oEvent.target;
         	var oto=oEvent.toElement || oEvent.relatedTarget;
			var This=this;
			indexRmove({
				boxclass:'box R-box',
				otarget:target,
				ofrom:oto,
				imgtop:0,
				divtop:-12,
				pheight:0
			});
         };
	};
});  