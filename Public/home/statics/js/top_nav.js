define(function(require, exports, module) {
    exports.sum_nav=function (fnTool,id,iClass){
       fnTopNav(fnTool,id,iClass);
       function fnTopNav(fnTool,id,iClass){
       	  var oNavBox=document.getElementById(id);
		  if(!oNavBox)return;
       	  var aNavLi=fnTool.fnbyclass(oNavBox,iClass);
       	  for(var i=0; i<aNavLi.length; i++){
       	  	aNavLi[i].onmouseover=function(ev){
       	  		var oEvent=ev || event;
				var from=oEvent.fromElement || oEvent.relatedTarget;
				var This=this;
				if(fnTool.ischild(aNavLi[i],from))return;
       	  		clearTimeout(this.timer);
		       	this.timer=setTimeout(function(){
		       		for(var j=0; j<aNavLi.length; j++){
	       	  		    aNavLi[j].getElementsByTagName('div')[0].style.display='none';
	       	     	};
	       	     	This.getElementsByTagName('div')[0].style.display='block';
		       	},150);
       	  	};
       	  	aNavLi[i].onmouseout=function(ev){
       	  		var oEvent=ev || event;
				var to=oEvent.toElement || oEvent.relatedTarget;
				var This=this;
				if(fnTool.ischild(aNavLi[i],to))return;
				clearTimeout(this.timer);
		       	this.timer=setTimeout(function(){
		       		This.getElementsByTagName('div')[0].style.display='none';
		       	},50);	
       	  	};
       	  };
	   };
	};
}); 