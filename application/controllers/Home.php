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

			$this->load->view('home/index', $data);
		}
		else {
			redirect('auth/');
		}
	}

	public function notifications() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('home/notifications');
		}
		else {
			redirect('auth/');
		}
	}

	public function friends() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('home/friends');
		}
		else {
			redirect('auth/');
		}
	}

	public function options() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('home/options');
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
				$this->load->view('home/create');
			}
		}
		else {
			redirect('auth/');
		}
	}

	// do like or unlike to a post
	public function interact_like() {
		echo $this->input->post('num');
		$this->PostModel->like();
	}

	// do a comment or edit or delete your comment to a post
	public function comments() {
		$postId = $this->uri->segment(3);

		if($this->input->post('comment_btn')) {
			$this->PostModel->create_comment();

			redirect('home/comments/'. $postId .'');
		}
		else {
			$data['comments'] = $this->PostModel->load_comments();
			$this->load->view('home/comments', $data);
		}
	}

	// load likers
	public function likers($postId) {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$data['likers'] = $this->PostModel->likers();
			$this->load->view('home/likers', $data);
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