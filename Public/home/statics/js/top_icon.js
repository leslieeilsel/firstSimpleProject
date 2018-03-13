define(function(require, exports, module) {
    exports.sum_icon=function (tool,btnId,boxId){
	  
       fnTopIcon(btnId,boxId);
       function fnTopIcon(btnId,boxId){
		   var oBtn=document.getElementById(btnId);
		   if(!oBtn)return;
       	   var oBox=document.getElementById(boxId);
	       oBtn.onmouseover=function(){
		       	clearTimeout(this.timer);
		       	this.timer=setTimeout(function(){
		       		oBox.style.display='block';
		       	},150);    	
	       };
	       oBtn.onmouseout=function(){
		       	clearTimeout(this.timer);
		       	this.timer=setTimeout(function(){
		       		oBox.style.display='none';
		       	},150);       	
	       };
	   };
	};
}); 