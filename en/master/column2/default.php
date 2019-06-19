<?php 
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
</head>
<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="../main.php">首页</a></li>
    <li><a href="default.php">信息栏目</a></li>
    </ul>
    </div>
    <div class="rightinfo">
    <div class="tools">
<!--     	<ul class="toolbar"> -->
<!--         <li class="click"><a href="add.php"><span><img src="../images/t01.png" /></span>添加栏目</a></li> -->
<!--         </ul> -->
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>标题</th>
        <th style="text-align:center">排序</th>
        <th style="text-align:center">管理操作</th>
        </tr>
        </thead>
        <tbody>
       <?php
global $db;
//栏目首页显示栏目过程
$sql = "select * from info_lm where id_lm=2 order by px";
$db->query($sql);
$result = $db->query($sql)->result('array');
foreach($result as $row){	
	$i = "";
	$zt = "";
	if ($row["add_xx"]){
		$zt = "<font color='blue' style='font-weight:bold;'>√</font>";
	}else{
		$zt = "<font color='red' style='font-weight:bold;'>×</font>";
	}
?>
  <tr>
    <td height="22"><IMG height=15 src='../images/tree_folder<?php echo $row['xia'] ? 4 : 3 ?>.gif' width=15 valign='abvmiddle'><A href='edit.php?id=<?php echo $row["id_lm"];?>'><STRONG><?php echo $row["title_lm"];?></STRONG></A>&nbsp;<?php echo $row["id_lm"];?>&nbsp;<?php echo ($zt);?></td>
    <td height="22" align="center"><?php echo $row["px"];?></td>
    <td height="22" align="center"><A href="edit.php?id=<?php echo ($row["id_lm"]);?>">修改设置</A></td>
  </tr>
<?php 
	if ($row["xia"] == 1) {
		child($row["id_lm"], $i);
	}
}

?>
</table>
<?php
function child($fid,$i){
	$i .= "&nbsp;&nbsp;";
	global $db;
	$sql = "select * from info_lm where fid=".$fid." order by px";
	$result = $db->query($sql)->result('array');
	
	foreach( $result as $rows ){
		$tt="" ;
		if ($rows["add_xx"]){
			$tt = "<font color='blue' style='font-weight:bold;'>√</font>";
		}else{
			$tt = "<font color='red' style='font-weight:bold;'>×</font>";
		}
?>
  <tr >
    <td height="22"><?php echo $i;?>├-<img src="../images/tree_folder<?php echo $rows['xia'] ? 4 : 3 ?>.gif"><A href='edit.php?id=<?php echo $rows["id_lm"];?>'><STRONG><?php echo $rows["title_lm"];?></STRONG></A>&nbsp;<?php echo $rows["id_lm"];?>&nbsp;<?php echo ($tt);?></td>
    <td height="22" align="center"><?php echo $rows["px"];?></td>
    <td height="22" align="center">

        <A href="edit.php?id=<?php echo ($rows["id_lm"]);?>">修改设置</A>
    </td>
  </tr>
<?php
		if ($rows["xia"] == 1) {
			child($rows["id_lm"], $i);
		}
    }
}
?>

        
       
        </tbody>
    </table>
    
   
    <div class="pagin" style="padding-bottom:30px;">
    	
    </div>
    
  
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
</body>
</html>
