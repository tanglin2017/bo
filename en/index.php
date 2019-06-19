<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$sqlguanjian="select * from `set` limit 1";
$rsguanjian=$db->query($sqlguanjian)->row('array');
?>
<title><?php echo $rsguanjian['title']?></title>
<meta name="keywords" content="<?php echo $rsguanjian['keywords']?>">
<meta name="description" content="<?php echo $rsguanjian['description']?>">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta name="format-detection" content="telephone=no" />

<script type="text/javascript"> 
<?php if($_GET['yu']==null){?>
var Browser_Agent=navigator.userAgent; 
//浏览器为ie的情况 
if(Browser_Agent.indexOf("MSIE")!=-1){ 
var a=navigator.browserLanguage; 
if(a !="zh-cn"){ 
location.href="http://www.blueoceancenter.net/en/"; 
} 
} 
//浏览器非ie的情况 
else{ 
var b=navigator.language; 
if(b!="zh-CN"){ 
location.href="http://www.blueoceancenter.net/en/"; 
} 
} 
<?php }?>
</script> 

<link href="images/logo1.png" rel="shortcut icon">
<link rel="stylesheet" href="css/ui.css" />
<link rel="stylesheet" href="css/grid12.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/animate.css" />
<script src="resources/modules/seajs/sea.js" id="seajsnode"></script>
<script src="resources/web/seajs.config.js" id="seajsConfig" domain="/en"></script>
</head>
<body>
<!--header-->
<?php include 'head.php';?>
<!--header end--> 
<!--banner-->
<div class="i_banner wow fadeIn"> 
    <!--banner-->
    <div class="i_banner wow fadeIn">
        <ul>
<?php 
$sql="select * from info_co where lm=22 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $v){
?>
            <li> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>"/>
                <div class="banner_text">
                    <div class="banner_text_box">
                        <h2 class="text_en delay200"> <?php echo $v['title']?>
                               </h2>
                              <h3 class="cn_title"> <?php echo $v['e_title']?></h3>
                        <span class="text_cn delay400">
                        <h3 class="cn_title"> <?php echo $v['info_author']?></h3>
                        <p class="cn_p"><?php echo $v['f_body']?></p>
                        </span> </div>
                </div>
            </li>
            <?php }?>
        </ul>
    </div>
    <!--banner end--> 
</div>
<!--banner end--> 
<!--ipart1-->
<section class="i_part1">
    <div class="wrap">
        <div class="i_part_hd">
<?php 
$sqln="select * from info_lm where id_lm=23";
$retn=$db->query($sqln)->row('array');
?>
            <h3 class="hd_title wow fadeInDown"><?php echo $retn['title_lm']?></h3>
            <p class="hd_p wow fadeInUp"> </p>
<?php echo $retn['jianjie']?>
            <p></p>
        </div>
        <div class="ipart1_bd">
            <ul class="full-row">
<?php 
$sql="select * from info_co where lm=23 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $k=>$v){
    if($k==0){
?>
                <li class="span-4 smal-12 wow fadeInUp delay100 imgZoom  even">
                    <div class="list_box">
                        <div class="text_box tration03"> <span class="rect-5625"> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>">
                            <h3 class="list_title"><?php echo $v['title']?></h3>
                            <p class="list_p"><?php echo $v['f_body']?> </p>
                            </a> </span> </div>
                        <div class="img_box"> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>"> <span class="rect-5625"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>" /> </span></a> </div>
                    </div>
                </li>
                <?php }elseif ($k==1){?>
                <li class="span-4 smal-12 wow fadeInUp delay200 imgZoom  odd">
                    <div class="list_box">
                        <div class="text_box tration03"> <span class="rect-5625"> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>">
                            <h3 class="list_title"><?php echo $v['title']?></h3>
                            <p class="list_p"><?php echo $v['f_body']?></p>
                            </a> </span> </div>
                        <div class="img_box"> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>"> <span class="rect-5625"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>" /> </span></a> </div>
                    </div>
                </li>
                <?php }else {?>
                <li class="span-4 smal-12 wow fadeInUp delay300 imgZoom  even">
                    <div class="list_box">
                        <div class="text_box tration03"> <span class="rect-5625"> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>">
                            <h3 class="list_title"><?php echo $v['title']?></h3>
                            <p class="list_p"><?php echo $v['f_body']?></p>
                            </a> </span> </div>
                        <div class="img_box"> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>"> <span class="rect-5625"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>" /> </span></a> </div>
                    </div>
                </li>
                <?php }}?>
            </ul>
        </div>
    </div>
