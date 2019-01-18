<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
        if( $this->session->userdata('username') ){
            header('Location: /admin/dashboard');
        }

		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('/logins/header');
		$this->load->view('/layouts/login');
		$this->load->view('/logins/footer');
	}

	public  function tes()
	{
		if( $this->input->post() ){
			echo 'Hi there';
		} else {
			echo 'Hello there';
		}
	}

	public function auth()
	{
		$result = false;

		$genToken = array(
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash()
		);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('username','Username','required|min_length[3]');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');

		if( $this->form_validation->run() == FALSE ){
			$result = array(
				'error' => true,
				'msg' => validation_errors(),
			);
			$final = array_merge($result, $genToken);
			echo json_encode($final);
			die();
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$auth = $this->Login_model->login($username, $password);
		if( !$auth || $auth == null ){
			$errors = '<div class="alert alert-danger">Something was wrong!</div>';
			$result = array(
				'error' => true,
				'msg' => $errors
			);
			$final = array_merge($result, $genToken);
			echo json_encode($final);
			die();
		} else if( $auth['error'] == true ) {
			$errors = '<div class="alert alert-danger">' . $auth['msg'] . '</div>';
			$result = array(
				'error' => true,
				'msg' => $errors
			);
			$final = array_merge($result, $genToken);
			echo json_encode($final);
		} else {
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('email', $auth['email']);
			$this->session->set_userdata('name', $auth['name']);
			//redirect(base_url() . '/admin/dashboard', 'refresh');
			echo json_encode($auth);
		}
	}

    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
    }
}