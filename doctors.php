<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php include('server.php');
 // session_start(); 
  include 'headerpatients.php';
  ?>
<body style="background-image: url('images/water.jpg');">
</br>
<h3 style="text-align:center;">Book an Appointment</h3>

<table class="table table table-bordered table table-hover">
  <thead class="thead-dark">
    <tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Specialization</th>
    <th scope="col">Book an Appointment</th>
    </tr>
  </thead>

<?php
    if(isset($_GET["type"]))    {
        $spec = $_GET["type"];
        $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        $types = "SELECT * FROM doctors where spl_Id='$spec'";
        $result = mysqli_query($db,  $types);
        while($row = $result->fetch_assoc()){
           $doc_id=$row['doctorsId'];
            $doc_fname = $row['dFName'];
            $doc_lname = $row['dLName'];
            //$type = $row['type'];
            $email = $row['d_emailId'];
            echo "<tr>";
            echo "<td><strong>$doc_fname</strong></td>";
            echo "<td><strong>$doc_lname</strong></td>";
            echo "<td><strong>$email</strong></td>";
            //echo "<td>$type</td>";
            echo "<td><a href='insertappointment.php?doc_id= $doc_id&doc_fname=$doc_fname&doc_lname=$doc_lname'><button><strong>Book here</strong></button></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
   //$_SESSION['doc_id'] = $doc_id;
 // $_SESSION['doc_name'] = $doc_name;

?>


</body>
</html>