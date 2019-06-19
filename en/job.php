<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$lm=(int)$_GET['lm'];
if($lm==0){
$sqlguanjian="select * from info_lm where id_lm=6";
}else {
$sqlguanjian="select * from info_lm where id_lm={$lm}";
}
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
    <a href="job.php?lm=18" class="now"><?php echo $retn['title_lm']?></a> 
    <?php 
$sqln="select title_lm from info_lm where id_lm=19";
$retn=$db->query($sqln)->row('array');
?>
    <a href="new.php?lm=19"><?php echo $retn['title_lm']?></a> 
</div>
</div>
<?php 
$sqln="select * from info_lm where id_lm=18";
$retn=$db->query($sqln)->row('array');
?>
<div class="contact-centa">
    <div class="w1210">
        <section class="mainBox">
            <div class="jnheader wow fadeInUp">
                <p class="jntitle"><?php echo $retn['title_lm']?></p>
                <p class="jndescription"><?php echo $retn['jianjie']?></p>
                <p class="jndescription2"><?php echo $retn['neirong']?></p>
            </div>
            <ul class="joinList wow fadeInUp">
<?php 
$sql="select * from info_co where lm=18 and pass=1";
$jilushu=$db->query($sql)->num_rows();
$zongyeshu=ceil(($jilushu/6));
$yeshu=$_GET['ye']==null?1:(int)$_GET['ye'];
$qidian=($yeshu-1)*6;

$sql="select * from info_co where lm=18 and pass=1 order by px limit {$qidian},6";
$query=$db->query($sql);		
$list = $query->result("array");
foreach($list as $v) {
?> 
                <li class="">
                    <div> <i><?php echo $v['title']?></i> <span></span> <font><small>Recruit：<?php echo $v['e_title']?></small>  <small>Place：<?php echo $v['linkurl']?></small> <small>Education：<?php echo $v['info_author']?> </small> <small>Nature：<?php echo $v['color']?></small> </font> </div>
                    <article style="display: none;">
                        <section>
                            <?php echo $v['z_body']?>
                        </section>
                        <section>
                            <h4>Application Method：</h4>
                            <p><?php echo $retn['neirong']?></p>
                        </section>
                    </article>
                </li>
                <?php }?>
            </ul>
            <div class="page">
<a href='job.php?ye=<?php $yes=$yeshu-1;echo $yes<1?1:$yes;?>'>Prev</a>
<?php 
for ($i=1;$i<=$zongyeshu;$i++){
?>
<a <?php if ($i==$yeshu){echo 'class="ahover"';}?> href='job.php?ye=<?php echo $i;?>'><?php echo $i?></a>
<?php }?>
<a href='job.php?ye=<?php $yex=$yeshu+1;echo $yex>$zongyeshu?$zongyeshu:$yex;?>'>Next</a>
            
            </div>
        </section>
    </div>
</div>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
