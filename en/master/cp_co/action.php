<?php 
include('../init.php');
include('../models/cp_co.php');
include('../libraries/Image.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" ) //判断是否登陆，如果没有登陆就退出
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
$act = isset($_POST['act']) ? $_POST['act'] : $_GET['act']; //得到操作名
$opid = isset($_POST['id']) ? $_POST['id'] : $_GET['id']; //得到id
$lm=(int)$_POST['lm'];
switch($act)
{
    case 'save':  //保存和修改
		$news = new cp_co();
		$news->get_form_data();
		//图片处理
	    $goods_thumb = '';
            $goods_bthumb = '';
		if(isset($_FILES['img_sl']) && $_FILES['img_sl']['tmp_name'] != '')
		{
	      	$image = new Image();
			$goods_thumb = $image->upload_image($_FILES['img_sl']);
			if($image->error_no) msgbox($image->error_msg(),"BACK");
			//删除原有的图片
			if($goods_thumb != '' && ctype_digit($_POST['id']))
			{
				$sql = 'select img_sl from cp_co where id=' . $_POST['id'];
				$res = $db->query($sql)->row();
				if($res->img_sl <> '' && file_exists(ROOT_PATH.$res->img_sl)) unlink(ROOT_PATH.$res->img_sl);
			}
                        //生成缩略图(得到文件的物理路径，不然找不到文件)-成功
                        //$thumb="../../".$goods_thumb;
                        //$goods_temp=$image->make_thumb($thumb,50,50,"","");
                        //生成水印(失败-注意图片的格式)
                       // $thumb="../../".$goods_thumb;
                       // $watermark="../../attach/201211/abc.gif";
                       // $goods_temp=$image->add_watermark($thumb, '', $watermark, 5, 0.65);exit;
			$news->data['img_sl'] = $goods_thumb;			
		}
        if(isset($_FILES['bimg_sl']) && $_FILES['bimg_sl']['tmp_name'] != '')
		{
	      	$image = new Image();
			$goods_bthumb = $image->upload_image($_FILES['bimg_sl']);
			if($image->error_no) msgbox($image->error_msg(),"BACK");
			//删除原有的图片
			if($goods_bthumb != '' && ctype_digit($_POST['id']))
			{
				$sql = 'select bimg_sl from cp_co where id=' . $_POST['id'];
				$res = $db->query($sql)->row();
				if($res->bimg_sl <> '' && file_exists(ROOT_PATH.$res->bimg_sl)) unlink(ROOT_PATH.$res->bimg_sl);
			}
                        //生成缩略图(得到文件的物理路径，不然找不到文件)-成功
                        //$thumb="../../".$goods_thumb;
                        //$goods_temp=$image->make_thumb($thumb,50,50,"","");
                        //生成水印(失败-注意图片的格式)
                       // $thumb="../../".$goods_thumb;
                       // $watermark="../../attach/201211/abc.gif";
                       // $goods_temp=$image->add_watermark($thumb, '', $watermark, 5, 0.65);exit;
			$news->data['bimg_sl'] = $goods_bthumb;			
		}

		if(isset($_POST['id']) && ctype_digit($_POST['id']))  //修改
		{		 
			 $news->save($_POST['id']); 
			 msgbox("成功修改!", "location='default.php?id_lm={$lm}';");  
                }
		else   //保存
		{
		     $news->save();   
			  msgbox('', "if (confirm('添加成功,确定要继续添加吗?')) {location='add.php?lm={$lm}';} else {location='default.php?id_lm={$lm}';}");
			 break;	
		}
		
	case 'ping1':
		if($opid != '' && ctype_digit($opid)) //屏蔽
		{
			$sql="update cp_co set pass=0 where id=".$opid."";
			$db->query($sql,false);
		}
		break;  
	case 'ping2':
		if($opid != '' && ctype_digit($opid)) //取消屏蔽
		{
			$sql="update cp_co set pass=1 where id=".$opid."";
			$db->query($sql,false);
		}
		break; 
	case 'tuijian1':
		if($opid != '' && ctype_digit($opid)) //取消推荐
		{
			$sql="update cp_co set tuijian=0 where id=".$opid."";
			$db->query($sql,false);
		}
		break;  
	case 'tuijian2':
		if($opid != '' && ctype_digit($opid)) //推荐
		{
			$sql="update cp_co set tuijian=1 where id=".$opid."";
			$db->query($sql,false);
		}
		break; 
	case 'hot1':
		if($opid != '' && ctype_digit($opid)) //取消热点
		{
			$sql="update cp_co set hot=0 where id=".$opid."";
			$db->query($sql,false);
		}
		break;  
	case 'hot2':
		if($opid != '' && ctype_digit($opid))  //热点
		{
			$sql="update cp_co set hot=1 where id=".$opid."";
			$db->query($sql,false);
		}
		break; 
	case 'del':  //删除
		if(is_array($opid)) $opid = implode(',', $opid); 
		if($opid != '')
		{
			  $opid = str_replace(" ", "", $opid);
			  //删除信息包含的图片文件
			  $sql = "select img_sl,bimg_sl from cp_co where id in($opid)";
			  $result = $db->query($sql)->result();
			  foreach ($result as $rs)  //如果附件不为空，就删除上传附件的内容
			  {
				 if ($rs->img_sl != '' &&  file_exists(ROOT_PATH.$rs->img_sl)) @unlink(ROOT_PATH.$rs->img_sl);
                 if ($rs->bimg_sl != '' &&  file_exists(ROOT_PATH.$rs->bimg_sl)) @unlink(ROOT_PATH.$rs->bimg_sl);
			  }		  
			  $sql = "delete from cp_co where id in($opid)";
			  $db->query($sql, false);
		}
		break;   
   default:
   exit('No action Request!');

}

exit("<script>alert('成功操作!');location.replace(document.referrer);</script>"); 
?>