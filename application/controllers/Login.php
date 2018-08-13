<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Login extends CI_Controller {

	var $dir = 'admin/login/';

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		goodbye(); // It's active when hacking attempt.
	}

	public function dashboard() {
		if ($this->session->userdata('isLogin') == TRUE) {
			$data['breadcrumb'] = 'ড্যাশবোর্ড';

			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/dashboard');
			$this->load->view('admin/templates/footer');
		} else {
			// Create captcha
			$vals = array(
				'img_path' => './assets/captcha/',
				'img_url' => base_url() . 'assets/captcha/'
			);

			$cap = create_captcha($vals);
			$data['captcha'] = $cap['image'];
			$this->session->set_userdata('captchaWord', $cap['word']);

			$data['breadcrumb'] = 'Admin Panel';
			$this->load->view($this->dir . 'form', $data);
		}
	}

	public function check_user() {
		// field name, error message, validation rules
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('captcha', 'captcha', 'trim|required|xss_clean|callback_matching_captcha');
		
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span class='error'>" . exception() . "</span>", 5);
			//redirect('admin-panel');
			$this->dashboard();
		} else {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$result = $this->login_model->check_user($username, $password);

			if (isset($result)) {
				$data = array(
					'id' => $result->id,
					'name' => $result->name,
					'roles' => $result->roles,
					'username' => $result->username,
					'isLogin' => TRUE
				);
				$this->session->set_userdata($data);

				$this->login_model->login_time($result->id);
				
				login_info(current_url(), $username, $password); // Get login information
				
				$this->session->set_tempdata("msg", "<span class='success'>স্বাগত! আপনি সফলভাবে লগ ইন করেছেন।</span>", 5);
				redirect('dashboard');
			} else {
				$this->session->set_tempdata("msg", "<span class='error'>Sorry, username or password doesn't match!</span>", 5);
				$this->dashboard();
			}
		}
	}

	// Captcha Validation	
	public function refresh_captcha() {
		$vals = array(
			'img_path' => './assets/captcha/',
			'img_url' => base_url() . 'assets/captcha/'
		);

		$cap = create_captcha($vals);
		$this->session->set_userdata('captchaWord', $cap['word']);
		echo $cap['image'];
	}

	public function matching_captcha($str) {
		if (strtolower($str) != strtolower($this->session->userdata('captchaWord'))) {
			$this->form_validation->set_message('matching_captcha', 'The {field} did not matching');
			return false;
		} else {
			return true;
		}
	}

	public function logout() {
		$id = $this->session->userdata('id');
		$this->login_model->logout_time($id);
		$this->session->sess_destroy();
		redirect('admin-panel');
	}

	public function reset_password() {
		
		$email = $this->input->post('email');
		$user = $this->users_model->get_by_email(md5($email));
		
		$contact = $this->page_model->contact();
		
		if(isset($user)) {
			
			$msgBody = "<p>Dear ".$user->name.",<br/>"
					. "If this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our <b>".$contact->school_name."</b> website.<br/>"
					. "To reset your password, please <a href='" . base_url() . 'login/reset_confirm/' . md5($user->email) . "'>click here</a>.</p>"
					. "Thanks,<br/>"
					. "The Administration";
			
			$this->email->from($contact->email, $contact->school_name);
			$this->email->to($user->email, $user->name);
			$this->email->subject('Password Reset Link');
			$this->email->message($msgBody);
			$this->email->send();
			echo '<script type="text/javascript">alert("Your password recovery link has been sent to your e-mail address.")</script>';
		} else {
			echo '<script type="text/javascript">alert("Your email is invalid !")</script>';
		}
		$this->dashboard();
	}

	public function reset_confirm() {
		
		$user = $this->users_model->get_by_email($this->uri->segment(3));
		
		$contact = $this->page_model->contact();
		
		if (isset($user)) {
			$password = random_password(10); 
			$data = array(
				'encode_password' => getHashedPassword($password),
				'modified_at' => date('Y-m-d H:i:s')
			);
		} else {
			redirect('/admin-panel');
		}

		if ($this->users_model->update($data, md5($user->id)) == TRUE) {
			
			$msgBody = "<p>Dear ".$user->name.",<br/>"
					. "Your new password is: <b>" .$password."</b><br/>"
					. "Please copy and paste the same. Thereafter please change to a password you can remember.</p>"
					. "Thanks,<br/>"
					. "The Administration";
			
			$this->email->from($contact->email, $contact->school_name);
			$this->email->to($user->email, $user->name);
			$this->email->subject('Password succesfully reset');
			$this->email->message($msgBody);
			$this->email->send();
			echo '<script type="text/javascript">alert("Password successfully reset. Please check your email !"")</script>';
		} else {
			echo '<script type="text/javascript">alert("Password reset fail!")</script>';
		}
		$this->dashboard();
	}

}
