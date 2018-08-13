
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
								<h3 class="head_black">ভিডিও গ্যালারী</h3>
								<div class="gallery">
									<div class="row">
										<div class='list-group gallery'>
											<?php foreach ($this->videos_model->video_list() as $row) { ?>
												<div class='col-sm-6 col-xs-6 col-md-6 col-lg-6'>
													<iframe width="300" height="200" src="https://www.youtube.com/embed/<?php echo $row->youtube_link; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></iframe>
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