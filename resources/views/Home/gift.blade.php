<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>礼品中心</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="js/zepto.js"></script>

</head>
<body>
 <div class="header">
@include('home.home_head')
<div class="title" id="titleString">礼品中心</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>


   <form name="aspnetForm" method="post" action="GiftExchange" id="aspnetForm">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <input type="hidden" name="g_point" value="{{ $data['g_point'] }}">
       <input type="hidden" name="g_name" value="{{ $data['g_name'] }}">
   <div id="ctl00_ContentPlaceHolder1_Panel1">
        <div class="container width90">
        <input type="hidden" name="g_id" value="{{$data['g_id']}}">
        <h3><span id="ctl00_ContentPlaceHolder1_txtGiftName">{{$data['g_name']}}</span></h3>
        <p>所需积分：<span id="ctl00_ContentPlaceHolder1_txtGiftCost">{{$data['g_point']}}</span></p>
        <p><img style="display: block;" src="{{url($data['g_img'])}}" height="300" width="300"></p>
        <p><p style="text-indent:0px;color:#999999;">
	<em><strong>产品参数：</strong></em>
</p>
<ul style="text-indent:0px;color:#404040;">
	<li style="color:#666666;vertical-align:top;">
		品牌:&nbsp;emie/亿觅。
	</li>
	<li style="color:#666666;vertical-align:top;">
		型号:&nbsp;emie萨摩移动电源
	</li>
	<li style="color:#666666;vertical-align:top;">
		颜色分类:&nbsp;黄色萨摩&nbsp;白色萨摩+香港潮集充电头&nbsp;黄色萨摩+香港潮集充电头&nbsp;白色萨摩
	</li>
	<li style="color:#666666;vertical-align:top;">
		适用类型:&nbsp;通用
	</li>
	<li style="color:#666666;vertical-align:top;">
		LED灯照明:&nbsp;否
	</li>
	<li style="color:#666666;vertical-align:top;">
		电池类型:&nbsp;锂电池
	</li>
</ul>
<p>&nbsp;

</p></p>


        <div class="control-group tc">
             <p class="red"></p>
      <input type="submit" value="立即兑换" class="btn-large green button width80" style="width:80%;" />
        </div>
    </div>

</div>


    </form>


  <div class="footer">
  <div class="gezifooter">

      <a href="login" class="ui-link">立即登陆</a> <font color="#878787">|</font>
       <a href="register" class="ui-link">免费注册</a> <font color="#878787">|</font>


       <a href="../www.gridinn.com/@display=pc" class="ui-link">电脑版</a>
  </div>
  <div class="gezifooter">
    <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
  </div>
  </div>

</body>
</html>
