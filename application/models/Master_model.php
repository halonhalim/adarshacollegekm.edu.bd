<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt : Get Out of the system ..!');

class Master_model extends CI_Model {

	// File/Image upload
	public function do_upload($dir = NULL, $newFileName = NULL) {
		$config['upload_path'] = './assets/filemanager/' . $dir;
		if ($this->uri->segment(2)=='save_db') {
			$config['allowed_types'] = '*';			
		} else {
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|ppt|pptx|bmp|zip|rar';
		}
		//$config['overwrite']		= TRUE;
		$config['max_size'] = 10240; // 10 MB
		$config['file_name'] = $newFileName; // uploaded file name

		$this->load->library('upload', $config); // File upload library 
	}

	// Image resize
	function img_resize($dir = NULL, $imageName = NULL, $width = NULL, $height = NULL) {
		$config['source_image'] = './assets/filemanager/' . $dir . '/' . $imageName;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width'] = $width;
		$config['height'] = $height;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

	// Multiple file upload
	function do_upload_multi($dir = NULL, $newFileName = NULL) {
		$this->load->library('upload');
		$config['upload_path'] = './assets/filemanager/' . $dir;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|bmp';
		$config['max_size'] = 1024000; // 100 MB
		$config['file_name'] = $newFileName; // uploaded file name
		$this->upload->initialize($config);
	}

	// Delete file from directory
	function delete_file($dir = NULL, $file_name = NULL) {
		if ($file_name != NULL) {
			$file_path = './assets/filemanager/' . $dir . '/' . $file_name;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
	}

}
