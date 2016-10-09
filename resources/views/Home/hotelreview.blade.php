<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店点评</title>
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



	<div>
	<input type="hidden" name="" id="__VIEWSTATE" value=""/>
	</div>

	<div class="container">
	<ul class="unstyled hotel-bar">
		<li class="first">
	    <a href="hotel">房型</a>
		</li>
		<li><a href="hotelinfo">简介</a></li>
		<li><a href="hotelmap">地图</a></li>
		<li><a href="hotelreview" class="active">评论</a></li>
	</ul>
	<script type="text/javascript">
	    $('#titleString').text($(document)[0].title);
	</script>

	<div class="hotel-comment-list">
		  @foreach($data as $v)
	      <div class="hotel-user-comment">
					<span class="hotel-user"><img width="32" height="12" src="storage/uploads/{{$v['u_img']}}">{{$v['u_name']}}:</span>
					<div class="hotel-user-comment-cotent">
						<p> {{$v['com_text']}} </p>
						<span>{{$v['com_time']}}</span>
					</div>
				</div>
			@endforeach
			 <?php echo $data->render();?>
	      <div class="hotel-user-comment hotel-apply-user-comment none">
					<div class="hotel-apply-comment">
						<div class="hotel-apply-div"><span class="hotel-user">店长回复</span></div>
						<div class="hotel-user-comment-cotent">
							<p></p>
					</div>
					</div>
				</div>
			</div>


	            <div class="page">

	<!-- AspNetPager V7.2 for VS2005 & VS2008  Copyright:2003-2008 Webdiyer (www.webdiyer.com) -->
	<div id="ctl00_ContentPlaceHolder1_AspNetPager1" style="width:100%;text-align:center;">
	<!-- <a class="nextprebutton" class="nextprebutton" disabled="disabled" style="margin-right:5px;">上页</a><span class="currentpage" style="margin-right:5px;">1</span><a href="HotelReview.aspx@id=5&page=2" style="margin-right:5px;">2</a><a href="HotelReview.aspx@id=5&page=3" style="margin-right:5px;">3</a><a href="HotelReview.aspx@id=5&page=4" style="margin-right:5px;">4</a><a href="HotelReview.aspx@id=5&page=5" style="margin-right:5px;">5</a><a href="HotelReview.aspx@id=5&page=6" style="margin-right:5px;">...</a><a class="nextprebutton" class="nextprebutton" href="HotelReview.aspx@id=5&page=2" style="margin-right:5px;">下页</a> -->

	</div>
	<!-- AspNetPager V7.2 for VS2005 & VS2008 End -->


	    </div>
	</div>
	<div id="<pl></pl>">
		<table>
			<tr>
				<td>用户评论:</td>
				<td><textarea id="com_text"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" id="submit" value="评论" /></td>
			</tr>
		</table>
	</div>


  @include('home.home_footer')

</body>
</html>
<script src="Home/js/jquery.js">

</script>
<script type="text/javascript">
        $("#submit").click(function(){
                var com_text = $("#com_text").val();
                $.get('comment_pro',{'com_text':com_text},function(e){
                        if(e == 0){
                                alert('你还没有在这家酒店消费，请消费过后再来评论。');
                        }else if(e == 1){
                                alert('你已经评论过了。');
                        }else{
                                alert('评论成功。');
                                location.href='hotelreview';
                        }
                });
        });
</script>
