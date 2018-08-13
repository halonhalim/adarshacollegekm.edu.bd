<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $breadcrumb; ?></title>
		<meta name="author" content="oYo" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="<?php echo base_url() . 'assets/admin/img/' ?>favicon.png" >    
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/' ?>css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/' ?>fonts/font-awesome.min.css" />
		<!-- image fancy box -->
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/' ?>css/colorbox.min.css" />    
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/' ?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!-- form-elements page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/' ?>css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/' ?>css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/' ?>css/bootstrap-datepicker3.min.css" />

		<!-- inline styles related to this page -->
		<style>
			.form-actions { padding:5px; margin:0px -12px -12px -12px; }
			.form-group { margin-bottom: 5px; }
			.txtDetails { height:250px; }
			.txtDetails2 { height:100px; }
			.error { color:#f00; font-size:12px; }
			.success { color:#0C7033; font-size:12px; }
			.actionForm {display: inline;}
			.actionForm button {border-radius: 3px; padding: 0px 3px; margin-left: 5px;}
			.user-info {max-width: 200px;}
		</style> 

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo base_url() . 'dashboard'; ?>" class="navbar-brand"> <img src="<?php echo base_url() . 'assets/admin/' ?>img/admin-logo.png" /> </a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url() . 'assets/admin/' ?>avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info"> <small><?php echo $this->session->userdata('name'); ?></small> <?php echo $this->session->userdata('roles'); ?> </span> <i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li> <a href="<?php echo base_url(); ?>" target="_blank"> <i class="ace-icon fa fa-eye"></i> View Website </a> </li>
								<li class="divider"></li>
								<li> <a onClick="return altPassword();" href="<?php echo base_url() . 'users/epassword'; ?>"> <i class="ace-icon fa fa-asterisk"></i> Change Password </a> </li>
								<li class="divider"></li>
								<li> <a onClick="return altLogout();" href="<?php echo base_url() . 'login/logout'; ?>"> <i class="ace-icon fa fa-power-off"></i> Sign Out </a> </li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try {
					ace.settings.loadState('main-container')
				} catch (e) {
				}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try {
						ace.settings.loadState('sidebar')
					} catch (e) {
					}
				</script>

				<ul class="nav nav-list">                
					
					<li class="<?php if (in_array($breadcrumb, array("ড্যাশবোর্ড"))) echo 'active'; ?>"> <a href="<?php echo base_url() . 'dashboard' ?>"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> ড্যাশবোর্ড </span> </a> <b class="arrow"></b> </li>                
						
					<li class="<?php if (in_array($breadcrumb, array("ব্যানার"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-folder"></i> <span class="menu-text"> ব্যানার </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<li class=""> <a href="<?php echo base_url() . 'banners/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নতুন ব্যানার আপলোড করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'banners'; ?>"> <i class="menu-icon fa fa-caret-right"></i> ম্যানেজ ব্যানার </a> <b class="arrow"></b> </li>
						</ul>
					</li>
					
					<?php foreach ($this->static_page_model->page_list() as $row) {  if (in_array($row->id, array(1))) { ?>
						<li class="<?php if ($breadcrumb == $row->title) echo 'active'; ?>"> <a href="<?php echo base_url() . 'static_page/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> <?php echo $row->title; ?> </span> </a> <b class="arrow"></b> </li>                
					<?php } } ?>
						
					<li class="<?php if (in_array($breadcrumb, array("প্রতিষ্ঠানের ইতিহাস", "প্রতিষ্ঠানের ভৌত অবকাঠামো", "প্রতিষ্ঠানের লক্ষ্য ও অর্জন"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> প্রতিষ্ঠানের তথ্য </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<?php foreach ($this->static_page_model->page_list() as $row) { if (in_array($row->id, array(2, 3, 4))) { ?>
								<li class=""> <a href="<?php echo base_url() . 'static_page/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $row->title; ?> </a> <b class="arrow"></b> </li>
							<?php } } ?>
						</ul>
					</li>
					
					<li class="<?php if (in_array($breadcrumb, array("৩য় ও ৪র্থ শ্রেণী কর্মচারীর তথ্য", "শিক্ষকমন্ডলীর তথ্য", "শিক্ষকমন্ডলীর উপস্থিতি/অনুপস্থিতির তথ্য"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> শিক্ষকমন্ডলীর তথ্য </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<li class=""> <a href="<?php echo base_url() . 'teacher/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নতুন শিক্ষক সংযোজন করুন</a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'teacher'; ?>"> <i class="menu-icon fa fa-caret-right"></i> শিক্ষকমন্ডলীর তালিকা </a> <b class="arrow"></b> </li>
							<?php foreach ($this->documents_model->document_list() as $row) { if (in_array($row->id, array(9))) { ?>
								<li class=""> <a href="<?php echo base_url() . 'documents/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $row->title; ?> </a> <b class="arrow"></b> </li>
							<?php } } ?>
							<li class=""> <a href="<?php echo base_url() . 'teacher_attendance/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> শিক্ষকমন্ডলীর উপস্থিতি/অনুপস্থিতি সংযোজন করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'teacher_attendance'; ?>"> <i class="menu-icon fa fa-caret-right"></i> শিক্ষকমন্ডলীর উপস্থিতি/অনুপস্থিতির তালিকা </a> <b class="arrow"></b> </li>
						</ul>
					</li>
					
					<li class="<?php if (in_array($breadcrumb, array("৬ষ্ঠ শ্রেণীর শিক্ষার্থী তথ্য", "৭ম শ্রেণীর শিক্ষার্থী তথ্য", "৮ম শ্রেণীর শিক্ষার্থী তথ্য", "৯ম শ্রেণীর শিক্ষার্থী তথ্য", "১০ম শ্রেণীর শিক্ষার্থী তথ্য", "বর্তমান শিক্ষার্থীর উপস্থিতি/অনুপস্থিতির তথ্য", "কৃতি শিক্ষার্থী তথ্য"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> শিক্ষার্থী তথ্য </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<?php foreach ($this->documents_model->document_list() as $row) { if (in_array($row->id, array(10, 11, 12, 13, 14))) { ?>
								<li class=""> <a href="<?php echo base_url() . 'documents/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $row->title; ?> </a> <b class="arrow"></b> </li>
							<?php } } ?>
							<li class=""> <a href="<?php echo base_url() . 'student_attendance/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> বর্তমান শিক্ষার্থীর উপস্থিতি/অনুপস্থিতি সংযোজন করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'student_attendance'; ?>"> <i class="menu-icon fa fa-caret-right"></i> বর্তমান শিক্ষার্থীর উপস্থিতি/অনুপস্থিতির তালিকা</a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'student_scholarship/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> কৃতি শিক্ষার্থীর তথ্য সংযোজন করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'student_scholarship'; ?>"> <i class="menu-icon fa fa-caret-right"></i> কৃতি শিক্ষার্থীর তালিকা </a> <b class="arrow"></b> </li>
						</ul>
					</li>
					
					<li class="<?php if (in_array($breadcrumb, array("একাডেমিক ক্যালেন্ডার", "ক্লাস রুটিন", "ভর্তি ফর্ম", "মাল্টিমিডিয়া ক্লাস কন্টেন্ট"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> একাডেমিক </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<?php foreach ($this->documents_model->document_list() as $row) { if (in_array($row->id, array(1, 2, 8))) { ?>
								<li class=""> <a href="<?php echo base_url() . 'documents/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $row->title; ?> </a> <b class="arrow"></b> </li>
							<?php } } ?>
							<li class=""> <a href="<?php echo base_url().'multimedia_content/add';?>"> <i class="menu-icon fa fa-caret-right"></i> মাল্টিমিডিয়া ক্লাস কন্টেন্ট সংযোজন করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url().'multimedia_content';?>"> <i class="menu-icon fa fa-caret-right"></i> মাল্টিমিডিয়া ক্লাস কন্টেন্ট </a> <b class="arrow"></b> </li>
							
						</ul>
					</li>
					
					<?php foreach ($this->static_page_model->page_list() as $row) {  if (in_array($row->id, array(5))) { ?>
						<li class="<?php if ($breadcrumb == $row->title) echo 'active'; ?>"> <a href="<?php echo base_url() . 'static_page/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> <?php echo $row->title; ?> </span> </a> <b class="arrow"></b> </li>                
					<?php } } ?>					
									
					<li class="<?php if (in_array($breadcrumb, array("ফলাফল"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> ফলাফল </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<li class=""> <a href="<?php echo base_url().'results/add';?>"> <i class="menu-icon fa fa-caret-right"></i> ফলাফল সংযোজন করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url().'results';?>"> <i class="menu-icon fa fa-caret-right"></i> ম্যানেজ ফলাফল </a> <b class="arrow"></b> </li>
						</ul>
					</li>
									
					<li class="<?php if (in_array($breadcrumb, array("কম্পিউটার ল্যাব", "সাংস্কৃতিক কার্যক্রম", "লাইব্রেরি"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> সুবিধাসমুহ </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<?php foreach ($this->static_page_model->page_list() as $row) { if (in_array($row->id, array(6, 7, 8))) { ?>
								<li class=""> <a href="<?php echo base_url() . 'static_page/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $row->title; ?> </a> <b class="arrow"></b> </li>
							<?php } } ?>
						</ul>
					</li>
					
					<li class="<?php if (in_array($breadcrumb, array("বার্ষিক পরিকল্পনা", "পঞ্চবার্ষিক পরিকল্পনা"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> পরিকল্পনা </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<?php foreach ($this->documents_model->document_list() as $row) { if (in_array($row->id, array(3, 4))) { ?>
								<li class=""> <a href="<?php echo base_url() . 'documents/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $row->title; ?> </a> <b class="arrow"></b> </li>
							<?php } } ?>
						</ul>
					</li>					

					<?php foreach ($this->static_page_model->page_list() as $row) {  if (in_array($row->id, array(9))) { ?>
						<li class="<?php if ($breadcrumb == $row->title) echo 'active'; ?>"> <a href="<?php echo base_url() . 'static_page/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> <?php echo $row->title; ?> </span> </a> <b class="arrow"></b> </li>                
					<?php } } ?>
						
					<li class="<?php if (in_array($breadcrumb, array("ফটো গ্যালারী", "ভিডিও গ্যালারী"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-folder-open-o"></i> <span class="menu-text"> গ্যালারী </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<li class=""> <a href="<?php echo base_url() . 'photos/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> ফটো আপলোড করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'photos'; ?>"> <i class="menu-icon fa fa-caret-right"></i> ফটো গ্যালারী </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'videos/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> ভিডিও আপলোড করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'videos'; ?>"> <i class="menu-icon fa fa-caret-right"></i> ভিডিও গ্যালারী </a> <b class="arrow"></b> </li>
						</ul>
					</li>
					
					<li class="<?php if (in_array($breadcrumb, array("যোগাযোগ"))) echo 'active'; ?>"> <a href="<?php echo base_url() . 'contact'; ?>"> <i class="menu-icon fa fa-map-marker"></i> <span class="menu-text"> যোগাযোগ </span> </a> <b class="arrow"></b> </li>                
					
					<li class="<?php if (in_array($breadcrumb, array("নিউজ আপডেট"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> নিউজ আপডেট </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<li class=""> <a href="<?php echo base_url() . 'news/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নতুন নিউজ সংযোজন করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'news'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নিউজ আপডেটের তালিকা </a> <b class="arrow"></b> </li>
						</ul>
					</li>
					
					<li class="<?php if (in_array($breadcrumb, array("নোটিশ বোর্ড"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> নোটিশ বোর্ড </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<li class=""> <a href="<?php echo base_url() . 'notice/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নতুন নোটিশ সংযোজন করুন </a> <b class="arrow"></b> </li>
							<li class=""> <a href="<?php echo base_url() . 'notice'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নোটিশ বোর্ডের তালিকা </a> <b class="arrow"></b> </li>
						</ul>
					</li>
											
					<li class="<?php if (in_array($breadcrumb, array("প্রত্যয়ন পত্রের নমুনা", "J.S.C. নাম সংশোধন", "S.S.C. পরীক্ষার ফরম"))) echo 'active'; ?>"> 
						<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-leaf"></i> <span class="menu-text"> ডাউনলোড </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
						<ul class="submenu">
							<?php foreach ($this->documents_model->document_list() as $row) { if (in_array($row->id, array(5, 6, 7))) { ?>
								<li class=""> <a href="<?php echo base_url() . 'documents/edit/'.md5($row->id) ?>"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $row->title; ?> </a> <b class="arrow"></b> </li>
							<?php } } ?>
						</ul>
					</li>
					
					<?php if ($this->session->userdata('roles')=='SuperAdmin') { ?>
						<li class="<?php if (in_array($breadcrumb, array("Users", "Restore DB", "পেইজ", "ডকুমেন্ট"))) echo 'active'; ?>"> 
							<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> Administrator </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
							<ul class="submenu">
								<li class=""> <a href="<?php echo base_url() . 'static_page/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নতুন পেইজ তৈরী করুন </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'static_page'; ?>"> <i class="menu-icon fa fa-caret-right"></i> ম্যানেজ পেইজ </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'documents/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> নতুন ডকুমেন্ট তৈরী করুন </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'documents'; ?>"> <i class="menu-icon fa fa-caret-right"></i> ম্যানেজ ডকুমেন্ট </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'users/add'; ?>"> <i class="menu-icon fa fa-caret-right"></i> Add New User </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'users'; ?>"> <i class="menu-icon fa fa-caret-right"></i> Manage Users </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'users/backup_db' ?>"> <i class="menu-icon fa fa-caret-right"></i> Backup DB </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'users/restore_db' ?>"> <i class="menu-icon fa fa-caret-right"></i> Restore DB </a> <b class="arrow"></b> </li>
								<li class=""> <a href="<?php echo base_url() . 'users/delete_all_cache_file' ?>"> <i class="menu-icon fa fa-caret-right"></i> Delete All Cache File </a> <b class="arrow"></b> </li>
							</ul>
						</li>     
					<?php } ?>
						
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<?php echo '<li><h4>' . $breadcrumb . '</h4><li>'; ?> <span id="msg"> <?php echo $this->session->userdata('msg'); ?> </span> 
						</ul><!-- /.breadcrumb -->
						<div class="nav-search" id="nav-search">
							<span class="red"> * field is required. </span>
						</div><!-- /.nav-search -->
					</div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->