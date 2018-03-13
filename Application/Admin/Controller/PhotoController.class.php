<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class PhotoController extends BaseController{
    
	//添加文章
    public function add(){
    	/* $here = now_here($_GET['cateid']);
        $this->assign('here',$here); */
        $cateStr = getCategoryOneTwo();
    	$this->assign('cateStr',$cateStr);
    	$this->display();//默认的模板 View/控制器名/add.html
    }
    
    //保存文章
    public function save(){
    	layout(false);
    	if (!empty($_FILES['image']['name'])) {
	    	//上传图片
	    	$config = uploadConfig();
	    	$upload = new \Think\Upload($config);
			$res = $upload->uploadOne($_FILES['image']);
			if (!$res) {
				$this->error($upload->getError());
			}else {
				$fileName = $res['savename'];
			}
    	}
	    	//处理$_POST['cateid'],分成两个
	    	$cateArr = explode("|",$_POST['cateid']);
	    	$_POST['cateid'] = $cateArr[1];
	    	$_POST['fcid'] = $cateArr[0];
	    	$data = $_POST;
	    	$data['pubtime'] = date("Y-m-d H:i:s");
	    	$data['imagename'] = $fileName;
	    	$data['adminid'] = $_COOKIE['id'];
    	//写入新闻
    	$m = M('photography');
    	$re = $m->data($_POST)->add($data);
    	
    	if ($re) {
    		$this->success('文章添加成功',U('Admin/Photo/oper'),2);
    	}else {
    		$this->error('文章添加失败',U('Admin/Photo/add'),2);
    	}
    }
    
    //文章列表
    public function oper(){
    	//检索
    	//一级栏目id
    	$fcid = isset($_GET['fcid'])?$_GET['fcid']:0;
    	//二级栏目id
    	$cateid = isset($_GET['cateid'])?$_GET['cateid']:0;
    	//获取标题
    	$title = isset($_GET['title'])?$_GET['title']:'';
    	//是否推荐
    	$recommend = isset($_GET['recommend'])?$_GET['recommend']:0;
    	//获取开始时间
    	$starttime = isset($_GET['starttime'])?$_GET['starttime']:"";
    	//获取结束时间
    	$endtime = isset($_GET['endtime'])?$_GET['endtime']:"";
    	//条件查询
    	$where = "deleted=0";
    	
    	if(!empty($fcid)){
    		$where .= " and fcid=$fcid";
    	}
    	if(!empty($cateid)){
    		$where .= " and cateid=$cateid";
    	}
    	if(!empty($title)){
    		$where .= " and title like '%$title%'";
    	}
    	if (!empty($recommend)) {
    		$where .= " and recommend=$recommend";
    	}
    	
    	$this->assign('starttime',$starttime);
    	$this->assign('endtime',$endtime);
    	
    	if($starttime && $endtime){
    		//时间日期格式字符串
    		$starttime = strtotime($starttime);
    		$endtime   = strtotime($endtime);
    		if($endtime>$starttime){
    			$where .=" and (pubtime between $starttime and $endtime)";
    		}
    	}
    	$m = M('photography');
    	//1.获取总记录数
        $num = $m->where("{$where} and dayphoto=0")
    			 ->count();
    	//2.每页显示条数
        $pageSize = 10;
        //3.实例化分页类
        $page = new \Think\Page($num,$pageSize);
        $page->lastSuffix=false;
        $page->setConfig('first', '首页');
        $page->setConfig('last','尾页');
        //4.获取分页结构show方法
        $pageStr = $page->show();
    	//5、获取开始位置
    	$start = $page->firstRow;
    	$arr = $m->where("p.{$where} and p.dayphoto=0")
    	         ->field("p.id,p.title,p.pubtime,p.imagename,p.recommend,p.cateid,c.cname")
			     ->alias('p')
			     ->join("category c on p.cateid=c.id")
       		     ->order("p.id desc")
       		     ->limit("$start,$pageSize")
       		     ->select();
    	//检索
    	
    	$cateOne = getCategoryOne();
    	$cateTwo = getCategoryTwo();
    	
    	$this->assign('fcid',$fcid);
    	$this->assign('cateid',$cateid);
    	$this->assign('recommend',$recommend);
    	$this->assign('title',$title);
    	
    	
    	$this->assign('cateOne',$cateOne);
    	$this->assign('cateTwo',$cateTwo);
    	$this->assign('arr',$arr);
    	$this->assign('pageStr',$pageStr);
    	$this->display();
    }
    
    //修改文章
    public function update(){
        //获取栏目
        $cateStr = getCategoryOneTwo();
        //根据获取的id，查看文章记录
    	$id = (int)$_GET['id'];
    	$m = M('photography');
    	$arr = $m->where("id=$id")
    			 ->find();
    	$this->assign('arr',$arr);
        $this->assign('cateStr',$cateStr);
    	$this->display();
    }
    
    //保存update的文章
    public function usave(){
    	layout(false);
    	if (!empty($_POST)) {
    		$id = $_POST['id'];
	    	$oldImageName = $_POST['imagename'];
    		if (!empty($_FILES['image']['name'])) {
		    	//上传图片
		    	$config = uploadConfig();
		    	$upload = new \Think\Upload($config);
		    	$res = $upload->uploadOne($_FILES['image']);
		    	if (!$res) {
		    		$this->error($upload->getError());
		    	}else {
		    		$fileName = $res['savename'];
		    		@unlink("./Public/upload/".$oldImageName);
		    	}
    		}
    	} 
    	//处理$_POST['cateid'],分成两个
    	$cateArr = explode("|",$_POST['cateid']);
    	$_POST['cateid'] = $cateArr[1];
    	$_POST['fcid'] = $cateArr[0];
    	$data = $_POST;
    	$data['pubtime'] = date("Y-m-d H:i:s");
    	$data['imagename'] = $fileName;
    	$data['adminid'] = $_COOKIE['id'];
    	
    	
	    $m = M('photography');
	    $re = $m->where("id=$id")
	    	    ->data($_POST)
	    	    ->save($data);
	    if ($re) {
	    		$this->success('文章修改成功',U('Admin/Photo/oper'),2);
	    	}else {
	    		$this->error('文章修改失败',U('Admin/Photo/oper'),2);
	    	}
	    }
    
    //删除文章
    public function del(){
        layout(false);
		//接收id
		$id = (int)$_GET['id'];
		$deleted = $_GET['deleted'];
		//实例化Model
		$m = M('photography');
		//根据id，删除
		$re = $m->where("id=$id")
				->data(array("deleted"=>$deleted))
				->save();
		//提示，跳转
		if($re){
			$this->success("删除成功",U("Admin/Photo/oper"),2);
		}else{
			$this->error("删除失败",U("Admin/Photo/oper"),2);
			
		}
    }
    
    //推荐文章
    public function change(){
    	layout(false);
    	$id = $_GET['id'];
    	$recommend = $_GET['recommend'];
    	$m = M('photography');
    	$arr = $m->where("id=$id")
    			 ->data(array("recommend"=>$recommend))
    			 ->save();
    	header("location:".$_SERVER['HTTP_REFERER']);
    }    
    
    //下拉获取二级
	public function selectTwo(){
    	$fcid=$_GET['fcid'];
    	$m=M('category');
    	$cateArr=$m->select(array("where"=>"fid=$fcid and deleted=0"));
    	$optionStr="";
    	foreach($cateArr as $v){
    		$optionStr.="<option value='{$v['id']}'>{$v['cname']}</option>";
    	}
    	echo $optionStr;
    }
    
    //回收站
    public function recycle(){
    	//检索
    	//一级栏目id
    	$fcid = isset($_GET['fcid'])?$_GET['fcid']:0;
    	//二级栏目id
    	$cateid = isset($_GET['cateid'])?$_GET['cateid']:0;
    	//获取标题
    	$title = isset($_GET['title'])?$_GET['title']:'';
    	//是否推荐
    	$recommend = isset($_GET['recommend'])?$_GET['recommend']:0;
    	//获取开始时间
    	$starttime = isset($_GET['starttime'])?$_GET['starttime']:"";
    	//获取结束时间
    	$endtime = isset($_GET['endtime'])?$_GET['endtime']:"";
    	//条件查询
    	$where = "deleted=1";
    	 
    	if(!empty($fcid)){
    		$where .= " and fcid=$fcid";
    	}
    	if(!empty($cateid)){
    		$where .= " and cateid=$cateid";
    	}
    	if(!empty($title)){
    		$where .= " and title like '%$title%'";
    	}
    	if($starttime && $endtime){
    		//时间日期格式字符串
    		$starttime = strtotime($starttime);
    		$endtime   = strtotime($endtime);
    		if($endtime>$starttime){
    			$where .=" and (pubtime between $starttime and $endtime)";
    		}
    	}
    	$m = M('photography');
    	$num = $m->where("{$where}")
    			 ->count();
    	$pageSize = 7;
    	$page = new \Think\Page($num, $pageSize);
    	$page->lastSuffix = false;
    	$page->setConfig('first', '首页');
    	$page->setConfig('last','尾页');
    	$pageStr = $page->show();
    	$start = $page->firstRow;
    	$arr = $m->where("p.{$where}")
		    	 ->field("p.id,p.title,p.pubtime,p.imagename,p.recommend,p.cateid,c.cname")
		    	 ->alias('p')
		    	 ->join("category c on p.cateid=c.id")
		    	 ->order("p.id desc")
		    	 ->limit("$start,$pageSize")
		    	 ->select();
    	//检索
    	$cateOne = getCategoryOne();
    	$cateTwo = getCategoryTwo();
    	 
    	$this->assign('cateid',$cateid);
    	$this->assign('cateOne',$cateOne);
    	$this->assign('cateTwo',$cateTwo);
    	$this->assign('title',$title);
    	$this->assign('arr',$arr);
    	$this->assign('pageStr',$pageStr);
    	$this->display();
    }
    
    //撤回操作
    public function back(){
    	layout(false);
    	$id = $_GET['id'];
    	$deleted = $_GET['deleted'];
    	$m = M('photography');
    	$re = $m->where("id=$id")
    			->data(array("deleted"=>$deleted))
    			->save();
    	if($re){
    		$this->success("撤回成功",U("Admin/Photo/oper"),2);
    	}else{
    		$this->error("撤回失败",U("Admin/Photo/recycle"),2);
    	}
    }
    //单个彻底删除
    public function delete(){
    	layout(false);
    	$id = $_GET['id'];
    	$m = M('photography');
    	$re = $m->where("id=$id")
	    			->delete();
	    if($re){
				$this->success("清除成功",U("Admin/Photo/recycle"),2);
		}else{
			$this->error("清除失败",U("Admin/Photo/recycle"),2);
		}
    }
    
    //全部彻底删除
    public function deleteAll(){
    	layout(false);
    	$m = M('photography');
    	$re = $m->where('deleted=1')
    			->delete();
    	if($re){
    		$this->success("清空成功",U("Admin/Photo/recycle"),2);
    	}else{
    		$this->error("清空失败",U("Admin/Photo/recycle"),2);
    	}
    }
    
    
}