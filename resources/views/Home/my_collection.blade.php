<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>礼品正文</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />
<script type="text/javascript" src="Home/js/zepto.js"></script>
</head>
<body>
 <div class="header">
@include('home.home_head')
<div class="title" id="titleString">选出您最喜欢的美假微分店</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>


    <div class="container width90">
        <p class="newstitle">你的选择，我的放心</p>
        <div style="font-size:11pt">哪家美假微分店是您最喜欢的呢？即日起至4月30日，在微信发送您最喜欢的分店与喜欢的理由即有机会获得免费房（共100间）</div>
        <ul class="unstyled hotellist">
               @foreach($data as $v)
                    <li>
                     <a href="Hotel.html">
                        <img class="hotelimg fl" src="storage/uploads/{{ $v['pub_img'] }}" />
                     <div class="inline">
                        <p>
                               <h3>{{ $v['pub_name'] }}  <a href="javascript:void(0)" id="qushou_{{ $v['pub_id'] }}" class="{{$v['pub_id'] }}" style="color:red">[取消收藏]</a> </h3>
                        </p>
                         <p>地址：{{ $v['region_name'] }}</p>
                     </div>
                     <div class="clear"></div>
                      </a>
                    </li>
                 @endforeach
        </ul>
    </div>


  @include('home.home_footer')

</body>
</html>
<script src="Home/js/jquery.js">

</script>
<script type="text/javascript">
        @foreach($data as $v)
                $("#qushou_{{ $v['pub_id'] }}").click(function(){
                        var id = $("#qushou_{{ $v['pub_id'] }}").attr('class');
                        $.get('qucollection',{'pub_id':id},function(e){
                                if(e == 1){
                                        alert('取消收藏成功');
                                        window.location.href='my_collection';
                                }
                        });
                });
        @endforeach
</script>
