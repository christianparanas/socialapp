<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('AccountModel');
    $this->load->helper(array('form', 'url'));
  }
	

	public function index() {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$data['userDetails'] = $this->AccountModel->current_user();

			$this->load->view('Account/index', $data);
		}
		else {
			redirect('auth/');
		}
	}

	public function user($id) {
		if($this->session->userdata() && $this->session->isLoggedIn) {
			$data['userDetails'] = $this->AccountModel->other_user();

			$this->load->view('Account/user', $data);
		}
		else {
			redirect('auth/');
		}
	}

  public function store() {
    $config['upload_path'] = './content/dp/';
    $config['allowed_types'] = '*';
    $config['max_size'] = 10000;
    $config['file_name'] = $this->session->id.'-profile_pic'.rand(2, 1000);
    $config['max_width'] = 5000;
    $config['max_height'] = 5000;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('profile_image')) {
        $error = array('error' => $this->upload->display_errors());

        echo json_encode($error);

        // $this->load->view('files/upload_form', $error);
    } else {
        $data = array('image_metadata' => $this->upload->data());
        $new_dp_url = $data['image_metadata']['file_name'];


        $this->AccountModel->change_dp($new_dp_url);

    }

    redirect('account');
	}
}