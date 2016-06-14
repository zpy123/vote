<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>注册</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/NewGlobal.css" rel="stylesheet" />
        <script type="text/javascript" src="js/zepto.js"></script>
    </head>
    
    <body>
        <div class="header">
            <a href="/" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">注册</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            <form name="aspnetForm" method="post" action="login.aspx?ReturnUrl=%2fMember%2fDefault.aspx" id="aspnetForm" class="form-horizontal">
                <div class="control-group">
                    <input name="mobile_phone" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入手机号" />
                </div>
                <div class="control-group">
                    <input name="id_card" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入身份证号码" />
                </div>
                <div class="control-group">
                    <button onclick="__doPostBack('ctl00$ContentPlaceHolder1$btnOK','')" id="ctl00_ContentPlaceHolder1_btnOK" class="btn-large green button width100">立即注册</button></div>
                <div class="control-group">已有账号？
                    <a href="login.html" id="ctl00_ContentPlaceHolder1_RegBtn">立即登录</a></div>
                <div class="control-group">或者使用合作账号一键登录：
                    <br />
                    <a class="servIco ico_qq" href="qlogin.aspx"></a>
                    <a class="servIco ico_sina" href="default.htm"></a>
                </div>
            </form>
        </div>
        <div class="footer">
            <div class="gezifooter">
                <a href="login.aspx" class="ui-link">立即登陆</a>
                <font color="#878787">|</font>
                <a href="reg.aspx" class="ui-link">免费注册</a>
                <font color="#878787">|</font>
                <a href="../www.gridinn.com/@display=pc" class="ui-link">电脑版</a></div>
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p></div>
        </div>
    </body>

</html>