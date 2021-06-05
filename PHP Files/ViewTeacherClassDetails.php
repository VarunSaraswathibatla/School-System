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

  </div>
</div><br><br><br><br><br><br>
    <h1> Filter</h1><center>
    <form action>
                <p>
                <label for="Id">Id:</label>
                <input type="text" name="Id" id="Id"><br><br>

                <label for="Name">Name:</label>
                <input type="text" name="Name" id="Name">


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

        <input type="submit" value="Submit"><br>

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
 
 

  $y= date("Y");
  $query = "select c.User_Id,Class,Section,Subject,Concat(User_Fname,' ',User_Mname,' ',User_Lname)User_Name from classes c inner join user_details  u
   ON c.User_Id=u.User_Id where c.User_Id IS NOT NULL";

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

      foreach($filtered_get as $key => $value)
      {

         if($key!='Name')
		 {
			$query .=" and";
           $query .= " u.User_Id = '$value'";
           $c--;
           error_reporting(E_ALL ^ E_WARNING);
		 }
		else
		{
			$query .=" and";
			$query .= " u.User_Fname like '$value%'";
			$c--;
			error_reporting(E_ALL ^ E_WARNING);

		}
				// $filtered_get keyname = $filtered_get['keyname'] value
       }



      $keynames = array_keys($filtered_get); // make array of key names from $filtered_get
     // echo $filtered_get;
     $c=count($keynames);
   }
   if($clacount>=1)
   {
     $query .=" and (";
   }

     foreach($cla as $c)
      {
      if($clacount>1)
      {
        $query .=" c.Class=$c OR";
         $clacount--;
        }
      else if($clacount==1)
      {
        $query .=" c.Class=$c)";
      }
    }

   if($secount>=1)
   {
	   $query .=" and (";
   }

	   foreach($sec as $s)
   		{
			if($secount>1)
			{
	   		$query .=" c.Section='$s' OR";
			   $secount--;
   			}
			else if($secount==1)
			{
				$query .=" c.Section='$s')";
			}
		}
     $query .= ";";
	//echo $query;


     $result = $conn->query($query);
     ?>
     <style>
		table {
			margin: 0 auto;
      margin-top:20px;
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

    
		<h1>Classes Details</h1>
		<table>
		<tr>
		<th>User ID</th>
        <th>Faculty</th>
        <th>Class</th>
        <th>Section</th>
        <th>Subject</th>
        
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
     <td><?php echo $rows['User_Id'];?></td>
     <td><?php echo $rows['User_Name'];?></td>
    
     <td><?php echo $rows['Class'];?></td>
     <td><?php echo $rows['Section'];?></td>
     <td><?php echo $rows['Subject'];?></td>
    
  
 </tr>
 <?php

  }
 ?>
 </html>