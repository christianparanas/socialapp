<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Comments.css')?>">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>Comments</title>
</head>
<body>
	<div class="comments_container">
		<div class="head">
			<a class="back_btn" href="<?php echo site_url('/'); ?>">
				<i class="fal fa-arrow-left"></i>
			</a>
			<h3>Comments</h3>
			<p></p>
		</div>

		<div class="comments_wrap">
			<div class="comments_content">
				<?php 
					if(sizeof($comments) == 0) {
						echo '<div class="no_comment_label">Leave a comment.</div>';
					}
					else {
						foreach($comments as $comment) {
				?>
							<script>
								var row_date = "<?php echo $comment->updated_at; ?>"
								var moment_date = moment(row_date).fromNow()
							</script>
				<?php	echo '<div class="specific_comment">
											<img src="'. base_url('content/dp/'. trim($comment->profile_pic_url, "''").'') .'" alt="Commented user img">
											<div class="specific_comment_wrap">
												<div class="name">'. ucfirst($comment->firstname).' '. ucfirst($comment->lastname) .'</div>
												<div class="comment">'. $comment->comment .'</div>
												<div class="date">';
				?>								
											<script>
												document.write(moment_date)
											</script>
				<?php echo '
												</div>
											</div>
										</div>';
						}
					}

				?>				
			</div>



			<form action="" method="POST">
				<input type="text" name="comment" placeholder="Say something" required>
				<input type="submit" name="comment_btn" value="Comment">
			</form>
		</div>
	</div>
</body>
</html>