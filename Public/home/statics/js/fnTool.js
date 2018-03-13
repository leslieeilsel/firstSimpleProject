'use strict';
define(function (require, exports, module){
	//module——批量输出
	module.exports={
		fnbyclass:getByClass,
		hasclass:hasClass,
		addclass:addClass,
		removeclass:removeClass,
		getstyle:getStyle,
		getpos:getPos,
		startmove:startMove,
		startmove2:startMove2,
		domready:domReady,
		fnajax:Ajax,
		ischild:isChild,
		isparent:isParent,
		addevent:addEvent,
		indexrmove:indexRmove,
		isweixin:isWeiXin,
		ispc:IsPC,
		addwheel:addWheel
	};
});
function addWheel(obj,fn){
	function fnWheel(ev){
		var oEvent=ev || event;
		var bDown=false;
		if(oEvent.wheelDelta){
			if(oEvent.wheelDelta<0){
				bDown=true;
			}else{
				bDown=false;		
			}	
		}else{
			if(oEvent.detail>0){
				bDown=true;
			}else{
				bDown=false;
			};
		};
		
		fn && fn(bDown);
		
		oEvent.preventDefault && oEvent.preventDefault();
		return false;
	};
	if(window.navigator.userAgent.toLowerCase().indexOf('firefox')!=-1){
		obj.addEventListener('DOMMouseScroll',fnWheel,false);
	}else{
		obj.onmousewheel=fnWheel;
	};
};
function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone","iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
};
//shijiandaili neibu class xuanze
function indexRmove(options,fn){
	if(options){
		var strClass=options.boxclass;
		options.otarget=isParent(strClass,options.otarget);
		if(options.otarget.className==strClass){
			fn&&fn();
		}; 
	};		
};
//事件绑定
function addEvent(obj,sEv,fn){
	if(obj.attachEvent){
		obj.attachEvent(sEv,fn);
	}else{
		obj.addEventListener(sEv.substring(2),fn,false);
	};	
};
function getStyle(obj,attr){	
	return obj.currentStyle?obj.currentStyle[attr]:getComputedStyle(obj,false)[attr];
};
//
function hasClass(obj,sClass){
	var reg=new RegExp('\\b'+sClass+'\\b');
	return reg.test(obj.className);
};
//
function addClass(obj,sClass){
	if(obj.className){
		if(!hasClass(obj,sClass)){
			obj.className+=' '+sClass;	
		};	
	}else{
		obj.className=sClass;	
	};
};
//
function removeClass(obj,sClass){
	if(hasClass(obj,sClass)){
		obj.className=obj.className.replace(sClass,'').replace(/^\s+|\s+$/g,'').replace(/\s+/g,' ');	
	};
};
//
function getByClass(oParent,sClass){
	if(oParent.getElementsByClassName){
		return oParent.getElementsByClassName(sClass);
	}else{
		var arr=[];
		var reg=new RegExp('\\b'+sClass+'\\b');	
		var aEle=oParent.getElementsByTagName('*');
		for(var i=0; i<aEle.length; i++){
			if(reg.test(aEle[i].className)){
				arr.push(aEle[i]);	
			};
		};
		return arr;
	};
};

//绝对位置
function getPos(obj){
	var l=0;
	var t=0;
	var w=0;
	var h=0;
	while(obj){
		t+=obj.offsetTop;
		l+=obj.offsetLeft;
		w=obj.offsetWidth;
		h=obj.offsetHeight
		obj=obj.offsetParent;
	};
	return {left:l,top:t,width:w,height:h};	
};

//ziji
function isChild(oParent,obj){
	while(obj){
		if(obj==oParent)return true;
		obj=obj.parentNode;
	};
	return false;
};
//fuqi
function isParent(oPclass,obj){
	while(obj){
		if(obj.className==oPclass)return obj;
		obj=obj.parentNode;
	};
	return false;		
};
//donghua
function startMove(obj,json,options){
	clearInterval(obj.timer);
	options=options || {};
	options.time=options.time || 300;
	options.type=options.type || 'ease-out';
	var count=Math.floor(options.time/30);	
	var start={};
	var dis={};	
	for(var name in json){
		if(name=='opacity'){
			start[name]=Math.round(parseFloat(getStyle(obj,name))*100);
		}else{
			start[name]=parseInt(getStyle(obj,name));	
		};
		if(isNaN(start[name])){  //考虑默认值
			switch(name){
				case 'left':
					start[name]=obj.offsetLeft;
					break;
				case 'top':
					start[name]=obj.offsetTop;
					break;
				case 'width':
					start[name]=obj.offsetWidth;
					break;
				case 'height':
					start[name]=obj.offsetHeight;
					break;
			};
		};
		dis[name]=json[name]-start[name];
	};
	
	
	var n=0;
	
	obj.timer=setInterval(function(){
		n++;
		
		for(var name in json){
			switch(options.type){
				case 'linear':
					var a=n/count;
					var cur=start[name]+dis[name]*a;
					break;
				case 'ease-in':
					var a=n/count;
					var cur=start[name]+dis[name]*(a*a*a);
					break;
				case 'ease-out':
					var a=1-n/count;
					var cur=start[name]+dis[name]*(1-a*a*a);
					break;
			};
			
			if(name=='opacity'){
				obj.style.opacity=cur/100;
				obj.style.filter='alpha(opacity:'+cur+')';
			}else{
				obj.style[name]=cur+'px';	
			};
		};
		if(n==count){
			clearInterval(obj.timer);
			options.end && options.end();	
		};
	},30);	
};

