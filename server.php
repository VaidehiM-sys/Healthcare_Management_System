<?php
session_start();
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "healthcare");
// initializing variables
$fname ="";
$lname ="";
$dfname ="";
$dlname ="";
$username = "";
$dusername = "";
$email = "";
$demail = "";
$errors = array(); 
// connect to the database
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
  //Patient Registration
  if (isset($_POST['reg_patient'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
   $username = mysqli_real_escape_string($db, $_POST['username']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
   $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
   $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
   // form validation: ensure that the form is correctly filled 
   // by adding (array_push()) corresponding error into $errors array
   if (empty($fname)) { array_push($errors, "First Name is required"); }
   if (empty($lname)) { array_push($errors, "Last name is required"); }
   if (empty($username)) { array_push($errors, "Username is required"); }
   if (empty($email)) { array_push($errors, "Email is required"); }
   if (empty($password_1)) { array_push($errors, "Password is required"); }
   if ($password_1 != $password_2) {
     array_push($errors, "The two passwords do not match");
   }
   // first check the database to make sure 
   // a user does not already exist with the same username and/or email
   $user_check_query = "SELECT * FROM patients WHERE username='$username' OR emailId='$email' LIMIT 1";
   $result = mysqli_query($db, $user_check_query);
   $user = mysqli_fetch_assoc($result);
   if ($user) { // if user exists
     if ($user['username'] === $username) {
       array_push($errors, "Username already exists");
     }
     if ($user['email'] === $email) {
       array_push($errors, "Email already exists");
     }
   }
   // Finally, register patient if there are no errors in the form
   if (count($errors) == 0) {
       $password = md5($password_1);//encrypt the password before saving in the database
       $query = "INSERT INTO patients (FName, LName, username, emailId, password) 
                 VALUES('$fname','$lname','$username', '$email', '$password')";
       mysqli_query($db, $query);
       $_SESSION['patient_name'] = $username;
       $_SESSION['success'] = "You are now Registered";
       header('location: patientLogin.php');
   }
 }
 //Login Patient
 if (isset($_POST['login_patient'])) {
   $username = mysqli_real_escape_string($db, $_POST['username']);
   $password = mysqli_real_escape_string($db, $_POST['password']);
   if (empty($username)) {
       array_push($errors, "Username is required");
   }
   if (empty($password)) {
       array_push($errors, "Password is required");
   }
   if (count($errors) == 0) {
       $password = md5($password);
       $query = "SELECT patientsId,FName,LName,username,emailId,password FROM patients WHERE username='$username' AND password='$password'";
       $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $username;
            // Getting the Patient Id, First and Last Name from the database query and setting it into session
          $_SESSION['patient_id'] = $row["patientsId"];
          $_SESSION['patient_fname'] = $row["FName"];
          $_SESSION['patient_lname'] = $row["LName"];
          $_SESSION['success'] = "You are now logged in";
          header('location: aboutUspat.php');
          }
        }else {
           array_push($errors, "Wrong Username/Password combination");
       }
   }
 }
 
//Forgot Password
if (isset($_POST['changepwd'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
 $username = mysqli_real_escape_string($db, $_POST['username']);
 $email = mysqli_real_escape_string($db, $_POST['email']);
 $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
 $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
 // form validation: ensure that the form is correctly filled ...
 // by adding (array_push()) corresponding error unto $errors array
 if (empty($fname)) { array_push($errors, "First Name is required"); }
 if (empty($lname)) { array_push($errors, "Last name is required"); }
 if (empty($username)) { array_push($errors, "Username is required"); }
 if (empty($email)) { array_push($errors, "Email is required"); }
 if (empty($password_1)) { array_push($errors, "Password is required"); }
 if ($password_1 != $password_2) {
   array_push($errors, "The two passwords do not match");
 }
 // first check the database to make sure 
 // a user does not already exist with the same username and/or email
 $user_check_query = "SELECT * FROM patients WHERE username='$username' AND emailId='$email' AND FNAME='$fname' AND LNAME='$lname' LIMIT 1";
 $result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result);

   if (empty($user)) {
     array_push($errors, "Provided details did not match. Please try again.");
   }

 // Finally, update patient if there are no errors in the form
 if (count($errors) == 0) {
     $password = md5($password_1);//encrypt the password before saving in the database
     $query = "UPDATE patients SET password='$password' WHERE username='$username'";
     mysqli_query($db, $query);
     $_SESSION['pwdsuccess'] = "Success";
     header('location: changePassword.php');
 /*
     $_SESSION['username'] = $username;
     $_SESSION['patient_id']= $patient_id;
     $_SESSION['success'] = "You are now logged in";
     header('location: patientLogin.php');
 */
 }
}
  //Doctor Registration
  if (isset($_POST['reg_doctor'])) {
     // receive all input values from the form
     $dfname = mysqli_real_escape_string($db, $_POST['dfname']);
     $dlname = mysqli_real_escape_string($db, $_POST['dlname']);
    $dusername = mysqli_real_escape_string($db, $_POST['dusername']);
    $demail = mysqli_real_escape_string($db, $_POST['demail']);
    $dpassword_1 = mysqli_real_escape_string($db, $_POST['dpassword_1']);
    $dpassword_2 = mysqli_real_escape_string($db, $_POST['dpassword_2']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($dfname)) { array_push($errors, "First Name is required"); }
    if (empty($dlname)) { array_push($errors, "Last name is required"); }
    if (empty($dusername)) { array_push($errors, "Username is required"); }
    if (empty($demail)) { array_push($errors, "Email is required"); }
    if (empty($dpassword_1)) { array_push($errors, "Password is required"); }
    if (empty($type)) { array_push($errors, "Type is required"); }
    if ($dpassword_1 != $dpassword_2) {
      array_push($errors, "The two passwords do not match");
    }
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM doctors WHERE d_username='$dusername' OR d_emailId='$demail' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
      if ($user['dusername'] === $dusername) {
        array_push($errors, "Username already exists");
      }
      if ($user['demail'] === $demail) {
        array_push($errors, "email already exists");
      }
    }
    // Finally, register doctor if there are no errors in the form
    if (count($errors) == 0) {
      echo 'here count 0';
        $password = md5($dpassword_1);//encrypt the password before saving in the database
        $query = "INSERT INTO doctors (dFName, dLName, d_username, d_emailId, d_password, spl_Id) 
                  VALUES('$dfname','$dlname','$dusername', '$demail', '$password', '$type')";
        mysqli_query($db, $query);
        $_SESSION['dusername'] = $dusername;
        $_SESSION['success'] = "You are now Registered";
        header('location: doctorLogin.php');
    }
  }
  //Login doctor
  if (isset($_POST['login_doctor'])) {
    $dusername = mysqli_real_escape_string($db, $_POST['dusername']);
    $dpassword = mysqli_real_escape_string($db, $_POST['dpassword']);
    if (empty($dusername)) {
        array_push($errors, "Username is required");
    }
    if (empty($dpassword)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $dpassword = md5($dpassword);
        $query = "SELECT * FROM doctors WHERE d_username='$dusername' AND d_password='$dpassword'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['dusername'] = $dusername;
          $_SESSION['doc_Id'] = $doctor_id;
          $_SESSION['success'] = "You are now logged in";
          header('location: aboutUs.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
   // Book Appointment
   if (isset($_POST['book_appointment'])) {
    // receive all input values from the form
    $patient_name = mysqli_real_escape_string($db, $_POST['patient_name']);
    $doc_name = mysqli_real_escape_string($db, $_POST['doc_name']);
    $patient_id = mysqli_real_escape_string($db, $_POST['patient_id']);
    $doc_id = mysqli_real_escape_string($db, $_POST['doc_id']);
    $date = mysqli_real_escape_string($db, date("Y-m-d H:i:s",strtotime( $_POST['aptDate'])));
    $time  = mysqli_real_escape_string($db,  date("H:i:s",strtotime( $_POST['aptTime'])) );
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($doc_name)) { array_push($errors, "Doctor Name is required"); }
    if (empty($patient_name)) { array_push($errors, "Patient Name is required"); }
    if (empty($date)) { array_push($errors, "Date is required"); }
    if (empty($time)) { array_push($errors, "Time is required"); }
      $query = "INSERT INTO appointments (patient_id, doc_id, appointment_date, appointments_time)   VALUES($patient_id, $doc_id, '$date', '$time')";
      mysqli_query($db, $query);
    
      header("location: viewAppointment.php?pat_id=$patient_id&doc_id=$doc_id");
      exit;
  } 
   
   // Update Appointment
   if (isset($_POST['update_appointment'])) {
    // receive all input values from the form
    $patient_name = mysqli_real_escape_string($db, $_POST['patient_name']);
    $doc_name = mysqli_real_escape_string($db, $_POST['doc_name']);
    $patient_id = mysqli_real_escape_string($db, $_POST['patient_id']);
    $doc_id = mysqli_real_escape_string($db, $_POST['doc_id']);
    $date = mysqli_real_escape_string($db, date("Y-m-d H:i:s",strtotime( $_POST['aptDate'])));
    $time  = mysqli_real_escape_string($db,  date("H:i:s",strtotime( $_POST['aptTime'])) );
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($doc_name)) { array_push($errors, "Doctor Name is required"); }
    if (empty($patient_name)) { array_push($errors, "Patient Name is required"); }
    if (empty($date)) { array_push($errors, "Date is required"); }
    if (empty($time)) { array_push($errors, "Time is required"); }
	/*
	echo "$patient_id";
	echo "$doc_id";
	echo "$date";
	echo "$time";
	  */

      $query = "UPDATE appointments SET appointment_date='$date' WHERE patient_id=$patient_id AND doc_id=$doc_id";
      mysqli_query($db, $query);
      $query = "UPDATE appointments SET appointments_time='$time' WHERE patient_id=$patient_id AND doc_id=$doc_id";
      mysqli_query($db, $query);
      header("location: viewAppointment.php?pat_id=$patient_id&doc_id=$doc_id");
      exit;
  }  
  
  ?>