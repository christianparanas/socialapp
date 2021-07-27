<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function register() {

		$data = array(
			'username' => $this->input->post('reg_username'),
			'firstname' => $this->input->post('reg_firstname'),
			'lastname' => $this->input->post('reg_lastname'),
			'email' => $this->input->post('reg_email'),
			'password' => password_hash($this->input->post('reg_password'), PASSWORD_BCRYPT)
		);

		return $this->db->insert('users', $data);
	}
}
