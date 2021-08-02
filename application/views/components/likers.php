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
			<a class="back_btn" href="<?php echo site_url('/'); ?>">
				<i class="fal fa-arrow-left"></i>
			</a>
			<h3>Likers</h3>
			<p></p>
		</div>
		<div class="likers_wrap">
			<?php 
				foreach($likers as $liker) {
					echo '<div class="item">
									<img class="liker_img" src="'. base_url('content/dp/'.trim($liker->profile_pic_url, "''").'') .'" alt="liker img">';

						// check if u r on the likers list and if true, output "You" instead of the liker name
						if($liker->id == $this->session->id) {
							echo '<div class="liker_name">You</div>
								</div>';
						}
						else {
							echo '<div class="liker_name">'.  ucfirst($liker->firstname) .' '.  ucfirst($liker->lastname) .'</div>
								</div>';
						}
				}
			?>
		</div>
	</div>
</body>
</html>