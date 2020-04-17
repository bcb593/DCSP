<?php
    require_once "login.php";
  $conn = new mysqli($hn, $un, $pw, $db);

  if ($conn->connect_error)
        die ($conn->connect_error);
if (isset($_POST['submit'])){

$firstName=$_POST['fname'];
$lastName=$_POST['lname'];
$email=$_POST['email'];
$pwd1=$_POST['pwd1'];
$pwd2=$_POST['pwd2'];
  if ($pwd1==$pwd2){
  $query="INSERT INTO signup (fname, lname, email, pwd1, pwd2) VALUES ('$firstName', '$lastName', '$email','$pwd1','$pwd2')";
  $result = $conn->query($query);

  if ($pwd1!=$pwd2){
    $error_pwd="Password deoes not match";
  }
    else{
      $error_pwd="";
    }

  if (!$result){
        die($conn->error);
      }
else {
  $message="SUCCESS, account created sucesfully";
}
}
else{
  $message="Please check once again";
}
      }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
        .error {
          color: #FF0000;
        }
        </style>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Welcome</title>
    </head>
    <body>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->


    <!-- Links -->

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="welcomepage.php">Home Page</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customermenu.php">Menu</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="user_login.php">Login</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
        </ul>
    </nav>
  <div class="wrap">
    <h1> Sign Up</h1>


<form method='POST' action="signup.php">

  <input  type="text" name='fname' placeholder="First Name" required><br>
  <input  type="text" name='lname' placeholder="Last Name" required> <br>
  <input type="text" name='email' placeholder="Email" required><br>
  <input type="password" name='pwd1' placeholder="Password" required><br>
<input  type="password" name='pwd2' placeholder="Password" required><br>
<input type='submit'  value= "Submit" name='submit'>

</form>
</div>
</body>
</html>
