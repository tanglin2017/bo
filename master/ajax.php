<?php 
include('init.php');
include('libraries/servicesJSON.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../default.php';");
}

$act = $_GET['act'] ? $_GET['act'] : $_POST['act'];
if($act == 'info_change_cat'){
    $cat = $_GET['cat'];
    if(is_numeric($cat)){
        $sql = 'select * from info_lm where id_lm=' . $cat;
        $query = $db->query($sql);
        if($query->num_rows() > 0){
            $res = $query->row('array');
            $result = array('error' => 0, 'message' => '', 'content' => $res);
        } else {
            $result = array('error' => 1, 'message' => '没有该栏目!', 'content' => '');
        }
    } else {
        $result = array('error' => 2, 'message' => '参数错误!', 'content' => '');
    }

    $json = new servicesJSON();

    die($json->encode($result));
}
elseif($act == 'del_infolm_simg')
{
    $id = $_GET['id'];
    if(is_numeric($id)){	
        $sql = 'select simg_url from info_lm where id_lm=' . $id;
        $res = $db->query($sql)->row();
        if($res->simg_url != '' && file_exists('../'.$res->simg_url)) @unlink('../'.$res->simg_url);
        $sql = 'UPDATE info_lm SET simg_url=NULL where id_lm='.$id;
        $db->query($sql, FALSE);
        $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
        	
    } else {
        $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');
    }

    $json = new servicesJSON();

    die($json->encode($result));
}
if($act == 'info_change1_cat'){
    $cat = $_GET['cat'];
    if(is_numeric($cat)){
        $sql = 'select * from info_lm1 where id_lm=' . $cat;
         
        $query = $db->query($sql);
        if($query->num_rows() > 0){
            $res = $query->row('array');
            $result = array('error' => 0, 'message' => '', 'content' => $res);
        } else {
            $result = array('error' => 1, 'message' => '没有该栏目!', 'content' => '');
        }
    } else {
        $result = array('error' => 2, 'message' => '参数错误!', 'content' => '');
    }

    $json = new servicesJSON();

    die($json->encode($result));
}
elseif($act == 'del_infolm_img')
{
    $id = $_GET['id'];
	if(is_numeric($id)){
			
			  $sql = 'select img_url from info_lm where id_lm=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->img_url != '' && file_exists('../'.$res->img_url)) @unlink('../'.$res->img_url);
			  $sql = 'UPDATE info_lm SET img_url=NULL where id_lm='.$id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
elseif($act == 'del_info_img')
{
    $id = $_GET['id'];
	if(is_numeric($id)){
			
			  $sql = 'select img_sl from info_co where id=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->img_sl != '' && file_exists('../'.$res->img_sl)) @unlink('../'.$res->img_sl);
			  $sql = 'UPDATE info_co SET img_sl=NULL where id='.$id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
elseif($act == 'del_info1_img')
{
    $id = $_GET['id'];
    if(is_numeric($id)){
        	
        $sql = 'select img_sl from info_co1 where id=' . $id;
        $res = $db->query($sql)->row();
        if($res->img_sl != '' && file_exists('../'.$res->img_sl)) @unlink('../'.$res->img_sl);
        $sql = 'UPDATE info_co1 SET img_sl=NULL where id='.$id;
        $db->query($sql, FALSE);
        $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
        	
    } else {
        $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');
    }

    $json = new servicesJSON();

    die($json->encode($result));
}
elseif($act == 'del_info1_bimg')
{
    $id = $_GET['id'];
    if(is_numeric($id)){
         
        $sql = 'select bimg_sl from info_co1 where id=' . $id;
        $res = $db->query($sql)->row();
        if($res->bimg_sl != '' && file_exists('../'.$res->bimg_sl)) @unlink('../'.$res->bimg_sl);
        $sql = 'UPDATE info_co1 SET bimg_sl=NULL where id='.$id;
        $db->query($sql, FALSE);
        $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
         
    } else {
        $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');
    }

    $json = new servicesJSON();

    die($json->encode($result));
}
elseif($act == 'del_info_bimg')
{
    $id = $_GET['id'];
	if(is_numeric($id)){
			
			  $sql = 'select bimg_sl from info_co where id=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->bimg_sl != '' && file_exists('../'.$res->bimg_sl)) @unlink('../'.$res->bimg_sl);
			  $sql = 'UPDATE info_co SET bimg_sl=NULL where id='.$id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
elseif($act == 'cp_change_cat'){
    $cat = $_GET['cat'];
	if(is_numeric($cat)){
			  $sql = 'select * from cp_lm where id_lm=' . $cat; 
			  
			  $query = $db->query($sql);
			  if($query->num_rows() > 0){
			  $res = $query->row('array');
			  $result = array('error' => 0, 'message' => '', 'content' => $res);
			  } 
			  /*else {
					   $result = array('error' => 1, 'message' => '没有该栏目!', 'content' => '');
			  }*/
	} else {
	           $result = array('error' => 2, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
elseif($act == 'del_cp_img')
{
    $id = $_GET['id'];
	if(is_numeric($id)){
			
			  $sql = 'select img_sl from cp_co where id=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->img_sl != '' && file_exists('../'.$res->img_sl)) @unlink('../'.$res->img_sl);
			  $sql = 'UPDATE cp_co SET img_sl=NULL where id='.$id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
elseif($act == 'del_cp_bimg')
{
    $id = $_GET['id'];
	if(is_numeric($id)){
			
			  $sql = 'select bimg_sl from cp_co where id=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->bimg_sl != '' && file_exists('../'.$res->bimg_sl)) @unlink('../'.$res->bimg_sl);
			  $sql = 'UPDATE cp_co SET bimg_sl=NULL where id='.$id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}

elseif($act == 'del_album_img')
{
    $id = $_GET['id'];
	$table = $_GET['db_table'];
	if(is_numeric($id)){
			
			  $sql = 'select * from '.$table.' where id=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->img_url != '' && file_exists('../'.$res->img_url)) @unlink('../'.$res->img_url);
              if($res->bimg_url != '' && file_exists('../'.$res->bimg_url)) @unlink('../'.$res->bimg_url);
			  $sql = 'DELETE FROM '.$table.' WHERE id=' . $id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
elseif($act == 'del_jb_img')
{
    $id = $_GET['id'];
	$table = $_GET['db_table'];
	if(is_numeric($id)){
			
			  $sql = 'select * from '.$table.' where id=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->img_url != '' && file_exists('../'.$res->img_url)) @unlink('../'.$res->img_url);
                          if($res->bimg_url != '' && file_exists('../'.$res->bimg_url)) @unlink('../'.$res->bimg_url);
			  $sql = 'DELETE FROM '.$table.' WHERE id=' . $id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
elseif($act == 'del_case_img')
{
    $id = $_GET['id'];
	$table = $_GET['db_table'];
	if(is_numeric($id)){
			
			  $sql = 'select * from '.$table.' where id=' . $id; 
			  $res = $db->query($sql)->row();
			  if($res->img_url != '' && file_exists('../'.$res->img_url)) @unlink('../'.$res->img_url);
              if($res->bimg_url != '' && file_exists('../'.$res->bimg_url)) @unlink('../'.$res->bimg_url);
			  $sql = 'DELETE FROM '.$table.' WHERE id=' . $id;
			  $db->query($sql, FALSE);
			  $result = array('error' => 0, 'message' => '删除成功!', 'content' => '');
			  
	} else {
	           $result = array('error' => 1, 'message' => '参数错误!', 'content' => '');	
	}
	
	$json = new servicesJSON();
	
	die($json->encode($result));
}
$db->close();
?>