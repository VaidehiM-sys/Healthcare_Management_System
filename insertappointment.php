<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	
</body>
</html>
<?php
session_start(); 
$patient_username = $_SESSION['username'];
$patient_fname = $_SESSION['patient_fname'];
$patient_lname = $_SESSION['patient_lname'];
$patient_id = $_SESSION['patient_id'];
if(isset($_GET['doc_fname'])){
	$doc_fname = $_GET['doc_fname'];
}else { 
	$doc_fname = "";
}
if(isset($_GET['doc_lname'])){
	$doc_lname = $_GET['doc_lname'];
}else { 
	$doc_lname = "";
}
if(isset($_GET['doc_id'])){
	$doc_id = $_GET['doc_id'];
}else { 
	$doc_id = "";
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Appointment</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div 	class="header" style="background:#808080;">
  	<h2>Book Appointment</h2>
  </div>  
  <form method="post" action="server.php">	
  <input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>" />
  	<div class="input-group">
  	  <label>Patient</label>
  	  <input type="text" name="patient_name" value="<?php echo $patient_fname.' '.$patient_lname; ?>">
      <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Doctor</label>
  	  <input type="text" name="doc_name" value="<?php echo $doc_fname.' '.$doc_lname; ?>">
  	</div>
    <div class="input-group">
    <label>Date</label>
    <input type="date" name="aptDate" value="<?php echo date('Y-m-d'); ?>" />
</div>
<div class="input-group">
    <label>Time</label>
    <input type="time" name="aptTime" value="<?php echo date('Y-m-d'); ?>">
</div></br>
  	<div class="input-group">
  	  <button type="submit" class="btn btn-secondary" name="book_appointment">Book</button>
  	</div>
  </form>
</body>
</html>