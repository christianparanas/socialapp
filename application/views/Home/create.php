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
				<a class="back_btn" href="<?php echo site_url('/'); ?>">
					<i class="far fa-arrow-left"></i>
				</a>
				<p>Create Post</p>
			</div>
			<button class="item2 post_btn" disabled>POST</button>
		</div>

		<div class="input_container">
			<div class="input_header">
				<img src="<?php echo base_url('content/dp/'. trim($this->session->profile_pic_url, '‘’').'') ?>" alt="Create Post Autho Image">
				<div class="name">
					<?= $this->session->firstname ?> <?= $this->session->lastname ?>
					<select name="privacy" id="privacy">
						<option value="onlyme">Only me</option>
						<option value="public" selected>Public</option>
						<option value="friends">Friends</option>
					</select>
				</div>
			</div>
			<form action="" method="POST">
				<textarea class="text_input" name="text_input" id="" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
				<input type="text" name="privacy_input" id="privacy_input">
				<input type="submit" class="txtarea_btn" name="submit">
			</form>
			<hr>
		</div>
	</div>

	<script>
		const textarea_element = document.querySelector('.text_input');
		const post_btn = document.querySelector('.post_btn');
		const textarea_btn = document.querySelector('.txtarea_btn');
		const privacyOption = document.getElementById('privacy');
		const privacyInput = document.getElementById('privacy_input');
		

		textarea_element.addEventListener('input', (event) => {
		  if(textarea_element.value.length === 0 || textarea_element.value === null || textarea_element.value.match(/^\s*$/) !== null) {
		  	post_btn.disabled = true;
		  }
		  else {
		  	post_btn.disabled = false;
		  }
		});

		post_btn.addEventListener('click', async (e) => {
			privacyInput.value = await privacyOption.value

			textarea_btn.click()
		})

		privacyOption.addEventListener("input", (e) => {
			console.log()
		})
	</script>
</body>
</html>