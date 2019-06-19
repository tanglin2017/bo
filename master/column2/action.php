<?php 
include('../init.php');
include('../models/info_lm.php');
include('../libraries/Image.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
$act = isset($_POST['act']) ? $_POST['act'] : $_GET['act'];

switch($act)
{
   case 'save':
		$news = new Info_lm();
		$news->get_form_data();
		//图片处理
		$goods_thumb = '';
		if (isset($_FILES['img_url']) && $_FILES['img_url']['tmp_name'] != '') {
			$image = new Image();
			$goods_thumb = $image->upload_image($_FILES['img_url']);
			if ($image->error_no)
				msgbox($image->error_msg(), "BACK");
			//删除原有的图片
			if ($goods_thumb != '' && ctype_digit($_POST['id'])) {
				$sql = 'select img_url from info_lm where id_lm=' . $_POST['id'];
				$res = $db->query($sql)->row();
				if ($res->img_url <> '' && file_exists(ROOT_PATH . $res->img_url))
					unlink(ROOT_PATH . $res->img_url);
			}
			$news->data['img_url'] = $goods_thumb;
		}
		if (isset($_FILES['simg_url']) && $_FILES['simg_url']['tmp_name'] != '') {
		    $image = new Image();
		    $sgoods_thumb = $image->upload_image($_FILES['simg_url']);
		    if ($image->error_no)
		        msgbox($image->error_msg(), "BACK");
		    //删除原有的图片
		    if ($sgoods_thumb != '' && ctype_digit($_POST['id'])) {
		        $sql = 'select simg_url from info_lm where id_lm=' . $_POST['id'];
		        $res = $db->query($sql)->row();
		        if ($res->simg_url <> '' && file_exists(ROOT_PATH . $res->simg_url))
		            unlink(ROOT_PATH . $res->simg_url);
		    }
		    $news->data['simg_url'] = $sgoods_thumb;
		}        
		if(isset($_POST['id']) && ctype_digit($_POST['id']))
		{
		     if($_POST['id'] == $_POST['fid']) msgbox("父栏目不能是自己!", "BACK");
                     
			 $news->save($_POST['id'], 'id_lm'); 
			 msgbox("成功修改!", "location='default.php';");  
        }
		else
		{
		     $news->save();   
			 print("<script language=javascript>if (confirm('栏目添加成功,确定要继续添加吗?')) {location='add.php';} else {location='default.php';}</script>");	
			 break;	
		}
		
   case 'del':
		$id = $_GET["id"];
		if ($id == "" || !ctype_digit($id)) msgbox("参数错误!", "BACK");  
		/**
		 * 删除栏目及其子栏目 属于该栏目信息以及子栏目信息 以及图片
		 */
		$dels = $id;
		$childs = get_child($id);
		if($childs)
		{
		   $dels .= ',' . implode(",", $childs);
		}
		$sql = "select img_url,simg_url from info_lm where id_lm in($dels)";
		$result = $db->query($sql)->result();
		foreach ($result as $rs)
		{
		    if ($rs->img_url <> '' &&  file_exists(ROOT_PATH.$rs->img_url)) unlink(ROOT_PATH.$rs->img_url);
		    if ($rs->simg_url <> '' &&  file_exists(ROOT_PATH.$rs->simg_url)) unlink(ROOT_PATH.$rs->simg_url);
		}
		$sql = "delete from info_lm where id_lm in($dels)";
		$db->query($sql);

		$sql = "select img_sl,bimg_sl from info_co where lm in($dels)";
		$result = $db->query($sql)->result();
		foreach ($result as $rs)
		{
		$strid=$rs->id.',';
			if ($rs->img_sl <> '' &&  file_exists(ROOT_PATH.$rs->img_sl)) unlink(ROOT_PATH.$rs->img_sl);
			if ($rs->bimg_sl <> '' &&  file_exists(ROOT_PATH.$rs->bimg_sl)) unlink(ROOT_PATH.$rs->bimg_sl);
		}
		$strid=trim($strid,',');
		$sql = "select img_url,bimg_url from pro_album where pro_id in($strid)";
		$result = $db->query($sql)->result();
		foreach ($result as $rs)  //如果附件不为空，就删除上传附件的内容
		{
		    if ($rs->img_url != '' &&  file_exists(ROOT_PATH.$rs->img_url)) @unlink(ROOT_PATH.$rs->img_url);
		    if ($rs->bimg_url != '' &&  file_exists(ROOT_PATH.$rs->bimg_url)) @unlink(ROOT_PATH.$rs->bimg_url);
		}
		$sql = "delete from pro_album where pro_id in($strid)";
		$db->query($sql, false);
		$sql = "delete from info_co where lm in($dels)";
		$db->query($sql);
		msgbox("删除成功!", "location='default.php';");  
		break;
	    
   default:
     exit('No action Request!');

}

function get_child($fid)
{
	static $child = array();
	global  $db;
	$sql = "select id_lm from info_lm where fid=$fid";
	$result = $db->query($sql)->result('array');
	foreach ($result as $rs){
		$child[] = $rs['id_lm'];
		get_child($rs['id_lm']);
		
	}
	return $child;
	
}
?>