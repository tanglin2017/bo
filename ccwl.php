<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$sqlguanjian="select * from info_lm where id_lm=11";
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
    <a href="service.php?lm=8"><?php echo $retn['title_lm']?></a> 
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
    <a href="ccwl.php?lm=11" class="now"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=12";
$retn=$db->query($sqln)->row('array');
?>
    <a href="bgfx.php?lm=12"><?php echo $retn['title_lm']?></a>
    </div>
</div>
<section class="about_zhongw">
    <div class="wrap">
        <ul>
<?php 
$sql="select * from info_co where lm=11 and pass=1 order by px";
$jilushu=$db->query($sql)->num_rows();
$ret=$db->query($sql)->result('array');
foreach ($ret as $k=>$v){
    if($k%2==0){
?>
            <li class="odd">
                <div class="list_box fix">
                    <div class="list_text l wow fadeInLeft">
                        <div class="list_text_box">
                            <h3 class="list_title"><?php echo $v['title']?></h3>
                            <?php echo $v['z_body']?>
                        </div>
                    </div>
                    <div class="list_img imgZoom r wow fadeInRight"> <span class="rect-75"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>" class="_full" /> </span> </div>
                </div>
            </li>
            <?php if(($k+1)!=$jilushu){?><li><hr></li><?php }?>
            <?php }else {?>
            <li class="even">
                <div class="list_box fix">
                    <div class="list_img imgZoom l wow fadeInLeft"> <span class="rect-75"> <img src="<?php echo $v['img_sl']?>" alt="<?php echo $v['title']?>" class="_full" /> </span> </div>
                    <div class="list_text r wow fadeInRight">
                        <div class="list_text_box">
                            <h3 class="list_title"><?php echo $v['title']?></h3>
                            <?php echo $v['z_body']?>
                        </div>
                    </div>
                </div>
            </li>
            <?php if(($k+1)!=$jilushu){?><li><hr></li><?php }?>
            <?php }}?>
        </ul>
    </div>
</section>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
