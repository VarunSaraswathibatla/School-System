<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Delete Teacher Data</title>
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
        <h1>Delete Teacher data</h1>
                                            
        <form action>
            <p>
                <label for="Id">User-Id:</label>
                <input type="text" name="Student_ID" id="Id">
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
        $sql = "Delete from user_details where User_Id = '$Student_ID'";
        $sql2 = "Delete from user where User_Id = '$Student_ID'"; 
        if(mysqli_query($conn, $sql) and mysqli_query($conn, $sql2)){
            echo "<h3>Data  is Deleted in the database successfully." 
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