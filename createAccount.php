<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (name, email, password) VALUES ('$name','$email', '$password')";
        try {
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Account Created Successfully !!")</script>';
                
        
            }
        } 
        catch (Exception $sql) {
            echo '<script>alert("Error | There may be dublicated entry found ! ")</script>';
            // header("Location: index.html");
    
            // exit;
        }
    
    }


    $conn->close();

    
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.ico">
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
    
    
</head>
<body>
    <div class="whiteBox">
        <img src="img/logoMainBlue.png" alt="logo" width="50px"> 
        <p style="font-size: 30px; font-weight:bold; color:rgb(32,33,36);margin:18px 0 0 0;">CodeByAmrit</p>
        <p>Create a Account</p>
        <div class="wrap">
            <form action="createAccount.php" method="post">

                <div id="form1" style="position: relative;">
                    <div id="label3" class="prevent-select">Name</div>
                    <input type="text" name="name"  tabindex="1" id="input3" autofocus required>
                    
                    <div id="label1" class="prevent-select">Email Id</div>
                    <input type="email" name="email"  tabindex="2" id="input1" autocomplete="email" required>

                    <div id="label2" class="prevent-select ">Password</div>
                    <input type="password" tabindex="3" id="input2" name="password" required style="letter-spacing: 0.1em;"/>
                    <img src="img/eyeClose.png" alt="eye" id="showPassword" onclick="togglePasswordVisibility()" height="24px"style='top:180px;'>

                    <div class="btnGroup">
                        <a href="login.php">Login</a>
                        <input type="button" onclick="sendOtp()" value="Next" id="btn" >
                    </div>
                </div>

                <div id="form2" style="display:none;">
                    <div id="label4" class="prevent-select">Enter OTP</div>
                    <input type="number" oninput="validateOTP(this)" tabindex="1" id="input4" name="otp" required>

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


    <script src="script.js"></script>
    
</body>
</html>