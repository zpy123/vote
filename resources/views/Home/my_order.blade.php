<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>我的订单</title>
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
            .body {
                        font-family:Arial, Helvetica, sans-serif;
                        font-size:12px;
                        margin:0;
                        }
                        #main {
                        height:1800px;
                        padding-top:90px;
                        text-align:center;
                        }
                        #fullbg {
                        background-color:gray;
                        left:0;
                        opacity:0.5;
                        position:absolute;
                        top:0;
                        z-index:3;
                        filter:alpha(opacity=50);
                        -moz-opacity:0.5;
                        -khtml-opacity:0.5;
                        }
                        #dialog {
                        background-color:#fff;
                        border:5px solid rgba(0,0,0, 0.4);
                        height:400px;
                        left:50%;
                        margin:-200px 0 0 -200px;
                        padding:1px;
                        position:fixed !important; /* 浮动对话框 */
                        position:absolute;
                        top:50%;
                        width:300px;
                        z-index:5;
                        border-radius:5px;
                        display:none;
                        }
                        #dialog p {
                        margin:0 0 12px;
                        height:24px;
                        line-height:24px;
                        background:#CCCCCC;
                        }
                        #dialog p.close {
                        text-align:right;
                        padding-right:10px;
                        }
                        #dialog p.close a {
                        color:#fff;
                        text-decoration:none;
                        }
        </style>
    </head>

    <body>
            <div class="body">

            </div>
        <div class="header">
            @include('home.home_head')
            <div class="title" id="titleString">我的信息</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width95pt20">
            <div class="order-nav">
                <a class="selected" href="javascript:void(0);">全部</a>
                <a href="javascript:void(0);">未完成</a>
                <a class="last-a" href="javascript:void(0);">已完成</a>
            </div>

            <div class="order-content">
                <div class="order-list" style="display:block">
                    <ul>
                        <li>
                            <span class="order-hotel-name">订单号</span>
                            <span class="order-hotel-name">下单时间</span>
                            <span class="order-hotel-time">订单状态</span>
                        </li>
                        @foreach($data['data1'] as $v)
                            <li>
                                <span class="order-hotel-name"><font color='orange'><a  href="javascript:showBg({{ $v['o_id'] }});">{{$v['o_num']}}</a></font></span>
                                <span class="order-hotel-name">{{$v['o_stime']}}</span>
                                <span class="order-hotel-time">
                                        @if($v['o_status'] == 0)
                                                <a href="pay?o_num={{ $v['o_num'] }}">待支付</a>
                                        @elseif($v['o_status'] == 1)
                                                @if($times>$v['o_end'])
                                                        <font color='red'>已过期</font>
                                                @else
                                                        <font color='red'>待消费</font> ||   <a  href="javascript:void(0);" onclick="tui()" style="color:orange">退款</a>
                                                @endif

                                        @elseif($v['o_status'] == 2)
                                                <a href="javascript:void(0);" id="ping" style="color:green">待评价</a>
                                        @else
                                                <font color='blue'>已完成</font>
                                        @endif

                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="order-list">
                    <ul>
                        <li>
                                <span class="order-hotel-name">订单号</span>
                                <span class="order-hotel-name">下单时间</span>
                                <span class="order-hotel-time">订单状态</span>
                        </li>
                        @foreach($data['data2'] as $v)
                            <li>
                                <span class="order-hotel-name"><a  href="javascript:showBg({{ $v['o_id'] }});">{{$v['o_num']}}</a></span>
                                <span class="order-hotel-name">{{$v['o_stime']}}</span>
                                <span class="order-hotel-time">
                                        @if($v['o_status'] == 0)
                                                <a href="pay?o_num={{ $v['o_num'] }}">待支付</a>
                                        @elseif($v['o_status'] == 1)
                                                @if($times>$v['o_end'])
                                                        <font color='red'>已过期</font>
                                                @else
                                                        <font color='red'>待消费</font> ||  <a  href="javascript:void(0);" onclick="tui()" style="color:orange">退款</a>
                                                @endif
                                        @elseif($v['o_status'] == 2)
                                                <a href="javascript:void(0);" id="ping" style="color:green">待评价</a>
                                        @else
                                                <font color='blue'>已完成</font>
                                        @endif

                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="order-list">
                    <ul>
                        <li>
                                <span class="order-hotel-name">订单号</span>
                                <span class="order-hotel-name">下单时间</span>
                                <span class="order-hotel-time">订单状态</span>
                        </li>
                        @foreach($data['data3'] as $v)
                            <li>
                                <span class="order-hotel-name"><a  href="javascript:showBg({{ $v['o_id'] }});">{{$v['o_num']}}</a></span>
                                <span class="order-hotel-name">{{$v['o_stime']}}</span>
                                <span class="order-hotel-time">
                                        @if($v['o_status'] == 0)
                                                <a href="pay?o_num={{ $v['o_num'] }}">待支付</a>
                                        @elseif($v['o_status'] == 1)
                                                <font color='red'>待消费</font>
                                        @elseif($v['o_status'] == 2)
                                                <a href="javascript:void(0);" id="ping" style="color:green">待评价</a>
                                        @else
                                                <font color='blue'>已完成</font>
                                        @endif
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div id="fullbg"></div>
        <div id="dialog">
        <p class="close"><a href="javascript:void(0)" onclick="closeBg();"><font color='balck'>×</font></a></p>
        <div id="div1" text-align="center"></div>
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

<script src="Home/js/jquery.js">

</script>
<script type="text/javascript">
        //显示灰色 jQuery 遮罩层
        function showBg(id) {
                var bh = $(".body").height();
                var bw = $(".body").width();
                $.get('showxiang',{'o_id':id},function(msg){
                        var str = "<p><font color='red'>预定详细信息</font></p><table border=1>";
			for(var i=0;i<msg.length;i++){
				str+="<tr><td>订单号：</td>";
				str+="<td>"+msg[i]['o_num']+"</td></tr>";
                                str+="<tr><td>酒店名称：</td>";
				str+="<td>"+msg[i]['o_pubname']+"</td></tr>";
                                str+="<tr><td>房型：</td>";
				str+="<td>"+msg[i]['o_typename']+"</td></tr>";
                                str+="<tr><td>价格：</td>";
				str+="<td>"+msg[i]['o_price']+"元</td></tr>";
                                str+="<tr><td>天数：</td>";
				str+="<td>"+msg[i]['o_days']+"天</td></tr>";
                                str+="<tr><td>入住时间：</td>";
				str+="<td>"+msg[i]['o_start']+"</td></tr>";
                                str+="<tr><td>离店时间：</td>";
				str+="<td>"+msg[i]['o_end']+"</td></tr>";
                                str+="<tr><td>下单时间：</td>";
				str+="<td>"+msg[i]['o_stime']+"</td></tr>";
			}
			str+="</table>";
                        str+="<p>              美假快捷酒店，房间价格在150-800元间，酒店配备早餐厅，会议室，商务中心，洗衣房等。地理位置便利，环境健康舒适!商务连锁酒店预订，选美假官网预订</p>";
			$("#div1").html(str);
		},'json');
                $("#fullbg").css({
                height:bh,
                width:bw,
                display:"block"
        });
        $("#dialog").show();
        }
                //关闭灰色 jQuery 遮罩
                function closeBg() {
                $("#fullbg,#dialog").hide();
        }
        $("#ping").click(function(){
                alert('去酒店详情页面评论把。');
        });

        function tui(){
                alert('您的金额将按原路径退回至您的账户，详细情况请等待短信通知。');
        }

</script>
