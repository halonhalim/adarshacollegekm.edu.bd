<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title><?php echo $breadcrumb; ?></title>
	<meta name="description" content="administrator login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="shortcut icon" href="<?php echo base_url().'assets/admin/img/' ?>favicon.png" >
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/admin/';?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url().'assets/admin/';?>fonts/font-awesome.min.css" />
	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/admin/';?>css/ace.min.css" />
	<link href="<?php echo base_url().'assets/admin/';?>css/ace-rtl.min.css" rel="stylesheet" />
	<style>
		.error {color:#f00; font-size:12px;}
	</style>
</head>

<body class="login-layout">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1> <img src="<?php echo base_url().'assets/admin/'?>img/admin-logo.png" /> </h1>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">

							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-info green"></i>
											Please Enter Your Information
										</h4>

										<div class="space-6"></div>
										<?php echo $this->session->userdata('msg'); ?>
										<form id="myForm" method="post" action="<?php echo base_url().'login/check_user';?>" enctype="multipart/form-data">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="username" value="<?php echo set_value('username');?>" class="form-control" placeholder="Username" required />
														<i class="ace-icon fa fa-user"></i>
													</span>
													<?php echo form_error('username');?>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="password" value="<?php echo set_value('password');?>" class="form-control" placeholder="Password" required />
														<i class="ace-icon fa fa-lock"></i>
													</span>
													<?php echo form_error('password');?>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="captcha" value="" class="form-control" placeholder="Captcha" required />
														<i class="ace-icon fa fa-eye"></i>
													</span>
													<?php echo form_error('captcha');?>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<span id="captImg"> <?php echo $captcha; ?> </span>
													<a class="refreshCaptcha" href="javascript:;"><img src="<?php echo base_url().'assets/filemanager/refresh.png';?>" width="20"> </a>
													<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>

									</div><!-- /.widget-main -->

									<div class="toolbar clearfix">
										<div>
											<a href="#" data-target="#forgot-box" class="forgot-password-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												I forgot my password
											</a>
										</div>
									</div>
								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->

							<div id="forgot-box" class="forgot-box widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header red lighter bigger">
											<i class="ace-icon fa fa-key"></i>
											Retrieve Password
										</h4>

										<div class="space-6"></div>
										<p>
											Enter your email and to receive instructions
										</p>

										<form method="post" action="<?php echo base_url().'reset-password';?>">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="email" name="email" class="form-control" placeholder="Email" required />
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>

												<div class="clearfix">
													<button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
														<i class="ace-icon fa fa-lightbulb-o"></i>
														<span class="bigger-110">Send Me!</span>
													</button>
												</div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->

									<div class="toolbar center">
										<a href="#" data-target="#login-box" class="back-to-login-link">
											Back to login
											<i class="ace-icon fa fa-arrow-right"></i>
										</a>
									</div>
								</div><!-- /.widget-body -->
							</div><!-- /.forgot-box -->
							<span class="white"> <?php echo developed_by();?> </span>
						</div><!-- /.position-relative -->
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="<?php echo base_url().'assets/admin/';?>js/jquery.min.js"></script>
	<!-- <![endif]-->
	<!--[if IE]>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url().'assets/admin/';?>js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function($) {
		 $(document).on('click', '.toolbar a[data-target]', function(e) {
			e.preventDefault();
			var target = $(this).data('target');
			$('.widget-box.visible').removeClass('visible');//hide others
			$(target).addClass('visible');//show target
		 });
		});

		//you don't need this, just used for changing background
		jQuery(function($) {
		 $('#btn-login-dark').on('click', function(e) {
			$('body').attr('class', 'login-layout');
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'blue');

			e.preventDefault();
		 });
		 $('#btn-login-light').on('click', function(e) {
			$('body').attr('class', 'login-layout light-login');
			$('#id-text2').attr('class', 'grey');
			$('#id-company-text').attr('class', 'blue');

			e.preventDefault();
		 });
		 $('#btn-login-blur').on('click', function(e) {
			$('body').attr('class', 'login-layout blur-login');
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'light-blue');

			e.preventDefault();
		 });

		});
	</script>

	<!-- Autocomplate off -->
	<script>
		$("#myForm").attr('autocomplete', 'off');
	</script>

	<!--Captcha refresh-->
	<script>
		$(function(){
			$('.refreshCaptcha').click(function(){
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url().'login/refresh_captcha'?>',
					success: function(res){
						if(res){
							$('#captImg').html(res);
						}
					}
				})
			});
		});
	</script>

</body>
</html>