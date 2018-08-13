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
									<h3 class="head_black"> শিক্ষকমন্ডলীর উপস্থিতি/অনুপস্থিতির  তথ্য</h3>
									<p style="font-size:16px;padding-top:25px;" class="paragraph">গত ৩০ দিনের শিক্ষকমন্ডলীর উপস্থিতি/অনুপস্থিতির  তথ্য নিম্নরুপ :-</p>
									<div class="table-responsive">
										<table width="100%" style="font-size:13px;" class="table table-bordered">
											<thead>
												<tr style="text-align:center;">
													<th bgcolor="#d9edf7">তারিখ</th>
													<th bgcolor="#fcf8e3">মোট শিক্ষকমন্ডলী</th>
													<th bgcolor="#fcf8e3">মোট উপস্থিতি</th>
													<th bgcolor="#f2dede">মোট অনুপস্থিতি</th>
												</tr>
											</thead>
											<tbody
												<?php foreach ($this->teacher_attendance_model->attendance_list() as $row) { ?>
													<tr>
														<td bgcolor="#f0faff"><?php echo eng_to_bng(date('d-m-Y', strtotime($row->date)))?></td>
														<td bgcolor="#FBFAF0"><?php echo eng_to_bng($row->total_teacher)?></td>
														<td bgcolor="#FBFAF0"><?php echo eng_to_bng($row->total_presence)?></td>
														<td bgcolor="#faf2f2"><?php echo eng_to_bng($row->total_teacher - $row->total_presence)?></td>
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