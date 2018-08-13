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
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="inner-page">
								<div class="content">
									<h3 class="head_black">কৃতি শিক্ষার্থী তথ্য</h3>
									<p style="font-size:16px;padding-top:25px;" class="paragraph"> বৃত্তি প্রাপ্ত কৃতি ছাত্র/ছাত্রীর তথ্য নিম্নরুপ :- </p>
									<div class="table-responsive">
										<table style="margin-top:10px;" class="table table-bordered">
											<thead>
												<tr class="success">
													<th> শিক্ষার্থীর ছবি </th>
													<th>নাম</th>
													<th>অধ্যয়নের সময়কাল</th>
													<th>কৃতিত্ব</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($this->student_scholarship_model->student_list() as $row) { ?>
													<tr>
														<td class="paragraph2">
															<?php if ($row->file_name) { ?>
																<img width="60" alt="ছবি নাই" class="img-thumbnail" src="<?php echo base_url().'assets/filemanager/student_scholarship/'.$row->file_name;?>">
															<?php } else { ?>
																<img width="60" alt="ছবি নাই" class="img-thumbnail" src="<?php echo base_url().'assets/filemanager/noProfile.png';?>">
															<?php } ?>
														</td>
														<td> <?php echo $row->name; ?> </td>
														<td> <?php echo $row->study_duration; ?> </td>
														<td> <?php echo $row->achievement; ?> </td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
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