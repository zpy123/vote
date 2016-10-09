<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>美假微酒店</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />

<!-- <link href="Home/css/bootstrap.min.css" rel="stylesheet" /> -->
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<style>
    *{ padding: 0; margin: 0;}
    a{ color: #000;}
    #img_box{ width: 480px; height: 230px; margin: 0 auto; overflow: hidden; position: relative; margin-top: 0px;}
    #img_list{ list-style: none; position: relative; width: 2200px}
    #img_list li{ float: left;}

    #order_list{ width: 480px; margin: 0 auto; margin-top: 0px;}
    #order_list li{ float: left; list-style: none; margin-right: 1px;}
</style>


<script src="Home/js/jquery-1.7.2.min.js"></script>
<script src="Home/js/bootstrap.min.js"></script>

</head>
<body>

 <div class="container">
         <div class="header">
         <img src="Home/img/logo.png" style="height: 40px; margin: 10px 0px 0px 15px" />
<!--
         活动公告:<marquee scrollAmount=4 width=207>
         <a href="">1.关于注册用户时间问题解释</a>&nbsp;&nbsp;&nbsp;
         <a href="">2.置顶推荐服务</a>&nbsp;&nbsp;&nbsp;
         <a href="">3.感恩回馈,网站所有广告首页3折优惠 欢迎咨询</a>&nbsp;&nbsp;&nbsp;
         <a href="">4.积分有礼啦!</a></marquee> -->
         </div>
     <div style="padding:0 5px 0 0;">
             <div id="img_box">
                       <ul id="img_list">
                           <li id="img_111" img-no="111">
                             <a href=""><img src="{{URL::asset('/')}}Home/img/111.png" style="" width="480px" height="250px" /></a></li>
                           <li id="img_222" img-no="222">
                             <a href=""><img src="{{URL::asset('/')}}Home/img/222.png" width="480px" height="250px" /></a></li>
                           <li id="img_333" img-no="333">
                             <a href=""><img src="{{URL::asset('/')}}Home/img/333.png" width="480px" height="250px" /></a></li>
                           <li id="img_444" img-no="444">
                             <a href=""><img src="{{URL::asset('/')}}Home/img/444.png" width="480px" height="250px" /></a></li>
                       </ul>
                   </div>

     <ul class="unstyled defaultlist pt20" style="list-style:none">
         <li class="f">
             <a href="{{url('CityList')}}">
             <h3>预定酒店</h3>
             <figure class="jp_icon"></figure>
             </a>
         </li>
         <li class="h">
             <a href="{{url('Activitys')}}">
              <h3>最新活动</h3>
              <figure class="jd_icon"></figure>
              </a>
         </li>
     </ul>
     <ul class="unstyled defaultlist"  style="list-style:none">
         <li class="a">
             <a href="{{url('my_order')}}">
                  <h3>我的订单</h3>
              <figure class="hb_icon"></figure>
             </a>

         </li>
         <li class="p">
            <a href="{{url('my_count')}}">
            <h3> 我的格子</h3>
            <figure class="mp_icon"></figure>
            </a>
         </li>
     </ul>
     <ul class="unstyled defaultlist" style="list-style:none">
         <li class="t">
            <a href="{{url('Home/GiftList')}}">
            <h3> 礼品商城</h3>
            <figure class="hcp_icon"></figure>
            </a>
         </li>

         <li class="m">
             <a href="{{url('help')}}">
            <h3> 帮助咨询</h3>
            <figure class="wdxc_icon"></figure>
              </a>
         </li>

     </ul>
     </div>
 </div>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费模板</a></div>
  <div class="footer">
  <div class="gezifooter"> <a href="#" class="ui-link">酒店预订</a> <font color="#878787">|</font> <a href="#" class="ui-link">我的订单</a> <font color="#878787">|</font> <a href="#" class="ui-link">我的格子</a> <font color="#878787">|</font> <a href="http://www.cssmoban.com/" title="网站模板" target="_blank">网站模板</a></div>
  <div class="gezifooter">
    <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2013</p>
  </div>
  </div>


</body>

<script>

   var fn;

   $(function(){

       startEvent();

       // 鼠标滑过
       $('#img_box').on({
           mouseover : function() {
               clearEvent();
           },
           mouseout : function() {
               startEvent();
           }
       });

       // 鼠标点击
       $('#order_list li').on({
           click : function() {
               var order = $(this).attr('order');
               $('#img_list li').css('margin-left', '0');
               eachMoveImg(order);
               $(this).find('a').css('color', 'red');
               $(this).siblings('li').find('a').css('color', '#000');
           },
           mouseover : function() {
               clearEvent();
           },
           mouseout : function() {
               startEvent();
           }
       });

   });

   // 轮播
   function slide()
   {
       $('#img_list li:first').animate({
           marginLeft : '-480px'
       }, 1500, function(){
           $(this).css('margin-left', '0').appendTo('#img_list');
           var imgNo = parseInt( $(this).attr('img-no') ) + 1;
           if (imgNo == 5) {
               imgNo = 1;
           }
           $('#order_list li').find('a').css('color', '#000');
           $('#order_' + imgNo).find('a').css('color', 'red')
       });
   }

   // 启动轮播事件
   function startEvent()
   {
       fn = setInterval('slide()', 2000);
   }

   // 清除轮播事件
   function clearEvent()
   {
       clearInterval(fn);
   }

   // 遍历移动图片位置
   function eachMoveImg(order)
   {
       var imgNo;
       $('#img_list li').each(function(){
           imgNo = $(this).attr('img-no');
           if (imgNo == order) {
               return false;
           }
           $(this).appendTo('#img_list');
       });
   }
   </script>
   </html>
