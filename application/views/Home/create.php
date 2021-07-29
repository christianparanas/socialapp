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
			<button class="item2 post_btn" name="post_btn" disabled>POST</button>
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
			<textarea class="text_input" name="" id="" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
			<hr>
		</div>
	</div>

	<script>
		const textarea_element = document.querySelector('.text_input');
		const post_btn = document.querySelector('.post_btn');

		textarea_element.addEventListener('input', (event) => {
		  if(textarea_element.value.length == 0) {
		  	post_btn.disabled = true;
		  }
		  else {
		  	post_btn.disabled = false;
		  }
		});
	</script>
</body>
</html>