<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Doctor Login</h2>
  </div>
  <form method="post" action="doctorLogin.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="dusername" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="dpassword">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_doctor">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="doctorRegister.php">Sign up</a>
  	</p>
	  <p>
  		 <a href="home.php">Back to main menu?</a>
  	</p>
  </form>
</body>
</html>