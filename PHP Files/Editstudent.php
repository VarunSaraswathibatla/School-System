<?php
$servername = "localhost";
$username = "root";
$password = "****";
$dbname = "School_System";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$lastname = $_REQUEST['Student_Lname'];

$sql = "UPDATE Student SET Student_Lname='$lastname' WHERE Student_Id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>