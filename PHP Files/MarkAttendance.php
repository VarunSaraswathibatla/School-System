<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search student</title>
</head>
<link rel="stylesheet" href="Header.css">
</head>
<body>
<div class="header">
  <a href=Teacherdash.html" class="logo"><img src=Images/logo.png
  style="width:60px;height:50px;vertical-align:middle;"> St.Joseph's School</a>
  <div class="header-right">
    <a class="actives" href="Teacherdash.html">Dashboard</a>
    <a class="actives" href="Login.php">Logout</a>

  </div>
</div><br><br><br><br><br><br>

<body>
<center style="margin-top:2%">

    <form method="get">

            <label for="User_Id">Teacher_Id:</label>
            <input type="User_Id" name="User_Id" id="User_Id">


                <p><label for="Student_Class">Class:</label>
                <input list="Student_Class" name="Student_Class">
                <datalist id="Student_Class">
                <option value=1>
                <option value=2>
                <option value=3>
                <option value=4>
                <option value=5>
                <option value=6>
                <option value=7>
                <option value=8>
                <option value=9>
                <option value=10>
                </datalist>
  <br><br>

               <label for="Student_Section">Section:</label>
                <input list="Student_Section" name="Student_Section" >
                <datalist id="Student_Section">
                <option value='A'>
                <option value='B'>
                <option value='C'>
                <option value='D'>
                <option value='E'>
                </datalist>

                <p><label for="Period">Period:</label>
                <input list="Period" name="Period">
                <datalist id="Period">
                <option value=1>
                <option value=2>
                <option value=3>
                <option value=4>
                <option value=5>
                <option value=6>
                <option value=7>
                </datalist>
  <br><br>




  <label for="Attendance_Date">Date:</label>
                <input type="date" id="Attendance_Date" name="Attendance_Date">


  <br><br><input type="submit" value="Search"></p>
  </form>
  </center>


<?php
        $conn = mysqli_connect("localhost", "root", "*", "school_system");
        $y=date("Y");
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        

        $Student_Class=$_GET['Student_Class'];
        $Student_Section=$_GET['Student_Section'];
        $Period=$_GET['Period'];
        $Date=$_GET['Attendance_Date'];
        $User_Id=$_GET['User_Id'];



        $sql="Select * from student_variable  where Student_Class='$Student_Class'
        and Student_Section='$Student_Section' and Academic_Start='2021';";
        $sql1="";
        $c=0;
      $result = $conn->query($sql);
        echo "
        <center>
        <form method='post'>
        		<h1>Attendance table</h1>

        		<table>
        			<tr>
        				<th>Roll Number</th>
                <th>Status</th>
              ";


        while($rows=$result->fetch_assoc())
        {
          $Student_Id=$rows['Student_Id'];
          $Student_Rollno=$rows['Student_Rollno'];
          $c++;
          $id="id";
          $id.="$c";
          $stat="status";
          $stat.="$c";
          

            
           
            echo $id;
           

            echo "<p>
            
            <input type='hidden' name='$id'  id='$id' value='$Student_Id' readonly>
            <tr>
            <td>  $Student_Rollno </td>
           
            
            <td><input type='checkbox'  name='$stat'  id='$stat' value='P'></td>
            </tr></p>
            <br>
            ";

        }
        echo "
        </table>
        <input type='submit' value='Submit'>
        </form>
        </center>
        </html>"; 



        

      for ($i=0; $i < $c; $i++) {

          $z=$i+1;
          $ids="id";
          $ids.="$z";
          $st="status";
          $st.="$z";
          
        
         

        $Id = $_POST[$ids];
        $Status = $_POST[$st];

        if($Status!='P')
        {
          $Status='A';
        }

        echo $Id;

          $sql1 = "INSERT into attendance VALUES ('$Id','$Date','$Period','$Status','$User_Id','$y','2022');";

          mysqli_query($conn,$sql1);
          
        
      
      }
      echo $sql1;

        mysqli_close($conn);
        ?>