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
												foreach ($this->news_model->details($this->uri->segment(3)) as $row) {
													echo "<h3 class='head_black'>".$row->title."</h3>";
													echo "<p class='paragraph'>".nl2br($row->details)."</p>";
													if ($row->file_name) {
														echo "<a href='".base_url().'assets/filemanager/news/'.$row->file_name."' target='_blank'><img src='".base_url().'assets/filemanager/pdf.png'."' width='50' /></a>";
													}
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