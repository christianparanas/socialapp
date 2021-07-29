<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Home.css')?>">
	<title>Home</title>
</head>
<body>
	<div class="home">
		<?php $this->load->view('components/nav'); ?>

		<div class="user_create">
			<div class="create_post">
				<img src="<?php echo base_url('assets/imgs/me.jpg') ?>" alt="Current user">
				<a class="label" href="<?php echo site_url('home/create'); ?>">What's on your mind?</a>
			</div>
		</div>

		<div class="home__main_container">

			<?php 
			  foreach ($posts->result() as $row) {
				  echo '<div class="home__post_container">
									<div class="home__post_header">
										<div class="item">
											<img src="'. base_url('assets/imgs/me.jpg') .'" alt="Post author image">
											<div class="name">'.$row->firstname.' '.$row->lastname.'
												<div class="aaa">'.date('M j Y g:i A', strtotime($row->updated_at)).'</div>
											</div>
										</div>
										<div class="item">
											<i class="fal fa-ellipsis-h-alt"></i>
										</div>
									</div>
									<div class="home__post_content">'.$row->caption.'</div>
									<div class="home__post_interact">
										<div class="item"><li class="fal fa-thumbs-up"></li></div>
										<div class="item"><li class="fal fa-comment"></li></div>
										<div class="item"><li class="fal fa-share"></li></div>
									</div>
								</div>';
				}	
			?>
		</div>
	</div>
</body>
</html>