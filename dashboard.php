<?php
include("connect.php");
session_start();
if (isset($_SESSION["userId"])) {
  $email = strval($_SESSION['userId']);
  $result = $conn->query("SELECT * FROM codebyamrit.user where email = '$email'" );
  $row = $result->fetch_assoc();
  $picture = '<img src="data:image/jpeg;base64,' .  $_SESSION['userPic']  . '" width="100%" height="100%"  >';
  

  
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
    <link rel="icon" type="image/x-icon" href="img/icon.ico">
    <title>CodeByAmrit</title>
    <link rel="stylesheet" href="css/student.css">
    <script src="scripts/student.js"></script>
</head>
<body>
    <div class="wrap">
        <div class="left prevent-select" onmouseleave="userOptionClose('option1');">
            <div class="topGroup" >
                <div class="top" onclick="userOption('option1');">
                    <?php echo $picture; ?>
                </div>

                <div class="userOptions prevent-select" id="option1" style="display: none;">
                    <div class="item">
                        <img src="img/user.png" alt="profile">
                        <p>Profile</p>
                    </div>
                    <div class="item">
                        <img src="img/upload.png" alt="ChangePhoto">
                        <p>Upload Photo</p>
                    </div>
                </div>
                <div class="center">
    
                    <div class="item">
                        <img src="img/dashboard.svg" alt="dashboard" width="20px"  height="20px">
                        <p>Dashboard</p>
                    </div>
                    
    
                    <div class="item">
                        <img src="img/checklist.png" alt="result" width="20px"  height="20px">
                        <p>Result</p>
                    </div>
    
                    <div class="item">
                        <img src="img/courses.svg" alt="course" width="20px"  height="20px">
                        <p>Courses</p>
                    </div>
    
                    <div class="item">
                        <img src="img/result.svg" alt="result" width="20px"  height="20px">
                        <p>Reports</p>
                    </div>
    
                    <div class="item">
                        <img src="img/notice.svg" alt="notice" width="20px"  height="20px">
                        <p>Notice</p>
                    </div>
    
                    <div class="item">
                        <img src="img/schedule.svg" alt="schedule" width="20px"  height="20px">
                        <p>Schedule</p>
                    </div>
    
                </div>
            </div>
            
            <div class="bottom">
                <div class="item">
                    <img src="img/logout.svg" alt="logout">
                    <p>Logout</p> 
                    <p></p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="rigthTop">
                <input type="text" id="search" placeholder="Search">
                <img src="img/bell.svg" alt="notification" class="prevent-select">
            </div>
            <div class="welcome">

                <!-- php for later -->
                <div class="text1">
                    <p>Welcome back, User!</p> 
                    <p>Always stay updated in your student portal</p> 
                </div>
                
                <img src="img/clipart.png" alt="clipart" class="prevent-select">
            </div>
        </div>
    </div>
    
</body>
</html>