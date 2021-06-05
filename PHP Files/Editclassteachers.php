<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Teacher</title>
</head>
  
<link rel="stylesheet" href="Header.css">
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
      <h1>Editing Class Teacher data in Database</h1>

      <form action>
        <p>
          <label for="Class">Class:</label>
          
          <input type="Class" name="Class" id="Class">

          <label for="Section">Section:</label>
          
          <input type="Section" name="Section" id="Section">

        </p>


        <input type="submit" value="Search">
      </form>
    </center>
    </html>

    <?php
 error_reporting(-1);
    
    

    $conn = mysqli_connect("localhost", "root", "*", "school_system");

    // Check connection
    if($conn === false){
      die("ERROR: Could not connect. "
      . mysqli_connect_error());
    }

    error_reporting(E_ALL ^ E_WARNING); //  TO remove warning display



    $Class =  $_REQUEST['Class'];
    $Section =  $_REQUEST['Section'];
    

    $sql = "select Subject,classes.User_Id,Concat(User_Fname,' ',User_Lname) User_name 
    from  classes inner join user_details on classes.User_Id=user_details.User_Id
     where classes.Class='$Class' and classes.Section='$Section';";

    $sql2=" Select User_Id,Concat(User_Fname,' ',User_Lname)User_name2 from user_details;";

    $result = $conn->query($sql);
   
    //$url1=$_SERVER['REQUEST_URI'];

    $c=0;
    $b=0;

   $SubjectX=[];
    
    if($Class!=null and $Section!=null)
    {
      echo"
      <form action>
      <center>
        <p>
          <label for='Class'>Class:</label>
          
          <input type='text' name='Class' id='Class'  value = '$Class'readonly>

          <label for='Section'>Section:</label>
          
          <input type='text' name='Section' id='Section' value ='$Section' readonly><br>

        </p>
        <br>";


      while($rows=$result->fetch_assoc())
      {

        $User_Id =  $rows['User_Id'];
        $Subject= $rows['Subject'];
        $User_name=$rows['User_name'];
        array_push($SubjectX,$Subject);

        $c++;
        echo "
        <center>
        <p>
        

        <label for='$Subject'>$Subject:</label>
        <input list='$Subject' name='$Subject' value='$User_name'>
        <datalist  id='$Subject'>
        <option value='$User_Id'>$User_Id $User_name</option>";
        $result2 = $conn->query($sql2);

       while($rows2=$result2->fetch_assoc())
        {
          
          $User_Id2=$rows2['User_Id'];
          $User_name2=$rows2['User_name2'];
          if($User_Id2!=$User_Id)
          echo"
          <option value='$User_Id2'> $User_Id2  $User_name2</option>";
      }
     
      echo"
      </datalist>

      </p><br>";

      
    }
    echo "
    <input type='submit' value='Submit'>
    </form>
    </center>
    </html>
    <br>";
  }
        //$User_Id= $_REQUEST["User_Id"];


      for ($i=0; $i < $c; $i++) 
      {

          
          $User_Id= $_REQUEST[$SubjectX[$i]];
         

          if($User_Id!=null){
            $sql = "UPDATE classes SET User_Id = '$User_Id' WHERE
            Class = $Class and Subject='$SubjectX[$i]' and Section='$Section'; ";}

            /*if($Class==0 and $Section=='0'){
              $sql = "DELETE from classes  WHERE User_Id=$User_ID
              and Class=$ClassX[$i] and Section='$SectionX[$i]'; ";}*/

            mysqli_query($conn,$sql);
        
      }
    
              
              //echo 'window.location.reload(true)';
            
         
        
    


              mysqli_close($conn);
              ?>