<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FriendModel extends CI_Model {

	public function people_you_may_know() {
		$fr = $this->db->query("SELECT GROUP_CONCAT(userReceiverId) as fr_Receivers FROM friend_requests WHERE userSenderId =". $this->session->id);
		$fs = $this->db->query("SELECT GROUP_CONCAT(userSenderId) as fr_Senders FROM friend_requests WHERE userReceiverId =". $this->session->id);

		$requests = array(
			'fr_receivers' => $fr->result()[0]->fr_Receivers,
			'fr_senders' => $fs->result()[0]->fr_Senders
		);

		$this->session->set_userdata($requests);


		$this->db->select("users.id, firstname, lastname, profile_pic_url, username");
		$this->db->from("users");
		$this->db->where("users.id !=", $this->session->id);
		$this->db->order_by("users.created_at", 'DESC');
		$query = $this->db->get();

		// echo json_encode($query->result());
		return $query->result();
	}

	public function add_friend() {
		$userSenderId = $this->session->id;
		$userReceiverId = $this->input->post('userId');

		$data = array(
			'userReceiverId' => $userReceiverId,
			'userSenderId' => $userSenderId,
			'created_at' =>  date('Y/m/d H:i:s')
		);

		return $this->db->insert('friend_requests', $data);
	}

	public function cancel_friend_request() {
		$userSenderId = $this->session->id;
		$userReceiverId = $this->input->post('userId');
		
		$this->db->where('userReceiverId', $userReceiverId);
		$this->db->where('userSenderId', $userSenderId);
		
		return $this->db->delete('friend_requests');	
	}

	public function load_friend_requests() {
		$userId = $this->session->id;

		$this->db->select('users.id, username, profile_pic_url, firstname, lastname, friend_requests.created_at');
		$this->db->from('friend_requests');
		$this->db->join('users', 'users.id = friend_requests.userSenderId', 'left outer');
		$this->db->where('userReceiverId', $userId);
		$query = $this->db->get();
		
		return $query->result();
	}
}