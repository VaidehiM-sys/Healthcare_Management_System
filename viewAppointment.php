<?php
if(isset($_GET['doc_id'])){
	$doc_id = $_GET['doc_id'];
}else { 
	$doc_id = "";
}
if(isset($_GET['pat_id'])){
	$pat_id = $_GET['pat_id'];
}else { 
	$pat_id = "";
}
include('server.php');
//session_start(); 
$pat_id=$_SESSION['patient_id'];
include 'headerpatients.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('images/water.jpg');">
</br></br>
    <h3 style="text-align:center;">Your Appointments</h3>

        <?php  
        $link= mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);         
        if ($link === false) { 
            die("ERROR: Could not connect. "
                        .mysqli_connect_error()); 
        }  
       // $sql = "SELECT ap.doc_id,dFName,dLName,d_emailId,appointment_date, appointments_time FROM appointments ap inner join patients p on ap.patient_id=p.patientsId inner join doctors d on ap.doc_id=d.doctorsId where ap.patient_id=$pat_id";
 //AND ap.doc_id=$doc_id
        $sql = "SELECT * FROM appointments ap inner join patients p on ap.patient_id=p.patientsId inner join doctors d on ap.doc_id=d.doctorsId where ap.patient_id=$pat_id";
        if ($res = mysqli_query($link, $sql)) { 
            if (mysqli_num_rows($res) > 0) { 
                echo "<table class='table table table-bordered table table-hover'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>"; 
                echo "<th scope='col'>Doctor First Name</th>"; 
                echo "<th scope='col'>Doctor Last Name</th>"; 
                echo "<th scope='col'>Apppointment Date</th>"; 
                echo "<th scope='col'>Apppointment Time</th>"; 
                echo "<th scope='col'>Update</th>"; 
                echo "<th scope='col'>Delete</th>"; 
                echo "</tr>"; 
                while ($row = mysqli_fetch_array($res)) {
                    $pat_id=$row['patient_id'];
                    $doc_id=$row['doc_id'];
                    $dfname=$row['dFName'];
                    $dlname=$row['dLName'];
                    $aptdt=$row['appointment_date'];
                    $aptime=$row['appointments_time'];
                    echo "<tr>"; 
                    echo "<td><strong>".$row['dFName']."</strong></td>"; 
                    echo "<td><strong>".$row['dLName']."</strong></td>"; 
                    echo "<td><strong>".$row['appointment_date']."</strong></td>"; 
                    echo "<td><strong>".$row['appointments_time']."</strong></td>"; 
					echo "<td>
					
 <!--<button id='myBtn'><strong>Update</strong></button>
  <script>
    var btn = document.getElementById('myBtn');
   btn.addEventListener('click', function() {
     document.location.href = 'updateappointment.php?pat_id=$pat_id&doc_id=$doc_id&doc_fname=".$row['dFName']."&doc_lname=".$row['dLName']."&appointment_date=".$row['appointment_date']."&appointments_time=".$row['appointment_date']."';
   });
 </script>-->
<a href='updateappointment.php?pat_id=$pat_id&doc_id=$doc_id&doc_fname=$dfname&doc_lname=$dlname&appointment_date=$aptdt&appointments_time=$aptime'><button><strong>Update</strong></button></a>
  </td>";
  echo "<td>
  <a href='deleteappoinment.php?pat_id=$pat_id&doc_id=$doc_id'><button><strong>Delete</strong></button></a>

  <!--<button id='btnDelete'>Delete</button>
    <script>
      var btn = document.getElementById('btnDelete');
      btn.addEventListener('click', function() {
        document.location.href = 'deleteappointment.php?pat_id=$pat_id&doc_id=$doc_id';

      });
    </script>-->
    </td>";            
    echo "</tr>"; 
                } 
                echo "</table>"; 
                mysqli_free_result($res); 
            } 
            else { 
                echo "No matching records are found."; 
            } 
        } 
        else { 
            echo "ERROR: Could not able to execute $sql. "
                                        .mysqli_error($link); 
        } 
        mysqli_close($link); 
        ?> 
</body>
</html>