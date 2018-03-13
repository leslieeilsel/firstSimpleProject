<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	
    //登录模板
    function login(){
    	layout(false);
    	$this->display();
    }
    
    //检测登录
    function check(){
    	layout(false);
        $m = M('adminuser');
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$arr = $m->where("username = '%s' and password = '%s'",array($username,$password))
    	         ->find();
    	if ($arr) {
    		setcookie('id',$arr[id],0,'/');
    		setcookie('username',$arr['username'],0,'/');
    		header("location:".U('Admin/Index/index'));
    	}else {
    		$this->error("登录失败",U('Admin/Login/login'));
    	}    	
    }
}