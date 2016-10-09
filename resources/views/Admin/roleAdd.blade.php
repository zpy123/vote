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
									添加角色
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal"  role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色列表  </label>

										<div>
										<select class="" style="margin-left:12px;" id="form-field-select-2" >
                                                                                        @foreach($data as $v)
											<option >{{ $v }}</option>
                                                                                        @endforeach
										</select>
				                                                </div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 添加角色 </label>

										<div class="col-sm-9">
											<input type="text" id="rolename"   placeholder="rolename" class="col-xs-10 col-sm-5" />
											<span id="check_name"></span>
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
                                var rolename = $("#rolename").val();
				if(rolename == ''){
					alert('角色名称必须填写');
				}else{
					$.get('roleAdd',{'rolename':rolename},function(msg){
	                                        if(msg == 0){
	                                                alert('角色已存在，请重新添加。');
	                                        }else if(msg == 1){
	                                                alert('添加失败!!!');
	                                        }else{
	                                                alert('添加成功，去分配角色把。');
	                                        }
	                                });
				}

                        });
			$("#rolename").blur(function(){
				var rolename  = $("#rolename").val();
				if(rolename == ''){
					$("#check_name").html('角色名称不能为空');
				}
			});
                </script>
</body>
</html>
