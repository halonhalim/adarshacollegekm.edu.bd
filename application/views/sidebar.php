<div class="main-section-rightside">
	<div class="notice-box">
		<h2 class="title-box">নোটিশ বোর্ড</h2>
		<div class="news_box">
			<div class="scroll-text" id="demo2">
				<ul>
					<?php foreach ($this->notice_model->notice_list() as $row) { ?>
						<li>
							<a href="<?php echo base_url().'page/notice/'.$row->id;?>">
								<div class="news_box_inner">
									<p class="news_box_p"><?php echo $row->title; ?></p>
								</div>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="notice-box">
		<h2 class="title-box">গুরত্বপূর্ণ লিংক</h2>
		<div class="drop-box">
			<div class="p_rgt_txt">
				<ul>
					<li><a target="_blank" href="http://www.educationboard.gov.bd/">Education Board Bangladesh</a></li>
					<li><a target="_blank" href="http://www.educationboardresults.gov.bd/">Education Board Results</a></li>
					<li><a target="_blank" href="http://www.moedu.gov.bd/">শিক্ষা মন্ত্রণালয়</a></li>
					<li><a target="_blank" href="https://www.teachers.gov.bd/"> শিক্ষক বাতায়ন</a></li>
					<li><a target="_blank" href="http://bangladesh.gov.bd/">বাংলাদেশ জাতীয় তথ্য বাতায়ন</a></li>
					<li><a target="_blank" href="http://www.dpe.gov.bd/">প্রাথমিক শিক্ষা অধিদপ্তর</a></li>
					<li><a target="_blank" href="http://www.dshe.gov.bd/"> মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা অধিদপ্তর</a></li>
					<li><a target="_blank" href="http://www.shed.gov.bd/"> মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বিভাগ</a></li>
				</ul>
			</div>
		</div>
	</div>

</div>