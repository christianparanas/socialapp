<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home.css')?>">
	
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
									<div class="home__post_likes">';

									if($row->likes_count > 0) {
										echo '<a href="'. base_url('home/likers/'. $row->postId .'') .'">
														<svg class="likesLogo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1501.7 1504.4" width="2496" height="2500"><style>.st0{fill:#5e91ff}.st1{fill:#fff}</style><title>Like</title><ellipse class="st0" cx="750.8" cy="752.2" rx="750.8" ry="752.2"/><path class="st1" d="M378.3 667.5h165.1c13 0 23.6 10.5 23.6 23.6v379.1c0 13-10.5 23.6-23.6 23.6H378.3c-13 0-23.6-10.5-23.6-23.6V691c.1-13 10.6-23.5 23.6-23.5zM624.7 1004.7V733.1c.1-66.9 18.8-132.4 54.1-189.2 21.5-34.4 69.7-89.5 96.7-118 6-6.4 27.8-25.2 27.8-35.5 0-13.2 1.5-34.5 2-74.2.3-25.2 20.8-45.9 46-45.7h1.1c44.1.8 58.2 41.6 58.2 41.6s37.7 74.4 2.5 165.4c-29.7 76.9-35.8 83.1-35.8 83.1s-9.6 13.9 20.8 13.3c0 0 185.6-.8 192-.8 13.7 0 57.4 12.5 54.9 68.2-1.8 41.2-27.4 55.6-40.5 60.3-1.7.6-2.6 2.5-1.9 4.2.3.7.8 1.3 1.5 1.7 13.4 7.8 40.8 27.5 40.2 57.7-.8 36.6-15.5 50.1-46.1 58.5-1.7.4-2.8 2.2-2.3 3.9.2.9.8 1.6 1.5 2 11.6 6.6 31.5 22.7 30.3 55.3-1.2 33.2-25.2 44.9-38.3 48.9-1.7.5-2.7 2.3-2.2 4 .2.7.7 1.4 1.3 1.8 8.3 5.7 20.6 18.6 20 45.1-.3 14-5 24.2-10.9 31.5-9.3 11.5-23.9 17.5-38.7 17.6l-411.8.8c-.1-.1-22.4 0-22.4-29.9z"/></svg>
									  		  	<div class="like_count">'.$row->likes_count.'</div>
									  		  </a>';
									}

								echo '
									 </div>
									 <hr />
									<div class="home__post_interact">';

									// string to array conversion
									$likersIdArr = explode(',', $row->likers);

									 // search current user id the likers array
									if(in_array($this->session->id, $likersIdArr)) {
										echo '<div class="item" onclick="interactLike('.$row->postId.')" style="color: blue;"><li class="fal fa-thumbs-up"></li>Liked</div>';
									}	
									else {
										echo '<div class="item" onclick="interactLike('.$row->postId.')" style="color: #000;"><li class="fal fa-thumbs-up"></li>Like</div>';
									}

								echo '
										<a class="item" href="'. base_url('home/comments/'. $row->postId .'').'"><li class="fal fa-comment"></li>Comment</a>
										<div class="item"><li class="fal fa-share"></li>Share</div>
									</div>
								</div>';
				}	
			?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		
		// like interaction
		async function interactLike(postId) {
			$.ajax({
		     url:'<?= site_url('/Home/interact_like')?>',
		     method: 'post',
		     data: {option: 1, postId: postId},
		     dataType: 'json',
		     success: function(response){
		     	location.reload();
		     }
	   })

			location.reload();
		}
	</script>
</body>
</html>