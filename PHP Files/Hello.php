<?php
$servername = "localhost";
$username = "root";
$password = "****";
$dbname = "school_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name="Varun";
$sql = "select * from student where Student_Fname='$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["Student_ID"]."<br>". "Name: " . $row["Student_Fname"]."<br>". " Mobile Number: " . $row["Student_Mobile"]. "<br>";
  }
} else {  
  echo "0 results";
}
$conn->close();
?>