//baifenbi
function startMove2(obj,json,options){
	clearInterval(obj.timer);
	options=options || {};
	options.time=options.time || 800;
	options.type=options.type || 'ease-out';
	var count=Math.floor(options.time/30);	
	var start={};
	var dis={};	
	for(var name in json){
		if(name=='opacity'){
			start[name]=Math.round(parseFloat(getStyle(obj,name))*100);
		}else{
			start[name]=parseInt(getStyle(obj,name));	
		};
		if(isNaN(start[name])){  //考虑默认值
			switch(name){
				case 'left':
					start[name]=obj.style.left;
					break;
				case 'top':
					start[name]=obj.style.top;
					break;
				case 'width':
					start[name]=obj.style.width;
					break;
				case 'height':
					start[name]=obj.style.height;
					break;
			};
		};
		dis[name]=json[name]-start[name];
	};
	
	
	var n=0;
	obj.timer=setInterval(function(){
		n++;
		
		for(var name in json){
			switch(options.type){
				case 'linear':
					var a=n/count;
					var cur=(start[name]+dis[name])*a;
					break;
				case 'ease-in':
					var a=n/count;
					var cur=(start[name]+dis[name])*(a*a*a);
					break;
				case 'ease-out':
					var a=1-n/count;
					var cur=start[name]+dis[name]*(1-a*a*a);
					break;
			};
			
			if(name=='opacity'){
				obj.style.opacity=cur/100;
				obj.style.filter='alpha(opacity:'+cur+')';
			}else{
				obj.style[name]=cur+'%';	
			};
		};
		if(n==count){
			clearInterval(obj.timer);
			options.end && options.end();	
		};
	},30);	
};

//
function domReady(fn){
	if(document.addEventListener){ //IE9+ chrome FF
		document.addEventListener('DOMContentLoaded',function(){
			fn && fn();
		},false);
	}else{  //IE 6 7 8
		var oS=document.createElement('script');  
	    var oHead=document.getElementsByTagName('head')[0];  
		oS.defer='1';  
		oHead.appendChild(oS);
		oS.onreadystatechange=function(){
			if(oS.readyState=='complete'){
				fn && fn();	
			};
		};
	};
};
//
function json2url(json){
	json.t=Math.random()+'';
	json.t=(json.t).replace('.','');
	var arr=[];
	for(var name in json){
		arr.push(name+'='+json[name]);
	}
	return arr.join('&');
}
function Ajax(json){
	json=json || {};
	if(!json.url){
		alert('用法不符合规范，至少有个url');
		return;	
	};
	json.type=json.type || 'get';
	json.time=json.time || 3000;
	json.data=json.data || {};	
	var timer=null;
	if(window['XMLHttpRequest']){
		var oAjax=new XMLHttpRequest();
	}else{
		var oAjax=new ActiveXObject('Microsoft.XMLHTTP');
	};
	//判断
	switch(json.type.toLowerCase()){
		case 'get':
			oAjax.open('GET',json.url+'?'+json2url(json.data),true);	
	
			oAjax.send();
			break;
		case 'post':
			oAjax.open('POST',json.url,true);
			oAjax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			oAjax.send(json2url(json.data));
			break;
	};
	//加一个loading
	json.loading && json.loading();
	oAjax.onreadystatechange=function(){
		if(oAjax.readyState==4){
			//加一个完成状态
			json.complete && json.complete();
			
			if(oAjax.status>=200 && oAjax.status<300 || oAjax.status==304){
				clearTimeout(timer);
				json.succ && json.succ (oAjax.responseText);
			}else{
				clearTimeout(timer);
				json.error && json.error(oAjax.status);
			};
		};	
	};	
	//网络超时
	timer=setTimeout(function(){
		alert('网络超时了');
		oAjax.onreadystatechange=null;
	},json.time);
};
function isWeiXin(){
	var ua = window.navigator.userAgent.toLowerCase();
	if(ua.match(/MicroMessenger/i) == 'micromessenger'){
		return true;
	}else{
		return false;
	};
};