<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-cloud-upload"></i> ভিডিও আপলোড করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'videos/save'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> টাইটেল </label>
							<div class="col-sm-9">
								<input type="text" name="title" value="<?php echo set_value('title'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('title'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> ইউটিউভ লিঙ্ক <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="youtube_link" value="<?php echo set_value('youtube_link'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('youtube_link'); ?>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-2 col-md-9">
								<button class="btn btn-sm btn-success" type="submit" onclick="this.disabled=true;this.form.submit();"> <i class="ace-icon fa fa-cloud-upload bigger-110"></i> আপলোড করুন </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->