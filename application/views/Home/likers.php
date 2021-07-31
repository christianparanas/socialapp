<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php $this->load->view('components/header'); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/likers.css')?>">
	<title>Likers</title>
</head>
<body>
	<div class="likers_container">
		<div class="head">
			<a class="back_btn" href="<?php echo site_url('home/'); ?>">
				<i class="fal fa-arrow-left"></i>
			</a>
			<h3>Likers</h3>
			<p></p>
		</div>
		<div class="likers_wrap">
			<?php 
				foreach($likers as $liker) {
					echo '<div class="item">
									<img class="liker_img" src="'. base_url('assets/imgs/me.jpg') .'" alt="liker img">
									<div class="liker_name">'.  ucfirst($liker->firstname) .' '.  ucfirst($liker->lastname) .'</div>
								</div>';
				}

			?>
		</div>
	</div>
</body>
</html>