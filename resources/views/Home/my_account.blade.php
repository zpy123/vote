<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>我的格子</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="Home/css/bootstrap.min.css" rel="stylesheet" />
        <link href="Home/css/NewGlobal.css" rel="stylesheet" />
        <link href="Home/css/user.css" rel="stylesheet" />
        <script type="text/javascript" src="Home/js/zepto.js"></script>
    </head>

    <body>
        <div class="header">
            @include('home.home_head')
            <div class="title" id="titleString">我的格子</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            @foreach($data as $v)
            <div class="user-face">
                <img src="storage/uploads/{{ $v['u_img'] }}" alt="" />
            </div>

            <div class="user-list">
                <span class="user-name">{{$v['u_name']}}</span>
                <span class="user-integer">积分:<i>{{$v['u_integral']}}</i></span>
                <span class="user-integer">[<a href='loginOUT'>退出</a>]</i></span>
            </div>

            <ul class="user-function-list">
                <li onclick="javascript:location.href='my_list?u_id={{$v['u_id']}}';">我的信息</li>
                <li onclick="javascript:location.href='my_order';">我的订单</li>
                <li onclick="javascript:location.href='my_gift';">礼品兑换</li>
                <li onclick="javascript:location.href='my_collection';">我的收藏</li>
            </ul>
            @endforeach
        </div>
        <div class="footer">
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
            </div>
        </div>
    </body>

</html>
