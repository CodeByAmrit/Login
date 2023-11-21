<?php
include("connect.php");
session_start();
if (isset($_SESSION["userId"])) {
  $email = strval($_SESSION['userId']);
  $result = $conn->query("SELECT * FROM codebyamrit.user where email = '$email'" );
  $row = $result->fetch_assoc();
  $picture = '<img src="data:image/jpeg;base64,' .  $_SESSION['userPic']  . '" alt="pic">';
  

  
  $conn->close();
}
else{
  header("Location: login.php");

  
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashborad</title>
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  <div class="topmenu">
    <div class="left">
      <p>CodeByAmrit</p>
    </div>
    <div class="right">
      <div class="userPic">
        <p><?php echo $_SESSION['name'] ?></p>
        
        <?php echo $picture; ?>
      </div>
    </div>
  </div>
  
</body>
</html>