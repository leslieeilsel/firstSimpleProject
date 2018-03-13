<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Verify;
class AdminController extends BaseController{
	
	//添加管理员
	function add(){
		$this->display();
	}
	
	function verify(){
		$config = array(
			'expire'    =>   60,
			'fontSize'  =>   20,   // 验证码字体大小
			'length'    =>   4,    // 验证码位数
			'useNoise'  =>   true, // 关闭验证码杂点
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}
	
	//入表
	function save(){
		//echo I('post.verify');exit();
		layout(false);
		$m = M('adminuser');
		$re = check_verify(I('post.verify'));
		//var_dump($re);exit();
		if ($re) {
			$data['name'] = I('post.name');
			$data['number'] = I('post.number');
			$data['username'] = I('post.username');
			$data['password'] = (I('post.password'));
			$data['pubtime'] = date("Y-m-d H:i:s");
			$data['root'] = I('post.root');
			$res = $m->add($data);
			
			if ($res) {
	    		$this->success('管理员添加成功',U('Admin/Admin/oper'),2);
	    	}else {
	    		$this->error('添加失败',U('Admin/Admin/add'),2);
	    	}
					 	
		}else {
			$this->error('操作异常',U('Admin/Admin/add'),2);
		}
		
	}
	
	//列表
	function oper(){
		$m = M('adminuser');
		$arr= $m->where('root=0')
				->select();
		$this->assign('arr',$arr);
		$this->display();
	}
	
	//修改信息
	function update(){
		$id = $_GET['id'];
		$m = M('adminuser');
		$arr= $m->where("id=$id")
				->find();
		//var_dump($arr);exit();
		$this->assign('arr',$arr);
		$this->display();
	}
	
	//删除
	function del(){
		layout(false);
		//var_dump($_GET);exit();
		$id = $_GET['id'];
		$deleted = $_GET['deleted'];
		$m = M('adminuser');
		$re = $m->where("id=$id")
				->data(array("deleted"=>$deleted))
				->delete();
		if ($re) {
			$this->success('删除成功',U('Admin/Admin/oper'),2);
		}else {
			$this->error('删除失败',U('Admin/Admin/oper'),2);
		}
	}
	
	//保存修改
	function usave(){
		layout(false);
		//var_dump($_POST);exit();
		$m = M('adminuser');
		
		$id = I('post.id');
		$data['name'] = I('post.name');
		$data['number'] = I('post.number');
		$data['username'] = I('post.username');
		$data['password'] = (I('post.password'));
		
		$res = $m->where("id=$id")
				 ->data($data)
				 ->save();
			
		if ($res) {
			$this->success('修改信息成功',U('Admin/Admin/oper'),2);
		}else {
			$this->error('修改失败',U('Admin/Admin/oper'),2);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}