
<?php
session_start();
include 'connect.php';


if (isset($_SESSION["userId"])) {
    header("Location: dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $sql = "SELECT password FROM users WHERE username='$email'";
    $sql = "SELECT StudentID, password, image_data FROM studentlogin WHERE LoginID='$email'";
    $result = $conn->query($sql);
    // $dbPass= $result->fetch_row("password");
   
    
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            echo '<script>alert("Login Successfully");</script>';

            $_SESSION['userId'] = $email;
            $_SESSION['id'] = $row['StudentID'];
            $_SESSION['userPic'] = base64_encode($row['image_data']);

            $id = intval($_SESSION['id']);
            $result = $conn->query("SELECT * FROM students where studentID = '$id'");
            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $_SESSION['FirstName'] = $row['FirstName'];
                $_SESSION['LastName'] = $row['LastName'];
                header("Location: dashboard.php");
            }

            


            
            
        }
        else {
            echo '<script>alert("| Invalid Password |")</script>';
            echo $row['password'] . "    =    " . $password;
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
                    <div id="label8" class="prevent-select">Email Id</div>
                    <input type="email" onfocus="onInputFocus(label8)" onblur="onInputBlur(label8 ,this)" name="email" tabindex="1" id="input8" autocomplete="email" autofocus required>

                    <div id="label9" class="prevent-select ">Password</div>
                    <input type="password" onfocus="onInputFocus(label9)" onblur="onInputBlur(label9 ,this)" name="password" tabindex="2" id="input9"  required style="letter-spacing: 0.1em;"/>
                    <img src="img/eyeClose.png" alt="eye" id="showPassword" onclick="togglePasswordVisibility()" height="24px">
            
                    <div class="btnGroup">
                        <a href="createAccount.php">Create Account</a>
                        <input type="submit"  value="Login" id="btn" tabindex="3" style="text-align: center;" >
                    </div>
                </div>
                
                <!-- <div id="form2" style="display:none;">

                    <div id="label4" class="prevent-select">Enter OTP</div>
                    <input type="number" onfocus="onInputFocus(label4)" onblur="onInputBlur(label4 ,this)" oninput="validateOTP(this)" tabindex="1" id="input4"  required>

                    <div class="btnGroup">
                        <a href="login.php">Resend otp</a>
                        <input type="submit"  value="Verify" id="btnOtp" tabindex="3" style="text-align: center;"/>
                    </div>
                    <div class="backBtn" onclick="backBtn()" >
                        <img src="img/arrow.png" alt="arrow" width="20px">
                    </div>

                   

                </div> -->
            </form>
            
            
        </div>
    </div>


    
    <script src="scripts/script.js" >
        
        // function onInputFocus(objLabel) {
        //     objLabel.style.color = '#0072d9';
        //     objLabel.style.marginTop = 0;
        //     objLabel.style.borderColor = '#0072d9';
            
        // }

        // function onInputBlur(objLabel, obj) {
        //     if (obj.value === '') {
        //         objLabel.style.marginTop = '26px';
        //     }
        //     objLabel.style.color = '#797575';
        //     objLabel.style.borderColor = '#0072d9';
            
        // }
        
    </script>
</body>
</html>