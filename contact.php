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
                        alert("请输入您的姓名");
                        document.guestbookform.name.focus();
                        return false;
                    }
                	if(document.guestbookform.company.value.length == 0){
                        alert("请输入您的公司名称");
                        document.guestbookform.company.focus();
                        return false;
                    }
                	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
                	var r=document.getElementById("email").value;
                	if(reg.test(r)==false){
                     alert("请输入您正确的电子邮箱");
                     document.getElementById("email").focus();
                     return false;
                	}
                	if(document.guestbookform.tel.value.length == 0){
                        alert("请输入您的电话");
                        document.guestbookform.tel.focus();
                        return false;
                    }
                	if(document.guestbookform.address.value.length == 0){
                        alert("请输入您所需服务项目");
                        document.guestbookform.address.focus();
                        return false;
                    }
                	if(document.guestbookform.body.value.length == 0){
                        alert("请输入留言内容");
                        document.guestbookform.body.focus();
                        return false;
                    }
                }
                
            </script>
          <form onSubmit="return CheckBookForm();" method="post" name="guestbookform" action="guest_add.php">
                        <p>
                            <label> 姓名: </label>
                            <input id="name" name="name" maxlength="20" type="text" datatype="*" nullmsg="请输入姓名！" sucmsg="验证通过！" errormsg="请输入姓名！">
                            <i>*</i> <span class="Validform_checktip"></span></p>
                        <p>
                            <label> 公司名称: </label>
                            <input id="company" name="company" maxlength="20" type="text">
                        </p>
                        <p>
                            <label> 邮箱: </label>
                            <input id="email" name="email" maxlength="50" datatype="e" nullmsg="请输入邮箱！" type="text" sucmsg="验证通过！" errormsg="邮箱地址格式不对！">
                            <i>*</i> <span class="Validform_checktip"></span></p>
                        <p>
                            <label> 电话: </label>
                            <input id="tel" name="tel" maxlength="20" datatype="m" nullmsg="请输入电话！" type="text" sucmsg="验证通过！" errormsg="请填写手机号码！">
                            <i>*</i> <span class="Validform_checktip"></span></p>
                        <p>
                            <label> 所需服务项目: </label>
                            <input id="address" name="address" maxlength="40" type="text">
                        </p>
                        <p style="width:100%;">
                            <label> 内容: </label>
                            <textarea id="content-33779_content" name="body"></textarea>
                        </p>
                        <p class="form_btn">
                            <input type="submit" class="btn sub" value="提交表单">
                            <input type="reset" class="btn" value="重置信息">
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
