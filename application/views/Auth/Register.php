<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Register.css')?>">
	<?php $this->load->view('components/header'); ?>
	<title>Register</title>
</head>
<body>
	<div class="register">
		

		<div class="register__main_container">
			
			<form action="" method="POST">
				<input type="text" name="reg_username" placeholder="Username" required />
				<input type="text" name="reg_firstname" placeholder="First name" required />
				<input type="text" name="reg_lastname" placeholder="Last name" required />
				<input type="email" name="reg_email" placeholder="Email" required />
				<input type="password" name="reg_password" placeholder="Password" required />
				<input type="submit" name="register_btn" class="reg_btn" value="Register" />
			</form>
		</div>
	</div>
</body>
</html>