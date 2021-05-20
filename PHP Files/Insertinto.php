<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page</title>
</head>
  
<body>
    <center>
        <?php
  
        
        $conn = mysqli_connect("localhost", "root", "****", "school_system");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

           

          
        // Taking all 5 values from the form data(input)
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
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>