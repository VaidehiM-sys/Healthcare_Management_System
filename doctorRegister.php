<?php include('server.php')
?>
<?php
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
$types = "SELECT * FROM specialization";
$result = mysqli_query($db,  $types);
$select= '<select name="type" class="input-group">';
while($row = $result->fetch_assoc()){
      $select.='<option value="'.$row['sp_Id'].'" >'.$row['sp_type'].'</option>';
}
$select.='</select>';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Doctor Registration</h2>
  </div>
  <form method="post" action="doctorRegister.php">
  	<?php include('errors.php'); ?>
	  <div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="dfname" value="<?php echo $dfname; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="dlname" value="<?php echo $dlname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>User Name</label>
  	  <input type="text" name="dusername" value="<?php echo $dusername; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="demail" value="<?php echo $demail; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="dpassword_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="dpassword_2">
      </div>
      <div class="input-group">
	  <label>Select Specialization</label>
	  <?php
        echo $select;
        ?>
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_doctor">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="doctorLogin.php">Sign in</a>
  	</p>
	  <p>
  		 <a href="home.php">Back to main menu?</a>
  	</p>
  </form>
</body>
</html>