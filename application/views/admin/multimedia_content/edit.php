<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-edit"></i> মাল্টিমিডিয়া ক্লাস কন্টেন্ট পরিবর্তন করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'multimedia_content/update/'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<input type="hidden" name="id" value="<?php echo md5($edit->id); ?>" class="col-xs-10 col-sm-5" />

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> শ্রেণী <span class="red">*</span> </label>
							<div class="col-sm-4">
								<select name="class_id" class="chosen-select" data-placeholder="Please select ...">
									<option value=""></option>
									<?php foreach ($this->student_attendance_model->class_list() as $row) { ?>
									<option value="<?php echo $row->id; ?>" <?php echo ($edit->class_id==$row->id)?"selected":"";?>><?php echo $row->class_name; ?></option>
									<?php } ?>
								</select>
								<?php echo form_error('class_id'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> শিক্ষকের নাম <span class="red">*</span> </label>
							<div class="col-sm-4">
								<select name="teacher_id" class="chosen-select" data-placeholder="Please select ...">
									<option value=""></option>
									<?php foreach ($this->teacher_model->teacher_list() as $row) { ?>
									<option value="<?php echo $row->id; ?>" <?php echo ($edit->teacher_id==$row->id)?"selected":"";?>><?php echo $row->name; ?></option>
									<?php } ?>
								</select>
								<?php echo form_error('teacher_id'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> বিষয় <span class="red">*</span> </label>
							<div class="col-sm-4">
								<input type="text" name="title" value="<?php echo $edit->title; ?>" class="col-xs-10 col-sm-12" />
								<?php echo form_error('title'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> পাওয়ার পয়েন্ট ফাইল  </label>
							<div class="col-sm-4">
								<input type="hidden" name="old_file" value="<?php echo $edit->file_name; ?>" />
								<input type="file" name="userfile"  id="id-input-file-2" />
								<span class="label label-important">NOTE!</span>
								<span class="error"> Maximum file size 10MB </span>
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