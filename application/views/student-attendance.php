<style>
	th, td{text-align: center; vertical-align: middle !important;}
</style>

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
									<h3 class="head_black"> বর্তমান শিক্ষার্থীর উপস্থিতি/অনুপস্থিতির তথ্য </h3>
									<p style="font-size:16px;padding-top:25px;" class="paragraph"> গত ৩০ দিনের শিক্ষার্থীর উপস্থিতি/অনুপস্থিতির তথ্য নিম্নরুপ :- </p>
									<div class="table-responsive">
										
										<ul class="nav nav-tabs" role="tablist">
											<?php foreach ($this->student_attendance_model->class_list() as $key => $class_list)  { ?>
												<li role="presentation" class="<?php echo ($key==0)?"active":"";?>"><a href="#tab<?php echo $class_list->id;?>" aria-controls="tab<?php echo $class_list->id;?>" role="tab" data-toggle="tab"><?php echo $class_list->class_name; ?></a></li>
											<?php } ?>											
										</ul>

										<div class="tab-content">
											<?php foreach ($this->student_attendance_model->class_list() as $key => $class_list)  { ?>
												<div role="tabpanel" class="tab-pane <?php echo ($key==0)?"active":"";?>" id="tab<?php echo $class_list->id?>">
												
													<table width="100%" style="font-size:13px;" class="table table-bordered">
														<caption><h3 align="center"><?php echo $class_list->class_name; ?></h3></caption>
														<thead>
															<tr style="text-align:center;">
																<th bgcolor="#d9edf7">তারিখ</th>
																<th bgcolor="#fcf8e3">মোট ছাত্র এবং ছাত্রী</th>
																<th bgcolor="#fcf8e3">মোট উপস্থিতি</th>
																<th bgcolor="#f2dede">মোট অনুপস্থিতি</th>
															</tr>
														</thead>
														<tbody
															<?php foreach ($this->student_attendance_model->attendance_by_class($class_list->id) as $row) { ?>
																<tr>
																	<td bgcolor="#f0faff"><?php echo eng_to_bng(date('d-m-Y', strtotime($row->date)))?></td>
																	<td bgcolor="#FBFAF0"><?php echo eng_to_bng($row->total_student)?></td>
																	<td bgcolor="#FBFAF0"><?php echo eng_to_bng($row->total_presence)?></td>
																	<td bgcolor="#faf2f2"><?php echo eng_to_bng($row->total_student - $row->total_presence)?></td>
																</tr>
															<?php } ?>
														</tbody>
													</table>

												</div>
											<?php } ?>
										</div>							
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--End: main-section-leftside-->
			</div>
			<!--Begin:main-section-rightside-->
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 right-section-padding">
				<?php $this->load->view('sidebar'); ?>
			</div>
			<!--Begin: main-section-rightside-->
		</div>
	</div>
</div>
<!--End: Main-section-->

</div>
</div>
</div>