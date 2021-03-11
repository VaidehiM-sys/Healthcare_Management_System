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
</head>
<body style="background-image: url('images/water.jpg');">
<?php 
session_start(); 
include 'headers.php'; ?>
</br>
<h3 style="text-align:center">General Account Settings</h3>
</br>
</br>
<table class="table table-striped">
<!-- <thead class="thead-dark">
    <tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Appointment Date</th>
    <th scope="col">Appointment Time</th>
    <th scope="col">Delete Appointment</th>
    </tr>
  </thead> -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthcare";

//session_start(); 
//$doctor_id = $_SESSION['doc_Id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctors d, specialization s where d.spl_id=s.sp_Id and d_username='$doctor_uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $docid=$row['doctorsId'];
        $doc_fname=$row['dFName'];
        $doc_lname = $row['dLName'];
        $doc_uname = $row['d_username'];
        $doc_mail = $row['d_emailId'];
        $doc_pass = $row['d_password'];
        $sp_id=$row['spl_id'];
        $sp_nm=$row['sp_type'];

        echo "<tr>";
        echo "<td><strong>First Name :</strong></td>";
        $fnm="First Name";
        echo "<td><strong>$doc_fname</strong></td>";
        echo "<td><a href='chngdocfnm.php?nm=$fnm&val=$doc_fname&did=$docid'>
        <button><strong>Edit</strong></button></a></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><strong>Last Name :</strong></td>";
        $lnm="Last Name";
        echo "<td><strong>$doc_lname</strong></td>";
        echo "<td><a href='chngdoclnm.php?nm=$lnm&val=$doc_lname&did=$docid'>
        <button><strong>Edit</strong></button></a></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><strong>UserName :</strong></td>";
        $unm="UserName";
        echo "<td><strong>$doc_uname</strong></td>";
        echo "<td><a href='chngdocunm.php?nm=$unm&val=$doc_uname&did=$docid'>
        <button><strong>Edit</strong></button></a></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><strong>Email :</strong></td>";
        $enm="Email";
        echo "<td><strong>$doc_mail</strong></td>";
        echo "<td><a href='chngdoceml.php?nm=$enm&val=$doc_mail&did=$docid'>
        <button><strong>Edit</strong></button></a></td>";
        echo "</tr>";

        // echo "<tr>";
        
        // echo "<td>$doc_pass</td>";
        // echo "<td><a href='mypatients.php?pid=$pat_id&did=$doc_id'>
        // <button><strong>Change Password</strong></button></a></td>";
        // echo "</tr>";

        echo "<tr>";
        echo "<td><strong>Specialization :</strong></td>";
        $snm="Specialization";
        echo "<td><strong>$sp_nm</strong></td>";
        echo "<td><a href='chngdocspl.php?nm=$snm&val=$sp_nm&did=$docid&spid=$sp_id'>
        <button><strong>Edit</button></a></td>";
        echo "</tr>";
    }
} else {
    echo "Currenty you have no Patients";
}
?>

</table>
</body>