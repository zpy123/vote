<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>美假微酒店</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="Home/js/zepto.js"></script>

</head>
<body>

 <div class="header">
@include('home.home_head')
<div class="title" id="titleString">留言反馈</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>
</head>
<ul class="unstyled hotel-bar">
      <li class="first"><a href="help" >关于我们</a></li>
      <li><a href="zhong">帮助中心</a></li>
      <li><a href="kefu" >客服</a></li>
      <li><a href="message"  class="active">留言反馈</a></li>
</ul>
<body style="height:3000px;">

<div class="container width90 pt20">
        <!-- <img src="Home/img/help/7.jpg"/> -->
        <!--<img src="Home/img/help/0.jpg"/>
        <img src="Home/img/help/1.jpg"/>
        <img src="Home/img/help/2.jpg"/>
        <img src="Home/img/help/3.jpg"/>
        <img src="Home/img/help/4.jpg"/>
        <img src="Home/img/help/5.jpg"/> -->
        <img src="Home/img/help/10.jpg"/>
        投诉/反馈您好，欢迎提出宝贵的意见和建议，您留下的每个反馈都将被用来改善我们的服务！

请注意，带 * 的必须填写，虚假或者带有攻击性言论将会被删除！如果投诉举报请留下信息的链接或编号。

<form action="message_add" method="post">
    <table>
      <tr>
        <td>反馈内容</td>
        <td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
        <td>电子邮件:</td>
        <td><input type="text" name="email"></td>
      </tr>

      <tr>
        <td><input type="submit" value="提交"></td>
      </tr>
    </table>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  </form>

</div>

  <div class="footer">
  <div class="gezifooter">

      <a href="../login.aspx" class="ui-link">立即登陆</a> <font color="#878787">|</font>
       <a href="../reg.aspx" class="ui-link">免费注册</a> <font color="#878787">|</font>


       <a href="../../www.gridinn.com/@display=pc" class="ui-link">电脑版</a>
  </div>
  <div class="gezifooter">
    <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
  </div>
  </div>

</body>

<!-- 代码部分end -->
</body>
</html>
