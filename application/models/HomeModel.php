<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
	
	public function fetch_all_posts() {
		$this->db->distinct();
		$this->db->select('userId, 
											firstname, 
											lastname, 
											posts.id AS postId, 
											caption, 
											likes_count,
											GROUP_CONCAT(likers.likerId) AS likers, 
											privacy, 
											posts.created_at, 
											posts.updated_at');
		$this->db->from('posts');
		$this->db->join('users', 'users.id = posts.userId');
		$this->db->join('likers', 'likers.postId = posts.id', 'left outer');

		$this->db->group_by('posts.id');
		$this->db->order_by('posts.id', 'DESC');
		$query_post_result = $this->db->get();

		// var_dump($query_post_result->result());

		return $query_post_result;
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