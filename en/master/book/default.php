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
 function CheckOthers(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
			if (e.checked==false)
			{
				e.checked = true;
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
			e.checked = true;
	}
}
</script>
</head>
<body leftmargin='2' topmargin='1' marginwidth='0' marginheight='0'>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="../main.php">首页</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
<FORM name=myform   action="action.php" method=post>
    <table class="tablelist">
    	<thead>
    	<tr>
    	<th>选中</th>
        <th style="text-align:center">ID</th>
        <th style="text-align:center">姓名</th>
        <th style="text-align:center">公司名称</th>
        <th style="text-align:center">邮箱</th>
        <th style="text-align:center">电话</th>
        <th style="text-align:center">服务项目</th>
        <th style="text-align:center">留言内容</th>
        <th style="text-align:center">留言时间</th>
        <th style="text-align:center">常规管理操作</th>
        </tr>
        </thead>
		
        <tbody>
		
<?php
$sql="select * from book where id_re=0  and huifu=0 order by id desc";
$query = $db->query($sql);
$numrows = $query->num_rows();
/*************************************
*
*分页程序开始
*
**************************************/
$page = new pages(20, $numrows);
$query = $db->query($sql . $page->offset);
$list = $query->result();
$a=1;
foreach($list as $rs) { 
?>
	   <TR class=tdbg>
	           <TD align=middle width="50"><input type=checkbox name="id[]" value='<?php echo $rs->id; ?>' ></TD>
               <TD align=middle><?php echo $rs->id;?></TD>
               <TD align=middle><?php echo $rs->name;?></TD>
               <TD align=middle><?php echo $rs->company;?></TD>
               <TD align=middle><?php echo $rs->email;?></TD>
               <TD align=middle><?php echo $rs->tel;?></TD>
               <TD align=middle><?php echo $rs->address;?></TD>
			   <TD align=middle><?php echo $rs->body;?></TD>
               <TD align=middle><?php  echo date('Y-m-d:H:i:s', $rs->wtime);?></TD>
               <TD align=center><A onClick="return confirm('确定要删除此留言吗？');" href="action.php?act=del&id=<?php echo $rs->id;?>" >删除</A></TD>
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
  <div  align="center" style="color:#333333; padding-top:20px;">
                  <?php echo $page->page_html($page->page_info());?>
                  </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="../images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
</body>
</html>
