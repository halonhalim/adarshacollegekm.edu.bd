<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-cog"></i> Change Password </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form action="<?php echo base_url() . 'users/upassword'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> New Password <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="password" name="password" value="<?php echo set_value('password'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('password'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Confirm Password <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="password" name="conf_password" value="<?php echo set_value('conf_password'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('conf_password'); ?>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-sm btn-success" type="submit" onclick="this.disabled=true;this.form.submit();"> <i class="ace-icon fa fa-refresh  bigger-110"></i> Update </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->