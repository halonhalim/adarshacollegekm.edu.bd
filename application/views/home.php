<?php $documents = $this->documents_model->document_list(); ?>

			<!--Begin:Slider-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php $home_banner = $this->banners_model->home_banner(); ?>
				<section class="jk-slider">
					<div id="carousel-example" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php foreach($home_banner as $key => $row) { ?>
								<li data-target="#carousel-example" data-slide-to="<?php echo $key;?>" class="<?php echo ($key==0)?"active":"";?>"></li>
							<?php } ?>
						</ol>
						<div class="carousel-inner">
							<?php foreach($home_banner as $key => $row) { ?>
								<div class="item <?php echo ($key==0)?"active":"";?>">
									<a href="#"><img src="<?php echo base_url().'assets/filemanager/banners/'.$row->file_name;?>" /></a>
								</div>
							<?php } ?>
						</div>
						<a class="left carousel-control " href="#carousel-example" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left carousel_custom"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right carousel_custom"></span>
						</a>
					</div>
				</section>
			</div>
			<!--End:Slider-->

			<!--Begin:News-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="news"><!-- Begin : news -->
					<div class="news_head">
						<h6 class="news_h6_span">নিউজ আপডেট :</h6>
					</div>
					<div class="news_main">
						<div id="news_ticker" style="overflow: hidden; position: relative; height: 30px;" class="">
							<ul style="position: absolute; margin: 0px; padding: 0px; top: 0px;">
								<?php foreach ($this->news_model->news_list() as $row) { ?>
								<li style="margin: 0px; padding: 0px; height: 30px;"><a href="<?php echo base_url().'page/news/'.$row->id;?>"><p class="news_h6"> <?php echo $row->title; ?> </p></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--End:News-->

			<!--Begin:Main content-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="main-page">
					<div class="row">
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<!--Begin:main-section-leftside-->
							<div class="main-section-leftside">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="head-master-box">
											<?php foreach ($this->static_page_model->page_list() as $row) { if (in_array($row->id, array(1))) { ?>
												<div class="head-title">
													<h2><?php echo $row->title;?></h2>
												</div>
												<div class="head-descrive">
													<p class='paragraph'>
														<?php
															if ($row->file_name) {
																echo "<img src='".base_url().'assets/filemanager/static_page/'.$row->file_name."' style='float:left; max-width:150px; margin-top:5px; margin-right:10px;' class='img-thumbnail' />";
															}
															echo nl2br(read_more($row->details, 125));
														?>
														<span class="read-more">
															<a href="<?php echo base_url()."page/single/".$row->slug;?>">আরো পড়ুন </a>
														</span>
													</p>
												</div>
											<?php } } ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div id="page-box-all">

										<!--Begin:Category box-->
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="page-box">
												<div class="page-box-titel">
													<h1>শিক্ষার্থী তথ্য</h1>
												</div>
												<div class="page-box-descrive">
													<div class="page-box-left">
													   <a href="#"><img src="<?php echo base_url().'assets/site/';?>images/interface/bg_box01.png"></a>
													</div>
													<div class="page-box-right">
														<ul>
															<li><a href="<?php echo base_url().'page/content/student-attendance';?>">শিক্ষার্থীর উপস্থিতি/অনুপস্থিতির তথ্য</a></li>
															<li><a href="<?php echo base_url().'page/content/student-scholarship';?>">কৃতি শিক্ষার্থী তথ্য </a></li>
														</ul>
													</div>

												</div>
											</div>
										</div>
										<!--End:Category box-->

										<!--Begin:Category box-->
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="page-box">
												<div class="page-box-titel" style="background: rgba(0, 0, 0, 0) linear-gradient(to right, #058649 0%, #3ad28a 100%) repeat scroll 0 0">
													<h1>শিক্ষকমন্ডলীর তথ্য</h1>
												</div>
												<div class="page-box-descrive">
													<div class="page-box-left">
														<a href="#"><img src="<?php echo base_url().'assets/site/';?>images/interface/bg_box02.png"></a>
													</div>
													<div class="page-box-right">
														<ul>
															<li><a href="<?php echo base_url().'page/content/teacher';?>"> শিক্ষকমন্ডলীর তথ্য </a></li>
															<?php foreach ($documents as $row) { if (in_array($row->id, array(9))) { ?>
																<li><a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span></span><?php echo $row->title;?></a></li>
															<?php } } ?>
															<li><a href="<?php echo base_url().'page/content/teacher-attendance';?>"> উপস্থিতি/অনুপস্থিতির তথ্য </a></li>
														</ul>
													</div>

												</div>
											</div>
										</div>
										<!--End:Category box-->

										<!--Begin:Category box-->
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="page-box">
												<div class="page-box-titel" style="background: rgba(0, 0, 0, 0) linear-gradient(to right, #945b02 0%, #df9921 100%) repeat scroll 0 0">
													<h1>ডাউনলোড</h1>
												</div>
												<div class="page-box-descrive">
													<div class="page-box-left">
														<a href="#"><img src="<?php echo base_url().'assets/site/';?>images/interface/bg_box03.png"></a>
													</div>
													<div class="page-box-right" style="overflow-y: scroll">
														<ul>
															<?php foreach ($documents as $row) { if (in_array($row->id, array(5, 6, 7))) { ?>
																<li><a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span><?php echo $row->title;?></span></a></li>
															<?php } } ?>
														</ul>
													</div>

												</div>
											</div>
										</div>
										<!--End:Category box-->

										<!--Begin:Category box-->
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="page-box">
												<div class="page-box-titel" style="background: rgba(0, 0, 0, 0) linear-gradient(to right, #1a74af 0%, #50ace8 100%) repeat scroll 0 0">
													<h1>একাডেমিক তথ্য</h1>
												</div>
												<div class="page-box-descrive">
													<div class="page-box-left">
														<a href="#"><img src="<?php echo base_url().'assets/site/';?>images/interface/bg_box04.png"></a>
													</div>
													<div class="page-box-right">
														<ul>
															<?php foreach ($documents as $row) { if (in_array($row->id, array(1, 2, 8))) { ?>
																<li><a href="<?php echo base_url().'assets/filemanager/documents/'.$row->file_name;?>" target="_blank"><span><?php echo $row->title;?></span></a></li>
															<?php } } ?>
																<li><a href="<?php echo base_url().'page/content/multimedia-content';?>">মাল্টিমিডিয়া ক্লাস তথ্য </a></li>
														</ul>
													</div>

												</div>
											</div>
										</div>
										<!--End:Category box-->

									</div>
								</div>
							</div>
							<!--End: main-section-leftside-->
						</div>
						<!--Begin:main-section-rightside-->
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 right-section-padding">
							<?php $this->load->view('sidebar');?>
						</div>
						<!--Begin: main-section-rightside-->
					</div>
				</div>
			</div>
			<!--End:Main content-->
		</div>
	</div>
</div>