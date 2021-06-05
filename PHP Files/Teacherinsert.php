<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Teacher</title>
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
        <h1>Storing Teacher data in Database</h1>

        <form action>
            <p>
                <label for="Id">User-Id:</label>
                <input type="text" name="User_ID" id="Id">
            </p>

            <p>
                <label for="firstName">First Name:</label>
                <input type="text" name="User_Fname" id="firstName">
            </p>
            <p>
                <label for="MiddleName">Middle Name:</label>
                <input type="text" name="User_Mname" id="MiddleName">
            </p>


            <p>
                <label for="lastName">Last Name:</label>
                <input type="text" name="User_Lname" id="lastName">
            </p>
            <p>
                <label for="DOB">Date of Birth:</label>
                <input type="date" name="User_DOB" id="DOB">
            </p>


            <p>
                <label for="Gender">Gender:</label>
                <input type="text" name="User_Gender" id="Gender">
            </p>

            <p>
                <label for="Mobile">Mobile:</label>
                <input type="text" name="User_Mobile" id="Mobile">
            </p>

            <p>
                <label for="Email">Email:</label>
                <input type="email" name="User_Email" id="Email">
            </p>

            <p>
                <label for="role">Role:</label>
                <input type="text" name="User_Role" id="role" value="teacher">
            </p>

            <p>
                <label for="Qual">Qualification:</label>
                <input type="text" name="User_Qual" id="Qual" >
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


        
        $User_ID =  $_REQUEST['User_ID'];
        $User_Fname =  $_REQUEST['User_Fname'];
        $User_Mname = $_REQUEST['User_Mname'];
        $User_Lname = $_REQUEST['User_Lname'];
        $User_DOB = $_REQUEST['User_DOB'];
        $User_Gender =  $_REQUEST['User_Gender'];
        $User_Mobile = $_REQUEST['User_Mobile'];
        $User_Email = $_REQUEST['User_Email'];
        $User_Role =  $_REQUEST['User_Role'];
        $User_Qual = $_REQUEST['User_Qual'];

        // function RandomString($length = 10) {
        //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //     $charactersLength = strlen($characters);
        //     $randomString = '';
        //     for ($i = 0; $i < 8; $i++) {
        //         $randomString .= $characters[rand(0, $charactersLength - 1)];
        //     }
        //     return $randomString;
        // }

        if($User_ID!=null && $User_Email!=null){
          $pass = "rootuser";
          echo "Password generated: $pass</br>";
          $pass = md5($pass);
          echo "Password generated: $pass";
          $User_Email = md5($User_Email);
}

        $sql = "INSERT INTO user_details  VALUES ('$User_ID',
            '$User_Fname','$User_Mname','$User_Lname','$User_Mobile',
            '$User_Gender','$User_DOB','$User_Qual','$User_Role');";

        $sql2= "INSERT INTO user VALUES ('$User_ID','$User_Email','$pass','$User_Role');"; 

        if(mysqli_query($conn, $sql) and mysqli_query($conn, $sql2)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            //echo nl2br("\n$first_name\n $last_name\n "
                //. "$gender\n $address\n $email");
        } else{

            //echo "ERROR: Hush! Sorry. " ;
            //header("location: http://localhost/PHP%20files/Userinsert.php");
                //. mysqli_error($conn);
       }

        // Close connection
        mysqli_close($conn);


        ?>

</body>

</html>