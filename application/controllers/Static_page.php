<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Static_page extends CI_Controller {

	var $dir = 'admin/static_page/';
	var $file_path = 'static_page';
	var $breadcrumb = 'পেইজ';

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
		$list = $this->static_page_model->get_all();
		$data = array();
		$i = $_POST['start'];
		foreach ($list as $item) {
			$i++;
			$row = array();
			$row[] = sprintf("%02d", $i);
			$row[] = $item->title . ' <a href="#entry' . $item->id . '" role="button" class="label label-warning" data-toggle="modal">বিস্তারিত</a>' .
				'<div id="entry' . $item->id . '" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 id="myModalLabel1"> '.$item->title.' </h4>
						</div>
						<div class="modal-body">
							' . nl2br($item->details) . '
						</div>
					</div>
				</div>
			</div>';
			
			if($item->file_name) {
				$row[] = "<img src='".base_url().'assets/filemanager/static_page/'.$item->file_name."' width='50px' class='img-responsive' /> " ;
			} else {
				$row[] = '';
			}
			$action = "<form method='post' action='".base_url()."static_page/edit' class='actionForm' onClick='return altEdit();' >"
						."<input type ='hidden' name='id' value='".md5($item->id)."' />"
						."<button type='submit' class='btn btn-warning btn-xs' title='Edit'><i class='fa fa-edit'></i></button>"
					. "</form>";
			
			$action .= "<form method='post' action='".base_url()."static_page/delete' class='actionForm' onClick='return altDelete();' >"
						."<input type ='hidden' name='id' value='".md5($item->id)."' />"
						."<button type='submit' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o'></i></button>"
					. "</form>";
			
			$row[] = $action;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->static_page_model->count_all(),
			"recordsFiltered" => $this->static_page_model->count_filtered(),
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
		$this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('slug', 'slug', 'trim|required|alpha_numeric_spaces|xss_clean');
		$this->form_validation->set_rules('details', 'details', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$this->master_model->do_upload($this->file_path, time()); // Call file upload function

			if ($this->master_model->upload->do_upload('userfile')) {
				$file_name = $this->upload->data('file_name');
				if ($this->upload->data('image_width') > 1024 || $this->upload->data('image_height') > 768) {
					$this->master_model->img_resize($this->file_path, $file_name, 1024, 768); // Resize image after upload
				}
			} else {
				$file_name = '';
			}

			$data = array(
				'slug' => slug($this->input->post('slug')),
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'file_name' => $file_name
			);

			if ($this->static_page_model->save($data)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . saved_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}
		}
		$this->add();
	}

	public function edit($id=NULL) {
		if ($id==NULL) {
			$id = $this->input->post('id');
		}
		
		$data['edit'] = $this->static_page_model->get_by_id($id);
		$data['breadcrumb'] = $data['edit']->title;

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'edit');
		$this->load->view('admin/templates/footer');
	}

	public function update() {
		$id = $this->input->post('id');
		// field name, error message, validation rules
		$this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('details', 'details', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="red">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$this->master_model->do_upload($this->file_path, time()); // Call file upload function

			if ($this->master_model->upload->do_upload('userfile')) {
				$file_name = $this->upload->data('file_name');
				if ($this->upload->data('image_width') > 1024 || $this->upload->data('image_height') > 768) {
					$this->master_model->img_resize($this->file_path, $file_name, 1024, 768); // Resize image after upload
				}
				$this->master_model->delete_file($this->file_path, $this->input->post('old_file'));
			} else {
				$file_name = $this->input->post('old_file');
			}

			$data = array(
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'file_name' => $file_name
			);

			if ($this->static_page_model->update($data, $id)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . updated_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}			
		}
		$this->edit();
	}

	public function delete() {
		$id = $this->input->post('id');
		$static_page = $this->static_page_model->get_by_id($id);
		
		if ($this->static_page_model->delete($id) == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
		} else {
			$this->master_model->delete_file($this->file_path, $static_page->file_name);
			$this->session->set_tempdata("msg", "<span class='success'>" . deleted_success() . "</span>", 5);
		}
		redirect('static_page');
	}

}
