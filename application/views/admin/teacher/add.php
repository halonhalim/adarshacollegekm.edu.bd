<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-plus-square"></i> নতুন শিক্ষক সংযোজন করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'teacher/save'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> শিক্ষকের নাম <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="name" value="<?php echo set_value('name'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('name'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> মোবাইল নং </label>
							<div class="col-sm-9">
								<input type="text" name="mobile_no" value="<?php echo set_value('mobile_no'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('mobile_no'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ই-মেইল </label>
							<div class="col-sm-9">
								<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('email'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> পদবি </label>
							<div class="col-sm-9">
								<input type="text" name="designation" value="<?php echo set_value('designation'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('designation'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> প্রশিক্ষণ অর্জন </label>
							<div class="col-sm-9">
								<input type="text" name="training" value="<?php echo set_value('training'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('training'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ঠিকানা </label>
							<div class="col-sm-9">
								<textarea name="address" class="col-xs-10 col-sm-5" rows="2"><?php echo set_value('address'); ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> জন্ম তারিখ </label>
							<div class="col-sm-9">
								<input type="text" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('date_of_birth'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> যোগদানের তারিখ </label>
							<div class="col-sm-9">
								<input type="text" name="joining_date" value="<?php echo set_value('joining_date'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('joining_date'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> রক্তের গ্রুপ </label>
							<div class="col-sm-9">
								<input type="text" name="blood_group" value="<?php echo set_value('blood_group'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('blood_group'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> শিক্ষাগত যোগ্যতা </label>
							<div class="col-sm-9">
								<input type="text" name="qualification" value="<?php echo set_value('qualification'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('qualification'); ?>
							</div>
						</div>
						
						<div class="form-group" style="display: none">
							<label class="col-sm-2 control-label no-padding-right"> ক্রম </label>
							<div class="col-sm-9">
								<input type="number" name="sorted_order" value="<?php echo $this->teacher_model->count_all()+1; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('sorted_order'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ছবি  </label>
							<div class="col-sm-4">
								<input type="file" name="userfile"  id="id-input-file-2"  />
								<span class="label label-important">NOTE!</span>
								<span class="error"> Image Size Width:125px & Height:150px </span>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-2 col-md-9">
								<button class="btn btn-sm btn-success" type="submit" onclick="this.disabled=true;this.form.submit();"> <i class="ace-icon fa fa-save bigger-110"></i> সংরক্ষণ করুন </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->