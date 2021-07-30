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

	public function like() {
		$option = $this->input->post('option');
		$postId = $this->input->post('postId');

		$data = array(
			'postId' => $postId,
			'likerId' => $this->session->id
		);

		$option_dec;

		if($option == 1) {
			$option_dec = 'likes_count-1';
			$this->db->delete('likers', $data);
		}
		else {
			$option_dec = 'likes_count+1';
			$this->db->insert('likers', $data);
		}


		$this->db->where('id', $postId);
		$this->db->set('likes_count', $option_dec, FALSE);
		$this->db->update('posts');
	}
}