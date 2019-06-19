/**
* name: common
* version: v3.0.0
* update: 去掉pc端跨屏支持
* date: 2016-04-30
*/
define(function(require, exports, module) {
  var $ = require('jquery');
  var base = require('base');
  var typeCatch = base.getType();

  if(base.browser.ie<7){
    alert('您的浏览器版本过低，请升级或使用chrome、Firefox等高级浏览器！');
  }


  $('body').attr('data-w',$('body').outerWidth());
  var throttleResize = base.throttle(function(){
   // if(base.getType()!=='Pc'){
      var new_width = $('body').outerWidth();
      if(new_width !== $('body').data('w') && new_width<1024){
        document.location.reload();
      }
    //}
  });
  $(window).on('resize',function(){
    throttleResize();
  });


  //字号调节
  var $speech=$('.myart:visible'),
     defaultsize=parseFloat($speech.css('font-size'));
  if($speech.length){
    //window.localStorage &&  localStorage.getItem('fz') && $speech.css('font-size', localStorage.getItem('fz')+'px');
    $('body').on('click','#switcher a',function(){
      var num=parseFloat($speech.css('font-size'));
      switch(this.id){
        case'small':num/=1.4;
        break;
        case'big':num*=1.4;
        break;
        default:num=defaultsize;
      }
      $speech.css('font-size',num+'px');
      //window.localStorage && localStorage.setItem('fz',num);
    });
  }

  //页面平滑滚动
  if(base.getType() == 'Pc'){
    if (base.browser.ie > 8) {
      require('smoothscroll');
    }
  }

  //图片懒加载
  require('scroll-loading');
  $("img").scrollLoading({
    attr:"data-url"
  });

  /*
  * 常用工具
  */
  //返回顶部
  $('body').on('click','.gotop',function(){$('html,body').stop(1).animate({scrollTop:'0'},300);return false});
  //关闭当前页
  $('body').on('click','.closewin',function(){window.opener=null;window.open("","_self");window.close()});
  //打印当前页
  $('body').on('click','.print',function(){window.print()});
  //加入收藏
  $('body').on('click','.favorite',function(){var sURL = "http:&#47;&#47;"+document.domain+"&#47;",sTitle = document.title;try{window.external.addFavorite(sURL, sTitle)} catch (e){try{window.sidebar.addPanel(sTitle, sURL, "")}catch (e){alert("加入收藏失败，请使用Ctrl+D进行添加")}}});
  //设为首页
  $('body').on('click','.sethome',function(){var vrl="http:&#47;&#47;"+document.domain+"&#47;";if(window.netscape){try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")}catch(e){alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。")}var prefs=Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);prefs.setCharPref('browser.startup.homepage',vrl)}else{alert("您的浏览器不支持自动设为首页，请您手动进行设置！")}});
  //屏蔽ie78 console未定义错误
  if (typeof console === void(0)) {
      console = { log: function() {}, warn: function() {} };
  }
  //textarea扩展max-length
  $('textarea[max-length]').on('change blur keyup',function(){
    var _val=$(this).val(),_max=$(this).attr('max-length');
    if(_val.length>_max){
      $(this).val(_val.substr(0,_max));
    }
  });
  //延时显示
  $('.opc0').animate({'opacity':'1'},160);
  // placeholder
  $('input, textarea').placeholder();
  //按需渲染
  base.scanpush();
  //响应图片
  base.resImg();
  /*
  * 输出
  */
  module.exports = {
    demo:function(){
      console.log('hello '+base.getType());
    }
  };

  /*
  * 站内公用
  */

  //导航当前状态 2.0后台需要使用
  //var jrChannelArr=jrChannel.split('#');
  //$('.nav').children('li').eq(jrChannelArr[0]).addClass('cur').find('li').eq(jrChannelArr[1]).addClass('cur');


  //nav
  var _li = $('#menu').children('ul').children('li');
  if(base.getType() =='Pc'){
    _li.each(function(i,e){
      i = i+1;
      $(this).addClass('nav'+i);
    });
    _li.mouseenter(function(){
      $(this).addClass('hover').find('.nav_layer08').stop(1,1).slideDown(200);
    }).mouseleave(function(){
      $(this).removeClass('hover').find('.nav_layer08').stop(1,1).slideUp(200);
    });
  }else{
    _li.each(function(i,e) {
      $(this).children('a').after($(this).find('ul'));
      $(this).find('._layer').remove();
      });
    require('offcanvas');
    $('.widget-nav').offcanvas();
  }


   //多组分享js
   require.async('bdshare',function(bdshare){
       bdshare(
        [{
            tag : 'share_ft',
            bdSize : 32,      //图标尺寸, 16｜24｜32
            bdStyle : '1'     //图标类型, 0｜1｜2

         },
         {
            tag : 'share_news_detail',
            bdSize : 32,
            bdStyle: 2
         },
         {
            tag : 'share_2',
            bdSize : 32,
            bdStyle: 2
         }]);
   });

  //头部跟随效果
  $(document).ready(function() {
    var topH = $('.pageHeader').outerHeight()-60;
    $(window).scroll(function() {
      currTop = $(window).scrollTop();
      if (currTop < topH && base.getType()=='Pc') {
        $('.pageHeader').removeClass('tophide');
        if ($('.nav_search').hasClass('show_inp')) {
          $('.pageHeader').addClass('tophide');
        }
      } else {
        $('.pageHeader').addClass('tophide');
      }
    });
    if( $(window).scrollTop() > 0 || base.getType()!=='Pc'){
        $('.pageHeader').addClass('tophide');
      }
  });

  //头部搜索
    //下拉框
  require('select');
  $('.search_select').select({
    callback: function(val,txt){
      if(val=='product'){
		  window.location.href="";
	  }
    }
  });
  $(window).scroll(function() {
    if ($(window).scrollTop()>0) {
      $('.select-ui-choose').removeClass('on');
      $('.select-ui-options').hide();
    }
  });

  //搜索显示隐藏
  $('.nav_search').click(function() {
    if ($(this).hasClass('show_inp')) {
      $(this).removeClass('show_inp');
      $('.search_conver').fadeOut(500);
      $('.pageHeader').removeClass('blue_bj');
    }else{
      $(this).addClass('show_inp');
      $('.search_conver').fadeIn(500);
      $('.pageHeader').addClass('blue_bj');
    }
  });

  //点击空白区域搜索隐藏
  $(document).mouseup(function(e){
    var _con = $('.pageHeader');  
    var _con_ul = $('.select-ui-options');  // 设置目标区域
    if(!_con.is(e.target) && _con.has(e.target).length === 0 && !_con_ul.is(e.target) && _con_ul.has(e.target).length === 0){ 
      $('.nav_search').removeClass('show_inp');
      $('.search_conver').fadeOut(500);
      $('.pageHeader').removeClass('blue_bj');
    }
  });

 //引入动画
   var vision=base.browser.ie;
   if(vision==0||vision>9){
    require('wow');
      wow = new WOW(
        {
          animateClass: 'animated',
          offset: 0
        }
      );
      wow.init();
    }

  //头部下拉选项
  $('.hd_join').mouseover(function(event) {
    $(this).find('.join_cover').fadeIn(100);
  }).mouseleave(function(event) {
     $(this).find('.join_cover').fadeOut(100);
  });
  $('.hd_link').mouseover(function(event) {
    $(this).find('.link_cover').fadeIn(200);
  }).mouseleave(function(event) {
     $(this).find('.link_cover').fadeOut(200);
  });

  //手机端底部
  if (base.getType() =='Mobile') {
     var oldHeight = $('.foot_l').find('dl').outerHeight();
    $('.foot_l').find('dl').click(function(event) {
      var newHeight = $(this).find('dd').outerHeight()*$(this).find('dd').length+$(this).find('dt').outerHeight();
      var nowHeight =  $(this).outerHeight();
      if (nowHeight != oldHeight) {
        $(this).animate({height:oldHeight},256);
      }else{
        $(this).animate({height:newHeight},256).siblings().animate({height:oldHeight},256);
      }

    });
  }

  //底部二维码
  $('.foot_ewm').mouseenter(function(){
    $(this).find('.ewm_pic').fadeIn(200);
  }).mouseleave(function(){
      $(this).find('.ewm_pic').fadeOut(200);
  });


	$('section.mainBox .joinList li div').click(function(){
		$(this).parent().toggleClass('active').siblings().removeClass('active');
		$(this).siblings().slideToggle().parent().siblings().find('article').slideUp();
	});


var formheight = '500';
// on scroll,
$(window).on('scroll',function(){
    // we round here to reduce a little workload
    var stop = Math.round($(window).scrollTop());
    if (stop > formheight) {
        $('#form').addClass('fixed');
    } else {
        $('#form').removeClass('fixed');
    }

});

});