</section>
<!--ipart1 end--> 
<!--ipart2-->
<?php 
$sqln="select * from info_lm where id_lm=24";
$retn=$db->query($sqln)->row('array');
?>
<section class="ipart2" style="padding: 75px 0px;background: url(<?php echo $retn['img_url']?>) no-repeat center;">
    <div class="wrap">
        <div class="i_part_hd">
            <h3 class="hd_title wow fadeInDown"><?php echo $retn['title_lm']?></h3>
            <p class="hd_p wow fadeInUp"><?php echo $retn['jianjie']?></p>
            <a href="about.php" class="more_btn"> More<i class="ico ico1_4"></i> </a> </div>
        <div class="ipart2_bd wow fadeInDown">
            <ul class="row">
<?php 
$sql="select * from info_co where lm=24 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $v){
?>
                <li class="span-3 smal-12">
                    <div class="list_box"> <span class="list_num"> <i class="number number1"><?php echo $v['title']?></i><em><?php echo $v['e_title']?></em> </span> <span class="list_title"><?php echo $v['info_author']?></span> </div>
                </li>
                <?php }?>
            </ul>
        </div>
        <div class="data"> <?php echo $retn['title_en']?> </div>
    </div>
</section>
<!--ipart2 end--> 
<!--ipart3-->
<section class="i_part3">
    <div class="wrap">
        <div class="i_part_hd">
<?php 
$sqln="select * from info_lm where id_lm=25";
$retn=$db->query($sqln)->row('array');
?>
            <h3 class="hd_title wow fadeInDown"><?php echo $retn['title_lm']?></h3>
            <p class="hd_p wow fadeInUp"><?php echo $retn['jianjie']?></p>
        </div>
        <div class="i_part3_bd">
            <ul class="row" id="zwNews">
<?php 
$sql="select * from info_co where lm=25 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $k=>$v){
    if($k==0){
?>
                <li class="span-4 smal-12 wow fadeInUp delay100" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="list_box imgZoom"> <a href="<?php echo $v['linkurl']?>" class="rect-5625" title="<?php echo $v['title']?>"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>"> </a> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>" class="list_text">
                        <h3 class="list_title el"><?php echo $v['title']?></h3>
                        <p class="list_p"><?php echo $v['f_body']?></p>
                        <span class="list_time"> More </span> </a> </div>
                </li>
                <?php }else {?>
                <li class="span-4 smal-12 wow fadeInUp delay100" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="list_box imgZoom"> <a href="<?php echo $v['linkurl']?>" class="rect-5625" title="<?php echo $v['title']?>"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>"> </a> <a href="<?php echo $v['linkurl']?>" title="<?php echo $v['title']?>" class="list_text">
                        <h3 class="list_title el"><?php echo $v['title']?></h3>
                        <p class="list_p"><?php echo $v['f_body']?></p>
                        <span class="list_time"> More </span> </a> </div>
                </li>
                <?php }}?>
            </ul>
        </div>
    </div>
</section>
<!--ipart3 end--> 
<!--ipart4-->
<?php 
$sqln="select * from info_co where id=48";
$retn=$db->query($sqln)->row('array');
?>
<section class="ipart4 wow fadeInUp">
    <div class="img_box"> <img src="<?php echo $retn['img_sl']?>" alt="<?php echo $retn['title']?>"  />
        <div class="vide_cover">
            <i class="video_ico"><?php echo $retn['title']?></i>
            <h3 class="video_title"><?php echo $retn['f_body']?></h3>
            <a href="job.php" class="more_btn gd"> More <i class="ico ico1_4"></i> </a> </div>
    </div>
</section>
<!--ipart4 end-->
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>

