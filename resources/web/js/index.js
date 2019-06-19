/**
 * index
 */
define(function(require) {
  var $ = require('jquery');
  var base = require('base');
  var com = require('./common');


  var winH = $(window).outerHeight();
  //banner轮播
 	require('slide');
  $('.i_banner').slide({
  	auto:false,
  	// effect:'fade',
  	duration:500,
  	callback:function(a,b,c){
      if (base.getType() == 'Pc') {
        $(b).height(winH-50);
      }
  	}
  });

  if (base.getType() == 'Pc'){
    $('.i_banner').height(winH-50);
    $('.i_video').height(winH-50);
  }

  $(window).scroll(function(){
    if ($(window).scrollTop()>0||base.getType() !== 'Pc') {
       $('.i_video').fadeOut(100);
    }
  });

  //数字累加
  require('animate-number');
  var $digs_num = $('.ipart2_bd');
      distance_num = $digs_num.offset().top - $(window).height()/3;
      $digs_num.find('.number').each(function(i, e) {
        i=i+1;
        $(this).addClass('num'+i);
      });
      var numBer1 =  $('.num1').text();
      var numBer2 =  $('.num2').text();
      var numBer3 =  $('.num3').text();
      var numBer4 =  $('.num4').text();
      var numBer5 =  $('.num5').text();

  var sec2func = function() {
    if ($(window).scrollTop() > distance_num) {
      $('.num1').stop().prop('number', 0).animateNumber({ number: numBer1 },800);
      $('.num2').stop().prop('number', 0).animateNumber({ number: numBer2 },800);
      $('.num3').stop().prop('number', 0).animateNumber({ number: numBer3 },800);
      $('.num4').stop().prop('number', 0).animateNumber({ number: numBer4 },800);
      $('.num5').stop().prop('number', 0).animateNumber({ number: numBer5 },800);
      $(window).unbind('scroll', sec2func);
    }
  };
  $(window).on('scroll', sec2func);

  //背景视差
  if (base.getType() !== 'Mobile') {
    require('parallax');
    $('.ipart2').parallax('50%','-0.5');
  }


  //IE9以下视频移除 加载图片
  if(base.browser.ie<9 || base.getType() !== 'Pc'){
    $('#video').remove();
    $('.banner').addClass('ie').show();
  }else{
    //banner默认播放
    setTimeout(function() {
        document.getElementById("video").play();
    });
  }

  //part3添加类名
  $('.ipart3_bd').find('li:odd').addClass('odd');
  $('.ipart3_bd').find('li:even').addClass('even');




});
