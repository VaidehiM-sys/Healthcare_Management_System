<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: patientLogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
      unset($_SESSION['username']);
      unset($_SESSION['patient_id']);
      header('location: patientLogin.php');
  }
  include 'headerpatients.php'
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Specializations</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('images/water.jpg');">
</br></br>
<div>
	<h3 style="text-align:center;">Select Doctor's Specilization to make an Appointment</h3></br>
</div>
<table id="specializationTable" style="margin:auto;" >
<tr>
<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/GeneralPhysician.jpg" alt="Physician" width="70" height="200">
  <div class="card-body">
    <a href="doctors.php?type=1" class="btn btn-secondary">General Physician</a>
  </div>
</div>
</td>

<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/Surgeon.jpg" alt="Surgeon"  width="70" height="200">
  <div class="card-body">
    <a href="doctors.php?type=2" class="btn btn-secondary">Surgeon</a>
  </div>
</div>
</td>

<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/Pediatrician.jpg" alt="Pediatrician"  width="70" height="200">
  <div class="card-body">
    <a href="doctors.php?type=3" class="btn btn-secondary">Pediatrician</a>
  </div>
</div>
</td>
<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/Orthopedist.jpg" alt="Orthopedist"  width="70" height="200">
  <div class="card-body">
    <a href="doctors.php?type=4" class="btn btn-secondary">Orthopedist</a>
  </div>
</div>
</td>
</tr>
<tr>
<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/Neurologist.jpg" alt="Neurologist"  width="70" height="200">
  <div class="card-body">
    <a href="doctors.php?type=5" class="btn btn-secondary">Neurologist</a>
  </div>
</div>
</td>
<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/Cardiologist.jpg" alt="Cardiologist"  width="70" height="200"> 
  <div class="card-body">
    <a href="doctors.php?type=6" class="btn btn-secondary">Cardiologist</a>
  </div>
</div>
</td>
<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/Dermatologist.jpg" alt="Dermatologist"  width="70" height="200">
  <div class="card-body">
    <a href="doctors.php?type=7" class="btn btn-secondary">Dermatologist</a>
  </div>
</div>
</td>
<td>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/Psychiatrist.jpg" alt="Psychiatrist"  width="70" height="200">
  <div class="card-body">
    <a href="doctors.php?type=8" class="btn btn-secondary">Psychiatrist</a>
  </div>
</div>
</td>
</tr>
</table>
</br>
</br>
</br>
<hr>
<?php include 'footers.php' ?>
</body>
</html>