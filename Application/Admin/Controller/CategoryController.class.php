<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class CategoryController extends BaseController{
	
	//添加栏目
	public function add(){
		$arr = getTypen();
		$this->assign('arr',$arr);
		$this->display();
	}
	
	//栏目入表
	public function save(){
		layout(false);
		$m = M('category');
		$re = $m->data($_POST)
				->add();
		if ($re) {
			$this->success('栏目添加成功',U('Admin/Category/oper'),2);
		}else {
			$this->error('栏目添加失败',U('Admin/Category/add'),2);
		}
	}
	
	//栏目列表
	public function oper(){

		$op = getTypen();
		$m = M('category');
		$arr = $m->where('deleted=0')
				 ->select();
		//var_dump($arr);exit();
		$this->assign('arr',$arr);
		$this->assign('op',$op);
		$this->display();
	}
	
	//提交排序
	public function saveOrder(){
		var_dump($_POST);exit();
		layout(false);
		$m = M('category');
		foreach ($_POST['ordernum'] as $k=>$v){
			if (!empty($v)){
				$re = $m->where("id=$k")
						->data(array('ordernum'=>$v))
						->save();
			}
		}
		$this->redirect("Admin/Category/oper");
	}
	
	//修改栏目属性
	public function update(){
		$id = $_GET['id'];
		$m = M('category');
		$arr = $m->where("id=$id")
				 ->find();
		$arr1 = $m->where('deleted=0')
				 ->select();
		//var_dump($arr);exit();
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->display();
	}
	
	//保存修改
	public function usave(){
		layout(false);
		$id = $_POST['id'];
		$m = M('category');
		$re = $m->where("id=$id")
				->data($_POST)
				->save();
		//var_dump($re);exit();
		if ($re) {
			$this->success('栏目修改成功',U('Admin/Category/oper'),2);
		}else {
			$this->error('栏目修改失败',U('Admin/Category/oper'),2);
		}
	}
	
	//删除栏目
	public function del(){
		layout(false);
		$id = $_GET['id'];
		$deleted = $_GET['deleted'];
		$m = M('category');
		$re = $m->where("id=$id")
				->data(array("deleted"=>$deleted))
				->delete();
		if ($re) {
			$this->success('栏目删除成功',U('Admin/Category/oper'),2);
		}else {
			$this->error('栏目删除失败',U('Admin/Category/oper'),2);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}