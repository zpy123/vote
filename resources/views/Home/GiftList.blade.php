<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>礼品商城</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" /><link href="{{asset('')}}Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="{{asset('')}}Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="{{asset('')}}Home/js/zepto.js"></script>

</head>
<body>
 <div class="header">
@include('home.home_head')
<div class="title" id="titleString">礼品商城</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>


    <div class="container">
    <ul class="giftlist unstyled">
      @foreach($gift as $v)
        <li>
            <div class="imgbox">
               <a href="{{url('Home/Gift')}}?id={{$v['g_id']}}"><img src="{{url($v['g_img'])}}"> </a>
               </div>
                <div class="desc">
               <a href="{{url('Home/Gift')}}?id={{$v['g_id']}}">{{$v['g_name']}}</a> <br/>
                 <a href="{{url('Home/Gift')}}?id={{$v['g_id']}}"><em>{{$v['g_point']}} 积分 </em></a>
              </div>
        </li>
      @endforeach
    </ul>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.giftlist li img').each(function () {

                var width = $(this).width(); // 图片实际宽度
                var height = $(this).height(); // 图片实际高度

                // 检查图片是否超宽
                if (width != height) {

                    $(this).css("height", width); // 设定等比例缩放后的高度
                }
            });
        });
    </script>


  <div class="footer">
  <div class="gezifooter">

      <a href="login.aspx" class="ui-link">立即登陆</a> <font color="#878787">|</font>
       <a href="reg.aspx" class="ui-link">免费注册</a> <font color="#878787">|</font>


       <a href="http://www.gridinn.com/@display=pc" class="ui-link">电脑版</a>
  </div>
  <div class="gezifooter">
    <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
  </div>
  </div>

</body>
</html>
