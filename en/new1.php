<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$id=(int)$_GET['id'];
$sqlguanjian="select * from info_co where id={$id}";
$rsguanjian=$db->query($sqlguanjian)->row('array');
$wtime=$rsguanjian['wtime'];
?>
<title><?php echo $rsguanjian['title'];?></title>
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
<div class="mem">
    <div class="wh1200 wow fadeInUp ">
<?php 
$sqln="select title_lm from info_lm where id_lm=1";
$retn=$db->query($sqln)->row('array');
?>
        <div class="crumbs f-cb">Position： <a href="index.php"><?php echo $retn['title_lm']?></a> &gt; 
<?php 
$sqln="select title_lm from info_lm where id_lm=19";
$retn=$db->query($sqln)->row('array');
?>
        <a href="new.php"><?php echo $retn['title_lm']?></a> &gt; <?php echo $rsguanjian['title']?> </div>
    </div>
</div>
<section class="channel_content">
    <div class="wrap wow fadeInUp"> 
        <article class="widget-newsdetail-8 fix">
            <div class="n_left">
                <header class="_head">
                    <h1 class="_title"><?php echo $rsguanjian['title']?></h1>
                    <div class="_tools fix"> <span class="_tool">Time：<?php echo date("Y.m.d",$wtime)?></span> <span class="_tool" id="switcher"> <i class="_title">Source：<?php echo $rsguanjian['e_title']?></i> </span> </div>
                </header>
                <div class="myart fix">
                   <?php echo $rsguanjian['z_body']?>
                </div>
            </div>
            <div class="pageflip">
<?php 
$sqlup="select id,lm,title from info_co where lm=19 and wtime<{$wtime} and pass=1 order by wtime desc limit 1";
$retup=mysql_query($sqlup);
$rsup=mysql_fetch_assoc($retup);
?>
<?php if ($rsup){?><a class="next" href="new1.php?id=<?php echo $rsup['id']?>&lm=<?php echo $rsup['lm']?>">Next：<?php echo $rsup['title']?></a><?php }else {echo '<a class="next">Next：No</a>';}?>
          
<?php 
$sqldn="select id,lm,title from info_co where lm=19 and wtime>{$wtime} and pass=1 order by wtime limit 1";
$retdn=mysql_query($sqldn);
$rsdn=mysql_fetch_assoc($retdn);
?>      
<?php if ($rsdn){?><a class="previous_no" href="new1.php?id=<?php echo $rsdn['id']?>&lm=<?php echo $rsdn['lm']?>">Prev：<?php echo $rsdn['title']?></a><?php }else {echo '<a class="previous_no">Prev：No</a>';}?>   

            
            </div>
            <div class="n_right">
                <div class="_tools fix"> <span class="_tool _back"><a href="javascript:history.go(-1);">Return</a></span></div>
            </div>
        </article>
    </div>
</section>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
