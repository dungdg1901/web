<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/login.css">
	<script src="web/app.js"></script>
</head>
<body>
	<?php
	?>
	<div class="box">
		<form method="post"  name="form" >
			<h2>Sign in</h2>
			<p style = "margin: 0px 0px 5px 0px; color:red"> <?php echo $error; ?> </p>
			<div class="inputBox">
				<p style = "margin: 0px 0px 5px 0px; color:red"> <?php echo $error_loginid; ?> </p>
				<label>Username</label>
				<input type="text" id ="username" name="login_id"  >				
				<i></i>
			</div>
			
			<div class="inputBox">
				<p style = "margin: 0px 0px 5px 0px; color:red"> <?php echo $error_password; ?> </p>
				<label>Password</label>
				<input type="password" id ="password" name ="password"  >				
				<i></i>
			</div>
			<div class="links">
				<a href="app/controller/admin/forget_password.request.php">Forgot Password ?</a>
			</div>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>

</body>
</html>