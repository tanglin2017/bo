<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$lm=$_GET['lm']==null?2:(int)$_GET['lm'];
$sqlguanjian="select * from info_lm where id_lm={$lm}";
$rsguanjian=$db->query($sqlguanjian)->row('array');
?>
<title><?php echo $rsguanjian['title_lm']?></title>
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
$sqln="select * from info_lm where id_lm=2";
$retn=$db->query($sqln)->row('array');
?>
<div class="about_banner ">
    <div class="img_box"> <img src="<?php echo $retn['img_url']?>" alt="<?php echo $retn['title_lm']?>" />
        <div class="onbanner">
            <div class="wrap">
                <div class="onbanner_box">
                    <div class="title1"> <?php echo $retn['title_en']?> </div>
                    <div class="title2"> <?php echo $retn['jianjie']?> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="apageNav clearfix wow fadeInUp">
    <div class="wh1200"> 
<?php 
$sqln="select title_lm from info_lm where id_lm=8";
$retn=$db->query($sqln)->row('array');
?>
    <a href="service.php?lm=8" class="now"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=9";
$retn=$db->query($sqln)->row('array');
?>
    <a href="shfw.php?lm=9"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=10";
$retn=$db->query($sqln)->row('array');
?>
    <a href="yqzb.php?lm=10"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=11";
$retn=$db->query($sqln)->row('array');
?>
    <a href="ccwl.php?lm=11"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=12";
$retn=$db->query($sqln)->row('array');
?>
    <a href="bgfx.php?lm=12"><?php echo $retn['title_lm']?></a>
    </div>
</div>
<section class="channel_content">
    <section class="wrap wow fadeInUp">
        <div class="text_a">
<?php 
$sqln="select * from info_lm where id_lm=8";
$retn=$db->query($sqln)->row('array');
?>
            <p><span style="color: #005293; font-size: 24px;"><?php echo $retn['title_lm']?></span></p>
            <p><span style="color: #333; "></span>&nbsp;</p>
<?php echo $retn['neirong']?>
            <p style="border-top:1px dotted  #ccc; margin-top:30px; margin-bottom:10px;"> <br></p>
        </div>
        <div class="wh1200">
            <div class="media">
                <div class="text_b">
                    <p><span style="color: #005293; font-size: 24px;">流程</span></p>
                    <p>&nbsp; </p>
                </div>
                <div class="list">
                    <ul>
<?php 
$sql="select * from info_co where lm=8 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $k=>$v){
?>
                        <li class="wow <?php if($k%2==0){?>fadeInLeft<?php }else {?>fadeInRight<?php }?>">
                            <div class="pic"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>"> </div>
                            <div class="txt">
                                <h3><?php echo $v['title']?></h3>
                                <p><?php echo $v['f_body']?></p>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</section>
<div class="clear"></div>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
