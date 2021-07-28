<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Home.css')?>">
	<title>Home</title>
</head>
<body>
	<div class="home">
		<?php $this->load->view('components/nav'); ?>

		<div class="home__main_container">
			Home

		<a href="<?php echo site_url('/auth/logout'); ?>">Logout</a>
		</div>
	</div>
</body>
</html>