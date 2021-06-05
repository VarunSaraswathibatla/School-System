<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "*";
$dbname = "school_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$User_ID =  $_REQUEST['email'];
$User_pass = $_REQUEST['psw'];
$User_ID =  md5($User_ID);
$User_pass = md5($User_pass);
$_SESSION['User_ID'] = 1; 

$sql = "select * from user where Username='$User_ID' and user_Pass='$User_pass'";
$result = $conn->query($sql);
$rows=$result->fetch_assoc();

if ($result->num_rows > 0)
{
         //$cookie_name = "loggedIn";
        //$cookie_value = true;
        //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 

      
          
        
   
    if($rows['user_Role']=='Admin')
     header("location: http://localhost/PHP%20files/Admindash.html");
    if($rows['user_Role']=='teacher')
    header("location: http://localhost/PHP%20files/Teacherdash.html");

      
}
else 
{
    $error = "Your Login Name or Password is invalid!!!";
    header("location: Login.php");
    //die();
}
$conn->close();
?>