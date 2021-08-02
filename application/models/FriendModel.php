<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FriendModel extends CI_Model {

	public function people_you_may_know() {
		$this->db->select("id, firstname, lastname, profile_pic_url");
		$this->db->from("users");
		$this->db->where("id !=", $this->session->id);
		$this->db->order_by("users.created_at", 'DESC');
		$query = $this->db->get();

		return $query->result();
	}
}