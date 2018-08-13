<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-edit"></i> শিক্ষকমন্ডলীর তথ্য পরিবর্তন করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'teacher/update/'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<input type="hidden" name="id" value="<?php echo md5($edit->id); ?>" class="col-xs-10 col-sm-5" />

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> শিক্ষকের নাম <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="name" value="<?php echo $edit->name; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('name'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> মোবাইল নং </label>
							<div class="col-sm-9">
								<input type="text" name="mobile_no" value="<?php echo $edit->mobile_no; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('mobile_no'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ই-মেইল </label>
							<div class="col-sm-9">
								<input type="text" name="email" value="<?php echo $edit->email; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('email'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> পদবি </label>
							<div class="col-sm-9">
								<input type="text" name="designation" value="<?php echo $edit->designation; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('designation'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> প্রশিক্ষণ অর্জন </label>
							<div class="col-sm-9">
								<input type="text" name="training" value="<?php echo $edit->training; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('training'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ঠিকানা </label>
							<div class="col-sm-9">
								<textarea name="address" class="col-xs-10 col-sm-5" rows="2"><?php echo $edit->address; ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> জন্ম তারিখ </label>
							<div class="col-sm-9">
								<input type="text" name="date_of_birth" value="<?php echo $edit->date_of_birth; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('date_of_birth'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> যোগদানের তারিখ </label>
							<div class="col-sm-9">
								<input type="text" name="joining_date" value="<?php echo $edit->joining_date; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('joining_date'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> রক্তের গ্রুপ </label>
							<div class="col-sm-9">
								<input type="text" name="blood_group" value="<?php echo $edit->blood_group; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('blood_group'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> শিক্ষাগত যোগ্যতা </label>
							<div class="col-sm-9">
								<input type="text" name="qualification" value="<?php echo $edit->qualification; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('qualification'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ক্রম </label>
							<div class="col-sm-9">
								<input type="text" name="sorted_order" value="<?php echo $edit->sorted_order; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('sorted_order'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ছবি </label>
							<div class="col-sm-4">
								<input type="hidden" name="old_file" value="<?php echo $edit->file_name; ?>" />
								<input type="file" name="userfile"  id="id-input-file-2" />
								<span class="label label-important">NOTE!</span>
								<span class="error"> Image Size Width:125px & Height:150px </span>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-2 col-md-9">
								<button class="btn btn-sm btn-success" type="submit" onclick="this.disabled=true;this.form.submit();"> <i class="ace-icon fa fa-refresh bigger-110"></i> পরিবর্তন করুন </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->