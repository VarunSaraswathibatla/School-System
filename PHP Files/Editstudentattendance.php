<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Update student</title>
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
    <center>
        <h1>Editing Attendance data in Database</h1>
  
        <form action>
            <p>
                <label for="Student_Class">Student_Class:</label>
                <input type="text" name="Student_Class" id="Student_Class">
            </p>

            <p>
                <label for="Student_Section">Student_Section:</label>
                <input type="text" name="Student_Section" id="Student_Section">
            </p>

            <p>
                <label for="Student_Rollno">Student_Rollno</label>
                <input type="text" name="Student_Rollno" id="Student_Rollno">
            </p>

            <p>
                <label for="Date">Date:</label>
                <input type="text" name="Date" id="Date">
            </p>

            <input type="submit" value="Search">
        </form>
    </center>
    
        <?php
  
        
        $conn = mysqli_connect("localhost", "root", "*", "school_system");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

        error_reporting(E_ALL ^ E_WARNING); //  TO remove warning display
        
          
       
        //$Student_ID =  $_REQUEST['Student_ID'];
        $Student_Class=$_REQUEST['Student_Class'];
        $Student_Section=$_REQUEST['Student_Section'];
        $Student_Rollno=$_REQUEST['Student_Rollno'];
        $Attendance_Date= $_REQUEST['Date'];
        
        
        
        $sql = " select concat(Student_Fname,' ',Student_Mname,' ',Student_Lname)Student_name,Student_Class,Student_Section,
		c.Student_Id,Student_Rollno,Period,Status,User_Id from student s 
		right join student_variable c on c.Student_Id=s.Student_ID
		inner join attendance a on c.Student_Id=a.Student_Id where c.Academic_Start=a.Academic_Start
      and a.Attendance_Date='$Attendance_Date' 
      and c.Student_Class='$Student_Class'
      and c.Student_Section='$Student_Section'
      and c.Student_Rollno='$Student_Rollno';";
        $result = mysqli_query($conn,$sql);

        //$mysqli->close();   
        echo "<center>
        <h2>Previously stored Student Details are displayed in below form placeholder</h2>
        <form action>
            
        <p>
            
            <input type='hidden' name=' Student_Class' id='Class' value='$Student_Class' readonly>
        </p>
        <p>
           
            <input type='hidden' name=' Student_Section' id='Section' value='$Student_Section' readonly>
        </p>
        <p>
            
            <input type='hidden' name='Student_Rollno' id='Rollno' value='$Student_Rollno' readonly>
        </p>

       
        
       
       
        <input type='hidden' name='Date' id='Date' value='$Attendance_Date' readonly>
        
    </p>
     
    
    ";
          
        $c=0;
       
        if(mysqli_query($conn, $sql)){
            while($rows=$result->fetch_assoc())
				{
                    $Student_ID=$rows['Student_Id'];
				            $Student_name =  $rows['Student_name'];
                    $Student_Class =  $rows['Student_Class'];
                    $Student_Section = $rows['Student_Section'];
                    $Student_Rollno = $rows['Student_Rollno'];
                    $Period=$rows['Period'];
                    $Status = $rows['Status'];
                    $User_Id=$rows['User_Id'];
                   
                    $c++;
                    $p="period$c";
                   
                    $s="status$c";
                    
                    $id="id$c";

                    if($c==1)
                    {
                      echo "<center><p>Student_Id :$Student_ID 
                      &emsp;&emsp;Name: $Student_name 
                      &emsp;&emsp;Class: $Student_Class
                      &emsp;&emsp;Section: $Student_Section 
                      &emsp;&emsp;Rollno: $Student_Rollno</p></center>";

                    }
                   
                    

                    

                   

      echo "
       
       <p>
      
       <input type='hidden' name='Student_ID' id='Student_ID' value='$Student_ID' >
   
       

       
       <input type='hidden' name='Student_name' id='Student_name' value='$Student_name' readonly>
   
       
           <label for='Period'>Period:</label>
           <input type='text' name='$p' id='Period' value='$Period' readonly>
       
       
           <label for='Status'>Status:</label>
           <input type='text' name='$s' id='Status' value='$Status'>
       
      
           <label for='User_Id'>User_Id:</label>
           <input type='text' name='$id' id='User_Id' value='$User_Id'>
       </p>

      
       
       <br>";
          }
        echo"

        <input type='submit'></input>
       
    
      </form>
       </center>";
        }
      

        $Student_ID=$_REQUEST['Student_ID'];
        $Student_name =  $_REQUEST['Student_name'];
        $Student_Class =  $_REQUEST['Student_Class'];
        $Student_Section =  $_REQUEST['Student_Section'];
        $Student_Rollno =  $_REQUEST['Student_Rollno'];
        $Attendance_Date =  $_REQUEST['Date'];


        
        for($i=1;$i<=$c;$i++)
        {
          $p="period$i";
                   
          $s="status$i";
          
          $id="id$i";
          $Period = $_REQUEST[$p];
          $Status = $_REQUEST[$s];
         
          $User_Id = $_REQUEST[$id];

          $sql="Update attendance set Status='$Status', User_Id='$User_Id' 
          where Period='$Period' and Student_Id='$Student_ID' and 
          Attendance_Date='$Attendance_Date';";

          

          mysqli_query($conn,$sql);

        }
    
        

        
