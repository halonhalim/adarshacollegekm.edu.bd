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
									<div class="inner-page">
										<div class="content">
											<?php
												foreach ($page as $row) {
													echo "<h3 class='head_black'>".$row->title."</h3>";
													if ($row->file_name) {
														echo "<img src='".base_url().'assets/filemanager/static_page/'.$row->file_name."' style='float:left; max-width:250px; margin-top:10px; margin-right:15px;' class='img-thumbnail' />";
													}
													echo "<p class='paragraph'>".nl2br($row->details)."</p>";
												} 
											?>
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