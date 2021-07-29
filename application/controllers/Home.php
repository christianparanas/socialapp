<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	// home
	public function index() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->model('HomeModel');
			
			$data['posts'] = $this->HomeModel->fetch_all_posts();

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

	public function friends() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('Home/friends');
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

	public function create() {
		if($this->session->userdata() && $this->session->isLoggedIn) {

			if($this->input->post('submit')) {
				$this->load->model('HomeModel');

				$post_result = $this->HomeModel->create_post();
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