<?php $contact = $this->contact_model->index(); ?>

<div id="footer"><!-- Begin : footer -->
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="copy_right"><!-- Begin : copy_right -->
					<p class="copy_right_p">  <?php echo eng_to_bng(date('Y')). " &copy; ". $contact->school_name; ?>।</p>
				</div><!-- End : copy_right -->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="hit_counter"><!-- Begin : hit_counter -->
					<p class="paragraph_hit">হিট কাউন্টার</p>
					<div align="center" style="margin-top:-2px;">
						<img border="0" alt="Free Hit Counter" src="http://www.hit-counts.com/counter.php?t=MTM1ODUyOQ==">
					</div>
				</div><!-- End : hit_counter -->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="developed" style="float: right; width:100%;"><!-- Begin : developed -->
					<p class="copy_right_p"  style="float: right">কারিগরী সহায়তায়:<a href="http://wanitltd.com" target="_blank" > WAN IT Ltd.</a> </p>
				</div><!-- End : developed -->
			</div>
		</div>
	</div>
</div>

<divv class="clearfix"></divv>

<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
	<i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
</div>
<!-----------------------------------------------------Begin: Javascript------------------------------------------------------------------------>

<script src="<?php echo base_url().'assets/site/';?>js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url().'assets/site/';?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url().'assets/site/';?>js/bootstrap-select.js"></script>
<script src="<?php echo base_url().'assets/site/';?>js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
	$(document).ready(function(){
		//FANCYBOX
		//https://github.com/fancyapps/fancyBox
		$(".fancybox").fancybox({
			openEffect: "none",
			closeEffect: "none"
		});
	});
</script>

<!--Bwgin: Scroll Top-->
<script>
	$(document).ready(function(){
		$(function(){
			$(document).on( 'scroll', function(){
				if ($(window).scrollTop() > 100) {
					$('.scroll-top-wrapper').addClass('show');
				} else {
					$('.scroll-top-wrapper').removeClass('show');
				}
			});
			$('.scroll-top-wrapper').on('click', scrollToTop);
		});

		function scrollToTop() {
			verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
			element = $('body');
			offset = element.offset();
			offsetTop = offset.top;
			$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
		}
	});
</script>
<!--End: Scroll Top-->

<script src="<?php echo base_url().'assets/site/';?>js/jquery.vticker7350.js"></script>
<script>
	$(function() {
		$('#news_ticker').vTicker('init', {padding:0});
	});
</script>

<script src="<?php echo base_url().'assets/site/';?>js/jquery.scrollbox.js"></script>
<script>
	$(function () {
		$('#demo2').scrollbox({
			linear: true,
			step: 1,
			delay: 0,
			speed: 30
		});
	});
</script>

</body>
</html>