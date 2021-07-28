<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home_options.css')?>">
	<title>Options</title>
</head>
<body>
	<div class="home__options">
		<?php $this->load->view('components/nav'); ?>

		<div class="home__options__main_container">
			options
				<a href="<?php echo site_url('/auth/logout'); ?>">Logout</a>
		</div>
	</div>
	
</body>
</html>