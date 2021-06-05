<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Teacher</title>
</head>

<link rel="stylesheet" href="Header.css">
<!-- <meta http-equiv="refresh" content = "5" /> -->
<body>
  <div class="header">
    <a href="Admindash.html" class="logo"><img src=Images/logo.png
      style="width:60px;height:50px;vertical-align:middle;"> St.Joseph's School</a>
      <div class="header-right">
        <a class="actives" href="Admindash.html">Dashboard</a>
        <a class="actives" href="Login.php">Logout</a>

      </div>
    </div>
    <center style="margin-top:10%">
      <h1>Updating data in Database</h1>

      <form action>
        <p>
          <label for="Id">User-Id:</label>
          <input type="text" name="User_ID" id="Id">
        </p>


        <input type="submit" value="Search">
      </form>
    </center>
    </html>

    <?php

    error_reporting(0);
    

    $conn = mysqli_connect("localhost", "root", "*", "school_system");

    // Check connection
    if($conn === false){
      die("ERROR: Could not connect. "
      . mysqli_connect_error());
    }

    error_reporting(E_ALL ^ E_WARNING); //  TO remove warning display



    $User_ID =  $_REQUEST['User_ID'];


    $sql = "select * from  classes  where User_Id=$User_ID;";


    $result = $conn->query($sql);
    //$url1=$_SERVER['REQUEST_URI'];

    $c=0;
    $b=0;

    $ClassX=[];
    $SectionX=[];
    
    if($User_ID!=null){
      ?>
      <html>
      <center>

      <form action>
        <p>
          <label for='ID'>User ID:</label>

          <?php echo "  <input type='text' name='User_ID' id='ID' value='$User_ID' readonly>
          ";?>
        </p><br>
        <?php
      }
      error_reporting(0);
      while($rows=$result->fetch_assoc()){

        $User_ID =  $rows['User_Id'];
        array_push($ClassX,$rows['Class']);
        array_push($SectionX,$rows['Section']);
        $Subject = $rows['Subject'];
        $c++;

        $y=$c-1;
        $cl="class";
        $cl.="$c";
        $sec="section";
        $sec.="$c";
        echo "
        <p>
        <label for='$cl'>Class$c:</label>
        <input type='text' name='$cl' id='$cl' value='$ClassX[$y]'>

        <label for='$sec'>Section$c:</label>
        <input type='text' name='$sec' id='$sec' value='$SectionX[$y]'>



        </p><br>";}

        echo "
        <input type='submit' value='Submit'>
        </form>
        </center>
        </html>
        <br>";
        $User_ID= $_REQUEST["User_ID"];


      for ($i=0; $i < $c; $i++) {
          $y=$i+1;
          $cl="class";
          $cl.="$y";
          $sec="section";
          $sec.="$y";

          $Class =  $_REQUEST[$cl];
          $Section=  $_REQUEST[$sec];

          //echo "$User_ID $Class $Section";

          if($Class!=null and $Section!=null){
            $sql = "UPDATE classes SET Class = '$Class', Section='$Section' WHERE
            User_Id=$User_ID and Class='$ClassX[$i]' and Section='$SectionX[$i]'; ";}

            if($Class==0 and $Section=='0'){
              $sql = "DELETE from classes  WHERE User_Id=$User_ID
              and Class=$ClassX[$i] and Section='$SectionX[$i]'; ";}

            if(mysqli_query($conn,$sql))
               $b++;
              //echo 'window.location.reload(true)';
            }
          if($b==$c){
          echo "<h3>Records Updated..Refresh the page to view updated records.</h3>";
        }



              mysqli_close($conn);
              ?>