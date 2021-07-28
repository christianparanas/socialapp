<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home_friends.css')?>">
	<title>Friends</title>
</head>
<body>
	<div class="home__friends">
		<?php $this->load->view('components/nav'); ?>

		<div class="home__friends__main_container">
			friends
		</div>
	</div>
</body>
</html>