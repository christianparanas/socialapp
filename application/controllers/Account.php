<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	

	public function index() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('Account/index');
		}
		else {
			redirect('auth/');
		}
	}

	public function user($id) {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('Account/user');
		}
		else {
			redirect('auth/');
		}
	}
}