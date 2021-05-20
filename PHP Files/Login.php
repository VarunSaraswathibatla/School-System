<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  
} 

 *{
  box-sizing: border-box;
}

.bg-img {
  
  background-image: url("johnson.jpg");

  
  height:100%;

  
  background-position: center;
  background-repeat: no-repeat;
  background-size:cover;
  position: relative;
}


.container {
  position: relative;
 
  right:-75%;
  
  max-width: 300px;
  padding: 20px;
  background-color:  lightgrey;/*rgba(246, 248, 247, 0.959);*/
  border-radius: 15px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
h2
{
    font-family:Cinzel Decorative ;
}


.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>

<body class="bg-img">
    
    
    
<h2 style="text-align:center;color:Black;font-size:40px">St. Joseph's school</h2>
<marquee behavior="scroll" direction="left" style="
    color: #fff;
    font-weight: bold;
    left:-5;
    
    background-color:rgba(9, 2, 48, 0.979)  ;margin-bottom: 0;
    padding: 10px 0 10px;
    font-size: 14px;display:block" scrolldelay="100">"Don't Stop learning at all!"
</marquee><br>

  <form action="Loginbackend.php" class="container">
    
    <h1>Login</h1>

    <label for="email" ><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="email" required style="border-radius: 10px">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required style="border-radius: 10px">

    <button type="submit" class="btn" style="border-radius: 10px">Login</button><br><br>
   
    <span class="psw">Forgot <a href="#">password?</a></span><br><hr>
    <?php
        if(isset($_SESSION["error"]))
        {
          $error = $_SESSION["error"];
          echo "<span>$error</span>";
        }
    ?>  

  </form>
</div>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>
