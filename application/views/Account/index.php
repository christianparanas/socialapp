<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Acount.css')?>">
	<title>Profile</title>
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
						<img src="<?php echo base_url('content/dp/'. trim($userDetails['0']->profile_pic_url, "''").'')?>" alt="User Profile Pic">
						<div onclick="openUploadwindow()" class="change_dp_btn"><i class="fal fa-camera"></i>
							<form method="post" action="<?=base_url('Account/store')?>" enctype="multipart/form-data">
                <input type="file" id="profile_image" name="profile_image" size="33" />
                <input type="submit" class="dp_upload_submit" value="Upload Image" />
            </form>
						</div>
					</div>
					</div>
				</div>

				<div class="account__user_detail">
					<div class="account__username">
						<?= $userDetails['0']->firstname ?> <?= $userDetails['0']->lastname ?>
					</div>
					<div class="account__user_detail_option">
						<div class="item"><i class="fad fa-plus-circle"></i> Add to Story</div>
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

	<script>
		const dp_upload_submit_btn = document.querySelector('.dp_upload_submit')
		const dp_upload_input = document.getElementById('profile_image')

		function openUploadwindow() {
			dp_upload_input.click()
		}

		dp_upload_input.addEventListener('change', (event) => {
		  dp_upload_submit_btn.click()
		});
	</script>
</body>
</html>