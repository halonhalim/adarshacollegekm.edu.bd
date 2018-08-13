<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-plus-square"></i> Add New User </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'users/save'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Full Name <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="name" value="<?php echo set_value('name'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('name'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> E-mail <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="email" name="email" value="<?php echo set_value('email'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('email'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Roles  <span class="red">*</span> </label>
							<div class="col-sm-2">
								<select name="roles" class="chosen-select" data-placeholder="Please select ...">
									<option value=""></option>
									<?php
									$roles = $this->session->userdata('roles');
									if ($roles == 'SuperAdmin') {
										?>
										<option value="SuperAdmin"<?php echo set_select('roles', 'SuperAdmin'); ?>>SuperAdmin</option>
									<?php } ?>
									<option value="Admin"<?php echo set_select('roles', 'Admin'); ?>>Admin</option>
									<option value="Editor"<?php echo set_select('roles', 'Editor'); ?>>Editor</option>
								</select>
								<?php echo form_error('roles'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Username <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('username'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Password <span class="red">*</span> </label>
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
								<button class="btn btn-sm btn-success" type="submit" onclick="this.disabled=true;this.form.submit();"> <i class="ace-icon fa fa-save bigger-110"></i> Save </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->