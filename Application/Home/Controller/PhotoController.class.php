<?php
namespace Home\Controller;
use Think\Controller;
class PhotoController extends Controller{
	
	function detail(){
		$id = $_GET['id'];
		
		$click = M('photography');
		
		$arr = $click->where("id=$id")
					 ->setInc('clicknum',1);
		
		$clicktime = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$m = M('click');
		$arr1 = $m->data(array("photoid"=>"$id","ip"=>"$ip","clicktime"=>"$clicktime"))
				  ->add();
		$this->display();
	}
	
	function lister(){
		$this->display();
	}
}