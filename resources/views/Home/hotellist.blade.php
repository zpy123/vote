<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="Home/css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="Home/js/zepto.js"></script>

</head>
<body>
 <div class="header">
@include('home.home_head')
<div class="title" id="titleString">酒店列表</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>


  <div class="container hotellistbg">
         <ul class="unstyled hotellist">
                @foreach($arr as $v)
                     <li>
                      <a href="hotel?id={{ $v['pub_id'] }}">
                         <img class="hotelimg fl" src="storage/uploads/{{ $v['pub_img'] }}" />
                      <div class="inline">
                         <p>
                                <h3>{{ $v['pub_name'] }} <a href="javascript:void(0)" id="shou_{{ $v['pub_id'] }}" class="{{$v['pub_id'] }}" style="color:red"><img src="Home/img/shoucang.jpg" style='width:25px;height:20px' /></a> </h3>
                         </p>
                          <p>地址：{{ $v['region_name'] }}</p>
                          <p>销量：<font color='red'>{{ $v['pub_xiao'] }}</font>单</p>
                      </div>
                      <div class="clear"></div>
                       </a>
                       <ul class="unstyled">
                           <li><a href="hotel?id={{ $v['pub_id'] }}" class="order">预订</a></li>
                           <li><a href="HotelGps?id={{ $v['pub_id'] }}" class="gps">导航</a></li>
                           <li><a href="Hotelinfo?id={{ $v['pub_id'] }}" class="reality">实景</a></li>

                       </ul>
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
        @foreach($arr as $v)
                $("#shou_{{ $v['pub_id'] }}").click(function(){
                        var id = $("#shou_{{ $v['pub_id'] }}").attr('class');
                        $.get('collection',{'pub_id':id},function(e){
                                if(e == 1){
                                        alert('收藏成功');
                                }else if(e == 2){
                                        alert('你已经收藏过了!');
                                }else{
                                        alert('收藏失败');
                                }
                        });
                });
        @endforeach
</script>
