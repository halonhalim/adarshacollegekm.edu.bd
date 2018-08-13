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
									<h3 class="head_black">শিক্ষকমন্ডলীর তথ্য</h3>
									<div class="table-responsive">
										<table style="margin-top:10px;" class="table table-bordered">
											<thead>
												<tr class="success">
													<th> শিক্ষকের ছবি </th>
													<th>
														শিক্ষকের নাম, <br/> মোবাইল ও ই-মেইল নম্বর
													</th>
													<th>
														পদবি ও <br/>প্রশিক্ষণ অর্জন
													</th>
													<th>ঠিকানা</th>
													<th width="110">
														জন্ম তারিখ ও <br/> যোগদানের তারিখ
													</th>
													<th width="50">রক্তের গ্রুপ</th>
													<th>শিক্ষাগত যোগ্যতা</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($this->teacher_model->teacher_list() as $row) { ?>
													<tr>
														<td class="paragraph2">
															<?php if ($row->file_name) { ?>
																<img width="60" alt="ছবি নাই" class="img-thumbnail" src="<?php echo base_url().'assets/filemanager/teacher/'.$row->file_name;?>">
															<?php } else { ?>
																<img width="60" alt="ছবি নাই" class="img-thumbnail" src="<?php echo base_url().'assets/filemanager/noProfile.png';?>">
															<?php } ?>
														</td>
														<td>
															<?php
																echo $row->name."<br/>";
																echo $row->mobile_no."<br/>";
																echo $row->email;
															?>
														</td>
														<td>
															<?php
																echo $row->designation."<br/>";
																echo $row->training;
															?>
														</td>
														<td>
															<?php
																echo nl2br($row->address);
															?>
														</td>
														<td>
															<?php
																echo $row->date_of_birth."<br/>";
																echo $row->joining_date;
															?>
														</td>
														<td> <?php echo $row->blood_group;?> </td>
														<td> <?php echo $row->qualification; ?> </td>
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