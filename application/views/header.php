<?php
	$contact = $this->contact_model->index();
	$breadcrumb = $contact->school_name;
	$documents = $this->documents_model->document_list();
	$page_list = $this->static_page_model->page_list();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> <?php echo $breadcrumb; ?> </title>
	<link rel="shortcut icon" href="<?php echo base_url().'assets/site/favicon.ico';?>" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/client.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/addvertise_scroll.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/vticker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/menu.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/site/';?>css/styles.css" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="container">
	<div class="row">
		<div id="body_wrapper">
			<!--Begin:Header-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="header">
					<div class="header_inner">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<div class="logo">
									<a href="<?php echo base_url();?>"><img src="<?php echo base_url().'assets/filemanager/'.$contact->logo;?>"class="img-responsive" alt="<?php echo $contact->school_name;?>"> </a>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="header-right">
									<ul>
										<li>
											<div class="calender">
												<?php foreach ($documents as $row) { if (in_array($row->id, array(1))) { ?>
													<a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span><i class="fa fa-calendar" aria-hidden="true"></i></span><?php echo $row->title;?></a>
												<?php } } ?>
											</div>
										</li>
										<li>
											<div class="calender">
												<a href="<?php echo base_url().'webmail';?>" target="_blank"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ওয়েবমেইল</a>
											</div>
										</li>
										<li>
											<div class="calender">
												<a href="<?php echo base_url().'admin-panel';?>" target="_blank"><span><i class="fa fa-key" aria-hidden="true"></i></span>লগইন</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End:Header-->

			<!--Begin:Navigation-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="navigation">
					<div id='cssmenu'>
						<ul>
							<li><a href='<?php echo base_url();?>'><span>হোম</span></a></li>
							<li class='active has-sub'><a href='#'><span>  প্রতিষ্ঠানের তথ্য </span></a>
								<ul>
									<?php foreach ($page_list as $row) { if (in_array($row->id, array(2, 3, 4))) { ?>
										<li><a href="<?php echo base_url()."page/single/".$row->slug;?>"><span><?php echo $row->title;?></span></a></li>
									<?php } } ?>
								</ul>
							</li>
							<li class='active has-sub'><a href='#'><span>  শিক্ষকমন্ডলীর তথ্য  </span></a>
								<ul>
									<li><a href="<?php echo base_url().'page/content/teacher';?>"><span>  শিক্ষকমন্ডলীর তথ্য </span></a></li>
									<?php foreach ($documents as $row) { if (in_array($row->id, array(9))) { ?>
										<li><a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span></span><?php echo $row->title;?></a></li>
									<?php } } ?>
									<li><a href="<?php echo base_url().'page/content/teacher-attendance';?>"><span>  উপস্থিতি/অনুপস্থিতির তালিকা</span></a></li>
								</ul>
							</li>
							<li class='active has-sub'><a href='#'><span>  শিক্ষার্থী তথ্য  </span></a>
								<ul>
									<li class='active has-sub'><a href="#"><span>  বর্তমান শিক্ষার্থী তথ্য</span></a> 
										<ul>
											<?php foreach ($documents as $row) { if (in_array($row->id, array(10, 11, 12, 13, 14))) { ?>
												<li><a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span></span><?php echo $row->title;?></a></li>
											<?php } } ?>
										</ul>
									</li>
									<li><a href="<?php echo base_url().'page/content/student-attendance';?>"><span> উপস্থিতি/অনুপস্থিতির তালিকা</span></a></li>
									<li><a href="<?php echo base_url().'page/content/student-scholarship';?>"><span> কৃতি শিক্ষার্থী তথ্য</span></a></li>
								</ul>
							</li>
							<li class='active has-sub'><a href='#'><span>  একাডেমিক </span></a>
								<ul>
									<?php foreach ($documents as $row) { if (in_array($row->id, array(1, 2, 8))) { ?>
										<li><a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span><?php echo $row->title;?></span></a></li>
									<?php } } ?>
									<li><a href="<?php echo base_url().'page/content/multimedia-content';?>"><span> মাল্টিমিডিয়া ক্লাস তথ্য</span></a></li>
								</ul>
							</li>

							<?php foreach ($page_list as $row) { if (in_array($row->id, array(5))) { ?>
								<li><a href="<?php echo base_url()."page/single/".$row->slug;?>"><span><?php echo $row->title;?></span></a></li>
							<?php } } ?>
								
							<li><a href="<?php echo base_url().'page/content/results';?>"><span>ফলাফল </span></a></li>
							<li class='active has-sub'><a href='#'><span> সুবিধাসমূহ  </span></a>
								<ul>
									<?php foreach ($page_list as $row) { if (in_array($row->id, array(6, 7, 8))) { ?>
										<li><a href="<?php echo base_url()."page/single/".$row->slug;?>"><span><?php echo $row->title;?></span></a></li>
									<?php } } ?>
								</ul>
							</li>

							<li class='active has-sub'><a href='#'><span> পরিকল্পনা  </span></a>
								<ul>
									<?php foreach ($documents as $row) { if (in_array($row->id, array(3, 4))) { ?>
										<li><a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span><?php echo $row->title;?></span></a></li>
									<?php } } ?>
								</ul>
							</li>

							<?php foreach ($page_list as $row) { if (in_array($row->id, array(9))) { ?>
								<li><a href="<?php echo base_url()."page/single/".$row->slug;?>"><span><?php echo $row->title;?></span></a></li>
							<?php } } ?>
								
							<li class='active has-sub'><a href='#'><span> গ্যালারি </span></a>
								<ul>
									<li><a href="<?php echo base_url().'page/content/photos';?>"><span> ফটো গ্যালারী </span></a></li>
									<li><a href="<?php echo base_url().'page/content/videos';?>"><span>  ভিডিও গ্যালারি </span></a></li>
								</ul>
							</li>
							<li class='last'><a href="<?php echo base_url().'page/content/contact';?>"><span>  যোগাযোগ </span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--End:Navigation-->
			
			<!-- Begin : Inner_banner -->
			<?php if($this->uri->segment(1)!=NULL) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div id="banner_inner">
						<?php $banner = $this->banners_model->banner_by_page('অন্যান্য পেইজ'); ?>
						<img style="height:300px;width:100%" src="<?php echo base_url().'assets/filemanager/banners/'.$banner->file_name;?>" class="img-responsive" alt="Slider">
					</div>
				</div>
			<?php } ?>
			<!-- End : Inner_banner-->
