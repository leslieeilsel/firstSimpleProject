<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class DayoneController extends BaseController{
	//添加每日一图
	function day(){
		$this->display();
	}
	//保存每日一图
	function save(){
		layout(false);
		if (!empty($_FILES['image']['name'])) {
			//上传图片
			$config = array(
					'maxSize'  => 3145728, //3兆
					'replace'  => true,
					'exts'     => array('image'=>'jpg', 'gif', 'png', 'jpeg'),
					'rootPath' => 'Public/upload/dayone/',
					'saveName' => array('uniqid',''),
					'autoSub'  => false,
					'subName'  => array('date','Ymd')
			);
			$upload = new \Think\Upload($config);
			$res = $upload->uploadOne($_FILES['image']);
			if (!$res) {
				$this->error($upload->getError());
			}else {
				$fileName = $res['savename'];
			}
		}
		 
		$data = $_POST;
		$data['pubtime'] = date("Y-m-d H:i:s");
		$data['imagename'] = $fileName;
		$data['adminid'] = $_COOKIE['id'];
		//写入新闻
		$m = M('photography');
		$re = $m->data($_POST)->add($data);
	
		if ($re) {
			$this->success('每日一图添加成功',U('Admin/Dayone/daylist'),2);
		}else {
			$this->error('每日一图添加失败',U('Admin/Dayone/day'),2);
		}
	}
	
	//每日一图列表
	function daylist(){
		 
		$m = M('photography');
		//1.获取总记录数
		$num = $m->where("deleted=0 and dayphoto=1")
				 ->count();
		//2.每页显示条数
		$pageSize = 5;
		//3.实例化分页类
		$page = new \Think\Page($num,$pageSize);
		$page->lastSuffix=false;
		$page->setConfig('first', '首页');
		$page->setConfig('last','尾页');
		//4.获取分页结构show方法
		$pageStr = $page->show();
		//5、获取开始位置
		$start = $page->firstRow;
		$arr = $m->where("dayphoto=1")
				 ->order("id desc")
				 ->limit("$start,$pageSize")
				 ->select();
		 
		//var_dump($arr);exit();
		$this->assign('arr',$arr);
		$this->assign('pageStr',$pageStr);
		$this->display();
	}
	
	//修改每日一图
	function update(){
		$id = (int)$_GET['id'];
		$m = M('photography');
		$arr = $m->where("id=$id")
				 ->find();
		$this->assign('arr',$arr);
		$this->display();
	}
	
	//保存修改每日一图
	function usave(){
		layout(false);
		if (!empty($_POST)) {
			$id = $_POST['id'];
			$oldImagenameName = $_POST['imagename'];
			if (!empty($_FILES['image']['name'])) {
				//上传图片
				$config = array(
						'maxSize'  => 3145728, //3兆
						'replace'  => true,
						'exts'     => array('image'=>'jpg', 'gif', 'png', 'jpeg'),
						'rootPath' => 'Public/upload/dayone/',
						'saveName' => array('uniqid',''),
						'autoSub'  => false,
						'subName'  => array('date','Ymd')
				);
				$upload = new \Think\Upload($config);
				$res = $upload->uploadOne($_FILES['image']);
				if (!$res) {
					$this->error($upload->getError());
				}else {
					$fileName = $res['savename'];
					@unlink("./Public/upload/dayone/".$oldImagenameName);
				}
			}
			$data = $_POST;
			$data['pubtime'] = date("Y-m-d H:i:s");
			$data['imagename'] = $fileName;
			$data['adminid'] = $_COOKIE['id'];
		}
	
		$m = M('photography');
		$re = $m->where("id=$id")
		->data($_POST)
		->save($data);
		if ($re) {
			$this->success('修改成功',U('Admin/Dayone/daylist'),2);
		}else {
			$this->error('修改失败',U('Admin/Dayone/daylist'),2);
		}
	}
	
	//删除每日一图
	function del(){
		layout(false);
		//接收id
		$id = (int)$_GET['id'];
		$deleted = $_GET['deleted'];
		//实例化Model
		$m = M('photography');
		//根据id，删除
		$re = $m->where("id=$id")
				->data(array("deleted"=>$deleted))
				->delete();
		//提示，跳转
		if($re){
			$this->success("删除成功",U("Admin/Dayone/daylist"),2);
		}else{
			$this->error("删除失败",U("Admin/Dayone/daylist"),2);
				
		}
	}
}