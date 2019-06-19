<footer class="pageFooter">
    <div class="wrap">
        <div class="footer_box fix">
            <div class="foot_r r">
<?php 
$sqln="select title_lm from info_lm where id_lm=20";
$retn=$db->query($sqln)->row('array');
?>
                <h4 class="ft_title"><?php echo $retn['title_lm']?></h4>
                <span class="link_l">
<?php 
$sql="select * from info_co where lm=20 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $v){
?>
                <a href="<?php echo $v['linkurl']?>" target="_blank"><?php echo $v['title']?></a> 
                <?php }?>
                </span>
                <div class="ewm_top fix">
<?php 
$sqln="select title,img_sl from info_co where id=33";
$retn=$db->query($sqln)->row('array');
?>
                    <div class="ewm_l l fix"> <span class="ewm_img rect-80 l"> <img src="<?php echo $retn['img_sl']?>" alt="<?php echo $retn['title']?>" /> </span>
                        <h4 class="ewm_title l"><?php echo $retn['title']?></h4>
                    </div>
<?php 
$sqln="select title,img_sl from info_co where id=34";
$retn=$db->query($sqln)->row('array');
?>
                    <div class="ewm_l l fix"> <span class="ewm_img rect-80 l"> <img src="<?php echo $retn['img_sl']?>" alt="<?php echo $retn['title']?>" /> </span>
                        <h4 class="ewm_title l"><?php echo $retn['title']?></h4>
                    </div>
                </div>
            </div>
            <div class="foot_l fix">
                <dl class="l">
<?php 
$sqln="select title_lm from info_lm where id_lm=2";
$retn=$db->query($sqln)->row('array');
?>
                    <dt class="ft_title fix"> <a class="l" href="service.php"><?php echo $retn['title_lm']?></a></dt>
<?php 
$sqln="select title_lm from info_lm where id_lm=8";
$retn=$db->query($sqln)->row('array');
?>
    <dd><a href="service.php?lm=8"><?php echo $retn['title_lm']?></a> </dd>
<?php 
$sqln="select title_lm from info_lm where id_lm=9";
$retn=$db->query($sqln)->row('array');
?>
    <dd><a href="shfw.php?lm=9"><?php echo $retn['title_lm']?></a> </dd>
<?php 
$sqln="select title_lm from info_lm where id_lm=10";
$retn=$db->query($sqln)->row('array');
?>
    <dd><a href="yqzb.php?lm=10"><?php echo $retn['title_lm']?></a> </dd>
<?php 
$sqln="select title_lm from info_lm where id_lm=11";
$retn=$db->query($sqln)->row('array');
?>
    <dd><a href="ccwl.php?lm=11"><?php echo $retn['title_lm']?></a>  </dd>
<?php 
$sqln="select title_lm from info_lm where id_lm=12";
$retn=$db->query($sqln)->row('array');
?>
    <dd><a href="bgfx.php?lm=12"><?php echo $retn['title_lm']?></a> </dd>
                </dl>
                <dl class="l">
<?php 
$sqln="select title_lm from info_lm where id_lm=3";
$retn=$db->query($sqln)->row('array');
?>
                    <dt class="ft_title fix"> <a class="l" href="fwsf.php"><?php echo $retn['title_lm']?></a></dt>
                   
<?php 
$sql="select id,title from info_co where lm=3 and pass=1 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $v){
?>
                            <dd><a href="fwsf.php?id=<?php echo $v['id']?>"><?php echo $v['title']?></a></dd>
                            <?php }?>
                </dl>
                <dl class="l">
<?php 
$sqln="select title_lm from info_lm where id_lm=4";
$retn=$db->query($sqln)->row('array');
?>
                    <dt class="ft_title fix"> <a class="l" href="case.php"><?php echo $retn['title_lm']?></a></dt>
<?php 
$sql="select id_lm,title_lm from info_lm where fid=4 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $v){
?>
                            <dd><a href="case.php?lm=<?php echo $v['id_lm']?>"><?php echo $v['title_lm']?></a></dd>
                            <?php }?>
                </dl>
                <dl class="l">
<?php 
$sqln="select title_lm from info_lm where id_lm=5";
$retn=$db->query($sqln)->row('array');
?>
                    <dt class="ft_title fix"> <a class="l" href="about.php"><?php echo $retn['title_lm']?></a></dt>
<?php 
$sqln="select title_lm from info_lm where id_lm=15";
$retn=$db->query($sqln)->row('array');
?>
    <dd> <a href="about.php?lm=15"><?php echo $retn['title_lm']?></a></dd>
    <?php 
$sqln="select title_lm from info_lm where id_lm=16";
$retn=$db->query($sqln)->row('array');
?>
   <dd> <a href="culture.php?lm=16"><?php echo $retn['title_lm']?></a></dd>
<?php 
$sqln="select title_lm from info_lm where id_lm=17";
$retn=$db->query($sqln)->row('array');
?>
    <dd> <a href="contact.php?lm=17"><?php echo $retn['title_lm']?></a></dd>
                    
                </dl>
                <dl class="l">
<?php 
$sqln="select title_lm from info_lm where id_lm=6";
$retn=$db->query($sqln)->row('array');
?>
                    <dt class="ft_title fix"> <a class="l" href="job.php"><?php echo $retn['title_lm']?></a></dt>
<?php 
$sqln="select title_lm from info_lm where id_lm=18";
$retn=$db->query($sqln)->row('array');
?>
    <dd><a href="job.php?lm=18"><?php echo $retn['title_lm']?></a></dd>
    <?php 
$sqln="select title_lm from info_lm where id_lm=19";
$retn=$db->query($sqln)->row('array');
?>
    <dd><a href="new.php?lm=19"><?php echo $retn['title_lm']?></a></dd>
                </dl>
            </div>
        </div>
        <div class="foot_bar fix">
            <div class="l"> <?php 
$sqln="select * from `set` where id=1";
$retn=$db->query($sqln)->row('array');
?>
<?php echo $retn['copyright']?> <a href="<?php echo $retn['record_url']?>" target="_blank"><?php echo $retn['record']?></a>
                <div class="foot_ewm"> <i class="ewm_ico"></i> <span class="ewm_pic">
                <?php 
$sqln="select title,img_sl from info_co where id=33";
$retn=$db->query($sqln)->row('array');
?>
                <img alt="<?php echo $retn['title']?>" src="<?php echo $retn['img_sl']?>" /></span> </div>
                <span class="ft_share bdsharebuttonbox" data-tag="share_ft"> <a class="bds_tsina" data-cmd="tsina"></a> <a class="bds_sqq" data-cmd="sqq"></a> <a class="bds_weixin" data-cmd="weixin"></a> </span> </div>
        </div>
    </div>
</footer>