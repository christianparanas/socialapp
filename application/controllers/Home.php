<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	 public function __construct()
  {
      parent::__construct();
      $this->load->model('PostModel');
  }


	// home
	public function index() {
		if($this->session->userdata() && $this->session->isLoggedIn) {			
			$data['posts'] = $this->PostModel->fetch_all_posts();

			$this->load->view('Home/index', $data);
		}
		else {
			redirect('auth/');
		}
	}

	public function notifications() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('Home/notifications');
		}
		else {
			redirect('auth/');
		}
	}

	public function options() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('Home/options');
		}
		else {
			redirect('auth/');
		}
	}

	// create post
	public function create() {
		if($this->session->userdata() && $this->session->isLoggedIn) {

			if($this->input->post('submit')) {

				$post_result = $this->PostModel->create_post();
				redirect('/');
			}
			else {
				$this->load->view('Home/create');
			}
		}
		else {
			redirect('auth/');
		}
	}
}

// htaccess prod config
// <IfModule mod_rewrite.c>
//   RewriteEngine On
//   RewriteBase /
//   RewriteCond %{REQUEST_FILENAME} !-d
//   RewriteCond %{REQUEST_FILENAME} !-f
//   RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
// </IfModule>