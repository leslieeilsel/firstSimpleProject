<?php
namespace Admin\Controller;
header('content-type:text/html;charset=utf-8');
use Think\Controller;
class BaseController extends Controller{
    
    //登录控制
    //initialize = 初始化
    //redirect = 跳转
	function _initialize(){
		if (!isset($_COOKIE['id'])) {
			$this->redirect("Admin/Login/login",null,2,"请稍等,登录跳转中...");
		}
	}
}