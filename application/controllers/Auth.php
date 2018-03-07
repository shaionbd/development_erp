<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {

	public $title = "Enosis Development Solution";

	public function __construct() {
		parent::__construct();
		$this->load->model('AuthModel', 'authModel');

		if($this->session->userdata('admin_logged_in')) {
			return redirect(base_url('admin'));
		}
		date_default_timezone_set('Asia/Dhaka');
	}

	// user login view
	public function index(){
		return redirect(base_url('auth/admin'));
	}


	// admin login view
	public function admin(){
		$data['title'] = $this->title.' | Admin Panel | Login';
		$this->load->view('admin/login',$data);
	}

	// login as admin
	public function adminLogin() {
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('login')){	//if the validation passes the creating card rules
			if($this->checkDatabase('admin'))
				return redirect(base_url('admin'));
			else{
				// set error messsage
				$data['message'] = 'Sorry';
				$data['title'] = $this->title.' | Admin Panel | Login';
				$this->load->view('admin/login',$data);
			}
		}else{
			$this->admin();
		}
	}

	public function checkDatabase($loginAs) {
		$email = $this->input->post('email');
		// $password = base64_encode(hash_hmac('whirlpool', $this->input->post('password'), true));
		$password = md5($this->input->post('password'));
	
		$result = $this->authModel->checkAdminLogin($email, $password);

		if($result) {
			$data = array(
				'id' => $result->id,
				'name' => $result->name,
				'email' => $result->email,
				'role' => $result->role
			);
			$this->session->set_userdata('admin_logged_in', $data);
			$user = 'admin';
			return $user;	
		} else {
			$this->session->set_flashdata('error', 'Invalid email or password');
			return FALSE;
		}
	}

}
