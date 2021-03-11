<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="header" style="background:#808080;">
  	<h2>Change Password</h2>
  </div>
  <form method="post" action="changePassword.php">
  	<?php include('errors.php'); ?>
	<?php 

	  if (isset($_SESSION['pwdsuccess'])) {
		echo "<h2>Password Updated Successfully</h2>";
		unset($_SESSION['pwdsuccess']);
  }
?>

	  <div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lname" value="<?php echo $lname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>User Name</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn btn-secondary" name="changepwd">Submit</button>
  	</div>
  	<p>
  	<a href="patientLogin.php">Go back to login</a>
  	</p>
  </form>
</body>
</html>