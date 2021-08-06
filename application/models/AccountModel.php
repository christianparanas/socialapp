<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccountModel extends CI_Model {

	public function __construct() {
    parent::__construct();
  }

	public function current_user() {
		$userId = $this->session->id;

		// fetch current user details
		$this->db->select('firstname, lastname, email, username, profile_pic_url, created_at');
		$this->db->from('users');
		$this->db->where('id', $userId);

		$query_result = $this->db->get();
		// echo json_encode($query_result->result());

		// remove session data
		$this->session->unset_userdata(array('fr_receivers, fr_senders, lastname', 'firstname', 'profile_pic_url', 'email', 'isLoggedIn'));

		$fr = $this->db->query("SELECT GROUP_CONCAT(userReceiverId) as fr_Receivers FROM friend_requests WHERE userSenderId =". $this->session->id);
		$fs = $this->db->query("SELECT GROUP_CONCAT(userSenderId) as fr_Senders FROM friend_requests WHERE userReceiverId =". $this->session->id);

		$requests = array(
			'fr_receivers' => $fr->result()[0]->fr_Receivers,
			'fr_senders' => $fs->result()[0]->fr_Senders
		);

		$this->session->set_userdata($requests);

		$currentUserData = array(
      'firstname' => $query_result->result()[0]->firstname,
      'lastname' => $query_result->result()[0]->lastname,
      'profile_pic_url' => $query_result->result()[0]->profile_pic_url,
      'email'     => $query_result->result()[0]->email,
      'isLoggedIn' => TRUE
		);
		$this->session->set_userdata($currentUserData);


		return $query_result->result();
	}

	public function other_user() {
		// search the user based on their username
		$username = $this->uri->segment(2);

		// fetch current user details
		$this->db->distinct();
		$this->db->select('users.id AS userId, 
											 firstname, 
											 lastname, 
											 profile_pic_url, 
											 email, username,
											 GROUP_CONCAT(friend_requests.userSenderId) AS requestSender,  
											 users.created_at');
		$this->db->from('users');
		$this->db->join('friend_requests', 'friend_requests.userReceiverId = users.id', 'left outer');
		$this->db->where('username', $username);

		$query_result = $this->db->get();
		return $query_result->result();
	}

	public function change_dp($new_dp_url) {
		$postId = $this->session->id;

		// update comment count
		$this->db->where('id', $postId);
		$this->db->set('profile_pic_url', ''.$new_dp_url.'');
		$this->db->update('users');
	}

}