<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	// load posts
	public function index() 
	{
		$this->load->helper('url');
		$this->load->view('Home/index');
	}
}