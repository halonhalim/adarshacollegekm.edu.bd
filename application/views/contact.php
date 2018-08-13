<?php $contact = $this->contact_model->index(); ?>

<!--Begin: Main-section-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div id="main-page">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="inner_page"><!-- Begin : inner_page -->
					<h3 class="head_black">যোগাযোগ </h3>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="contact_address"><!-- Begin : contact_address -->
								<h3 class="contact_h3">ঠিকানা...</h3>
								<p style="font-size:14px;line-height:31px;padding-top:5px;" class="paragraph">
									<?php 
										echo $contact->school_name.'<br/>';
										echo nl2br($contact->address).'<br/>';
										echo 'ই-মেইল :- '.$contact->email;
									?>
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="contact_feedback"><!-- Begin : contact_feedback -->
								<h3 class="contact_h3"> ফিডব্যাক ফর্ম... </h3> <?php echo $this->session->userdata('msg'); ?>
								<form method="post" action="<?php echo base_url().'page/sendEmail'?>" style="margin-top:15px;" class="form-horizontal">
									<div class="form-group">
										<div class="col-sm-12">
											<input type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="আপনার নাম লিখুন" class="form-control">
											<?php echo form_error('name'); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="আপনার ই-মেইল লিখুন" class="form-control">
											<?php echo form_error('email'); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="মোবাইল" class="form-control">
											<?php echo form_error('mobile'); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<textarea name="comments" placeholder="মন্তব্য লিখুন" class="form-control" cols="2" rows="4"><?php echo set_value('comments'); ?></textarea>
											<?php echo form_error('comments'); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<button class="btn btn-default" type="submit">প্রেরণ করুন</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="contact_map"><!-- Begin : contact_map -->
								<h3 class="contact_h3">মানচিত্রে আমরা...</h3>
								<iframe width="100%" height="309" frameborder="0" allowfullscreen="" style="border:0" src="<?php echo $contact->google_map;?>"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End: Main-section-->


</div>
</div>
</div>

