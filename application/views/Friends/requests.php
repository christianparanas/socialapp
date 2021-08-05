<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Friends_requests.css')?>">
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

		<div class="friend_requests_container_main">
			<?php 

				foreach($requests as $request) {
					echo '<div class="you_know_item">
									<a href="'. base_url('account/'. $request->username .'') .'">
										<img src="'. base_url('content/dp/'.trim($request->profile_pic_url, "''").'') .'" alt="user">
									</a>
									<div class="you_know_item_content">
										<div class="name">'. ucfirst($request->firstname) .' '. ucfirst($request->lastname) .'</div>
										<div class="you_know_op">
											<div class="add">Accept</div>
											<div class="remove">Remove</div>
										</div>
									</div>
								</div>';
				}

			?>
		</div>
	</div>
</body>
</html>