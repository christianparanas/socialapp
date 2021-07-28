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
				$newdata = array(
						'id' => $result->id,
		        'firstname' => $result->firstname,
		        'lastname' => $result->lastname,
		        'email'     => $result->email,
		        'isLoggedIn' => TRUE
					);

				$this->session->set_userdata($newdata);

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
			'firstname' => $this->input->post('reg_firstname'),
			'lastname' => $this->input->post('reg_lastname'),
			'email' => $this->input->post('reg_email'),
			'password' => password_hash($this->input->post('reg_password'), PASSWORD_BCRYPT)
		);

		return $this->db->insert('users', $data);
	}

	public function logout() {
		$this->session->unset_userdata(array('id', 'lastname', 'firstname', 'email', 'isLoggedIn'));
	}
}
