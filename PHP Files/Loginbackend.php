<?php
session_start();
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
$User_ID =  $_REQUEST['email'];
$User_pass = $_REQUEST['psw'];
$sql = "select * from user where Username='$User_ID' and user_Pass='$User_pass'";
$result = $conn->query($sql);
$rows=$result->fetch_assoc();
if ($result->num_rows > 0) 
{
    if($rows['user_Role']=='admin')
     header("location: http://localhost/PHP%20files/Admindash.html");
    //if($rows['user_Role']=='teacher')
    //header("location: https://google.com");

      
}
else 
{
    $error = "Your Login Name or Password is invalid!!!";
    $_SESSION["error"] = $error;
    header("location: Login.php");
}
$conn->close();
?>