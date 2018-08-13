<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-plus-square"></i> কৃতি শিক্ষার্থীর তথ্য সংযোজন করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'student_scholarship/save'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> কৃতি শিক্ষার্থীর নাম <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="name" value="<?php echo set_value('name'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('name'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> অধ্যয়নের সময়কাল </label>
							<div class="col-sm-9">
								<input type="text" name="study_duration" value="<?php echo set_value('study_duration'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('study_duration'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> কৃতিত্ব </label>
							<div class="col-sm-9">
								<textarea name="achievement" class="col-xs-10 col-sm-5" rows="2"><?php echo set_value('achievement'); ?></textarea>
							</div>
						</div>
						
						<div class="form-group" style="display: none">
							<label class="col-sm-2 control-label no-padding-right"> ক্রম </label>
							<div class="col-sm-9">
								<input type="number" name="sorted_order" value="<?php echo $this->student_scholarship_model->count_all()+1; ?>" class="col-xs-10 col-sm-5" />
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