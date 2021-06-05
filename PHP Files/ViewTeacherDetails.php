<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Employee</title>
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
    <h1> Filter</h1><center>
    <form action>
                <p>
                <label for="Id">Employee-Id:</label>
                <input type="text" name="User_ID" id="Id"><br><br>

				        <label for="FName">Name:</label>
                <input type="text" name="Username" id="FName"><br><br>

                
				      

                

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

  $User_Fname= $_REQUEST['Username'];
  
 
  $query = " SELECT * from user_details left join user  on user.User_Id=user_details.User_Id ";
 // $q2="select Student_fname from student where Student_Fname like '$Student_Fname'%;";




 	$filtered_get = array_filter($_GET);                  // removes empty values from $_GET
  	if (count($filtered_get))
   	{ // not empty
      $query.=" where user.User_Id!=0";
	    $keynames = array_keys($filtered_get); // make array of key names from $filtered_get
     // echo $filtered_get;
     $c=count($keynames);
      foreach($filtered_get as $key => $value)
      {

         if($key!='Username')
		 {
           $query .=" and";
           $query .= " user_details.$key = '$value'";
          
           $c--;
           error_reporting(E_ALL ^ E_WARNING);
		 }
		else
		{
			$query .=" and";
			$query .= " user_details.User_Fname like '$value%'";
      
			$c--;
			error_reporting(E_ALL ^ E_WARNING);

		}
				// $filtered_get keyname = $filtered_get['keyname'] value
       }
   
     
     
  }    
     $query .= ";";
        


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

		<h1>Employee Details</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
		   <th>Employee Number</th>
        <th>Employee Name</th>
       
        <th>Employee DOB</th>
        <th>Mobile Number</th>
        <th>Gender</th>
        <th>Qualification</th>
        <th>Role</th>
        </tr>

<?php

  


     while($rows=$result->fetch_assoc())
     {
        
        $Name= " $rows[User_Fname] ";
        $Name .= " $rows[User_Mname]";
        $Name .= " $rows[User_Lname]";
        ?>



 <tr>
     <!--FETCHING DATA FROM EACH
         ROW OF EVERY COLUMN-->
     <td><?php echo $rows['User_Id'];?></td>
     <td><?php echo $Name?></td>
    
     <td><?php echo $rows['User_DOB'];?></td>
     <td><?php echo $rows['User_Mobile'];?></td>
     <td><?php echo $rows['User_Gender'];?></td>
     <td><?php echo $rows['User_Qual'];?></td>
     <td><?php echo $rows['User_Role'];?></td>
     
    


 </tr>
 <?php

  }
 ?>
 </html>