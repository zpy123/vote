<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="Home/js/zepto.js"></script>

</head>
<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">修改密码</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
    <div class="container width80 pt20">
 
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTE4MTUwOTMzMA9kFgJmD2QWAgIBD2QWAgIBD2QWAgILDxYCHgRocmVmBSwvUmVnLmFzcHg/UmV0dXJuVXJsPSUyZk1lbWJlciUyZkRlZmF1bHQuYXNweGQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFJmN0bDAwJENvbnRlbnRQbGFjZUhvbGRlcjEkY2JTYXZlQ29va2ll5P758eqt18XT06y04yVxkKJyzYw=" />
</div>


<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>

<form action="getpwd4" method="post" onsubmit="return submits()">
<div>

	<input type="hidden" name="" id="__EVENTVALIDATION" value="/wEWBQLZmqilDgLJ4fq4BwL90KKTCAKqkJ77CQKI+JrmBdPJophKZ3je4aKMtEkXL+P8oASc" />
</div>
  <div class="control-group">
      <input type="hidden" name="u_email" id="u_email" value="{{$u_email}}" />
      <input name="u_pwd" id="u_pwd" type="password" onblur="check_pwd()"  class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="新密码" title=""/><span id="aaa"></span>
      <input name="u_pwd1" id="u_pwd1" type="password" onblur="check_pwd1()"  class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="确认新密码" /><span id="bbb"></span>
  </div>
  
  <div class="control-group">
   
      
     <!-- <a class="fr" href="login">(⊙o⊙)哦,登</a> -->
 
  </div>
     <div class="control-group">
       <span class="red"></span>
   </div>
  <div class="control-group">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
         <button type="submit" id="ctl00_ContentPlaceHolder1_btnOK" class="btn-large green button width100">修改密码</button>
  </div>
    <div class="control-group">
         还没账号？<a href="{{url('register')}}" id="ctl00_ContentPlaceHolder1_RegBtn">立即免费注册</a>
  </div>
  <div class="control-group">
        或者使用合作账号一键登录：<br/>
        <a class="servIco ico_qq" href="qlogin.aspx"></a>
        <a class="servIco ico_sina" href="default.htm"></a>
  </div>

  </div>

</form>
  @include('home.home_footer')

</body>
</html>

<script src="Home/js/jquery.js"></script>
<script>
    function check_pwd(){
      var u_pwd = $("#u_pwd").val();
      if(u_pwd == ''){
        $("#aaa").html('新密码不能为空');
        return false;
      }else{
        $("#aaa").html('ok');
        return true;
      }
    }
    function check_pwd1(){
      var u_pwd = $("#u_pwd").val();
      var u_pwd1 = $("#u_pwd1").val();
      if(u_pwd != u_pwd1){
        $("#bbb").html('两次密码不一致');
        return false;
      }else{
        $("#bbb").html('ok');
        return true;
      }
    }
    function submits(){
      if(check_pwd()&&check_pwd1()){
        return true;
      }else{
        return false;
      }
    }
</script>
