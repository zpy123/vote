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

		<!--[if IE 7]>
		  <link rel="stylesheet" href="Admin/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="Admin/css/ace.min.css" />
		<link rel="stylesheet" href="Admin/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="Admin/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="Admin/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="Admin/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="Admin/js/html5shiv.js"></script>
		<script src="Admin/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

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
								<a href="#">Tables</a>
							</li>
							<li class="active">Simple &amp; Dynamic</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								角色管理
								<small>
									<i class="icon-double-angle-right"></i>
									角色列表
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover" style="text-align:center">
												<thead>
													<tr>
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th class="center">角色名称</th>
														<th class="center">
															操作
														</th>
													</tr>
												</thead>

												<tbody>
													@foreach($data['role'] as $k => $v)
													<tr>
														<td>{{ $k+1 }}</td>
														<td>{{ $v['role_name'] }}</td>
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																<button class="btn btn-xs btn-warning"   onclick="delrole({{ $v['role_id'] }})">
																	删除角色
																</button>
															</div>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>

										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

								<div class="hr hr-18 dotted hr-double"></div>


							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->



		<!-- inline scripts related to this page -->

</html>
<script type="text/javascript">
	if("ontouchend" in document) document.write("<script src='Admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="Admin/js/bootstrap.min.js"></script>
<script src="Admin/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<script src="Admin/js/jquery.dataTables.min.js"></script>
<script src="Admin/js/jquery.dataTables.bootstrap.js"></script>

<!-- ace scripts -->

<script src="Admin/js/ace-elements.min.js"></script>
<script src="Admin/js/ace.min.js"></script>
<script src="Admin/js/jquery.js">

</script>
<script type="text/javascript">
	function delrole(role_id){
		if(!confirm("确认要删除？")){
  				window.event.returnValue = false;
			 }
		$.get('roleDel',{'role_id':role_id},function(msg){
			if(msg){
				window.location.href='roleList';
			}
		});
	}
</script>
