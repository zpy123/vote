<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店简介</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="Home/js/zepto.js"></script>

</head>
<body>
 <div class="header">
@include('home.home_head')
<div class="title" id="titleString"></div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>


 <!-- <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/imgzoom.js"></script> -->
<div class="container">
<ul class="unstyled hotel-bar">
        <li class="first"><a href="hotel" >房型</a></li>
        <li><a href="hotelinfo"    class="active">简介</a></li>
        <li><a href="hotelmap">地图</a></li>
        <li><a href="hotelreview">评论</a></li>
</ul>
<script type="text/javascript">
    $('#titleString').text($(document)[0].title);
</script>
@foreach($arr as $v)
<div class="hotel-prompt ">
    <span class="hotel-prompt-title">酒店图片</span>
<div id="slider" style="margin-top: 10px;">

    <div>
        <img src="storage/uploads/{{$v['pub_img']}}" style="width:250px;height:250px;margin-bottom:10px">

    </div>


</div>
</div>
<div id="hotelinfo" class="hotel-prompt ">
			<span class="hotel-prompt-title">酒店简介</span>
			<p>{{$v['pub_content']}}</p>
            <p>地址：{{$v['pub_address']}}</p>
            <p>电话：{{$v['pub_phone']}}</p>
		</div>
</div>
 @endforeach
<!-- <script>
    //创建slider组件
    $('#slider').slider({ imgZoom: true });
</script> -->


  @include('home.home_footer')

</body>
</html>
