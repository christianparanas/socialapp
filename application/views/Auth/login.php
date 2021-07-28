<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('components/header'); ?>
	<link  href="<?= base_url('assets/css/login.css'); ?>" rel="stylesheet" type="text/css">
	<title>Login</title>
</head>
<body>
	<div class="login">

		<div class="login__main_container">

			<div class="form_header">
				<h2>Login</h2>
			</div>
			
			<form action="" method="POST">
				<input type="email" name="login_email" placeholder="Email" required />
				<input type="password" name="login_password" placeholder="Password" required />
				<input type="submit" name="login_btn" class="log_btn" value="Login" />
			</form>
			<div class="log_reg">
				Don't have an account? <a href="<?php echo site_url('/auth/register'); ?>">Register</a>
			</div>
		</div>
	</div>
</body>
</html>