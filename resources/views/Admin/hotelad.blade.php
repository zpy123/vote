<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>酒店添加</title>
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

		<link rel="stylesheet" href="Admin/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="Admin/css/chosen.css" />
		<link rel="stylesheet" href="Admin/css/datepicker.css" />
		<link rel="stylesheet" href="Admin/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="Admin/css/daterangepicker.css" />
		<link rel="stylesheet" href="Admin/css/colorpicker.css" />

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

	<style type="text/css">
		body{
			font:14px/28px "微软雅黑";
		}
		.contact *:focus{outline :none;}
		.contact{
			width: 900px;
			height: auto;
			background: ;
			margin: 0px auto;
			padding: 0px;
		}
		.contact ul {
			width: 650px;
			margin: 0 auto;
		}
		.contact ul li{
			border-bottom: 1px solid #dfdfdf;
			list-style: none;
			padding: 12px;
		}
		.contact ul li label {
			width: 120px;
			display: inline-block;
			float: left;
		}
		.contact ul li input[type=text],.contact ul li input[type=password]{
			width: 220px;
			height: 25px;
			border :1px solid #aaa;
			padding: 3px 8px;
			border-radius: 5px;
		}
		.contact ul li input:focus{
			border-color: #c00;

		}
		.contact ul li input[type=text]{
			transition: padding .25s;
			-o-transition: padding  .25s;
			-moz-transition: padding  .25s;
			-webkit-transition: padding  .25s;
		}
		.contact ul li input[type=password]{
			transition: padding  .25s;
			-o-transition: padding  .25s;
			-moz-transition: padding  .25s;
			-webkit-transition: padding  .25s;
		}
		.contact ul li input:focus{
			padding-right: 0px;
		}
		.tips{
			color: rgba(0, 0, 0, 0.5);
			padding-left: 0px;
		}
		.tips_true,.tips_false{
			padding-left: 0px;
		}
		.tips_true{
			color: green;
		}
		.tips_false{
			color: red;
		}
  </style>
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
								<a href="#">主页</a>
							</li>

							<li>
								<a href="#">表单</a>
							</li>
							<li class="active">酒店添加管理</li>
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
								酒店添加管理
								<small>
									<i class="icon-double-angle-right"></i>

								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" name="form1" action="hoteladd" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 酒店名称</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="Pub_name" placeholder="请输入酒店名称" class="col-xs-10 col-sm-5" onblur="checkna()" required/><span class="tips" id="divname"></span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 经营者姓名</label>

										<div class="col-sm-9">
											<input type="text" name="Pub_boss" id="form-field-2" placeholder="经营者姓名" class="col-xs-10 col-sm-5" onblur="checkna1()" required/><span class="tips" id="divname1">长度1~5个字符</span>

										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> 酒店电话 </label>

										<div class="col-sm-9">
											<input type="text" name="Pub_phone" id="form-field-3" placeholder="酒店电话" class="col-xs-10 col-sm-5" onblur="checkna2()" required/><span class="tips" id="divname2">长度1~11个字符</span>

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> 地区联动 </label>

										<div class="col-sm-9">
											<select name="province" id="province" onchange="pro_change(this)">
								                <option value="">请选择</option>
								            </select>
											<select name="city" id="city" onchange="city_change(this)">
								                <option value="">请选择</option>
								            </select>
											<select name="county" id="county">
								                <option value="">请选择</option>
								            </select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4">酒店邮件</label>

										<div class="col-sm-9">
											<input class="col-xs-10 col-sm-5" name="Pub_email" type="text" id="form-field-4" placeholder="酒店邮件" onblur="checkmail()" required/><span class="tips" id="divmail"></span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5">酒店简介</label>

										<div class="col-sm-9">
											<div class="clearfix">
												<textarea class="form-control" name="Pub_content" id="form-field-5" placeholder="酒店简介"></textarea>
											</div>

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5">酒店房间</label>

										<div class="col-sm-9">
											<input class="col-xs-10 col-sm-5" name="Pub_room" type="text" id="form-field-7" placeholder="酒店房间" />
										</div>
									</div>

									<div class="space-4"></div>



									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">最低房价</label>

										<div class="col-sm-9">
											<input class="col-xs-10 col-sm-5" name="Pub_minprice" type="text" id="form-field-6" placeholder="最低房价" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-6">最高房价</label>

										<div class="col-sm-9">
											<input class="col-xs-10 col-sm-5" name="Pub_maxprice" type="text" id="form-field-7" placeholder="最高房价" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">酒店全景</label>

										<div class="col-sm-9">
											<input type="file" name="Pub_img" id="id-input-file-2" />
										</div>
									</div>


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												添加
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								</form>
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

		<!-- basic scripts -->
		<script>
			var flag;
			function checkna(){
	  		var Pub_name=document.getElementsByName('Pub_name')[0].value;
	  		//alert(Pub_name);
                var reg=/^[\u4e00-\u9fa5]{2,}$/;
                if(Pub_name==""){
                    divname=document.getElementById('divname');
                    divname.innerHTML="不能为空";
                    divname.style.color="red";
                    return false;
                }else{
                	if(reg.test(Pub_name)){
                		    var ajax= new XMLHttpRequest();
		                    ajax.open('get','hotel_name?Pub_name='+Pub_name);
		                    ajax.send();
		                    ajax.onreadystatechange=function(){
		                        if(ajax.readyState==4&&ajax.status==200){
		                            if(ajax.responseText==1){
		                                divname=document.getElementById('divname');
		                                //alert(divname);
		                                divname.innerHTML="不能重复";
		                                divname.style.color="red";
		                                flag=false;
		                            }else{
		                                divname=document.getElementById('divname');
			                            divname.innerHTML="";
			                            divname.style.color="red";
			                            flag=true;
		                            }
		                        }
		                    }
                	}else{
                		    divname=document.getElementById('divname');
		                    divname.innerHTML="必须为汉字,";
		                    divname.style.color="red";
		                    flag=false;
		           }
                }
                return flag;
	  		}

			function checkna1(){
				na=form1.Pub_boss.value;
				if( na.length <1 || na.length >5)
				{
					divname1.innerHTML='<font class="tips_false">长度是1~5个字符</font>';
				}else{
					divname1.innerHTML='<font class="tips_true">输入正确</font>';
				}
			}
			function checkna2(){
				na=form1.Pub_phone.value;
				if( na.length <1 || na.length >11)
				{
					divname2.innerHTML='<font class="tips_false">长度是1~11个字符</font>';
				}else{
					divname2.innerHTML='<font class="tips_true">输入正确</font>';
				}
			}
			//验证邮箱
			function checkmail(){
				apos=form1.Pub_email.value.indexOf("@");
				dotpos=form1.Pub_email.value.lastIndexOf(".");
				if (apos<1||dotpos-apos<2)
				  {
				  	divmail.innerHTML='<font class="tips_false">输入错误</font>' ;
				  }
				else {
					divmail.innerHTML='<font class="tips_true">输入正确</font>' ;
				}
			}
		</script>

		<!--[if !IE]> -->
		<script src="Admin/js/area.js"></script>
		<script src="Admin/js/jq.js"></script>



		<script src="Admin/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='Admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='Admin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='Admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="Admin/js/bootstrap.min.js"></script>
		<script src="Admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="Admin/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="Admin/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="Admin/js/jquery.ui.touch-punch.min.js"></script>
		<script src="Admin/js/chosen.jquery.min.js"></script>
		<script src="Admin/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="Admin/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="Admin/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="Admin/js/date-time/moment.min.js"></script>
		<script src="Admin/js/date-time/daterangepicker.min.js"></script>
		<script src="Admin/js/bootstrap-colorpicker.min.js"></script>
		<script src="Admin/js/jquery.knob.min.js"></script>
		<script src="Admin/js/jquery.autosize.min.js"></script>
		<script src="Admin/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="Admin/js/jquery.maskedinput.min.js"></script>
		<script src="Admin/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->

		<script src="Admin/js/ace-elements.min.js"></script>
		<!-- // <script src="Admin/js/ace.min.js"></script> -->

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});


				$(".chosen-select").chosen();
				$('#chosen-multiple-style').on('click', function(e){
					var target = $(e.target).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
					 else $('#form-field-select-4').removeClass('tag-input-style');
				});


				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});

				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});

				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});

				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});


				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1]+"";

						if(! ui.handle.firstChild ) {
							$(ui.handle).append("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('a').on('blur', function(){
					$(this.firstChild).hide();
				});

				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});

				$( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true

					});
				});


				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});

				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var before_change
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "icon-picture";
						before_change = function(files, dropped) {
							var allowed_files = [];
							for(var i = 0 ; i < files.length; i++) {
								var file = files[i];
								if(typeof file === "string") {
									//IE8 and browsers that don't support File Object
									if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
								}
								else {
									var type = $.trim(file.type);
									if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
											|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
										) continue;//not an image so don't keep this file
								}

								allowed_files.push(file);
							}
							if(allowed_files.length == 0) return false;

							return allowed_files;
						}
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "icon-cloud-upload";
						before_change = function(files, dropped) {
							return files;
						}
					}
					var file_input = $('#id-input-file-3');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});




				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.on('change', function(){
					//alert(this.value)
				});
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});



				$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
					$(this).next().focus();
				});

				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				$('#colorpicker1').colorpicker();
				$('#simple-colorpicker-1').ace_colorpicker();


				$(".knob").knob();


				//we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
				var tag_input = $('#form-field-tags');
				if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) )
				{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
					  }
					);
				}
				else {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}




				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})

				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					$(this).find('.chosen-container').each(function(){
						$(this).find('a:first-child').css('width' , '210px');
						$(this).find('.chosen-drop').css('width' , '210px');
						$(this).find('.chosen-search input').css('width' , '200px');
					});
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/

			});
		</script>

<script>

	var obj = eval(json);
	//alert(obj.province[2]);
	var str="<option>请选择</option>";
	for(var i in obj.province){
	    str+= '<option value="'+i+'">'+obj.province[i]+'</option>';
	}
	//alert(str);
	$("#province").html(str);
	$("#county").html("<option>请选择</option>");

    function pro_change(pro){
        var id = $(pro).val();
        //alert(id);
        var str="<option>请选择</option>";
        for(var i in obj.city[id]){
            str+= '<option value="'+i+'">'+obj.city[id][i]+'</option>';
        }
        //alert(str);
        $("#city").html(str);
    }

    function city_change(pro){
        var id = $(city).val();
        //alert(id);
        var str="<option>请选择</option>";
        for(var i in obj.county[id]){
            str+= '<option value="'+i+'">'+obj.county[id][i]+'</option>';
        }
        //alert(str);
        $("#county").html(str);
    }
</script>
	<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>
