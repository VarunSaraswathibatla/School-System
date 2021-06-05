<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Teacher</title>
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
        <h1>Updating data in Database</h1>

        <form action>
            <p>
                <label for="Id">User-Id:</label>
                <input type="text" name="User_ID" id="Id">
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


       
        $User_ID =  $_REQUEST['User_ID'];


        $sql = "select * from  user_details  where User_Id=$User_ID;";
        $result = mysqli_query($conn,$sql);
        //$mysqli->close();

        if(mysqli_query($conn, $sql)){
            $rows = $result->fetch_assoc();
				    $User_Fname =  $rows['User_Fname'];
            $User_Mname = $rows['User_Mname'];
            $User_Lname = $rows['User_Lname'];
            $User_Mobile = $rows['User_Mobile'];
            $User_Gender =  $rows['User_Gender'];
            $User_DOB = $rows['User_DOB'];
            $User_Qual =  $rows['User_Qual'];
            $User_Role =  $rows['User_Role'];

            $newDate = date("d-m-Y", strtotime($User_DOB));

            //echo nl2br("\n$first_name\n $last_name\n "
                //. "$gender\n $address\n $email");

    }
        else{

            //echo "ERROR: Hush! Sorry. " ;
            //header("location: http://localhost/PHP%20files/Studentinsert.php");
                //. mysqli_error($conn);
       }

       echo "
       <center>
       <form action>
        <p>
            <label for='Id'>user_details-Id:</label>
            <input type='text' name='User_ID' id='Id' value='$User_ID' readonly>
        </p>

       <p>
           <label for='firstName'>First Name:</label>
           <input type='text' name='User_Fname' id='firstName' placeholder='$User_Fname'>
       </p>
       <p>
           <label for='MiddleName'>Middle Name:</label>
           <input type='text' name='User_Mname' id='MiddleName' placeholder='$User_Mname'>
       </p>

       <p>
           <label for='lastName'>Last Name:</label>
           <input type='text' name='User_Lname' id='lastName' placeholder='$User_Lname'>
       </p>


       <p>
           <label for='DOB'>Date of Birth:</label>
           <input type='text' name='User_DOB' id='DOB' placeholder='$newDate'>
       </p>


       <p>
           <label for='Gender'>Gender:</label>
           <input type='text' name='User_Gender' id='Gender' placeholder='$User_Gender'>
       </p>



       <p>
           <label for='Mobile'>Mobile:</label>
           <input type='text' name='User_Mobile' id='Mobile' placeholder='$User_Mobile'>
       </p>

       <p>
           <label for='Qual'>Qualifications:</label>
           <input type='text' name='User_Qual' id='Qual' placeholder='$User_Qual'>
       </p>

       <p>
           <label for='Role'>Role:</label>
           <input type='text' name='User_Role' id='Role' placeholder='$User_Role'>
       </p>






       <input type='submit' value='Submit'>
       </form>
       </center>";
       $User_ID =  $_REQUEST['User_ID'];
       $User_Fname =  $_REQUEST['User_Fname'];
       $User_Mname = $_REQUEST['User_Mname'];
       $User_Lname = $_REQUEST['User_Lname'];
       $User_DOB = $_REQUEST['User_DOB'];
       $User_Gender =  $_REQUEST['User_Gender'];
       $User_Mobile = $_REQUEST['User_Mobile'];
       $User_Qual = $_REQUEST['User_Qual'];
       $User_Role = $_REQUEST['User_Role'];
       


       $c=0;
       if($User_Fname!=null){
         $sql = "UPDATE user_details SET User_Fname = '$User_Fname' WHERE User_Id=$User_ID; ";
         $result = mysqli_query($conn,$sql);$c=1;
       }

       if($User_Mname!=null){
         $sql = "UPDATE user_details SET User_Mname = '$User_Mname' WHERE User_Id=$User_ID; ";
         if($User_Mname==" "){
            $sql = "UPDATE user_details SET User_Mname = NULL WHERE User_Id=$User_ID; ";}
         $result = mysqli_query($conn,$sql);$c=1;
       }

       if($User_Lname!=null){
         $sql = "UPDATE user_details SET User_Lname = '$User_Lname' WHERE User_Id=$User_ID; ";
         $result = mysqli_query($conn,$sql);$c=1;
       }

       if($User_DOB!=null){
         $sql = "UPDATE user_details SET User_DOB = '$User_DOB' WHERE User_Id=$User_ID; ";
         $result = mysqli_query($conn,$sql);$c=1;
       }

       if($User_Gender!=null){
         $sql = "UPDATE user_details SET User_Gender = '$User_Gender' WHERE User_Id=$User_ID; ";
         $result = mysqli_query($conn,$sql);$c=1;
       }

       if($User_Mobile!=null){
         $sql = "UPDATE user_details SET User_Mobile = '$User_Mobile' WHERE User_Id=$User_ID; ";
         $result = mysqli_query($conn,$sql);$c=1;
       }

       if($User_Qual!=null){
         $sql = "UPDATE user_details SET User_Qual = '$User_Qual' WHERE User_Id=$User_ID; ";
         $result = mysqli_query($conn,$sql);$c=1;
       }


       if($User_Role!=null){
        $sql = "UPDATE user_details SET User_Role = '$User_Role' WHERE User_Id=$User_ID; ";
        $result = mysqli_query($conn,$sql);$c=1;
      }

       if($c>0)
        echo "<h2>Data updated successfully</h2>";
        // Close connection
        mysqli_close($conn);
        ?>

</body>

</html>