<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
    public function index(){
    	
    	$m = M('photography');
    	//4个图片轮播
    	$arr = $m->where('deleted=0 and recommend=1')
    			 ->order('id desc')
    			 ->limit(4)
    			 ->select();
    	//var_dump($list);exit();
    	
    	//热门新闻 (点击排行)
    	   $hot = $m->where('deleted=0 and dayphoto=0')
    				->order('clicknum desc')
    				->limit(6)
    				->select();
    	   
    	//十条最近新闻
    	$list = $m->where('deleted=0 and dayphoto=0')
    			  ->order('pubtime desc')
    			  ->limit(9)
    			  ->select();
    	//var_dump($list);exit();
    	
    	//每日一图
    	$dayphoto = $m->where('dayphoto=1')
    			      ->order('id desc')
    			      ->limit(15)
    			      ->select();
    	//var_dump($photo);exit();
    	
    	$cate = M('category');
    	$cateOne = $cate->where('deleted=0 and isshow=1')
    	           		->order('ordernum asc')
    	           		->limit(10)
    					->select();
    	//var_dump($cateOne);exit();
    	
    	
    	$this->assign('arr',$arr);
    	$this->assign('list',$list);
    	$this->assign('cateOne',$cateOne);
    	$this->assign('dayphoto',$dayphoto);
    	$this->assign('hot',$hot);
    	$this->display();
    }
}