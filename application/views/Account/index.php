<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/account.css')?>">
	<title><?= $this->session->username ?></title>
</head>
<body>
	<div class="account__main_container">
		<div class="account__header">
			<div class="account__top_options">
				<a class="back_btn" href="<?php echo site_url('home/options'); ?>">
					<i class="far fa-arrow-left"></i>
				</a>
			</div>

			<div class="account__user_details">
				<div class="account__header_photos">
					<div class="account__cover_photo">
						<img src="<?php echo base_url('assets/imgs/undercover.png')?>" alt="User Cover Photo">
					</div>
					<div class="account__profile_photo">
						<img src="<?php echo base_url('assets/imgs/me.jpg')?>" alt="User Profile Photo">
					</div>
				</div>

				<div class="account__user_detail">
					<div class="account__username">
						<?= $this->session->firstname ?> <?= $this->session->lastname ?>
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
			</div>
		</div>
	</div>
</body>
</html>