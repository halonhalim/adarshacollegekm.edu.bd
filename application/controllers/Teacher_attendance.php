<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Teacher_attendance extends CI_Controller {

	var $dir = 'admin/teacher_attendance/';
	var $file_path = 'teacher_attendance';
	var $breadcrumb = 'শিক্ষকমন্ডলীর উপস্থিতি/অনুপস্থিতির তথ্য';

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
		$list = $this->teacher_attendance_model->get_all();
		$data = array();
		$i = $_POST['start'];
		foreach ($list as $item) {
			$i++;
			$row = array();
			$row[] = sprintf("%02d", $i);
			$row[] = eng_to_bng(date('d-m-Y', strtotime($item->date)));
			$row[] = eng_to_bng($item->total_teacher);
			$row[] = eng_to_bng($item->total_presence);
			$row[] = eng_to_bng($item->total_teacher - $item->total_presence);

			$action = "<form method='post' action='".base_url()."teacher_attendance/edit' class='actionForm' onClick='return altEdit();' >"
							."<input type ='hidden' name='id' value='".md5($item->id)."' />"
							."<button type='submit' class='btn btn-warning btn-xs' title='Edit'><i class='fa fa-edit'></i></button>"
						. "</form>";
			
			$action .= "<form method='post' action='".base_url()."teacher_attendance/delete' class='actionForm' onClick='return altDelete();' >"
						."<input type ='hidden' name='id' value='".md5($item->id)."' />"
						."<button type='submit' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o'></i></button>"
					. "</form>";
			
			$row[] = $action;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->teacher_attendance_model->count_all(),
			"recordsFiltered" => $this->teacher_attendance_model->count_filtered(),
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
		$this->form_validation->set_rules('date', 'date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('total_teacher', 'total teacher', 'trim|required|xss_clean');
		$this->form_validation->set_rules('total_presence', 'total presence', 'trim|required|xss_clean');		

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$data = array(
				'date' => date("Y-m-d", strtotime($this->input->post('date'))),
				'total_teacher' => bng_to_eng($this->input->post('total_teacher')),
				'total_presence' => bng_to_eng($this->input->post('total_presence'))
			);

			if ($this->teacher_attendance_model->save($data)) {
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
		$data['edit'] = $this->teacher_attendance_model->get_by_id($id);

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'edit');
		$this->load->view('admin/templates/footer');
	}

	public function update() {
		$id = $this->input->post('id');
		// field name, error message, validation rules
		$this->form_validation->set_rules('date', 'date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('total_teacher', 'total teacher', 'trim|required|xss_clean');
		$this->form_validation->set_rules('total_presence', 'total presence', 'trim|required|xss_clean');		

		$this->form_validation->set_error_delimiters('<span class="red">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			$this->edit();
		} else {
			$data = array(
				'date' => date("Y-m-d", strtotime($this->input->post('date'))),
				'total_teacher' => bng_to_eng($this->input->post('total_teacher')),
				'total_presence' => bng_to_eng($this->input->post('total_presence'))
			);

			if ($this->teacher_attendance_model->update($data, $id)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . updated_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}
			redirect('teacher_attendance');
		}
	}

	public function delete() {
		$id = $this->input->post('id');
		if ($this->teacher_attendance_model->delete($id) == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$this->session->set_tempdata("msg", "<span class='success'>" . deleted_success() . "</span>", 5);
		}
		redirect('teacher_attendance');
	}

}
