<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Banners extends CI_Controller {

	var $dir = 'admin/banners/';
	var $file_path = 'banners';
	var $breadcrumb = 'ব্যানার';

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('isLogin') == FALSE) { // Check user session
			goodbye(); // It's active when hacking attempt.
		}
		checkAccess(); // Check User Access Permission
	}

	public function index() {
		$data['breadcrumb'] = $this->breadcrumb;

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'view');
		$this->load->view('admin/templates/footer');
	}

	public function get_all() {
		$list = $this->banners_model->get_all();
		$data = array();
		$i = $_POST['start'];
		foreach ($list as $item) {
			$i++;
			$row = array();
			$row[] = sprintf("%02d", $i);
			$row[] = $item->page;
			$row[] = "<img src='".base_url().'assets/filemanager/banners/'.$item->file_name."' width='100px' class='img-responsive' /> " ;
			
			$action = "<form method='post' action='".base_url()."banners/edit' class='actionForm' onClick='return altEdit();' >"
							."<input type ='hidden' name='id' value='".md5($item->id)."' />"
							."<button type='submit' class='btn btn-warning btn-xs' title='Edit'><i class='fa fa-edit'></i></button>"
						. "</form>";
			
			$action .= "<form method='post' action='".base_url()."banners/delete' class='actionForm' onClick='return altDelete();' >"
						."<input type ='hidden' name='id' value='".md5($item->id)."' />"
						."<button type='submit' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o'></i></button>"
					. "</form>";
			
			$row[] = $action;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->banners_model->count_all(),
			"recordsFiltered" => $this->banners_model->count_filtered(),
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function add() {
		$data['breadcrumb'] = $this->breadcrumb;

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'add');
		$this->load->view('admin/templates/footer');
	}

	public function save() {
		// field name, error message, validation rules
		$this->form_validation->set_rules('page', 'page', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			if ($this->input->post('page') == 'হোম পেইজ') {
				$img_w = 1000;
				$img_h = 375; // Home Banner
			} else {
				$img_w = 1000;
				$img_h = 250; // Inner Banner
			}

			$this->master_model->do_upload($this->file_path, time()); // Call file upload function

			if ($this->master_model->upload->do_upload('userfile')) {
				$file_name = $this->upload->data('file_name');
				$this->master_model->img_resize($this->file_path, $file_name, $img_w, $img_h); // Resize image after upload
				$data = array(
					'page' => $this->input->post('page'),
					'file_name' => $file_name
				);

				if ($this->banners_model->save($data)) {
					$this->form_validation->resetForm();
					$this->session->set_tempdata("msg", "<span class='success'>" . uploaded_success() . "</span>", 5);
				} else {
					$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
				}
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}

			
		}
		$this->add();
	}

	public function edit() {
		$id = $this->input->post('id');
		$data['breadcrumb'] = $this->breadcrumb;
		$data['edit'] = $this->banners_model->get_by_id($id);

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'edit');
		$this->load->view('admin/templates/footer');
	}

	public function update() {
		$id = $this->input->post('id');
		// field name, error message, validation rules
		$this->form_validation->set_rules('page', 'page', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="red">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			$this->edit();
		} else {
			if ($this->input->post('page') == 'হোম পেইজ') {
				$img_w = 1000;
				$img_h = 375; // Home Banner
			} else {
				$img_w = 1000;
				$img_h = 250; // Inner Banner
			}

			$this->master_model->do_upload($this->file_path, time()); // Call file upload function

			if ($this->master_model->upload->do_upload('userfile')) {
				$file_name = $this->upload->data('file_name');
				$this->master_model->img_resize($this->file_path, $file_name, $img_w, $img_h); // Resize image after upload				
				$this->master_model->delete_file($this->file_path, $this->input->post('old_file'));
			} else {
				$file_name = $this->input->post('old_file');
				$this->master_model->img_resize($this->file_path, $file_name, $img_w, $img_h); // Resize image after upload	
			}

			$data = array(
				'page' => $this->input->post('page'),
				'file_name' => $file_name
			);

			if ($this->banners_model->update($data, $id)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . updated_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}
			redirect('banners');
		}
	}

	public function delete() {
		$id = $this->input->post('id');
		$banner = $this->banners_model->get_by_id($id);
		
		if ($this->banners_model->delete($id) == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$this->master_model->delete_file($this->file_path, $banner->file_name);
			$this->session->set_tempdata("msg", "<span class='success'>" . deleted_success() . "</span>", 5);
		}
		
		redirect('banners');
	}

}
