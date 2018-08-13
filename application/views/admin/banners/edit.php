<div class="row">
	<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter"> <i class="ace-icon fa fa-cloud-upload"></i> ব্যানার পরিবর্তন করুন </h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form id="myForm" action="<?php echo base_url() . 'banners/update/'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">   

						<input type="hidden" name="id" value="<?php echo md5($edit->id); ?>" class="col-xs-10 col-sm-5" />

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> পেইজ <span class="red">*</span></label>
							<div class="col-sm-4">
								<select name="page" class="chosen-select" data-placeholder="Please select ...">
									<option value="হোম পেইজ" <?php echo ($edit->page == 'হোম পেইজ') ? 'selected="selected"' : ''; ?>> হোম পেইজ </option>
									<option value="অন্যান্য পেইজ" <?php echo ($edit->page == 'অন্যান্য পেইজ') ? 'selected="selected"' : ''; ?>> অন্যান্য পেইজ </option>
								</select>
								<?php echo form_error('page');?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> ব্যানার ইমেইজ </label>
							<div class="col-sm-4">
								<input type="hidden" name="old_file" value="<?php echo $edit->file_name; ?>" />
								<input type="file" name="userfile"  id="id-input-file-2" />
								<span class="label label-important">NOTE!</span>
								<span class="error"> Banner Image Size: Width:1000px & Height: 375px </span>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-sm btn-success" type="submit" onclick="this.disabled=true;this.form.submit();"> <i class="ace-icon fa fa-refresh bigger-110"></i> পরিবর্তন করুন </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->