<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-edit"></i> Edit User </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'users/update/'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   
						
						<input type="hidden" name="id" value="<?php echo md5($edit->id); ?>" />
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Full Name <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="text" name="name" value="<?php echo $edit->name; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('name'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> E-mail  <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="hidden" name="old_email" value="<?php echo $edit->email; ?>" class="col-xs-10 col-sm-5" />
								<input type="email" name="email" value="<?php echo $edit->email; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('email'); ?>
							</div>
						</div>

						<div class="form-group" <?php echo ($edit->id == $this->session->userdata('id')) ? "style='display:none;'" : ""; ?>>
							<label class="col-sm-3 control-label no-padding-right"> Roles  <span class="red">*</span> </label>
							<div class="col-sm-2">
								<select name="roles" class="chosen-select" data-placeholder="Please select ...">
									<option value=""></option>
									<?php if ($this->session->userdata('roles') == 'SuperAdmin') { ?>
										<option value="SuperAdmin" <?php echo ($edit->roles == 'SuperAdmin') ? 'selected="selected"' : ''; ?>>SuperAdmin</option>
									<?php } ?>
									<option value="Admin" <?php echo ($edit->roles == 'Admin') ? 'selected="selected"' : ''; ?>>Admin</option>
									<option value="Editor" <?php echo ($edit->roles == 'Editor') ? 'selected="selected"' : ''; ?>>Editor</option>									
								</select>
								<?php echo form_error('roles'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Username <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="hidden" name="old_username" value="<?php echo $edit->username; ?>" class="col-xs-10 col-sm-5" />
								<input type="text" name="username" value="<?php echo $edit->username; ?>" class="col-xs-10 col-sm-5" />
								<?php echo form_error('username'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Password  </label>
							<div class="col-sm-9">
								<input type="password" name="password" value="" class="col-xs-10 col-sm-5" />
								<?php echo form_error('password'); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Confirm Password </label>
							<div class="col-sm-9">
								<input type="password" name="conf_password" value="" class="col-xs-10 col-sm-5" />
								<?php echo form_error('conf_password'); ?>
							</div>
						</div>

						<div class="form-group" <?php echo ($edit->id == $this->session->userdata('id')) ? "style='display:none;'" : ""; ?>>
							<label class="col-sm-3 control-label no-padding-right"> Status <span class="red">*</span> </label>
							<div class="col-sm-9">
								<input type="radio" name="status" value="1" <?php echo ($edit->status == 1) ? 'checked="checked"' : ''; ?> class="ace input-lg" />
								<span class="lbl"> Active </span>
								&nbsp; &nbsp; &nbsp; 
								<input type="radio" name="status"  value="0" <?php echo ($edit->status == 0) ? 'checked="checked"' : ''; ?> class="ace input-lg" />
								<span class="lbl"> Inactive </span>
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