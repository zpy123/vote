<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>最新活动</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" /><link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="Home/css/NewGlobal.css" rel="stylesheet" />
<script type="text/javascript" src="Home/js/zepto.js"></script>
</head>
<body>
 <div class="header">
@include('home.home_head')
<div class="title" id="titleString">最新活动</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>


    <div class="container width90">
    <ul class="unstyled activitylist">
                @foreach($arr as $v)
                  @if($v['act_stime']<=$date && $v['act_etime']>=$date)
                  <li>
                      <a href="javascript:void(0);">
                      <img src="upload/article-img/{{$v['act_img']}}"/>
                      <p>{{$v['act_name']}}（{{$v['act_stime']}}）</p></a>
                      <p>截止时间:{{ $v['act_etime'] }} </p>

                  </li>
                  @else
                  @endif
                @endforeach
            </ul>
      </div>


  @include('home.home_footer')

</body>
</html>
