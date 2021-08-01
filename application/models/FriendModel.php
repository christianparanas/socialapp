<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FriendModel extends CI_Model {

	public function people_you_may_know() {
		$this->db->select("id, firstname, lastname");
		$this->db->from("users");
		$this->db->where("id !=", $this->session->id);
		$query = $this->db->get();

		return $query->result();
	}
}