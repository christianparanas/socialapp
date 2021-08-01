<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('PostModel');
  }

    // do like or unlike to a post
  public function interact_like() {
    $this->PostModel->like();
  }

  // do a comment or edit or delete your comment to a post
  public function comments() {
    $postId = $this->uri->segment(3);

    if($this->session->userdata() && $this->session->isLoggedIn) {
      if($this->input->post('comment_btn')) {
        $this->PostModel->create_comment();

        redirect('post/comments/'. $postId .'');
      }
      else {
        $data['comments'] = $this->PostModel->load_comments();
        $this->load->view('components/comments', $data);
      }
    }
    else {
      redirect('auth/');
    }
  }

  // load likers
  public function likers($postId) {
    if($this->session->userdata() && $this->session->isLoggedIn) {
      $data['likers'] = $this->PostModel->likers();
      $this->load->view('components/likers', $data);
    }
    else {
      redirect('auth/');
    }
  }
}