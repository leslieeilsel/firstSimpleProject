<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class HotController extends BaseController{
	function click(){
		
		$m = M('photography');
		$num = $m->where('deleted=0 and dayphoto=0')
				 ->count();
		$pageSize = 7;
		$page = new \Think\Page($num,$pageSize);
		$page->lastSuffix=false;
		$page->setConfig('first', '首页');
		$page->setConfig('last','尾页');
		//4.获取分页结构show方法
		$pageStr = $page->show();
		$start = $page->firstRow;
		$hot = $m->where('p.deleted=0 and p.dayphoto=0')
				 ->field("p.id,p.clicknum,p.title,c.ip,c.clicktime")
				 ->alias('p')
				 ->join("click c on p.id=c.photoid")
				 ->order('clicknum desc')
				 ->limit($start,$pageSize)
				 ->select();
		//var_dump($hot);exit();
		$this->assign('hot',$hot);
		$this->assign('pageStr',$pageStr);
		$this->display();
	}
}