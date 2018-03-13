define(function(require, exports, module) {
    exports.sum_login=function (tool,id1,id2,id3,id4,id5){
       fnFormTxt(id1,id2,id3,id4,id5);
       function fnFormTxt(iframeId,btnId,bgId,boxId,closeId){  
		   var ofrm0 = document.getElementById(iframeId);
		  // alert(ofrm0);
		   if(!ofrm0)return;
		   var ofrm1 = ofrm0.document;
		   if(ofrm1==undefined){
				ofrm1 = document.getElementById(iframeId).contentWindow.document;
		   }else{
				ofrm1 = document.frames[iframeId].document;
		   };
       	   var oBtn=ofrm1.getElementById(btnId);
		   if(!oBtn)return;
		   var oBg=document.getElementById(bgId);
		   var oBox=document.getElementById(boxId);
		   var oClose=document.getElementById(closeId);
		   oBtn.onclick=function(){
			  if(oBg.style.display=='block'){
			      oBg.style.display='none';
				  oBox.style.display='none';
				  //parent.location.reload();
			  }else{
			      oBg.style.display='block';
				  oBox.style.display='block';
			  };	 
		   };
		   oClose.onclick=function(){
			   oBg.style.display='none';
			   oBox.style.display='none';
		   };
	   };
	};
});  