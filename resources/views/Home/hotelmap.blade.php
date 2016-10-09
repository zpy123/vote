<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店地图</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<style type="text/css">
        body, html {width: 100%;height: 100%;margin:0 auto;font-family:"微软雅黑";}
        #allmap{width:100%;height:500px;}
        p{margin-left:5px; font-size:14px;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=g0BaIEanAbGyZSl2PxY3h7FGdbOrRmen"></script>
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
        <li><a href="hotelinfo" >简介</a></li>
        <li><a href="hotelmap" class="active">地图</a></li>
        <li><a href="hotelreview">评论</a></li>
</ul>
<script type="text/javascript">
    $('#titleString').text($(document)[0].title);
</script>

<div id="allmap"></div>
</div>

</div>

  @include('home.home_footer')

</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.417854,39.921988);
	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.centerAndZoom(point, 15);
	var opts = {
	  width : 200,     // 信息窗口宽度
	  height: 100,     // 信息窗口高度
	  title : "美假微酒店{{$address }}店" , // 信息窗口标题
	  enableMessage:true,//设置允许信息窗发送短息
	  message:"亲耐滴，晚上一起开个房把~"
	}
	var infoWindow = new BMap.InfoWindow("{{ $address }}", opts);  // 创建信息窗口对象
	marker.addEventListener("click", function(){
		map.openInfoWindow(infoWindow,point); //开启信息窗口
	});
</script>
