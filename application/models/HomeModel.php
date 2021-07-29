<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
	
	public function fetch_all_posts() {
		$this->db->select('userId, firstname, lastname, posts.id, caption, privacy, posts.created_at, posts.updated_at');
		$this->db->from('posts');
		$this->db->join('users', 'users.id = posts.userId', 'inner');
		$this->db->order_by('posts.id', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function create_post() {
		$data = array(
			'userId' => $this->session->id,
			'caption' => $this->input->post('text_input'),
			'privacy' => $this->input->post('privacy_input')
		);

		return $this->db->insert('posts', $data);
	}
}