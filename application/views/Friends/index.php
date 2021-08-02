<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Friends.css')?>">
	<title>Friends</title>
</head>
<body>
	<div class="home__friends">
		<?php $this->load->view('components/nav'); ?>

		<div class="home__friends__main_container">
			<div class="header">
				<div class="item">Friends</div>
				<div class="item"><li class="far fa-search"></i></div>
			</div>
			<div class="home_friends_options">
				<a class="item" href="<?php echo site_url('friends/requests'); ?>">Requests</a>
				<a class="item" href="<?php echo site_url('friends/list'); ?>">All friends</a>
			</div>

			
			<div class="you_may_know_container">
				<?php 

					if(sizeof($you_may_know_users) == 0) {
						echo '<div class="no_suggest">
										<div class="head">
											<h4>No Suggestions</h4>
											<p>Try searching for a friend</p>
										</div>
										<div class="search_for_friend_btn">Search for a Friend</div>
									</div>';
					}
					else {
						echo '<h4>People you may know</h4>';
						foreach($you_may_know_users as $you_may_know_user) {
							echo '<div class="you_know_item">
											<img src="'. base_url('content/dp/'.trim($you_may_know_user->profile_pic_url, "''").'') .'" alt="user">
											<div class="you_know_item_content">
												<div class="name">'. ucfirst($you_may_know_user->firstname) .' '. ucfirst($you_may_know_user->lastname) .'</div>
												<div class="you_know_op">
													<div class="add">Add friend</div>
													<div class="remove">Remove</div>
												</div>
											</div>
										</div>';
						}
					}

				?>
			</div>
		</div>
	</div>
</body>
</html>