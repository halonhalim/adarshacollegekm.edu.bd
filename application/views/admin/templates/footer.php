						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->					
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->

	<div class="footer">
		<div class="footer-inner">
			<div class="footer-content">
				<span class="bigger-120">
					<img class="pull-right" src="<?php echo base_url()."assets/filemanager/wanitltd.png"?>" width="75px" />
				</span>
			</div>
		</div>
	</div>

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>

</div><!-- /.main-container -->

<!-- basic scripts -->
<script src="<?php echo base_url() . 'assets/admin/' ?>js/jquery.min.js"></script>
<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() . 'assets/admin/' ?>js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/bootstrap.min.js"></script>
<!-- ace scripts -->
<script src="<?php echo base_url() . 'assets/admin/' ?>js/ace-elements.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/ace.min.js"></script>
<!-- ace settings handler -->
<script src="<?php echo base_url() . 'assets/admin/' ?>js/ace-extra.min.js"></script>
<!-- form-elements page specific plugin scripts -->
<script src="<?php echo base_url() . 'assets/admin/' ?>js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/fuelux/fuelux.spinner.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/date-time/moment.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/date-time/daterangepicker.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/date-time/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/jquery.knob.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/autosize.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo base_url() . 'assets/admin/' ?>js/jquery.maskedinput.min.js"></script>

<script type="text/javascript">
	jQuery(function ($) {

		if (!ace.vars['touch']) {
			$('.chosen-select').chosen({allow_single_deselect: true});
			//resize the chosen on window resize		
			$(window)
					.off('resize.chosen')
					.on('resize.chosen', function () {
						$('.chosen-select').each(function () {
							var $this = $(this);
							$this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
			//resize chosen on sidebar collapse/expand
			$(document).on('settings.ace.chosen', function (e, event_name, event_val) {
				if (event_name != 'sidebar_collapsed')
					return;
				$('.chosen-select').each(function () {
					var $this = $(this);
					$this.next().css({'width': $this.parent().width()});
				})
			});

			$('#chosen-multiple-style .btn').on('click', function (e) {
				var target = $(this).find('input[type=radio]');
				var which = parseInt(target.val());
				if (which == 2)
					$('#form-field-select-4').addClass('tag-input-style');
				else
					$('#form-field-select-4').removeClass('tag-input-style');
			});
		}


		$('#id-input-file-1 , #id-input-file-2').ace_file_input({
			no_file: 'No File ...',
			btn_choose: 'Choose',
			btn_change: 'Change',
			droppable: false,
			onchange: null,
			thumbnail: false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
		//pre-show a file name, for example a previously selected file
		//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])

		$('#id-input-file-3').ace_file_input({
			style: 'well',
			btn_choose: 'Drop files here or click to choose',
			btn_change: null,
			no_icon: 'ace-icon fa fa-cloud-upload',
			droppable: true,
			thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
					 //Check an example below
					 //or examples/file-upload.html
					 return true;
					 }*/
					/**,before_remove : function() {
					 return true;
					 }*/
			,
			preview_error: function (filename, error_code) {
				//name of the file that failed
				//error_code values
				//1 = 'FILE_LOAD_FAILED',
				//2 = 'IMAGE_LOAD_FAILED',
				//3 = 'THUMBNAIL_FAILED'
				//alert(error_code);
			}

			}).on('change', function () {
			//console.log($(this).data('ace_input_files'));
			//console.log($(this).data('ace_input_method'));
		});

		//$('#id-input-file-3')
		//.ace_file_input('show_file_list', [
		//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
		//{type: 'file', name: 'hello.txt'}
		//]);


		//Datepicker plugin
		//link
		$('.date-picker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		})
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function () {
			$(this).prev().focus();
		});

	});
</script>

<!-- datatable page specific plugin scripts -->
<script src="<?php echo base_url() . 'assets/admin/'; ?>datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() . 'assets/admin/'; ?>datatables/dataTables.bootstrap.js"></script>
<script>

	$('#dataTables').dataTable(); // Default datatable

	// Ajax Datatable
	var table;
	$(document).ready(function () {
		table = $('#ajaxDataTable').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' servermside processing mode.
			"iDisplayLength": 10,
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo base_url() . $this->uri->segment(1) . '/get_all'; ?>",
				"type": "POST",
				"dataType": "json",
				"dataSrc": function (jsonData) {
					return jsonData.data;
				}
			},
		});
	});
</script>

<!-- JS By Lukman -->    
<script>
	$(document).ready(function () {
		$("#myForm").attr('autocomplete', 'off');<!-- Autocomplate off -->
		$('#msg').fadeOut(10000);<!-- this is for message hide -->
	});
</script>

	<script type="text/javascript"		>
	function altEdit() 			{
		return confirm('আপনি কি এই তথ্যটি পরিবর্তন করতে চান?')	;
	}
	function altDelete() 			{
		return confirm('আপনি কি এই তথ্যটি স্থায়ীভাবে মুছে ফেলতে চান?');
	}
	function altPassword() 			{
		return confirm('Are you sure you want to change password?');
	}
	function altLogout() 			{
		return confirm('Are you sure you want to sign out now?');
	}
</script> 

</body>
</html>