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
								角色管理
								<small>
									<i class="icon-double-angle-right"></i>
									分配角色
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal"  role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名:  </label>

										<div>
										<select class="manager_id" style="margin-left:12px;" id="form-field-select-2" >
                                                                                        @foreach($data['owner'] as $v)
                                                                                                <option value="{{ $v['manager_id'] }}">{{ $v['manager_name'] }}</option>
                                                                                        @endforeach
										</select>
				                                                </div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分配角色: </label>

										<div class="col-sm-9">
                                                                                        @foreach($data['role'] as $v)
                                                                                                <input type="checkbox" name="role_id" value="{{  $v['role_id'] }}">{{ $v['role_name'] }}&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        @endforeach
										</div>
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
                        $("#sub").click(function(){
                                var manager_id = $(".manager_id").val();
                                //alert(manager_id);
                                var chk_value =[];
                                $('input[name="role_id"]:checked').each(function(){
                                        chk_value.push($(this).val());
                                });
                                //alert(chk_value);
                                $.get('roleTaskpro',{'manager_id':manager_id,'role_id':chk_value},function(msg){
                                        if(msg){
                                                alert('分配成功');
                                        }
                                });
                        });
                </script>
</body>
</html>
