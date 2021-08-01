<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/friends_list.css')?>">
		
	<title>Your friends</title>
</head>
<body>
	<div class="all_friends_container">
		<div class="head">
			<a class="back_btn" href="<?php echo site_url('/friends'); ?>">
				<i class="fal fa-arrow-left"></i>
			</a>
			<h3>All Friends</h3>
			<p></p>
		</div>
	</div>
</body>
</html>