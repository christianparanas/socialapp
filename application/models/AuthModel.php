<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function login() {
		$data = array(
			'email' => $this->input->post('login_email'),
			'password' => $this->input->post('login_password')
		);

		$query = $this->db->get_where('users', array('email' => $data['email']));
		
		if($query->row()) {
			$result = $query->row();

			if(password_verify($data['password'], $result->password)) {
				redirect('/');
			}
			else {
				$this->session->set_flashdata('isValidLogin', FALSE);
				redirect('auth/');
			}
		}
		else {
			$this->session->set_flashdata('isValidLogin', FALSE);
			redirect('auth/');
		}

	}

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
