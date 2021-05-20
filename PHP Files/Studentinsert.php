<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Insert Data</title>
</head>
  
<body>
    <center>
        <h1>Storing Form data in Database</h1>
  
        <form action>
            <p>
                <label for="Id">Student-Id:</label>
                <input type="text" name="Student_ID" id="Id">
            </p>
  
            <p>
                <label for="firstName">First Name:</label>
                <input type="text" name="Student_Fname" id="firstName">
            </p>
            <p>
                <label for="MiddleName">Middle Name:</label>
                <input type="text" name="Student_Mname" id="MiddleName">
            </p>
            
  
  
              
            <p>
                <label for="lastName">Last Name:</label>
                <input type="text" name="Student_Lname" id="lastName">
            </p>
            <p>
                <label for="DOB">Date of Birth:</label>
                <input type="text" name="Student_DOB" id="DOB"> 
            </p>
  
              
            <p>
                <label for="Gender">Gender:</label>
                <input type="text" name="Student_Gender" id="Gender">
            </p>
  
          
              
            <p>
                <label for="Mobile">Mobile:</label>
                <input type="text" name="Student_Mobile" id="Mobile">
            </p>
  
              
              
            <p>
                <label for="finger">finger template:</label>
                <input type="text" name=" finger_template" id="finger">
            </p>
  
              
            <input type="submit" value="Submit">
        </form>
    </center>
    
        <?php
  
        
        $conn = mysqli_connect("localhost", "root", "****", "school_system");
          
        
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

        error_reporting(E_ALL ^ E_WARNING); //  TO remove warning display

          
        
        $Student_ID =  $_REQUEST['Student_ID'];
        $Student_Fname =  $_REQUEST['Student_Fname'];
        $Student_Mname = $_REQUEST['Student_Mname'];
        $Student_Lname = $_REQUEST['Student_Lname'];
        $Student_DOB = $_REQUEST['Student_DOB'];
       

        $Student_Gender =  $_REQUEST['Student_Gender'];
        $Student_Mobile = $_REQUEST['Student_Mobile'];
        $finger_template = $_REQUEST['finger_template'];
          
    
        $sql = "INSERT INTO student  VALUES ('$Student_ID', 
            '$Student_Fname','$Student_Mname','$Student_Lname','$Student_DOB','$Student_Gender','$Student_Mobile','$finger_template')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
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