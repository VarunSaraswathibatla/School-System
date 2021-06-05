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
        <h1>EDIT STUDENT DETAILS FORM</h1>
  
        <form action>
            <p>
                <label for="Id">Student-Id:</label>
                <input type="text" name="Student_ID" id="Id">
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
        
          
    
        $Student_ID =  $_REQUEST['Student_ID'];
        $Academic_Year= date("Y");
        
        
          
    
        $sql = "select * from  student inner join student_variable  where student.Student_ID=student_variable.Student_Id and student.Student_ID='$Student_ID' and student_variable.Academic_Start='$Academic_Year';";
        $result = mysqli_query($conn,$sql);

        //$mysqli->close();   
          
        if(mysqli_query($conn, $sql)){
            while($rows=$result->fetch_assoc())
				{
				    $Student_Fname =  $rows['Student_Fname'];
                    echo $Student_Fname;
                    $Student_Mname = $rows['Student_Mname'];
                    $Student_Lname = $rows['Student_Lname'];
                    $Student_DOB = $rows['Student_DOB'];
                    $Student_Class =  $rows['Student_Class'];
                    $Student_Section = $rows['Student_Section'];
                    $Student_Rollno = $rows['Student_Rollno'];
                    $Student_Gender =  $rows['Student_Gender'];
                    $Student_Mobile = $rows['Student_Mobile'];
                    $finger_template = $rows['finger_template']; 
                }
    
}
        else{
            
            //echo "ERROR: Hush! Sorry. " ;
            //header("location: http://localhost/PHP%20files/Studentinsert.php");
                //. mysqli_error($conn);
       }
       echo "<center>
       <h2>Previously stored Student Details are displayed in below form placeholder</h2>
       <form action>
       
       <p>
                <label for='Id'>Student-Id:</label>
                <input type='text' name='Student_ID' id='Id' value='$Student_ID' readonly>
       </p>

       <p>
           <label for='firstName'>First Name:</label>
           <input type='text' name='Student_Fname' id='firstName' placeholder='$Student_Fname'>
       </p>
       <p>
           <label for='MiddleName'>Middle Name:</label>
           <input type='text' name='Student_Mname' id='MiddleName' placeholder='$Student_Mname'>
       </p>

       <p>
           <label for='lastName'>Last Name:</label>
           <input type='text' name='Student_Lname' id='lastName' placeholder='$Student_Lname'>
       </p>
       <p>
           <label for='Class'>Class:</label>
           <input type='text' name=' Student_Class' id='Class' placeholder='$Student_Class'>
       </p>
       <p>
           <label for='Section'>Section:</label>
           <input type='text' name=' Student_Section' id='Section' placeholder='$Student_Section'>
       </p>
       <p>
           <label for='Rollno'>Roll Number:</label>
           <input type='text' name='Student_Rollno' id='Rollno' placeholder='$Student_Rollno'>
       </p>

       <p>
           <label for='DOB'>Date of Birth:</label>
           <input type='text' name='Student_DOB' id='DOB' placeholder='$Student_DOB'>
       </p>


       <p>
           <label for='Gender'>Gender:</label>
           <input type='text' name='Student_Gender' id='Gender' placeholder='$Student_Gender'>
       </p>



       <p>
           <label for='Mobile'>Mobile:</label>
           <input type='text' name='Student_Mobile' id='Mobile' placeholder='$Student_Mobile'>
       </p>

       <p>
           <label for='finger'>finger template:</label>
           <input type='text' name=' finger_template' id='finger' placeholder='$finger_template'>
       </p>
       
       

       <input type='submit' value='Submit'>
   </form>
   </center>";

        $Student_ID =  $_REQUEST['Student_ID'];
        $Student_Fname =  $_REQUEST['Student_Fname'];
        $Student_Mname = $_REQUEST['Student_Mname'];
        $Student_Lname = $_REQUEST['Student_Lname'];
        $Student_Class =  $_REQUEST['Student_Class'];
        $Student_Section= $_REQUEST['Student_Section'];
        $Student_Rollno = $_REQUEST['Student_Rollno'];
        $Student_DOB = $_REQUEST['Student_DOB'];
        $Student_Gender =  $_REQUEST['Student_Gender'];
        $Student_Mobile = $_REQUEST['Student_Mobile'];
        $finger_template = $_REQUEST['finger_template'];
         
        if($Student_Fname!=null)
        {
            $sql="UPDATE student SET Student_Fname = '$Student_Fname' WHERE Student_ID = '$Student_ID';";
            mysqli_query($conn, $sql);
        }
        if($Student_Mname!=null)
        {
            $sql="UPDATE student SET Student_Mname = '$Student_Mname' WHERE Student_ID = '$Student_ID';";
            mysqli_query($conn, $sql);
        }
        if($Student_Lname!=null)
        {
            $sql="UPDATE student SET Student_Lname = '$Student_Lname' WHERE Student_ID = '$Student_ID';";
            mysqli_query($conn, $sql);
        }

        if($Student_Class!=null)
        {
           
            $sql="UPDATE student_variable SET Student_Class = '$Student_Class' WHERE Student_Id = '$Student_ID'
                   and Academic_Start='$Academic_Year';";
             mysqli_query($conn, $sql);
        }
        if($Student_Section!=null)
        {
            
           $sql="UPDATE student_variable SET Student_Section = '$Student_Section' WHERE Student_Id = '$Student_ID'
                  and Academic_Start='$Academic_Year';";
                   mysqli_query($conn, $sql);
        }
        if($Student_Rollno!=null)
        {
           
            $sql="UPDATE student_variable SET Student_Rollno = '$Student_Rollno' WHERE Student_Id = '$Student_ID'
                   and Academic_Start='$Academic_Year';";
            mysqli_query($conn, $sql);
        }
        if($Student_DOB!=null)
        {
            $sql="UPDATE student SET Student_DOB = '$Student_DOB' WHERE Student_ID = '$Student_ID';";
            mysqli_query($conn, $sql);
        }
        if($Student_Gender!=null)
        {
            $sql="UPDATE student SET Student_Gender = '$Student_Gender' WHERE Student_ID = '$Student_ID';";
            mysqli_query($conn, $sql);
        }
        if($Student_Mobile!=null)
       {

        $sql="UPDATE student SET Student_Mobile = '$Student_Mobile' WHERE Student_ID = '$Student_ID';";
        mysqli_query($conn, $sql);
       }
        if($finger_template!=null)
        {
            $sql="UPDATE student SET finger_template = '$finger_template' WHERE Student_ID = '$Student_ID';";
            mysqli_query($conn, $sql);
        }
        ?>
    
</body>
  
</html>