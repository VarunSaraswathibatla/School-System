<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search student</title>
</head>
<link rel="stylesheet" href="Header.css">
</head>
<body>
<div class="header">
  <a href="Admindash.html" class="logo"><img src=Images/logo.png
  style="width:60px;height:50px;vertical-align:middle;"> St.Joseph's School</a>
  <div class="header-right">
    <a class="actives" href="Admindash.html">Dashboard</a>
    <a class="actives" href="Login.php">Logout</a>

  </div>
</div><br><br><br><br><br><br>
<body>
    <h1> Filter</h1><center>
    <form action>
                <p>
                <label for="Student_Id">Student-Id:</label>
                <input type="text" name="Student_Id" id="Id">

				
            </p>

            <p>
                <label for="Name">Student Name:</label>
                <input type="text" name="Name" id="Name">

				
            </p>


            <p>
                <label for="Year">Academic_Year:</label>
                <input type="text" name="Academic_year" id="Year">

				
            </p>

        <input type="submit" value="Submit">

</form>
</center>





</body>
</html>
<?php

  
  $conn = mysqli_connect("localhost", "root", "*", "school_system");

  // Check connection
  if($conn === false){
      die("ERROR: Could not connect. "
          . mysqli_connect_error());
  }

  error_reporting(E_ALL ^ E_WARNING);
  $Student_Id= $_REQUEST['Student_Id'];
  $Student_Name= $_REQUEST['Name'];
  $AcademicYear= $_REQUEST['Academic_year'];



  $y= date("Y");
  $query = "SELECT student.Student_ID,CONCAT(Student_fname,' ',Student_Mname,' ',Student_Lname)Student_name,Student_DOB,Student_Gender,Student_Mobile,finger_template,Student_Class,Student_Section,Student_Rollno FROM student left join
   student_variable on student.Student_Id=student_variable.Student_Id where student.Student_ID!=0";
 // $q2="select Student_fname from student where Student_Fname like '$Student_Fname'%;";




 	$filtered_get = array_filter($_GET);                  // removes empty values from $_GET
  

	



      $keynames = array_keys($filtered_get); // make array of key names from $filtered_get
     // echo $filtered_get;
     $c=count($keynames);



      foreach($filtered_get as $key => $value)
      {

         if($key!='Name')
		 {
			$query .=" and";
           $query .= " student_variable.$key = '$value'";
           $c--;
           error_reporting(E_ALL ^ E_WARNING);
		 }
		else
		{
			$query .=" and";
			$query .= " student.student_fname like '$value%'";
			$c--;
			error_reporting(E_ALL ^ E_WARNING);

		}



				// $filtered_get keyname = $filtered_get['keyname'] value
       }
   
  

   

	   
     $query .= " order by student_variable.Student_Class;";
    echo $query;


     $result = $conn->query($query);
     ?>
     <style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-family: 'Gill Sans', 'Gill Sans MT';
		}

		td
		{
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
        <h1>Student Details</h1>

		<table>
    
			<tr>
				<th>Admission Number</th>
        <th>Roll Number</th>
        <th>Name</th>
        
        <th>Class</th>
        <th>Section</th>
        
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Mobile Number</th>
        <th>Finger Template</th>



				</tr>

<?php

   //  $Student_ID =  $_REQUEST['release[]'];

     // LOOP TILL END OF DATA


     while($rows=$result->fetch_assoc())
     {

?>
 <tr>
     <!--FETCHING DATA FROM EACH
         ROW OF EVERY COLUMN-->
     <td><?php echo $rows['Student_ID'];?></td>
     <td><?php echo $rows['Student_Rollno'];?></td>
     <td><?php echo $rows['Student_name'];?></td>
    
     <td><?php echo $rows['Student_Class'];?></td>
     <td><?php echo $rows['Student_Section'];?></td>
     
     <td><?php echo $rows['Student_DOB'];?></td>
     <td><?php echo $rows['Student_Gender'];?></td>
     <td><?php echo $rows['Student_Mobile'];?></td>
     <td><?php echo $rows['finger_template'];?></td>
     


 </tr>
 <?php

  }
 ?>
 </html>