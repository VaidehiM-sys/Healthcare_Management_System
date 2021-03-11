<?php

$doc_id = $_GET['doc_id'];
$patient_id = $_GET['pat_id'];
//Connect DB
// on success delete : redirect the page to original page using header() method
// connect to the database
$conn = mysqli_connect("localhost", "root", "", "healthcare");
// sql to delete a record
$sql = "DELETE FROM appointments WHERE patient_id=$patient_id AND doc_id=$doc_id"; 
//$sql = "DELETE FROM appointments WHERE patient_id= AND doc_id=1"; 
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo $patient_id;
    echo $doc_id;
    //header("location: viewAppointment.php?pat_id=$patient_id&doc_id=$doc_id"); 
    header("location: viewAppointment.php?pat_id=$patient_id"); 
    exit;
} else {
    echo "Error deleting record";
}
?>