<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search student</title>
</head>
<link rel="stylesheet" href="Header.css">
</head>
<body>
<div class="header">
  <a href="Teacherdash.html" class="logo"><img src=Images/logo.png
  style="width:60px;height:50px;vertical-align:middle;"> St.Joseph's School</a>
  <div class="header-right">
    <a class="actives" href="Teacherdash.html">Dashboard</a>
    <a class="actives" href="Login.php">Logout</a>

  </div>
</div><br><br><br><br><br><br>
<body>
    <h1> Filter</h1><center>
    <form action>
                <p>
                <label for="Id">Student-Id:</label>
                <input type="text" name="Student_ID" id="Id">

				        <label for="FName">Name:</label>
                <input type="text" name="Studentname" id="FName">
                <h3>Class:</h3>
                1<input type="checkbox" name="class[]" value=1>
                2<input type="checkbox" name="class[]" value=2>
                3<input type="checkbox" name="class[]" value=3>
                4<input type="checkbox" name="class[]" value=4>
                5<input type="checkbox" name="class[]" value=5>
                6<input type="checkbox" name="class[]" value=6>
                7<input type="checkbox" name="class[]" value=7>
                8<input type="checkbox" name="class[]" value=8>
                9<input type="checkbox" name="class[]" value=9>
                10<input type="checkbox" name="class[]" value=10>

        <h3>Section:</h3>
				A<input type="checkbox" name="section[]" value="A">
    		B<input type="checkbox" name="section[]" value="B">
   			C<input type="checkbox" name="section[]" value="C">
    		D<input type="checkbox" name="section[]" value="D">

            </p>

        <input type="submit" value="Submit">

</form>
</center>
<?php
error_reporting(E_ALL ^ E_WARNING);
 $Student_Id = $_REQUEST['Student_ID'];
 $Student_name = $_REQUEST['Studentname'];



?>

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
  $Student_Fname= $_REQUEST['Studentname'];

  $y= date("Y");
  $query = "SELECT student.Student_ID,CONCAT(Student_Fname,' ',Student_Mname,' ',Student_Lname)Student_name,Student_DOB,Student_DOB,Student_Gender,Student_Mobile,finger_template,Student_Class,Student_Section,Student_Rollno FROM student left join
   student_variable on student.Student_ID=student_variable.Student_Id
  where student_variable.Academic_Start='$y'";
 // $q2="select Student_fname from student where Student_Fname like '$Student_Fname'%;";




 	$filtered_get = array_filter($_GET);                  // removes empty values from $_GET
  	if (count($filtered_get))
   	{ // not empty

	  $sec = $_GET['section'];
	  if($sec)
	  $secount=count($sec);
	  unset($_GET['section']);
	  $filtered_get = array_filter($_GET);

    $cla = $_GET['class'];
	  if($cla)
	  $clacount=count($cla);
	  unset($_GET['class']);
	  $filtered_get = array_filter($_GET);



      $keynames = array_keys($filtered_get); // make array of key names from $filtered_get
     // echo $filtered_get;
     $c=count($keynames);



      foreach($filtered_get as $key => $value)
      {

         if($key!='Studentname')
		 {
			$query .=" and";
           $query .= " student_variable.$key = '$value' ";
           $c--;
           error_reporting(E_ALL ^ E_WARNING);
		 }
		else
		{
			$query .=" and";
			$query .= " student.Student_Fname like '$value%' ";
			$c--;
			error_reporting(E_ALL ^ E_WARNING);

		}
				// $filtered_get keyname = $filtered_get['keyname'] value
       }
   }
   if($clacount>=1)
   {
     $query .=" and (";
   }

     foreach($cla as $c)
      {
      if($clacount>1)
      {
        $query .=" student_variable.Student_Class='$c' OR ";
         $clacount--;
        }
      else if($clacount==1)
      {
        $query .=" student_variable.Student_Class='$c') ";
      }
    }

   if($secount>=1)
   {
	   $query .=" and ( ";
   }

	   foreach($sec as $s)
   		{
			if($secount>1)
			{
	   		$query .=" student_variable.Student_Section='$s' OR ";
			   $secount--;
   			}
			else if($secount==1)
			{
				$query .=" student_variable.Student_Section='$s')";
			}
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
<?php if($secount>0 or $clacount>0  or $Student_name!=null or $Student_Id>0)
{ 
  ?>
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

  }}
 ?>
 </html>