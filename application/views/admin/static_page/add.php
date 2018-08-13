<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-plus-square"></i> নতুন পেইজ তৈরী করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'static_page/save'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> পেইজের নাম <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="title" value="<?php echo set_value('title'); ?>" class="col-xs-10 col-sm-12" />
								<?php echo form_error('title'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> Slug <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="slug" value="<?php echo set_value('slug'); ?>" class="col-xs-10 col-sm-12" />
								<?php echo form_error('slug'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> বিস্তারিত <span class="red">*</span> </label>
							<div class="col-sm-9">
								<textarea name="details" class="txtDetails col-xs-10 col-sm-12"><?php echo set_value('details'); ?></textarea>
								<?php echo form_error('details'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ইমেইজ  </label>
							<div class="col-sm-4">
								<input type="file" name="userfile"  id="id-input-file-2" />
								<span class="label label-important">NOTE!</span>
								<span class="error"> Maximum Image Size 1024 x 768 </span>
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