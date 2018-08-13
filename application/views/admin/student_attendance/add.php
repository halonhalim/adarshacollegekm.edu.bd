<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-plus-square"></i> বর্তমান শিক্ষার্থীর উপস্থিতি/অনুপস্থিতি সংযোজন করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'student_attendance/save'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> তারিখ <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="date" value="<?php echo date('d-m-Y'); ?>" class="date-picker col-xs-10 col-sm-5" />
								<?php echo form_error('date'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> শ্রেণী <span class="red">*</span> </label>
							<div class="col-sm-4">
								<select name="class_id" class="chosen-select" data-placeholder="Please select ...">
									<option value=""></option>
									<?php foreach ($this->student_attendance_model->class_list() as $row) { ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->class_name; ?></option>
									<?php } ?>
								</select>
								<?php echo form_error('class_id'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> মোট শিক্ষার্থী <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="total_student" value="<?php echo set_value('total_student'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('total_student'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> মোট উপস্থিতি <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="total_presence" value="<?php echo set_value('total_presence'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('total_presence'); ?>
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