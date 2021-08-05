<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NotifyModel extends CI_Model {
		
	public function load_notifications() {
		$userId = $this->session->id;

		echo 'load notif';
	}
}