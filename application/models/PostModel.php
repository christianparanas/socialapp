<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PostModel extends CI_Model {
	
	public function fetch_all_posts() {
		$this->db->distinct();
		$this->db->select('posts.userId, 
											username,
											firstname, 
											lastname,
											profile_pic_url,
											posts.id AS postId, 
											caption, 
											likes_count,
											comments_count,
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
			'privacy' => $this->input->post('privacy_input'),
			'created_at' => date('Y/m/d H:i:s'),
			'updated_at' => date('Y/m/d H:i:s')
		);

		return $this->db->insert('posts', $data);
	}

	public function like() {
		// gettting this values from homepage ajax post request
		$postId = $this->input->post('postId');

		// liker data and the postId
		$data = array(
			'postId' => $postId,
			'likerId' => $this->session->id
		);

		// query the likers table if he/she like the specifiv post already
		$this->db->select("*");
		$this->db->from('likers');
		$this->db->where('likerId', $this->session->id);
		$this->db->where('postId', $postId);
		$query = $this->db->get();

		$option_dec;

		// check if liker already liked the post or not
		if($query->num_rows() > 0) {
				// decrement the likes_count of the post
        $option_dec = 'likes_count-1';
        // delete the liker data from likers table
				$this->db->delete('likers', $data);
     }
     else {
     	$option_dec = 'likes_count+1';
     	// insert likder data from likers table
			$this->db->insert('likers', $data);
     }

     // update the post likes_count based on the condition above
		$this->db->where('id', $postId);
		$this->db->set('likes_count', $option_dec, FALSE);
		$this->db->set('updated_at', ''.date('Y/m/d H:i:s').'');
		$this->db->update('posts');
	}

	// create comment
	public function create_comment() {
		$postId = $this->uri->segment(3);

		$data = array(
			'comment' => $this->input->post('comment'),
			'postId' => $postId,
			'userId' => $this->session->id,
			'created_at' => date('Y/m/d H:i:s'),
			'updated_at' => date('Y/m/d H:i:s')
		);

		$this->db->insert('comments', $data);

		// update comment count
		$this->db->where('id', $postId);
		$this->db->set('comments_count', 'comments_count+1', FALSE);
		$this->db->set('updated_at', ''.date('Y/m/d H:i:s').'');
		$this->db->update('posts');
	}

	// load comments
	public function load_comments() {
		$postId = $this->uri->segment(3);

		$this->db->select('userId, comments.id AS commentId, users.firstname, users.lastname, comment, comments.updated_at');
		$this->db->from('comments');
		$this->db->join('users', 'users.id = comments.userId', 'left outer');
		$this->db->where('postId', $postId);
		$this->db->order_by('comments.updated_at', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	// load post liker/s
	public function likers() {
		$postId = $this->uri->segment(3);

		// query the likers table
		$this->db->select('users.id, users.profile_pic_url, users.firstname, users.lastname');
		$this->db->from('likers');
		$this->db->join('users', 'users.id = likers.likerId', 'left outer');
		$this->db->where('postId', $postId);
		$this->db->order_by('likers.created_at', 'DESC');

		$query = $this->db->get();
		return $query->result();
		// echo json_encode($query->result());
	}
}