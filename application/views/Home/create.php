<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Home_create.css')?>">
	<title>Create Post</title>
</head>
<body>
	<div class="home__create">
		<div class="top_options">
			<div class="item1">
				<a class="back_btn" href="<?php echo site_url('home/index'); ?>">
					<i class="far fa-arrow-left"></i>
				</a>
				<p>Create Post</p>
			</div>
			<div class="item2">POST</div>
		</div>

		<div class="input_container">
			<div class="input_header">
				<img src="<?php echo base_url('assets/imgs/me.jpg') ?>" alt="Create Post Autho Image">
				<div class="name">
					<?= $this->session->firstname ?> <?= $this->session->lastname ?>
					<select name="privacy" id="privacy">
						<option value="onlyme">Only me</option>
						<option value="public">Public</option>
						<option value="friends">Friends</option>
					</select>
				</div>
			</div>
			<textarea name="" id="" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
			<hr>
		</div>
	</div>
</body>
</html>