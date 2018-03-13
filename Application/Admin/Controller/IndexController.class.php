<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class IndexController extends BaseController {
    
    public function index(){
    	$username = $_COOKIE['username'];
    	$this->assign('username',$username);
        $this->display();
    }
}