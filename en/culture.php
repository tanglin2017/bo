<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$sqlguanjian="select * from info_lm where id_lm=16";
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
<script src="resources/web/seajs.config.js" id="seajsConfig" domain="/en"></script>
</head>
<body>
<!--header-->
<?php include 'head.php';?>
<!--header end-->
<?php 
$sqln="select * from info_lm where id_lm=5";
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
$sqln="select title_lm from info_lm where id_lm=15";
$retn=$db->query($sqln)->row('array');
?>
    <a href="about.php?lm=15"><?php echo $retn['title_lm']?></a> 
    <?php 
$sqln="select title_lm from info_lm where id_lm=16";
$retn=$db->query($sqln)->row('array');
?>
    <a href="culture.php?lm=16" class="now"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=17";
$retn=$db->query($sqln)->row('array');
?>
    <a href="contact.php?lm=17"><?php echo $retn['title_lm']?></a> 
    </div>
</div>
<?php 
$sqln="select * from info_co where id=19";
$retn=$db->query($sqln)->row('array');
?>
<section class="about_zhongw">
    <div class="wrap">
        <div class="ctapanel">
            <div class="cta1 clearfix">
                <div class="txts  wow fadeInUp">
                    <div class="abTitle swTitle2 ctaTitle">
                        <p class="ch"><?php echo $retn['title']?></p>
                        <p class="en"><?php echo $retn['e_title']?></p>
                    </div>
                    <div class="txb">
                      <?php echo $retn['z_body']?>
                    </div>
                </div>
                <div class="pic scapic transX trtion dly_2 transShow wow fadeInUp"><img src="<?php echo $retn['img_sl']?>" alt="<?php echo $retn['title'];?>"></div>
            </div>
        </div>
    </div>
</section>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
