<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index() 
	{
		$this->load->view('Auth/login');
	}

	public function register()
	{
		if($this->input->post('register_btn')) 
		{
			$this->load->model('AuthModel');
			$this->AuthModel->register();

			redirect('auth/register');
		}
		else 
		{
			$this->load->view('Auth/register');
		}
	}
}