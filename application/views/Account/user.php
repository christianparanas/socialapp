<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/User.css')?>">
	<title>Code - <?= $userDetails['0']->firstname ?> <?= $userDetails['0']->lastname ?></title>
</head>
<body>
	<div class="account__main_container">
		<div class="account__header">
			<div class="account__top_options">
				<a class="back_btn" href="<?php echo site_url('/'); ?>">
					<i class="far fa-arrow-left"></i>
				</a>
			</div>

			<div class="account__user_details">
				<div class="account__header_photos">
					<div class="account__cover_photo">
						<img src="<?php echo base_url('assets/imgs/undercover.png')?>" alt="User Cover Photo">
					</div>
					<div class="account__profile_photo">
						<img src="<?php echo base_url('content/dp/'. trim($userDetails['0']->profile_pic_url, "''").'')?>" alt="Img">
				</div>

				<div class="account__user_detail">
					<div class="account__username">
						<?= $userDetails['0']->firstname ?> <?= $userDetails['0']->lastname ?>
					</div>
					<div class="account__user_detail_option">
						<?php 

							$requestSenderArr = explode(',', $userDetails['0']->requestSender);
							$sendersArr = explode(',', $this->session->fr_senders);

							if(in_array($this->session->id, $requestSenderArr)) {
								echo '<div class="item" onclick="cancel_friend_request('. $userDetails['0']->userId .')">Cancel Request</div>';
							}
							elseif(in_array($userDetails['0']->userId, $sendersArr)) {
								echo '<div class="item" onclick="addfriend('. $userDetails['0']->userId .')">Confirm</div>';
							}
							else {
								echo '<div class="item" onclick="addfriend('. $userDetails['0']->userId .')">Add friend</div>';
							}

						?>
						<div class="item"><i class="fab fa-facebook-messenger"></i></div>
						<div class="item"><i class="fal fa-ellipsis-h-alt"></i></div>
					</div>
					<div class="account__user_personal_details">
						<div class="personal_detail"><i class="fal fa-graduation-cap"></i> Studied at <strong>Eastern Visayas State University</strong></div>
						<div class="personal_detail"><i class="fal fa-home-lg-alt"></i> Lives in <strong>Tacloban City</strong></div>
						<div class="personal_detail edit_personal_details_btn">Edit Publlic Details</div>
					</div>
				</div>

				<div class="account__user_friends">
					<div class="header">
						<div class="item"><strong>Friends</strong><p>58 friends</p></div>
						<div class="item">Find Friends</div>
					</div>
					<div class="account__user_friends_container">
						<?php
							for ($x = 0; $x <= 5; $x++) {
							  echo '<div class="friend">
												<img src="'.base_url('assets/imgs/me.jpg').'" alt="Friend Image">
												<p>Christia Paranas</p>
											</div>';
							}
						?>
					</div>
					<div class="account__user_friend_seeall">See All Friends</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		
		// like interaction
		async function addfriend(userId) {
			$.ajax({
		     url:'<?= site_url('/Friends/addFriend')?>',
		     method: 'post',
		     data: { userId: userId},
		     dataType: 'json'	   
		  })

			location.reload();
		}

		async function cancel_friend_request(userId) {
			$.ajax({
		     url:'<?= site_url('/Friends/calcelFriendRequest')?>',
		     method: 'post',
		     data: { userId: userId},
		     dataType: 'json'	   
		  })

			location.reload();
		}
		
	</script>
</body>
</html>