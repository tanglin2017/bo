<?php
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
?>
<html>
<head>
<title>文章管理首页</title>
<META http-equiv=Content-Type content="text/html; charset=UTF-8">

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>



<script language="javascript" src="../js/function.js"></script>
<script language="javascript">
<!--
 function CheckOthers(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
//		if (e.name != 'chkall')
			if (e.checked==false)
			{
				e.checked = true;// form.chkall.checked;
			}
			else
			{
				e.checked = false;
			}
	}
}

function CheckAll(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
//		if (e.name != 'chkall')
			e.checked = true// form.chkall.checked;
	}
}
//-->
</script>
</head>
<body leftmargin='2' topmargin='1' marginwidth='0' marginheight='0'>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
	<li><?php
	//显示栏目
$id_lm = isset($_GET["id_lm"]) ? $_GET["id_lm"] : 4;

//显示导航
if ($id_lm != NULL)
{ 
	$sql="select id_lm,title_lm,fid from info_lm where id_lm=".$id_lm." order by px";
	$query = $db->query($sql);
	$row = $query->row('array');
	$numrows = $query->num_rows();
	
	if ($numrows != 0)
	{
		$ty = "<li><a href='defaultco.php?id_lm=".$row["id_lm"]."'>".$row["title_lm"]."</a></li>";
		$fid = $row["fid"];
	}
	if($fid != 0)
	{
		$sql="select id_lm,title_lm,fid from info_lm where id_lm=".$fid." order by px";
		$query = $db->query($sql);
		$row = $query->row('array');
		$numrows = $query->num_rows();
		if ($numrows != 0)
		{
			$ty="<li><a href='defaultco.php?id_lm=".$row["id_lm"]."'>".$row["title_lm"]."</a>".$ty."</li>";
		}
	}
	print($ty);
}
else
{
	print("所有文章");		
}
?></li>
    </ul>
    </div>
	
    
    <div class="rightinfo">
    
	 <div class="tools">
    
    	所有栏目：<?php
//显示栏目
$id_lm = isset($_GET["id_lm"]) ? $_GET["id_lm"] : 4;

if ($id_lm == '' || !ctype_digit($id_lm))
{
	$sql = "select id_lm,title_lm,fid from info_lm where fid=4  order by px";
}
else
{
	$sql = "select id_lm,title_lm,fid from info_lm where fid=".$id_lm." order by px";
}

$result = $db->query($sql)->result('array');
$a = 1;
foreach($result as $row)
{	
	if ( $a == 1 ) 
	{
		print("&nbsp;<a href=defaultco.php?id_lm=".$row["id_lm"].">".$row["title_lm"]."</a>&nbsp;");
	}
	else
	{
		print("|&nbsp;<a href=defaultco.php?id_lm=".$row["id_lm"].">".$row["title_lm"]."</a>&nbsp;");
	}
	if ( $a % 16 == 0 ) print ("<br>");
	$a++;
}
?>
    </div>
	
	
    <div class="tools">
    <?php   
   $sousuo=$_GET['sousuo'];
    ?>
    	<ul class="toolbar">
        <li class="click"><a href="addco.php"><span><img src="../images/t01.png" /></span>添加文章</a></li>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li style="margin: 0;padding: 0;">
        <form action="defaultco.php" method="get">
        <input type="text" name="sousuo" value="<?php echo $sousuo?>" style="height: 33px;"/>
        <input type="submit" value="搜索文章" style="height: 33px;"/>
        </form></li>
        </ul>
     
    
    </div>
	<script language="javascript">
<!--
 function CheckOthers(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
//		if (e.name != 'chkall')
			if (e.checked==false)
			{
				e.checked = true;// form.chkall.checked;
			}
			else
			{
				e.checked = false;
			}
	}
}

function CheckAll(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
//		if (e.name != 'chkall')
			e.checked = true// form.chkall.checked;
	}
}
//-->
</script>
    
	 <FORM name=myform   action="actionco.php" method=post>
	
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>选中</th>
        <th style="text-align:center">ID</th>
        <th style="text-align:center">文章标题</th>
        <th style="text-align:center">发布时间</th>
        <th style="text-align:center">文章属性</th>
        <th style="text-align:center">排序</th>
        <th style="text-align:center">修改|屏蔽|删除</th>
        </tr>
        </thead>
		
        <tbody>
		
		<?PHP
//显示栏目
$id_lm = isset($_GET["id_lm"]) ? $_GET["id_lm"] :4;
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

if ($id_lm != '')
{ 
    $tt ='a.lm=' . $id_lm;
	$childs = get_child($id_lm);
       //var_dump($childs);
	if( $childs ) $tt .= ' or a.lm in(' . implode(",", $childs) . ')';
	$tt = " AND ($tt) ";
        //echo $tt;
		$t2=' and lm=' . $id_lm;
}
else
{
   $tt = '';
   $t2 = '';
}


if(isset($_GET['page'])){
$page = intval($_GET['page']);
}
else {
$page=1;
}
$PageSize = 20; //每页的记录数量
// 获取总数量
if($sousuo!=null){
$sql2="select id from info_co as a where title like '%{$sousuo}%'" . $tt . "";
}else {
if($id_lm!=null){
$sql2="select a.*, b.title_lm,b.fid from info_co a LEFT JOIN info_lm b  ON a.lm=b.id_lm WHERE 1=1" . $tt . "";
}else{
$sql2="select id from info_co as a";
}
}

$amount=$db->query($sql2)->num_rows();
/*
$result2=mysql_query($sql2);
$rs2=  mysql_fetch_array($result2);
echo $amount=$rs2['count'];*/

