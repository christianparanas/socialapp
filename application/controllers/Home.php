<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	// load posts
	public function index() 
	{
		if($this->session->userdata()) {

			if($this->session->isLoggedIn) {
				$this->load->view('Home/index');
			}
			else {
				redirect('auth/');
			}
		}
		else {
			redirect('auth/');
		}
	}
}