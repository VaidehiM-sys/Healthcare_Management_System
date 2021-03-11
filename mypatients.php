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
<style>
    footer{
        position: absolute; bottom: 0; width: 100%;
    }
    </style>
</head>
<body style="background-image: url('images/water.jpg');">
<?php 
    if(!isset($_GET['pid'])){
     
    session_start(); 
    include 'headers.php'; 
    }
    ?>
<br><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthcare";

//session_start(); 
//$doctor_uname = $_SESSION['dusername'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT doctorsId FROM doctors where d_username='$doctor_uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['doctor_id']= $row["doctorsId"];
    }
} else {
    echo "Currenty you have no Patients";
}
?>
<div class="header">
  	<h4 style="text-align:center">YOUR PATIENTS AND APPOINTMENT DETAILS</h4>
  </div>
  <table class="table table table-bordered table table-hover">
  <thead class="thead-dark">
    <tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Appointment Date</th>
    <th scope="col">Appointment Time</th>
    <th scope="col">Delete Appointment</th>
    </tr>
  </thead>
<?php
//Fetching all the Appointments for the doctor from the Appointment table
$doc_id = $_SESSION['doctor_id'];
//p.FName, p.LName, a.appointment_date, a.appointments_time
$sql = "select * from patients p,doctors d,appointments a where p.patientsId=a.patient_id And d.doctorsId=a.doc_id and a.doc_id=$doc_id";
$result1 = $conn->query($sql);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        $pat_id=$row['patientsId'];
        $doc_fname=$row['FName'];
        $doc_lname = $row['LName'];
        $doc_aptdt = $row['appointment_date'];
        $doc_apttm = $row['appointments_time'];
        echo "<tr>";
        
        echo "<td><strong>$doc_fname</strong></td>";
        echo "<td><strong>$doc_lname</strong></td>";
        echo "<td><strong>$doc_aptdt</strong></td>";
        echo "<td><strong>$doc_apttm</strong></td>";
        echo "<td><a href='mypatients.php?pid=$pat_id&did=$doc_id'>
        <button><strong>Press here</button></a></td>";
        echo "</tr>";
        
    }
} else {
    echo "Currenty you have no Patients";
}

if (isset($_GET["pid"])){

    // sql to delete a record
    $pa_id = $_GET["pid"];
    $do_id = $_GET["did"];
    $sql2 = "DELETE FROM appointments WHERE patient_id=$pa_id and doc_id=$do_id";

    if ($conn->query($sql2) === TRUE) {
        //echo "Record deleted successfully";
       // header('location: mypatients.php');
       header('location: mypatients.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }


}

$conn->close();

?>
</br>
 
    
</body>
</html>
