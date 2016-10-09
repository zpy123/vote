<!DOCTYPE html PUBLIC "-//W3C//DTD XH]ML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>我的格子</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="Home/css/bootstrap.min.css" rel="stylesheet" />
        <link href="Home/css/NewGlobal.css" rel="stylesheet" />
        <script type="text/javascript" src="Home/js/zepto.js"></script>
    </head>

    <body><div class="header">
     @include('home.home_head')
    <div class="title" id="titleString">我的信息</div>
    <a href="javascript:history.go(-1);" class="back">
        <span class="header-icon header-icon-return"></span>
        <span class="header-name">返回</span></a>
    </div>

        <div class="container width80 pt20">
            @foreach($data as $v)
            @endforeach
            <form name="aspnetForm" method="post" action="save_user" id="aspnetForm" class="form-horizontal">.

                <div class="control-group">
                    <input name="u_nickname" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入昵称" value="{{$v['u_nickname']}}" />
                </div>
                <div class="control-group">
                    <input name="u_phone" type="text" id="ctl00_ContentPlaceHolder1_txtPassword" class="width100 input" style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入手机号码" value="{{$v['u_phone']}}" />
                </div>
                <div class="control-group">
                    <input name="u_card" type="text" id="ctl00_ContentPlaceHolder1_txtPassword" class="width100 input" style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入身份证号" value="{{$v['u_card']}}" />
                </div>
                <input type="hidden" name="u_id" value="{{$v['u_id']}}" />
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="control-group">
                    <input type="submit" class="submit-button" value="修改个人信息" style="width: 100%; height: 45px; background: #6ac134; color: #fff; border: 1px solid #6ac134" />
                </div>
                <div class="control-group">
                    <span class="red"></span>
                </div>
            </form>
        </div>
        <div class="footer">
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p></div>
        </div>
    </body>

</html>
