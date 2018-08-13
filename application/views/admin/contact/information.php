<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-plus-square"></i> যোগাযোগ </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'contact/save/' . md5($edit->id); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> প্রতিষ্ঠানের নাম </label>
							<div class="col-sm-9">
								<input type="text" name="school_name" value="<?php echo $edit->school_name; ?>" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> ই-মেইল </label>
							<div class="col-sm-9">
								<input type="text" name="email" value="<?php echo $edit->email; ?>" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> ঠিকানা </label>
							<div class="col-sm-9">
								<textarea name="address" class="col-xs-10 col-sm-5" rows="7"><?php echo $edit->address; ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> গুগল ম্যাপ </label>
							<div class="col-sm-9">
								<textarea name="google_map" class="col-xs-10 col-sm-5" rows="2"><?php echo $edit->google_map; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> লোগো </label>
							<div class="col-sm-4">
								<input type="hidden" name="old_logo" value="<?php echo $edit->logo; ?>"  />
								<input type="file" name="userfile" id="id-input-file-2" />
								<span class="label label-important">NOTE!</span>
								<span class="error"> Maximum Logo Size Width: 600px & Height: 75px </span>
								<br /><br />
								<img src="<?php echo base_url() . 'assets/filemanager/' . $edit->logo; ?>" class="img-responsive" />
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-sm btn-success" type="submit" onclick="this.disabled=true;this.form.submit();"> <i class="ace-icon fa fa-save bigger-110"></i> সংরক্ষণ করুন </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->