define(function(require, exports, module) {  
   var fnTool=require('fnTool.js');
   var topSeach=require('top_seach.js');
   var topIcon=require('top_icon.js');
   var topNav=require('top_nav.js');
   var loginTk=require('login_tk.js');
   exports.sum=function (){
	     loginTk.sum_login(fnTool,'comment_iframe','loginTopBtn','webLoginBg','webLoginBox','loginClose');
		 topSeach.sum_seach(fnTool,'subform');
		 topSeach.sum_seach(fnTool,'listInput1');
		 topSeach.sum_seach(fnTool,'listInput2');
		 topSeach.sum_seach(fnTool,'listInput3'); 
         topIcon.sum_icon(fnTool,'topIconBtn','erWeiMa');
         topNav.sum_nav(fnTool,'topNavBox','NaVLi');
	};
}); 