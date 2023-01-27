<?php
session_start();
if(!isset($_SESSION['privilleged'])){
   header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>success</title>
    <link rel="stylesheet" href="success.css">

</head>
<body>
    <div class=intro>
    <div class="success-container"> 
        <h2>Logged in succesfully</h2>
        <p class="menu-link">Menu from here: <a href="menu.php">Menu</a></p>
        <p class="logout-link">Log out from here: <a href="logout.php">Log out</a></p>
    </div> 

    
    </div>
    <footer class="footer">
  <div class="copy">© copyright 2023 AB Jordan resturant</div>
  <div class="copy"> to contact: +962-796044013</div>
  <div class="copy">our location: Business Park </div>

</footer>
</body>
</html>
