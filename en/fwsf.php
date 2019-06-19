<?php include 'master/init.php';?>
<!doctype html>
<html>
<head>
<?php 
$id=(int)$_GET['id'];
if($id==0){
$sqlguanjian="select * from info_lm where id_lm=3";
}else {
$sqlguanjian="select * from info_co where id={$id}";  
}
$rsguanjian=$db->query($sqlguanjian)->row('array');
?>
<title><?php if($id==0){echo $rsguanjian['title_lm'];}else {echo $rsguanjian['title'];}?></title>
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
$sqln="select * from info_lm where id_lm=3";
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
$sqlmoren="select id from info_co where lm=3 and pass=1 order by px limit 1";
$rsmoren=$db->query($sqlmoren)->row('array');
$id=$_GET['id']==null?$rsmoren['id']:(int)$_GET['id'];
$sql="select id,title from info_co where lm=3 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $v){
?>
    <a href="fwsf.php?id=<?php echo $v['id']?>" <?php if($id==$v['id']){?>class="now"<?php }?>><?php echo $v['title']?></a>  
    <?php }?>
    </div>
</div>
<section class="channel_content">
<?php 
$sqln="select * from info_co where id={$id}";
$retn=$db->query($sqln)->row('array');
?>
    <section class="wrap wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="biaoge_l">
            <?php echo $retn['z_body']?>
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
        <div class="clear"></div>
    </section>
</section>
<?php include 'foot.php';?>
<script type="text/javascript">
seajs.use('js/index');
</script>
</body>
</html>
