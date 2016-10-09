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
        <script type="text/javascript" src="Home/js/jquery-1.7.2.min.js"></script>
        <style media="screen">
            .order-list{
                display: none;
            }
        </style>
    </head>

    <body>
        <div class="header">
            @include('home.home_head')
            <div class="title" id="titleString">我的信息</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            <div class="order-nav">
                <a class="selected" href="javascript:void(0);">全部</a>
                <a href="javascript:void(0);">待收货</a>
                <a class="last-a" href="javascript:void(0);">已完成</a>
            </div>

            <div class="order-content">
                <div class="order-list" style="display:block">
                    <ul>
                        <li>
                            <span class="order-hotel-name">礼品名称</span>
                            <span class="order-hotel-name">兑换人</span>
                            <span class="order-hotel-time">订单号</span>
                        </li>
                        @foreach($all as $v)
                            <li>
                                <span class="order-hotel-name">{{$v['g_name']}}</span>
                                <span class="order-hotel-name">{{$v['u_name']}}</span>
                                <span class="order-hotel-time">{{$v['gl_num']}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="order-list">
                    <ul>
                        <li>
                            <span class="order-hotel-name">礼品名称</span>
                            <span class="order-hotel-name">兑换人</span>
                            <span class="order-hotel-time">订单号</span>
                        </li>
                        @foreach($dsh as $v)
                            <li>
                                <span class="order-hotel-name">{{$v['g_name']}}</span>
                                <span class="order-hotel-name">{{$v['u_name']}}</span>
                                <span class="order-hotel-time">{{$v['gl_num']}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="order-list">
                    <ul>
                        <li>
                            <span class="order-hotel-name">礼品名称</span>
                            <span class="order-hotel-name">兑换人</span>
                            <span class="order-hotel-time">订单号</span>
                        </li>
                        @foreach($down as $v)
                            <li>
                                <span class="order-hotel-name">{{$v['g_name']}}</span>
                                <span class="order-hotel-name">{{$v['u_name']}}</span>
                                <span class="order-hotel-time">{{$v['gl_num']}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="footer">
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        //当页面加载时直接触发
        $(function(){
            //获取a对象
            var li = $('.order-nav a');
            //获取div元素
            var div = $('.order-list');
            //alert(div)
            li.click(function(){
                //获取当前点击对象
                var _this = $(this);
                time = setTimeout(function(){
                var num = _this.index();
                //alert(num);
                _this.addClass('selected').siblings().removeClass();
                div.eq(num).show().siblings().hide();
            },200);
        }).mouseout(function(){
                clearTimeout(time);
            })
        })
    </script>
</html>
