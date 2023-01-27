<?php
require("connection.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
$sql="INSERT INTO login (fullname,username,password) values (:fullname,:username,:password)";
$statement=$pdo->prepare($sql);
$fullname=$_POST['fullname'];
$username=$_POST['username'];
$password=$_POST['password'];

$statement->bindParam(":fullname",$fullname,PDO::PARAM_STR);
$statement->bindParam(":username",$username,PDO::PARAM_STR);
$statement->bindParam(":password",$password,PDO::PARAM_STR);
$statement->execute();

echo "new user is added succefully, go to login ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registeration </title>
  <link rel="stylesheet" href="reg.css">
</head>
<body>
<form action="" method="POST">
  <div class="reg-container"> 
  <h2>Sign Up</h2>
    <label for="fullname"><b>Your Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fullname"  required>
    <br>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"  required>
    <br>
    <label for="password"><b>Password </b></label>
    <input type="password" placeholder="Enter Password" name="password"  required> 
    <button type="submit" name="register">Sign Up </button>
    
    <a  class="reg-link" href="login.php" > Log-in Here </a>
  </div>
</form>
<footer class="footer">
  <div class="copy">© copyright 2023 AB Jordan resturant</div>
  <div class="copy"> to contact: +962-796044013</div>
  <div class="copy">our location: Business Park </div>

</footer>
</body>
</html>