<?php $page = $this->static_page_model->get_by_slug($this->uri->segment(3)); ?>

		<!--Begin: Main-section-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="main-page">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!--Begin:main-section-leftside-->
						<div class="main-section-leftside">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									 <div id="inner_p_content"><!-- Begin : inner_p_content -->
										 <h3 class="head_black">মাল্টিমিডিয়া ক্লাস তথ্য</h3>
										 <div class="multimedia_class">
											 <p class="paragraph" style="font-size:14px;"><strong style="text-decoration:underline">বি দ্র :-</strong> &nbsp; আমাদের মাল্টিমিডিয়া ক্লাস সমূহের সফট কপি ডাউনলোড করতে নিচের পাওয়ার পয়েন্ট চিহ্নিত আইকনে ক্লিক করুন   ।</p>
											 <?php foreach ($this->multimedia_content_model->mcontent() as $row) { ?>
												<div class="col-md-4">
													<div class="multimedia_box">
														<div class="mul_class_pic"><a href="<?php echo base_url().'assets/filemanager/multimedia_content/'.$row->file_name;?>"><img src="<?php echo base_url().'assets/site/';?>images/interface/ppt-icon.png" alt="Photo"></a></div>
													   <div class="multimedia_box_txt">
														   <p class="multimedia_box_txt_p">
															   <span class="multimedia_span">শিক্ষকের নাম :- </span><?php echo $row->name; ?><br/>
															   <span class="multimedia_span">বিষয় :- </span></span><?php echo $row->title; ?><br/>
															   <span class="multimedia_span">শ্রেণী :- </span></span><?php echo $row->class_name; ?>
														   </p>
													   </div>
												   </div>
												</div>
											 <?php } ?>
										 </div>
									 </div><!-- End : inner_p_content -->

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
		<!--End: Main-section-->
	</div>
</div>
</div>