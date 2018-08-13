<style>
	th, td{text-align: center; vertical-align: middle !important;}
</style>

<!--Begin: Main-section-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div id="main-page">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!--Begin:main-section-leftside-->
				<div class="main-section-leftside">
					<div class="row">
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="inner-page">
								<div class="content">
									<h3 class="head_black">ফলাফল</h3>
									<div class="table-responsive">
										<table style="margin-top:10px;" class="table table-bordered">
											<thead>
												<tr class="success">
													<th>প্রকাশিত</th>
													<th>শ্রেণী</th>
													<th>বিষয় / সাল</th>
													<th>ফাইল</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($this->results_model->result_list() as $row) { ?>
													<tr>
														<td> <?php echo eng_to_bng(date('d-m-Y', strtotime($row->published))); ?> </td>
														<td> <?php echo $row->class_name; ?> </td>
														<td> <?php echo $row->title.' / '. eng_to_bng($row->year); ?> </td>
														<td> 
															<a href="<?php echo base_url().'assets/filemanager/results/'.$row->file_name;?>" target="_blank">
																<img width="25" src="<?php echo base_url().'assets/filemanager/pdf.png';?>">
															</a>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!--Begin:main-section-rightside-->
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 right-section-padding">
							<?php $this->load->view('sidebar');?>
						</div>
						<!--Begin: main-section-rightside-->
					</div>
				</div>
				<!--End: main-section-leftside-->
			</div>
		</div>
	</div>
</div>
<!--End: Main-section-->


</div>
</div>
</div>