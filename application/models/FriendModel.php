<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FriendModel extends CI_Model {

	public function people_you_may_know() {
		$this->db->select("users.id, 
											 firstname, 
											 lastname, 
											 profile_pic_url, 
											 username
											");

		$this->db->from("users");
		$this->db->join('friend_requests', 'friend_requests.userSenderId = users.id',);
		$this->db->where("users.id !=", $this->session->id);
		$this->db->or_where("friend_requests.userSenderId !=", $this->session->id);
		$this->db->or_where("friend_requests.userSenderId !=", $this->session->id);
		$this->db->order_by("users.created_at", 'DESC');
		$query = $this->db->get();

		echo json_encode($query->result());

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
}