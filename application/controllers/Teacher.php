<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Teacher extends CI_Controller {

	var $dir = 'admin/teacher/';
	var $file_path = 'teacher';
	var $breadcrumb = 'শিক্ষকমন্ডলীর তথ্য';

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
		$list = $this->teacher_model->get_all();
		$data = array();
		$i = $_POST['start'];
		foreach ($list as $item) {
			$i++;
			$row = array();
			$row[] = sprintf("%02d", $i);
			$row[] = $item->name."<br/>".$item->mobile_no."<br/>".$item->email;
			$row[] = $item->designation."<br/>".$item->training;
			$row[] = $item->address;
			$row[] = $item->date_of_birth."<br/>". $item->joining_date;
			$row[] = $item->blood_group;
			$row[] = $item->qualification;
			$row[] = eng_to_bng($item->sorted_order);
			
			if($item->file_name) {
				$row[] = "<img src='".base_url().'assets/filemanager/teacher/'.$item->file_name."' width='60px' class='img-responsive' /> " ;
			} else {
				$row[] = "<img src='".base_url().'assets/filemanager/noProfile.png'."' width='60px' class='img-responsive' /> " ;
			}
			
			$action = "<form method='post' action='".base_url()."teacher/edit' class='actionForm' onClick='return altEdit();' >"
							."<input type ='hidden' name='id' value='".md5($item->id)."' />"
							."<button type='submit' class='btn btn-warning btn-xs' title='Edit'><i class='fa fa-edit'></i></button>"
						. "</form>";
			
			$action .= "<form method='post' action='".base_url()."teacher/delete' class='actionForm' onClick='return altDelete();' >"
						."<input type ='hidden' name='id' value='".md5($item->id)."' />"
						."<button type='submit' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o'></i></button>"
					. "</form>";
			
			$row[] = $action;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->teacher_model->count_all(),
			"recordsFiltered" => $this->teacher_model->count_filtered(),
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
		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_no', 'mobile no', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean');
		$this->form_validation->set_rules('designation', 'designation', 'trim|xss_clean');
		$this->form_validation->set_rules('training', 'training', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_clean');
		$this->form_validation->set_rules('date_of_birth', 'date of birth', 'trim|xss_clean');
		$this->form_validation->set_rules('joining_date', 'joining date', 'trim|xss_clean');
		$this->form_validation->set_rules('blood_group', 'blood group', 'trim|xss_clean');
		$this->form_validation->set_rules('qualification', 'qualification', 'trim|xss_clean');
		$this->form_validation->set_rules('sorted_order', 'sorted orderp', 'trim|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$this->master_model->do_upload($this->file_path, time()); // Call file upload function

			if ($this->master_model->upload->do_upload('userfile')) {
				$file_name = $this->upload->data('file_name');
				$this->master_model->img_resize($this->file_path, $file_name, 125, 150); // Resize image after upload
			} else {
				$file_name = '';
			}

			$data = array(
				'name' => $this->input->post('name'),
				'mobile_no' => $this->input->post('mobile_no'),
				'email' => $this->input->post('email'),
				'designation' => $this->input->post('designation'),
				'training' => $this->input->post('training'),
				'address' => $this->input->post('address'),
				'date_of_birth' => $this->input->post('date_of_birth'),
				'joining_date' => $this->input->post('joining_date'),
				'blood_group' => $this->input->post('blood_group'),
				'qualification' => $this->input->post('qualification'),
				'sorted_order' => bng_to_eng($this->input->post('sorted_order')),
				'file_name' => $file_name
			);

			if ($this->teacher_model->save($data)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . saved_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}
		}
		$this->add();
	}

	public function edit() {
		$id = $this->input->post('id');
		$data['breadcrumb'] = $this->breadcrumb;
		$data['edit'] = $this->teacher_model->get_by_id($id);

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'edit');
		$this->load->view('admin/templates/footer');
	}

	public function update() {
		$id = $this->input->post('id');
		// field name, error message, validation rules
		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_no', 'mobile no', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean');
		$this->form_validation->set_rules('designation', 'designation', 'trim|xss_clean');
		$this->form_validation->set_rules('training', 'training', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_clean');
		$this->form_validation->set_rules('date_of_birth', 'date of birth', 'trim|xss_clean');
		$this->form_validation->set_rules('joining_date', 'joining date', 'trim|xss_clean');
		$this->form_validation->set_rules('blood_group', 'blood group', 'trim|xss_clean');
		$this->form_validation->set_rules('qualification', 'qualification', 'trim|xss_clean');
		$this->form_validation->set_rules('sorted_order', 'sorted order', 'trim|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="red">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			$this->edit();
		} else {
			$this->master_model->do_upload($this->file_path, time()); // Call file upload function

			if ($this->master_model->upload->do_upload('userfile')) {
				$file_name = $this->upload->data('file_name');
				$this->master_model->img_resize($this->file_path, $file_name, 125, 150); // Resize image after upload
				$this->master_model->delete_file($this->file_path, $this->input->post('old_file'));
			} else {
				$file_name = $this->input->post('old_file');
			}

			$data = array(
				'name' => $this->input->post('name'),
				'mobile_no' => $this->input->post('mobile_no'),
				'email' => $this->input->post('email'),
				'designation' => $this->input->post('designation'),
				'training' => $this->input->post('training'),
				'address' => $this->input->post('address'),
				'date_of_birth' => $this->input->post('date_of_birth'),
				'joining_date' => $this->input->post('joining_date'),
				'blood_group' => $this->input->post('blood_group'),
				'qualification' => $this->input->post('qualification'),
				'sorted_order' => bng_to_eng($this->input->post('sorted_order')),
				'file_name' => $file_name
			);

			if ($this->teacher_model->update($data, $id)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . updated_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}
			redirect('teacher');
		}
	}

	public function delete() {
		$id = $this->input->post('id');
		$teacher = $this->teacher_model->get_by_id($id);
		if ($this->teacher_model->delete($id) == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$this->master_model->delete_file($this->file_path, $teacher->file_name);
			$this->session->set_tempdata("msg", "<span class='success'>" . deleted_success() . "</span>", 5);
		}
		redirect('teacher');
	}

}
