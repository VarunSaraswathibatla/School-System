<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Delete Page</title>
</head>
  
<body>
    <center>
        <h1>Delete Form data in Database</h1>
  
        <form action>
            <p>
                <label for="Id">Student-Id:</label>
                <input type="text" name="Student_ID" id="Id">
            </p>
  
            
              
            <input type="submit" value="Submit">
        </form>
    </center>
    
        <?php
  
        
        $conn = mysqli_connect("localhost", "root", "****", "school_system");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

        error_reporting(E_ALL ^ E_WARNING); //  TO remove warning display

          
        
        $Student_ID =  $_REQUEST['Student_ID'];
       
          
    
        $sql = "Delete from student where Student_ID = '$Student_ID'";
          
        if(mysqli_query($conn, $sql)){
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