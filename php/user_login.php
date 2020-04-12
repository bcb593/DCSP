<?php
    require_once "login.php";
  $conn = new mysqli($hn, $un, $pw, $db);

  if ($conn->connect_error)
        die ($conn->connect_error);


if (isset($_POST['submit'])){
  $username=$_POST['username'];
  $query="SELECT email from signup where email='$username'";
$result = $conn->query($query);
$rs_db=mysqli_fetch_assoc($result);
if (!$result)
  die($conn->error);

if ($result->num_rows>0){

   header("location:customermenu.php");
   exit;
}
else{
  echo "no";
}


}
        ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
          <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css" type="text/css">
            <title> Employee Login</title>
          </head>


            <body>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
              <div class="wrap">
          <h1>Log In!</h1>
          <p>Enter your email and password!</p>





            <form method='POST' action='user_login.php'>
          User Name:<br>
          <input type="text"  name='username'><br>
          Password:<br>
          <input type="text" name="password"><br>
            <input id ='sub' type='submit' name='submit'>
        </form>
        </div>
          </body>
        </html>
