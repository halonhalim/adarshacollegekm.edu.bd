<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function single() {
		$this->load->view('header');
		$this->load->view('single');
		$this->load->view('footer');
	}
	
	public function news() {
		$this->load->view('header');
		$this->load->view('news');
		$this->load->view('footer');
	}
	
	public function notice() {
		$this->load->view('header');
		$this->load->view('notice');
		$this->load->view('footer');
	}
	
	public function content($page = NULL) {
		$this->load->view('header');
		$this->load->view($page);
		$this->load->view('footer');
	}
	
	// Online feedback
	public function sendEmail() {
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|xss_clean');
		$this->form_validation->set_rules('comments', 'comments', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_tempdata("msg", "<span style='color:red;'>" . exception() . "</span>", 5);
			$this->content('contact');
		} else {
			$htmlContent = nl2br($this->input->post('comments')) . '<br/> Feedback From <br/>' .
			$this->input->post('name') . '<br/>' .
			$this->input->post('mobile');

			$contact = $this->contact_model->index();
			
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to($contact->email, $contact->school_name);
			$this->email->subject('Feedback from '.$contact->school_name);
			$this->email->message($htmlContent);

			if ($this->email->send()) {
				$this->session->set_tempdata("msg", "<span style='color:green'> আপনার ইমেইলটি সঠিকভাবে পাঠানো হয়েছে। </span>", 5);
			} else {
				$this->session->set_tempdata("msg", "<span style='color:red'>" . exception() . "</span>", 5);
			}
			redirect('page/content/contact');
		}		
	}

}
