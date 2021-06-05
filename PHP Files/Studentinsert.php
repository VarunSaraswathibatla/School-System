<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Insert student</title>
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
        <h1>ADD NEW STUDENT FORM</h1>
  
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
                <label for="Class">Class:</label>
                <input type="text" name="Student_Class" id="Class"> 
            </p>

            <p>
                <label for="Section">Section:</label>
                <input type="text" name="Student_Section" id="Section"> 
            </p>

            <p>
                <label for="Rollno">Rollno:</label>
                <input type="text" name="Student_Rollno" id="Rollno"> 
            </p>
  
            <p>
                <label for="DOB">Date of Birth:</label>
                <input type="date" name="Student_DOB" id="DOB"> 
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
  
       
        $conn = mysqli_connect("localhost", "root", "*", "school_system");
          
        // Check connection
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
        $Student_Class =  $_REQUEST['Student_Class'];
        $Student_Section =  $_REQUEST['Student_Section'];
        $Student_Rollno =  $_REQUEST['Student_Rollno'];
        $Student_Gender =  $_REQUEST['Student_Gender'];
        $Student_Mobile = $_REQUEST['Student_Mobile'];
        $finger_template = $_REQUEST['finger_template'];
          
        $y=date("Y");
        $z=$y+1;
        
        $sql = "INSERT INTO student  VALUES ('$Student_ID', 
            '$Student_Fname','$Student_Mname','$Student_Lname','$Student_DOB','$Student_Gender','$Student_Mobile','$finger_template');";

        $sql2= "INSERT INTO student_variable  VALUES ('$Student_ID', '$Student_Class','$Student_Section','$Student_Rollno','$y','$z');";
        
        mysqli_query($conn, $sql2);
        if(mysqli_query($conn, $sql))
        {
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            //echo nl2br("\n$first_name\n $last_name\n "
                //. "$gender\n $address\n $email");
        } 
        else{
            
            //echo "ERROR: Hush! Sorry. " ;
            //header("location: http://localhost/PHP%20files/Studentinsert.php");
                //. mysqli_error($conn);
       }
       ?>
       
      
        <?php mysqli_close($conn);
        ?>
    
</body>
  
</html>