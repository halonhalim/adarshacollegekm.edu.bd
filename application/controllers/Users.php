<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Users extends CI_Controller {

	var $dir = 'admin/users/';
	var $breadcrumb = 'Users';

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('isLogin') == FALSE) {
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
		$list = $this->users_model->get_all();
		$data = array();
		$i = $_POST['start'];
		foreach ($list as $item) {
			$i++;
			$row = array();
			$row[] = sprintf("%02d", $i);
			$row[] = $item->name;
			$row[] = $item->email;
			$row[] = $item->roles;
			$row[] = $item->username;

			if ($item->status == 1) {
				$row[] = '<span class="badge badge-success">Active</span>';
			} else {
				$row[] = '<span class="badge badge-important">Inactive</span>';
			}

			$action = "<form method='post' action='".base_url()."users/edit' class='actionForm' onClick='return altEdit();' >"
							."<input type ='hidden' name='id' value='".md5($item->id)."' />"
							."<button type='submit' class='btn btn-warning btn-xs' title='Edit'><i class='fa fa-edit'></i></button>"
						. "</form>";
			
			if ($this->session->userdata('username') == "Lukman") {
				$action .= "<form method='post' action='".base_url()."users/delete' class='actionForm' onClick='return altDelete();' >"
							."<input type ='hidden' name='id' value='".md5($item->id)."' />"
							."<button type='submit' class='btn btn-danger btn-xs' title='Delete'><i class='fa fa-trash-o'></i></button>"
						. "</form>";
			}
			$row[] = $action;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->users_model->count_all(),
			"recordsFiltered" => $this->users_model->count_filtered(),
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
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]|xss_clean');
		$this->form_validation->set_rules('roles', 'roles', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[20]|is_unique[users.username]|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|min_length[3]|max_length[12]|matches[password]|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			$this->add();
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'roles' => $this->input->post('roles'),
				'username' => $this->input->post('username'),
				'encode_password' => getHashedPassword($this->input->post('password')),
				'status' => 1,
				'created_at' => date('Y-m-d H:i:s')
			);
			if ($this->users_model->save($data)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . saved_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}
			redirect('users/add');
		}
	}

	public function edit() {
		$id = $this->input->post('id');
		$data['breadcrumb'] = $this->breadcrumb;
		$data['edit'] = $this->users_model->get_by_id($id);

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'edit');
		$this->load->view('admin/templates/footer');
	}

	public function update() {
		$id = $this->input->post('id');
		
		if ($this->input->post('old_email') != $this->input->post('email')) {
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]|xss_clean');
		}
		if ($this->input->post('old_username') != $this->input->post('username')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[20]|is_unique[users.username]|xss_clean');
		}
		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('roles', 'roles', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('conf_password', 'confirm password', 'trim|min_length[3]|max_length[20]|matches[password]|xss_clean');
		$this->form_validation->set_rules('status', 'status', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			$this->edit();
		} else {
			if($this->input->post('password')==NULL) {
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'roles' => $this->input->post('roles'),
					'username' => $this->input->post('username'),
					'status' => $this->input->post('status'),
					'modified_at' => date('Y-m-d H:i:s')
				);
			} else {
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'roles' => $this->input->post('roles'),
					'username' => $this->input->post('username'),
					'encode_password' => getHashedPassword($this->input->post('password')),
					'status' => $this->input->post('status'),
					'modified_at' => date('Y-m-d H:i:s')
				);
			}
			
			if ($this->users_model->update($data, $id)) {
				$this->form_validation->resetForm();
				$this->session->set_tempdata("msg", "<span class='success'>" . updated_success() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			}
			redirect('users');
		}
	}

	public function delete() {
		
		$id = $this->input->post('id');
		$uid = md5($this->session->userdata('id'));

		if ($uid != $id) {
			if ($this->users_model->delete($id) == FALSE) {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span class='success'>" . deleted_success() . "</span>", 5);
			}
		} else {
			$this->session->set_tempdata("msg", "<span class='error'>" . unauthorized() . "</span>", 5);
		}
		redirect('users');
	}

	public function epassword() {
		$data['breadcrumb'] = 'Change Password';

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'password');
		$this->load->view('admin/templates/footer');
	}

	public function upassword() {
		$id = $this->session->userdata('id');		
		// field name, error message, validation rules
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|min_length[3]|max_length[20]|matches[password]|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			$this->epassword();
		} else {
			$data = array(
				'encode_password' => getHashedPassword($this->input->post('password')),
				'modified_at' => date('Y-m-d H:i:s')
			);

			if ($this->users_model->update($data, md5($id))) {
				$this->session->set_tempdata("msg", "<span class='success'>" . updated_success() . "</span>", 5);
				redirect('dashboard');
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
				$this->epassword();
			}
		}
	}
	
	
	
	// Backup database
	public function backup_db() {
		$this->load->dbutil(); // Load the DB utility class
		$backup = $this->dbutil->backup(); // Backup your entire database and assign it to a variable
		write_file(FCPATH . '/db/BackupDb.sql', $backup); // write the file to your server
		force_download('BackupDb_'.date('YmdHis').'.sql', $backup); // backup the file to your desktop
		redirect('dashboard');
	}

	public function restore_db() {
		$data['breadcrumb'] = "Restore DB";

		$this->load->view('admin/templates/header', $data);
		$this->load->view($this->dir . 'restore-db');
		$this->load->view('admin/templates/footer');
	}
	
	public function save_db() {
		$this->master_model->do_upload('', time());

		if ($this->master_model->upload->do_upload('userfile')) {
			$file_name = $this->upload->data('file_name');
			
			$sql = file_get_contents("assets/filemanager/".$file_name);
			$list = explode(';', $sql);
			array_pop($list);

			$this->db->trans_start();
				foreach($list as $statement) {
					$statment = $statement . ";";
					$this->db->query($statement);   
				}
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				$this->session->set_tempdata("msg", "<span class='error'>Failure, Please try again</span>", 5);
			} else {
				$this->master_model->delete_file('', $file_name);
				$this->session->set_tempdata("msg", "<span class='success'>Database successfully restored.</span>", 5);
			}
			redirect('users/restore_db');
		} else {
			$this->session->set_tempdata("msg", "<span class='error'>Failure, Please select a SQL file</span>", 5);
			$this->restore_db();
		}
	}
	
	/**
	 * Clear all cache from the cache directory
	 */
	public function delete_all_cache_file() {
		// Delete cache file from application directory
		$CI = & get_instance();
		$path = $CI->config->item('cache_path');

		$cache_path = ($path == '') ? APPPATH . 'cache/' : $path;

		$handle = opendir($cache_path);
		while (($file = readdir($handle)) !== FALSE) {
			//Leave the directory protection alone
			if ($file != '.htaccess' && $file != 'index.html') {
				@unlink($cache_path . '/' . $file);
			}
		}
		closedir($handle);

		// Delete cache file from system directory
		$cache_path = BASEPATH . 'cache/';
		$handle = opendir($cache_path);
		while (($file = readdir($handle)) !== FALSE) {
			//Leave the directory protection alone
			if ($file != '.htaccess' && $file != 'index.html') {
				@unlink($cache_path . '/' . $file);
			}
		}
		closedir($handle);
		
		// Delete captcha image from assets/captcha
		$cache_path = './assets/captcha';
		$handle = opendir($cache_path);
		while (($file = readdir($handle)) !== FALSE) {
			//Leave the directory protection alone
			if ($file != '.htaccess' && $file != 'index.html') {
				@unlink($cache_path . '/' . $file);
			}
		}
		closedir($handle);

		redirect('dashboard');
	}
	
	

}
