
<?php
session_start();
include 'connect.php';

session_start();
if (isset($_SESSION["userId"])) {
    header("Location: dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);
    
   
   
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
  
        if (password_verify($password, $row['password'])) {
            echo '<script>alert("Login Successfully");</script>';

            
           
            $_SESSION['userId'] = $email;
            $_SESSION['userName'] = $row['name'];
            $_SESSION['userPic'] = base64_encode($row['image_data']);
            header("Location: dashboard.php");
            
            
        }
        else {
            echo '<script>alert("| Invalid Password |")</script>';
        }
    }
    else{
        echo '<script>alert("| Email Not Found |")</script>';
    }
    
    
    
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
   

</head>
<body>
    <div class="whiteBox">
        <img src="img/logoMainBlue.png" alt="logo" width="50px" > 
        <p style="font-size: 30px; font-weight:bold; color:rgb(32,33,36);margin:18px 0 0 0;">CodeByAmrit</p>
        <p>To continue, first verify it’s you</p>
        
        <div class="wrap">
            <form action="login.php" method="post">
                <div id="form1"  style="position: relative;">
                    <div id="label1" class="prevent-select">Email Id</div>
                    <input type="email"  name="email" tabindex="1" id="input1" autocomplete="email" autofocus required>

                    <div id="label2" class="prevent-select ">Password</div>
                    <input type="password" name="password" tabindex="2" id="input2"  required style="letter-spacing: 0.1em;"/>
                    <img src="img/eyeClose.png" alt="eye" id="showPassword" onclick="togglePasswordVisibility()" height="24px">
            
                    <div class="btnGroup">
                        <a href="createAccount.php">Create Account</a>
                        <input type="button" onclick="sendOtp()" value="Login" id="btn" tabindex="3" style="text-align: center;" >
                    </div>
                </div>
                
                <div id="form2" style="display:none;">

                    <div id="label4" class="prevent-select">Enter OTP</div>
                    <input type="number" oninput="validateOTP(this)" tabindex="1" id="input4"  required>

                    <div class="btnGroup">
                        <a href="login.php">Resend otp</a>
                        <input type="submit"  value="Verify" id="btnOtp" tabindex="3" style="text-align: center;"/>
                    </div>
                    <div class="backBtn" onclick="backBtn()" >
                        <img src="img/arrow.png" alt="arrow" width="20px">
                    </div>

                   

                </div>
            </form>
            
            
        </div>
    </div>


    
    <script src="scripts/script.js" >
        function createFolder() {
            alert("Function test")
        }
        
    </script>
</body>
</html>