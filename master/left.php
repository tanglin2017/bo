<?php include 'init.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>信息分类</div>
    
    <dl class="leftmenu">
<!--     <dd> -->
<!--     <div class="title"> -->
<!--     <span><img src="images/leftico01.png" /></span>内容管理 -->
<!--     </div> -->
<!--     	<ul class="menuson"> -->
<!--         <li><cite></cite><a href="info_lm/default.php" target="rightFrame">栏目分类</a><i></i></li> -->
<!-- 		<li><cite></cite><a href="info_co/default.php" target="rightFrame">详细信息</a><i></i></li> -->
<!--         </ul>     -->
<!--     </dd> -->
    <?php 
    $sql="select * from info_lm where fid=0 order by id_lm";
    $ret=$db->query($sql)->result('array');//所有结果（二维数组）
    foreach ($ret as $v){
    ?>
    <dd>
    <div class="title">
    <span><img src="images/leftico01.png" /></span><?php echo $v['title_lm']?>
    </div>
    	<ul class="menuson">
        <li><cite></cite><a href="column<?php echo $v['id_lm']?>/default.php?id_lm=<?php echo $v['id_lm']?>" target="rightFrame">栏目分类</a><i></i></li>
		<li><cite></cite><a href="column<?php echo $v['id_lm']?>/defaultco.php?id_lm=<?php echo $v['id_lm']?>" target="rightFrame">详细信息</a><i></i></li>
        </ul>    
    </dd>
    <?php }?>
	<dd>
    <div class="title">
    <span><img src="images/leftico01.png" /></span>留言管理
    </div>
    	<ul class="menuson">
		<li><cite></cite><a href="book/default.php" target="rightFrame">留言管理</a><i></i></li>
        </ul>    
    </dd>
    <dd>
    <div class="title">
    <span><img src="images/leftico02.png" /></span>系统配置
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="set/set.php" target="rightFrame">网站设置</a><i></i></li>
        <li><cite></cite><a href="admin_update.php" target="rightFrame">变更用户</a><i></i></li>
        </ul>     
    </dd> 
    </dl>
</body>
</html>
