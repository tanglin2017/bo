<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$sqlguanjian="select * from info_lm where id_lm=17";
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
    <a href="culture.php?lm=16"><?php echo $retn['title_lm']?></a> 
<?php 
$sqln="select title_lm from info_lm where id_lm=17";
$retn=$db->query($sqln)->row('array');
?>
    <a href="contact.php?lm=17" class="now"><?php echo $retn['title_lm']?></a> 
    </div>
</div>
<?php 
$sqln="select * from info_co where id=20";
$retn=$db->query($sqln)->row('array');
?>
<section class="lianxiwomen">
    <div class="wrap">
        <div class="lianxi_box">
            <div class="map_area wow fadeInUp">
                <div id="map-41160" style="width: 63.5%;height:374px;"><img src="<?php echo $retn['img_sl']?>" alt="<?php echo $retn['title']?>" width="100%"></div>
                <div class="map_mes">
                    <div class="mm_box">
                        <div class="zongbu">
                           <?php echo $retn['f_body']?>
                        </div>
                        <p>&nbsp; &nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="zixun wow fadeInUp">
                <div class="title"> <?php echo $retn['linkurl']?> </div>
                <div class="zixun_area fix">
                    <?php echo $retn['z_body']?>
                </div>
            </div>
        </div>
        <div class="biaoge_r">
            <div id="form">
                <div class="content-33779">
          <script Language="javascript">  
                function CheckBookForm(){
                	if(document.guestbookform.name.value.length == 0){
                        alert("Please enter your name");
                        document.guestbookform.name.focus();
                        return false;
                    }
                	if(document.guestbookform.company.value.length == 0){
                        alert("Please enter your company name");
                        document.guestbookform.company.focus();
                        return false;
                    }
                	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
                	var r=document.getElementById("email").value;
                	if(reg.test(r)==false){
                     alert("Please enter your correct e-mail address");
                     document.getElementById("email").focus();
                     return false;
                	}
                	if(document.guestbookform.tel.value.length == 0){
                        alert("Please enter your phone number");
                        document.guestbookform.tel.focus();
                        return false;
                    }
                	if(document.guestbookform.address.value.length == 0){
                        alert("Please enter your required service item");
                        document.guestbookform.address.focus();
                        return false;
                    }
                	if(document.guestbookform.body.value.length == 0){
                        alert("Please input message content");
                        document.guestbookform.body.focus();
                        return false;
                    }
                }
                
            </script>
          <form onSubmit="return CheckBookForm();" method="post" name="guestbookform" action="guest_add.php">
                        <p>
                            <label> Name: </label>
                            <input id="name" name="name" maxlength="20" type="text">
                            <i>*</i> <span class="Validform_checktip"></span></p>
                        <p>
                            <label> Corporate: </label>
                            <input id="company" name="company" maxlength="20" type="text">
                        </p>
                        <p>
                            <label> Email: </label>
                            <input id="email" name="email" maxlength="50">
                            <i>*</i> <span class="Validform_checktip"></span></p>
                        <p>
                            <label> Telephone: </label>
                            <input id="tel" name="tel" maxlength="20">
                            <i>*</i> <span class="Validform_checktip"></span></p>
                        <p>
                            <label> Service: </label>
                            <input id="address" name="address" maxlength="40" type="text">
                        </p>
                        <p style="width:100%;">
                            <label> Content: </label>
                            <textarea id="content-33779_content" name="body"></textarea>
                        </p>
                        <p class="form_btn">
                            <input type="submit" class="btn sub" value="Submit">
                            <input type="reset" class="btn" value="Reset">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
