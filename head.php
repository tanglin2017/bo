<header class="pageHeader tration03">
    <div class="wrap fix">
        <div class="head_r r">
            <div class="top_bar">
                <ul class="fix">
                    <li class="hd_link"> <a href="https://www.blueoceancenter.com/login.html#" target="_blank">登录</a></li>
                    <li class="hd_join"> <a href="https://www.blueoceancenter.com/login.html#" target="_blank">注册</a></li>
<?php 
$sqln="select title_lm from info_lm where id_lm=17";
$retn=$db->query($sqln)->row('array');
?>
                    <li class="hd_gupiao"> <a href="contact.php"><?php echo $retn['title_lm']?></a> </li>
                    <li class="nav_search"> <i class="ico ico1_3"></i> </li>
                    <li class="nav_language"> <i class="ico"></i>中 <i class="ico ico1_2"></i>
                        <div class="language_cover">
                            <ul>
                                <li><a href="index.php?yu=1">简体中文</a></li>
                                <li><a href="en/index.php?yu=1">English</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <a href="index.php" class="l logo" title="蓝海逆物流">
        <h1></h1>
        </a> 
        <!-- nav-8 start-->
        <nav class="widget-nav r opc0" id="menu">
            <ul class="fix">
<?php 
$sqln="select title_lm from info_lm where id_lm=1";
$retn=$db->query($sqln)->row('array');
?>
                <li class=" has_nav "><a href="index.php"><?php echo $retn['title_lm']?></a></li>
<?php 
$sqln="select title_lm from info_lm where id_lm=2";
$retn=$db->query($sqln)->row('array');
?>
                <li class=" has_nav "><a href="service.php"><?php echo $retn['title_lm']?></a>
                    <div class="_layer nav_layer08 fix">
                        <ul class="fix">
<?php 
$sqln="select title_lm from info_lm where id_lm=8";
$retn=$db->query($sqln)->row('array');
?>
    <li class=""><a href="service.php?lm=8"><?php echo $retn['title_lm']?></a></li>
<?php 
$sqln="select title_lm from info_lm where id_lm=9";
$retn=$db->query($sqln)->row('array');
?>
    <li class=""><a href="shfw.php?lm=9"><?php echo $retn['title_lm']?></a></li>
<?php 
$sqln="select title_lm from info_lm where id_lm=10";
$retn=$db->query($sqln)->row('array');
?>
    <li class=""><a href="yqzb.php?lm=10"><?php echo $retn['title_lm']?></a></li>
<?php 
$sqln="select title_lm from info_lm where id_lm=11";
$retn=$db->query($sqln)->row('array');
?>
    <li class=""><a href="ccwl.php?lm=11"><?php echo $retn['title_lm']?></a> </li>
<?php 
$sqln="select title_lm from info_lm where id_lm=12";
$retn=$db->query($sqln)->row('array');
?>
    <li class="last"><a href="bgfx.php?lm=12"><?php echo $retn['title_lm']?></a></li>
                        </ul>
                    </div>
                </li>
<?php 
$sqln="select title_lm from info_lm where id_lm=3";
$retn=$db->query($sqln)->row('array');
?>
                <li class=" has_nav "><a href="fwsf.php"><?php echo $retn['title_lm']?></a>
                    <div class="_layer nav_layer08 fix">
                        <ul class="fix">
<?php 
$sql="select id,title from info_co where lm=3 and pass=1 order by px";
$jilushu1=$db->query($sql)->num_rows();
$ret=$db->query($sql)->result('array');
foreach ($ret as $k1=>$v){
?>
                            <li class="<?php if(($k1+1)==$jilushu1){?>last<?php }?>"><a href="fwsf.php?id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </li>
<?php 
$sqln="select title_lm from info_lm where id_lm=4";
$retn=$db->query($sqln)->row('array');
?>
                <li class=" has_nav "><a href="case.php"><?php echo $retn['title_lm']?></a>
                    <div class="_layer nav_layer08 fix">
                        <ul class="fix">
<?php 
$sql="select id_lm,title_lm from info_lm where fid=4 order by px";
$ret=$db->query($sql)->result('array');
foreach ($ret as $v){
?>
                            <li class=""><a href="case.php?lm=<?php echo $v['id_lm']?>"><?php echo $v['title_lm']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </li>
<?php 
$sqln="select title_lm from info_lm where id_lm=5";
$retn=$db->query($sqln)->row('array');
?>
                <li class=" has_nav "><a href="about.php"><?php echo $retn['title_lm']?></a>
                    <div class="_layer nav_layer08 fix">
                        <ul class="fix">
<?php 
$sqln="select title_lm from info_lm where id_lm=15";
$retn=$db->query($sqln)->row('array');
?>
    <li class=""><a href="about.php?lm=15"><?php echo $retn['title_lm']?></a> </li>
    <?php 
$sqln="select title_lm from info_lm where id_lm=16";
$retn=$db->query($sqln)->row('array');
?>
   <li class=""><a href="culture.php?lm=16"><?php echo $retn['title_lm']?></a> </li>
<?php 
$sqln="select title_lm from info_lm where id_lm=17";
$retn=$db->query($sqln)->row('array');
?>
    <li class="last"><a href="contact.php?lm=17"><?php echo $retn['title_lm']?></a></li> 
                        </ul>
                    </div>
                </li>
<?php 
$sqln="select title_lm from info_lm where id_lm=6";
$retn=$db->query($sqln)->row('array');
?>
                <li class=" has_nav "><a href="job.php"><?php echo $retn['title_lm']?></a>
                    <div class="_layer nav_layer08 fix">
                        <ul class="fix">
<?php 
$sqln="select title_lm from info_lm where id_lm=18";
$retn=$db->query($sqln)->row('array');
?>
    <li class=""><a href="job.php?lm=18"><?php echo $retn['title_lm']?></a> </li>
    <?php 
$sqln="select title_lm from info_lm where id_lm=19";
$retn=$db->query($sqln)->row('array');
?>
    <li class="last"><a href="new.php?lm=19"><?php echo $retn['title_lm']?></a> </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- nav-8 over--> 
    </div>
    <div class="search_conver">
        <form action="new.php" method="get" name="topSearchForm" id="topSearchForm">
            <div class="search_box">
                <input class="search_select search_main" id="typeSelect" name="type" readonly="readonly" value="新闻动态">
                <input type="text" name="ss" class="serach_inp search_main" />
                <button class="search_btn search_main" type="submit">搜索</button>
            </div>
        </form>
    </div>
</header>
