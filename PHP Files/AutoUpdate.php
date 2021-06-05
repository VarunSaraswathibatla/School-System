<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Classes</title>
</head>

<body>
<head>
<link rel="stylesheet" href="Header.css">
</head>
<body>
<div class="header">
  <a href="Admindash.html" class="logo"><img src=Images/logo.png
  style="width:60px;height:50px;vertical-align:middle;"> St.Joseph's School</a>
  <div class="header-right">
    <a class="actives" href="Admindash.html">Dashboard</a>
    <a class="actives" href="Login.php">Logout</a>
<?php

 
  $conn = mysqli_connect("localhost", "root", "*", "school_system");

  // Check connection
  if($conn === false){
      die("ERROR: Could not connect. "
          . mysqli_connect_error());
  }

  error_reporting(E_ALL ^ E_WARNING);
  $Student_Fname= $_REQUEST['Studentname'];

  $y= date("Y");
  $query = "Select * from student_variable where Student_Class < 10 and Academic_Start='2021'";
 // $q2="select Student_fname from student where Student_Fname like '$Student_Fname'%;";

        $result = $conn->query($query);


     


   //  $Student_ID =  $_REQUEST['release[]'];

     // LOOP TILL END OF DATA



    
     while($rows=$result->fetch_assoc())
     {


 
        $Student_Id= $rows['Student_Id'];
        $Student_Class= $rows['Student_Class'];
        $Student_Section= $rows['Student_Section'];
        $Student_Rollno= $rows['Student_Rollno'];
        $Academic_Start= '2022';

        $sql2= "INSERT INTO student_variable  VALUES ('$Student_Id', '$Student_Class'+1,'$Student_Section','$Student_Rollno','$Academic_Start','$Academic_Start'+1);";
        mysqli_query($conn, $sql2);
     
     }



  
 ?>
 <html>
     <center>
 <p> Auto update successfully completed</p>
 </html>
