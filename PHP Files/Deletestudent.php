<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Delete Data</title>
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
        <h1>DELETE STUDENT FORM</h1>
                                            
        <form action>
            <p>
                <label for="Id">Student-Id:</label>
                <input type="text" name="Student_ID" id="Id">
            </p>
            <p>
                <label for="Year">Academic Year:</label>
                <input type="text" name="Academic-Year" id="Year">
            </p>    
  
            
              
            <input type="submit" value="Submit">
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

          
        
        $Student_ID =  $_REQUEST['Student_ID'];
        $Academic_Year =  $_REQUEST['Academic-Year'];
        

       
          
    
       
        $sql = "Delete from student_variable where Student_Id = '$Student_ID' 
                and Academic_Start='$Academic_Year'";

          
        if(mysqli_query($conn, $sql))
        {
            if($Student_ID!=null and $Academic_Year!=NULL)
            echo "<h3><CENTER>Data  is Deleted in the database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            //echo nl2br("\n$first_name\n $last_name\n "
                //. "$gender\n $address\n $email");
        } else{
            
            //echo "ERROR: Hush! Sorry. " ;
            //header("location: http://localhost/PHP%20files/Studentinsert.php");
                //. mysqli_error($conn);
       }
          
        // Close connection
        mysqli_close($conn);
        ?>
    
</body>
  
</html>