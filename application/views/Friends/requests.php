<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/friends_requests.css')?>">
		
	<title>Friend Requests</title>
</head>
<body>
	<div class="friend_requests_container">
		<div class="head">
			<a class="back_btn" href="<?php echo site_url('/friends'); ?>">
				<i class="fal fa-arrow-left"></i>
			</a>
			<h3>Friend Requests</h3>
			<p></p>
		</div>
	</div>
</body>
</html>