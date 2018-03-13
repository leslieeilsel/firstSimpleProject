<?php

	//获取一级栏目
	function getCategoryOne(){
		//获取一级栏目
		$cateOb = M('category');
		$arrOne = $cateOb->select(array('where'=>'fid=0 and deleted=0'));
		foreach ($arrOne as $v){
			$optionOne .="<option value='{$v['id']}'>{$v['cname']}</option>";
		}
		return $optionOne;
	}
	
	//获取二级栏目
	function getCategoryTwo(){
		//获取一级栏目
		$cateOb = M('category');
		$arrOne = $cateOb->select(array('where'=>'fid=0 and deleted=0'));
		//获取二级栏目
		foreach ($arrOne as $v){
			$arrTwo = $cateOb->select(array("where"=>"fid={$v['id']} and deleted=0"));
			foreach ($arrTwo as $sv){
				$optionTwo .= "<option value='{$sv['id']}'>{$sv['cname']}</option>";
			}
		}
		return $optionTwo;
	}
	//获取栏目
	function getCategoryOneTwo(){
		//获取一级栏目
		$cateOb = M('category');
		$arrOne = $cateOb->select(array("where"=>"fid=0 and deleted=0"));
		//获取二级栏目
		foreach ($arrOne as $v){
			$arrTwo = $cateOb->select(array("where"=>"fid={$v['id']} and deleted=0"));
			foreach ($arrTwo as $sv){
				$optionStr .= "<option value=".$v['id']."|".$sv['id'].">".$v['cname']." -&gt; ".$sv['cname']."</option>";
			}
		}
		return $optionStr;
	}
	
	//上传图片条件
	function uploadConfig() {
		$config = array(
				'maxSize'  => 3145728, //3兆
				'replace'  => true,
				'exts'     => array('image'=>'jpg', 'gif', 'png', 'jpeg'),
				'rootPath' => 'Public/upload/',
				'saveName' => array('uniqid',''),
				'autoSub'  => false,
				'subName'  => array('date','Ymd')
		);
		return $config;
	}
	
	function now_here($cateid,$ext=''){
	    $cat = M("Category");
	    $here = "U('Admin/Index/index')";
	    $uplevels = $cat->field("cateid,cname,fid")->where("cateid=$cateid")->find();
	    if($uplevels['fid'] != 0)
	    $here .= $this->get_up_levels($uplevels['fid']);
	    $here .= ' -> <a href="/cat_'.$uplevels['cateid'].'.html">'.$uplevels['cname']."</a>";
	    if($ext != '') $here .= ' -> '.$ext;
	    return $here;
	}
	
	 function get_up_levels($id){
		$cat = M("Category");
		$here = '';
		$uplevels = $cat->field("cateid,cname,fid")->where("cateid=$id")->find();
		$here .= ' -> <a href="/cat_'.$uplevels['cateid'].'.html">'.$uplevels['cname']."</a>";
		if($uplevels['fid'] != 0){
			$here = $this->get_up_levels($uplevels['fid']).$here;
		}
		return $here;
	}
	
	function oneToTwo($id){
		$m = M('Category');
		$arr = $m->where("id=$id")->select();
		foreach ($arr as $v){
			$arr1 = "{$v['cname']}";
		}
	}
	
	//获取分类
	function getTypen($fid=0,$num=0){
		$ob=M('category');
		$arr=$ob->where("fid=$fid")->select();
		$optionStr="";
		$gangStr=str_repeat("——",$num);
		$num++;
		foreach($arr as $v){
			$optionStr.="<option value='{$v['id']}'>{$gangStr}{$v['cname']}</option>";
			//呈现当前一级下的子
			$sStr=getTypen($v['id'],$num);
			$optionStr.=$sStr;
		}
		return $optionStr;
	}
	
	
	//验证码验证
	function check_verify($code, $id = ''){
		$config = array(
			'reset' => false // 验证成功后是否重置，这里才是有效的。
		);
		$verify = new \Think\Verify($config);
		return $verify->check($code, $id);
	}

	/**
	 * 24小时排行
	 */
	function getNewsTop(){
		$click = M('click');
    	$startTime = time()-24*3600;
    	$clickArr = $click->where("c.clicknum>=$startTime and p.deleted=0")
    					  ->field("count(*) as num,p.id,p.title")
    					  ->alias('c')
    					  ->join("photography as p on c.photoid=p.id")
    					  ->order("num desc")
    					  ->limit(10)
    					  ->select();
		
		$htmlContent="";
		foreach($clickArr as $k=>$v){
			$num=$k+1;//第几条
			if($num<=9){
				$numStr="0".$num;
			}else{
				$numStr=$num;
			}
			
			echo $htmlContent.='<em><a href="" target="_blank">'.$v['title'].'</a></em>';
			exit();
			
			/* if($num<=3){
				$htmlContent.='<li class="hot"><span class="top-num num1">'.$numStr.'</span><a href="'.BASE_URL.'news/detail.php?id='.$v['id'].'" target="_blank">'.$v['title'].'</a></li>';
			}else{
				$htmlContent.='<li><span class="top-num">'.$numStr.'</span><a href="'.BASE_URL.'news/detail.php?id='.$v['id'].'" target="_blank">'.$v['title'].'</a></li>';
			} */
		}
		return $htmlContent;
	}














