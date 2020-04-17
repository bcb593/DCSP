<?php
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);

  if ($connection->connect_error)
    die($connection->connect_error);

// USERS
  $query = "CREATE TABLE signup (
    fname VARCHAR(32),
    lname  VARCHAR(32),
    email   VARCHAR(32),
    pwd1 VARCHAR(32),
    pwd2 VARCHAR(32)
  )";
  $result = $connection->query($query);
  if (!$result)
    die($connection->error);

  $salt1    = "qm&h*";
  $salt2    = "pg!@";


  $firstName = 'Super';
  $lastName  = 'User';
  $email    = 'admin@gmail.com';
  $pwd1 = 'admin';
  $pwd2='admin';
  $token    = hash('ripemd128', "$salt1$pwd1$salt2");
  $tokens    = hash('ripemd128', "$salt1$pwd2$salt2");

  add_user($connection, $firstName, $lastName, $email, $pwd1,$pwd2, $token,$tokens);

  echo 'Table signup created and populated.<br>';

  function add_user($connection, $fn, $sn, $ty, $un, $pw)
  {
    $query  = "INSERT INTO signup (fname, lname, email, pwd1, pwd2)
      VALUES('$fn', '$sn', '$ty', '$un', '$pw')";

    $result = $connection->query($query);

    if (!$result)
      die($connection->error);
  }

  $connection->close();

 
?>
