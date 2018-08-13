<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Contact extends CI_Controller {

	var $dir = 'admin/contact/';
	var $breadcrumb = 'যোগাযোগ';

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('isLogin') == FALSE) { // Check user session
			goodbye(); // It's active when hacking attempt.
		}
		checkAccess(); // Check User Access Permission
	}

	public function index() {
		$data['breadcrumb'] = $this->breadcrumb;
		$data['edit'] = $this->contact_model->index();

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'information');
		$this->load->view('admin/templates/footer');
	}

	public function save($id = NULL) {
		$this->master_model->do_upload('', 'logo'); // Call file upload function

		if ($this->master_model->upload->do_upload('userfile')) {
			$file_name = $this->upload->data('file_name');
			if ($this->upload->data('image_width') > 600 || $this->upload->data('image_height') > 75) {
				$this->master_model->img_resize($this->file_path, $file_name, 600, 75); // Resize image after upload
			}
			$this->master_model->delete_file('', $this->input->post('old_logo')); // Delete file from directory
		} else {
			$file_name = $this->input->post('old_logo');
		}

		$data = array(
			'school_name' => $this->input->post('school_name'),
			'address' => $this->input->post('address'),
			'email' => $this->input->post('email'),
			'google_map' => $this->input->post('google_map'),
			'logo' => $file_name
		);
		if ($this->contact_model->save($data, $id)) {
			
			// Update Admin Email
			$data = array(
				'name' => $this->input->post('school_name'),
				'email' => $this->input->post('email'),
			);
			$this->users_model->update($data, md5(2));
			
			$this->session->set_tempdata("msg", "<span class='success'>" . saved_success() . "</span>", 5);
		} else {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		}
		redirect('contact');
	}

}
