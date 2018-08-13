
<!--Begin: Main-section-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div id="main-page">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<!--Begin:main-section-leftside-->
				<div class="main-section-leftside">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="inner-page">
								<h3 class="head_black">ফটো গ্যালারী</h3>
								<div class="gallery">
									<div class="row">
										<div class='list-group gallery'>
											<?php foreach ($this->photos_model->photo_list() as $row) { ?>
												<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
													<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url().'assets/filemanager/photos/'.$row->file_name;?>" title="<?php echo $row->title; ?>">
														<img class="img-responsive" alt="" src="<?php echo base_url().'assets/filemanager/photos/'.$row->file_name;?>" />
													</a>
												</div> <!-- col-6 / end -->											
											<?php } ?>
										</div> <!-- list-group / end -->
									</div> <!-- row / end -->
								</div>
							</div>
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