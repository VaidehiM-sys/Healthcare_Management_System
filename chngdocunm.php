<?php
//Update First Name
session_start(); 
if (isset($_POST['change_user_name'])){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "healthcare";

    $user_name=$_POST['user_name'];
    $doctor_id=$_POST['doctor_id'];
    $new_uname=$_POST['doc_uname'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE doctors SET d_username='$new_uname' WHERE doctorsId=$doctor_id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    $_SESSION['dusername']=$new_uname;
    header('location: updatedoc.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Appointment</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  <div class="header" style="background:#808080;">
  	<h2>EDIT INFORMATION</h2>
  </div>
  <form method="post" action="chngdocunm.php">	
  <input type="hidden" name="doctor_id" value="<?php echo $_GET["did"]; ?>" />
  	<div class="input-group">
  	  <label><?php echo $_GET["nm"] ?></label>
  	  <input type="text" name="user_name" value="<?php echo $_GET["val"]; ?>">
  	</div>
  	<div class="input-group">
  	  <label>New UserName</label>
  	  <input type="text" name="doc_uname">
  	</div></br>
  	<div class="input-group">
  	  <button type="submit" class="btn btn-secondary" name="change_user_name">Submit</button>
  	</div>
  </form>
</body>
</html>