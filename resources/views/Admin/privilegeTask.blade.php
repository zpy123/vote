<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>微酒店</title>
		<meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
		<meta name="description" content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="Admin/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="Admin/css/font-awesome.min.css" />
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">


			@include('admin.main')

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Forms</a>
							</li>
							<li class="active">Form Elements</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								权限
								<small>
									<i class="icon-double-angle-right"></i>
									分配权限
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal"   role="form">
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 角色名称 </label>
                                        <div>
											<select class="" style="margin-left:12px;" id="role_id"  onchange="change()">
	                                            <option value="0">请选择</option>
	                                            @foreach($data['role'] as $v)
	                                            <option value="{{ $v['role_id'] }}">{{ $v['role_name'] }}</option>
	                                            @endforeach
											</select>
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分配权限 </label>

										<div class="col-sm-9" id='priChecked'>
											@foreach($data['privilege'] as $v)
										        @if( $v['level'] ==0)
										        		<input type="checkbox" id="dian"  name="pri_id" value="{{  $v['pri_id'] }}">{{ $v['pri_name'] }}<br/>
										        @else
													||--<input type="checkbox" id="dian" name="pri_id" value="{{$v['pri_id'] }}">{{ $v['pri_name'] }}<br/>
										        @endif
											@endforeach
										</div>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" id="sub" type='button'>
												<i class="icon-ok bigger-110"></i>
												Submit
											</button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				@include('admin.di')
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- inline scripts related to this page -->
    <script src="Admin/js/jquery.js"></script>
	<script type="text/javascript">
                //$().click();
		$("#sub").click(function(){
			var role_id = $("#role_id").val();
			var chk_value =[];
			$('input[name="pri_id"]:checked').each(function(){
				chk_value.push($(this).val());
			});
			//alert(chk_value);
			$.get('privilegeTaskpro',{'role_id':role_id,'pri_id':chk_value},function(msg){
				if (msg == 0) {
				alert('权限分配成功');
				}
			});
        });
	    function change(){
            var role_id = $("#role_id").val();
            // alert(role_id);die;
            $.get('privilegeChecked',{'role_id':role_id},function(msg){
            	//alert(msg);
            	$('#priChecked').html(msg);
            });
	    }
	</script>
</body>
</html>
