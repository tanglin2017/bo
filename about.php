<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$lm=(int)$_GET['lm'];
if($lm==0){
$sqlguanjian="select * from info_lm where id_lm=5";
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
<script src="resources/web/seajs.config.js" id="seajsConfig" domain="http://www.blueoceancenter.net/"></script>
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
    <a href="about.php?lm=15" class="now"><?php echo $retn['title_lm']?></a> 
    <?php 
$sqln="select title_lm from info_lm where id_lm=16";
$retn=$db->query($sqln)->row('array');
?>
    <a href="culture.php?lm=16"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=17";
$retn=$db->query($sqln)->row('array');
?>
    <a href="contact.php?lm=17"><?php echo $retn['title_lm']?></a> 
    </div>
</div>
<?php 
$sqln="select * from info_co where id=18";
$retn=$db->query($sqln)->row('array');
?>
<section class="about_zhongw">
    <div class="wrap">
        <div class="postbody wow fadeInUp">
            <table>
                <tbody>
                    <tr class="firstRow">
                        <td style="word-break: break-all; width:550px;" valign="top" width="550"><p> <span style="color: rgb(38, 38, 38);"></span><img src="<?php echo $retn['img_sl']?>" width="550" height="" border="0" vspace="0" alt="<?php echo $retn['title']?>"> </p></td>
                        <td valign="top" width="40"></td>
                        <td style="word-break: break-all;" valign="top" width="650"><?php echo $retn['f_body']?></td>
                    </tr>
                </tbody>
            </table>
            <p class="ordinary-output target-output" style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-align: center;"> <br>
            </p>
            <hr>
            <p> <br>
            </p>
            <p class="ordinary-output target-output" style="text-align: left;"> <span style="font-family: 微软雅黑, 'Microsoft YaHei'; font-size: 20px; color:#005293;"><?php echo $retn['linkurl']?></span> </p>
            <p class="ordinary-output target-output"> <span style="color: rgb(51, 51, 51); font-family: 微软雅黑, 'Microsoft YaHei'; font-size: 20px;"><br>
                </span> </p>
            <?php echo $retn['z_body']?>
            <p> <br>
            </p>
            <p> <br>
            </p>
            <table style="width: 1200px;">
                <tbody>
<?php 
$sql="select * from pro_album where pro_id=18 order by px";
$jilushu=$db->query($sql)->num_rows();
$num=$jilushu-($jilushu%3);
$sql="select * from pro_album where pro_id=18 order by px limit {$num}";
$ret=$db->query($sql)->result('array');
foreach ($ret as $k=>$v){
    if($k%3==0){
?>
                    <tr class="firstRow">
                    <?php }?>
                        <td style="word-break: break-all;" width="392" valign="top"><p> <img alt="<?php echo $v['img_desc']?>"  src="<?php echo $v['img_url']?>" style="text-align: center; white-space: normal;" width="392" vspace="0" border="0" height=""> </p>
                            <p> <br>
                            </p>
                            <p style="text-align:center;"> <?php echo $v['img_desc']?></p>
                            <p> <br>
                            </p></td>
                        <?php if($k%3!=2){?><td width="10" valign="top"></td><?php }?>
                   <?php if($k%3==2){?> </tr><?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
