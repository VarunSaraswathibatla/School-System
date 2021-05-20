<?php

// Username is root
$user = 'root';
$password = '****';


$database = 'school_system';


// port number 3308
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}



$sql = " select * from student s inner join student_variable c on s.Student_Id=c.Student_Id 
        inner join attendance a on c.Student_Id=a.Student_Id;";

$sqlsection="select * from student left join student_variable
			on Student.Student_ID=student_variable.Student_Id 
			group by student.student_id order by student_variable.Student_Class;";

	 
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Student-List</title>
	
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
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
	<section>
		<h1>Student Attendance Details</h1>
		
		<table>
			<tr>
				<th>Admission Number</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>DOB</th>
				<th>Gender</th>
				<th>Mobile Number</th>
				<th>Class</th>
				<th>Section</th>
				<th>RollNo</th>
                <th>Date</th>
				<th>Period</th>
				<th>Status</th>
				<th>Teacher</th>

			</tr>
			
			<?php 
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				
				<td><?php echo $rows['Student_ID'];?></td>
				<td><?php echo $rows['Student_Fname'];?></td>
				<td><?php echo $rows['Student_Mname'];?></td>
				<td><?php echo $rows['Student_Lname'];?></td>
				<td><?php echo $rows['Student_DOB'];?></td>
				<td><?php echo $rows['Student_Gender'];?></td>
				<td><?php echo $rows['Student_Mobile'];?></td>
				<td><?php echo $rows['Student_Class'];?></td>
				<td><?php echo $rows['Student_Section'];?></td>
				<td><?php echo $rows['Student_Rollno'];?></td>
                <td><?php echo $rows['Attendance_Date'];?></td>
                <td><?php echo $rows['Period'];?></td>
				<td><?php echo $rows['Period-status'];?></td>
				<td><?php echo $rows['User_Id'];?></td>
				
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