$PageCount = ceil($amount/$PageSize);//总页数=总数量/每页数量
if($Page>$PageCount|$page==0){// 如果当前页数大于总页数
echo "不能发现此页！";
exit();
}
//翻页链接

if($page ==1 ){
$PageOut ="<a>上一页</a>";
}
else{

$u=$page-1;
$PageOut = '<a href="defaultco.php?page='.$u.'&id_lm='.$id_lm.'">上一页</a> ';
}
if($page==$PageCount || $PageCount==0){
$PageOut1 =  '<a>下一页</a>';
}
else{
$d=$page+1;
$PageOut1 = '<a href="defaultco.php?page='.$d.'&id_lm='.$id_lm.'">下一页</a>';
}

if($sousuo!=null){
$sql="SELECT a.*, b.title_lm,b.fid from info_co a LEFT JOIN info_lm b  ON a.lm=b.id_lm WHERE 1=1 and title like '%{$sousuo}%'".$tt." ORDER BY a.id DESC limit ".($page-1)*($PageSize).",$PageSize";
}else {
$sql="SELECT a.*, b.title_lm,b.fid from info_co a LEFT JOIN info_lm b  ON a.lm=b.id_lm WHERE 1=1" . $tt . " ORDER BY a.id DESC limit ".($page-1)*($PageSize).",$PageSize";
}

$query=$db->query($sql);		
			$list = $query->result();
foreach($list as $rs) { 
		$sx = "" ;
  		if ( !$rs->pass ){   $sx=$sx."&nbsp;&nbsp;<font color=green>屏</font>";}
   		if ( $rs->tuijian ){ $sx=$sx."&nbsp;&nbsp;<font color=blue>推荐</font>";}
		?>
      
	  
	   <TR class=tdbg>
                <TD align=middle width="50"><input type=checkbox name="id[]" value='<?php echo $rs->id; ?>' ></TD>
                <TD align=middle width="60"><?php  echo $rs->id; ?></TD>
                <TD><strong>[</strong><A href="defaultco.php?id_lm=<?php echo  $rs->lm; ?>"><?php echo  $rs->title_lm; ?></A><strong>]</strong> <A href="editco.php?id=<?php echo  $rs->id; ?>&id_lm=<?php echo $rs->lm;?>"><?php echo  $rs->title; ?></A>
<?php
if ($rs->img_sl != ""){
					echo "&nbsp;<a href=../../" . $rs->img_sl . "  target=_blank><img src=../images/img.gif border=0 onmouseover=popImage(this,'../../" . $rs->img_sl . "'); onmouseout=hideLayer(); ></a>";
}					
?>                </TD>
                <td align=center ><?php echo date('Y-m-d H:i:s', $rs->wtime); ?></td>
                <TD align=middle><?php  echo $sx;?></TD>
                <TD align=center><?php  echo $rs->px;?></TD>
                <TD align=center> 
				<A href="editco.php?id=<?php echo $rs->id; ?>&id_lm=<?php echo $rs->lm;?>" >修改</A>|
                                
				<?php if ( $rs->pass ){?>
				<a href="actionco.php?act=ping1&id=<?php echo $rs->id; ?>" >屏蔽</a>|
				<?php }else{?>
				<a href="actionco.php?act=ping2&id=<?php echo $rs->id; ?>" >取消</a>|
				<?php } ?>
                                <!--如果是系统信息，就不允许删除，只可以修改-->
				<!--删除-->
				<A onClick="return confirm('提示:真的要删除此文章吗？');" href="actionco.php?act=del&id=<?php echo  $rs->id; ?>" >删除</A>
				
                </TD>
             </TR>
	  
	  
	  
     <?php }?>
        </tbody>
    </table>
		<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
		<TBODY><TR>
		<TD height=30 >
		&nbsp;&nbsp; &nbsp;&nbsp;<input name=chkall onClick=CheckAll(this.form)  type=button value='全选' style="border:solid 1px #a7b5bc; padding:3px;">
		&nbsp;&nbsp;
		<input name=chkOthers onClick=CheckOthers(this.form)  type=button value='反选' style="border:solid 1px #a7b5bc; padding:3px;">
		&nbsp; 
		<select name="act" style="border:solid 1px #a7b5bc; padding:3px;">
		<option value="del">删除选定文章</option>
		</select>
		
		&nbsp; 
		<input type="submit" value="确定操作" name="submit1"  onClick="return confirm('真的要执行操作吗?')" style="border:solid 1px #a7b5bc; padding:3px;">				</TD>
		</TR>
		</TBODY>
		</TABLE>


		  </FORM>
		
		

  <div  align="center" style=" padding:20px;">
                	<a href="defaultco.php?page=1" >首页</a>
		        <?php echo $PageOut;?>
                <?php echo $PageOut1;?>
				<a href="defaultco.php?page=<?php echo $PageCount; ?>&id_lm=<?php echo $id_lm; ?>" >末页</a>
				<a href="">共<?php echo $PageCount; ?>页</a>
				<font ><?php echo $PageSize; ?></font>条记录/页
				
				共<font ><?php echo $amount; ?></font>条记录
				
				当前第
				<font ><?php echo $page; ?></font>页
				
				 跳到
         <select onChange="javascript:location.href=this.value;" style="border:1px #CCCCCC solid; width:50px;">
			   <?php for($i=1;$i<=$PageCount;$i++){ ?>
			   <option value="defaultco.php?page=<?php echo $i?>&id_lm=<?php echo $id_lm; ?>" <?php if($page==$i){?> selected="selected" <?php } ?>><?php echo $i?></option>
			   <?php } ?>
			   </select>
        页 
                  </div>
    
 
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
</body>
</html>
