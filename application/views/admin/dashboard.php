
<?php $banner = $this->banners_model->banner_by_page('হোম পেইজ'); ?>

<img src="<?php echo base_url().'assets/filemanager/banners/'.$banner->file_name;?>" width="100%" class="img-responsive" />
