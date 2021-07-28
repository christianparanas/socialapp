<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index() {
		// if session is active redirect to homepage, if not, so be it haha
		if($this->session->userdata() && $this->session->isLoggedIn) {
			redirect('/');
		}
		else {
			if($this->input->post('login_btn')) {
				$this->load->model('AuthModel');
				$this->AuthModel->login();
			}
			else {
				$this->load->view('Auth/login');
			}
		}
	}

	public function register(){
		// if session is active redirect to homepage, if not, so be it haha
		if($this->session->userdata() && $this->session->isLoggedIn) {
			redirect('/');
		}
		else {
			if($this->input->post('register_btn')) {
				$this->load->model('AuthModel');
				$this->AuthModel->register();

				redirect('auth/register');
			}
			else {
				$this->load->view('Auth/register');
			}
		}
	}

	// logout method
	public function logout() {
		$this->load->model('AuthModel');
		$this->AuthModel->logout();
		redirect('auth/');
	}
}