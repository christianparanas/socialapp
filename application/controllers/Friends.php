<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('FriendModel');
  }

	public function index() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$data['you_may_know_users'] = $this->FriendModel->people_you_may_know();
			// echo json_encode($result);

			$this->load->view('Friends/index', $data);
		}
		else {
			redirect('auth/');
		}
	}

	public function list() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$this->load->view('Friends/list');
		}
		else {
			redirect('auth/');
		}
	}

	public function requests() {
		if($this->session->userdata() && $this->session->isLoggedIn) {

			$this->load->view('Friends/requests');
		}
		else {
			redirect('auth/');
		}
	}
}

?>