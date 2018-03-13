define(function(require, exports, module) {
    exports.sum_seach=function (tool,id){
       fnFormTxt(id);
       function fnFormTxt(id2){
       	   var oForm=document.getElementById(id2);
       	   if(!oForm)return;
	       var oInput=oForm.children[0];
	       var oSpan=oForm.children[1];
	       var oB=oForm.children[2];
           oInput.value='';
           oSpan.style.display='block';
           oB.onclick=function(){
           if(oInput.value!=''){
               document.getElementById('subform').submit();
               return false;    
           }else{
               return false;
           };   
           };
           oInput.onfocus=function(){
				oSpan.style.display='none';
			};
			oInput.onblur=function(){
				if(this.value==''){
					oSpan.style.display='block';			
				}else{
					oSpan.style.display='none';
				};			
			};	
	   };
	};
});  