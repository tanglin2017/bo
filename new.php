<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$sqlguanjian="select * from info_lm where id_lm=19";
$rsguanjian=$db->query($sqlguanjian)->row('array');
?>
<title><?php echo $rsguanjian['title_lm'];?></title>
<meta name="keywords" content="<?php echo $rsguanjian['keywords']?>">
<meta name="description" content="<?php echo $rsguanjian['description']?>">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta name="format-detection" content="telephone=no" />
<link href="images/logo1.png" rel="shortcut icon">
<link rel="stylesheet" href="css/ui.css" />
<link rel="stylesheet" href="css/grid12.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/animate.css" />
<script src="resources/modules/seajs/sea.js" id="seajsnode"></script>
<script src="resources/web/seajs.config.js" id="seajsConfig" domain="http://www.blueoceancenter.net/"></script>
</head>
<body>
<!--header-->
<?php include 'head.php';?>
<!--header end-->
<?php 
$sqln="select * from info_lm where id_lm=6";
$retn=$db->query($sqln)->row('array');
?>
<div class="xc_banner">
    <div class="img_box"> <img src="<?php echo $retn['img_url']?>" alt="<?php echo $retn['title_lm']?>" /> </div>
    <div class="banner_text">
        <div class="banner_text_box">
            <h2 class="page_title"><?php echo $retn['title_en']?></h2>
        </div>
    </div>
</div>
<div class="apageNav clearfix wow fadeInUp">
    <div class="wh1200"> 
<?php 
$sqln="select title_lm from info_lm where id_lm=18";
$retn=$db->query($sqln)->row('array');
?>
    <a href="job.php?lm=18"><?php echo $retn['title_lm']?></a> 
    <?php 
$sqln="select title_lm from info_lm where id_lm=19";
$retn=$db->query($sqln)->row('array');
?>
    <a href="new.php?lm=19" class="now"><?php echo $retn['title_lm']?></a> 
</div>
</div>
<div class="news-wrap">
    <div class="list-wrap">
        <div class="wh1200">
            <ul class="newsList">
<?php 
$ss=mysql_real_escape_string($_GET['ss']);
if($ss==null){
$sql="select * from info_co where lm=19 and pass=1";
}else {
$sql="select * from info_co where lm=19 and pass=1 and (title like '%{$ss}%' or z_body like '%{$ss}%')"; 
}
$jilushu=$db->query($sql)->num_rows();
$zongyeshu=ceil(($jilushu/6));
$yeshu=$_GET['ye']==null?1:(int)$_GET['ye'];
$qidian=($yeshu-1)*6;
if($ss==null){
$sql="select * from info_co where lm=19 and pass=1 order by wtime desc limit {$qidian},6";
}else {
$sql="select * from info_co where lm=19 and pass=1 and (title like '%{$ss}%' or z_body like '%{$ss}%') order by wtime desc limit {$qidian},6";    
}
$query=$db->query($sql);		
$list = $query->result("array");
foreach($list as $v) {
?> 
                <li class="wow fadeInUp">
                    <article> <a href="new1.php?id=<?php echo $v['id']?>"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>">
                        <div class="texd">
                            <h4><?php echo $v['title']?></h4>
                            <font><?php echo date("Y年m月d日",$v['wtime'])?></font> <i>&nbsp;</i>
                            <p><?php echo mb_substr(trim(strip_tags($v['z_body'])), 0,35,'utf-8').'...';?></p>
                            <span>查看详情</span> </div>
                        </a> </article>
                </li>
                <?php }?>
   
            </ul>
            <div class="page wow fadeInUp">
<a href='new.php?ye=<?php $yes=$yeshu-1;echo $yes<1?1:$yes;?>&ss=<?php echo $ss;?>'>上一页</a>
<?php 
for ($i=1;$i<=$zongyeshu;$i++){
?>
<a <?php if ($i==$yeshu){echo 'class="ahover"';}?> href='new.php?ye=<?php echo $i;?>&ss=<?php echo $ss;?>'><?php echo $i?></a>
<?php }?>
<a href='new.php?ye=<?php $yex=$yeshu+1;echo $yex>$zongyeshu?$zongyeshu:$yex;?>&ss=<?php echo $ss;?>'>下一页</a>
   
            </div>
        </div>
    </div>
</div>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
