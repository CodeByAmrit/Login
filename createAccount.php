<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $fatherName = $_POST['fatherName'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];


        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // $sql = "INSERT INTO students (name, email, password, image_data) VALUES ('$name','$email', '$password', '$imgContent')";
        $sql = "INSERT INTO students (FirstName, LastName, FatherName, DOB, Address_student, phone_number, gender, BranchID) values ('$name','$lastname','$fatherName', '$dob','$address','$phone','$gender',1)";
        try {
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("success in students !!")</script>';
                
        
            }
        } 
        catch (Exception $sql) {
            echo '<script>alert("Error | in Students ! ")</script>';
            // header("Location: index.html");
    
            // exit;
        }
        $studentID = $conn->query("select StudentID from students where FirstName = '$name' and Address_student = '$address'");
        $sdi= $studentID->fetch_assoc();
        $studentID = $sdi['StudentID'];
        $sql = "INSERT INTO studentLogin (StudentID, LoginID, Password, image_data) values ('$studentID','$email','$password', '$imgContent')";
        try {
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("success in LoginTable !!")</script>';
                
        
            }
        } 
        catch (Exception $sql) {
            echo '<script>alert("Error | in StudentLogin ")</script>';
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
    <link rel="stylesheet" href="css/style.css">
    
    
</head>
<body>
    <div class="whiteBox" style="padding-top:-20px;">
        <img src="img/logoMainBlue.png" alt="logo" width="50px"> 
        <p style="font-size: 30px; font-weight:bold; color:rgb(32,33,36);margin:18px 0 0 0; line-height: 0.4em;">CodeByAmrit</p>
        <p>Create a Account</p>

        <div class="wrap">
            <form action="createAccount.php" method="post" enctype="multipart/form-data">

                <div id="form1" style="position: relative;">
                    <div style="display:flex; gap:1rem;">
                        
                        <!-- Name -->
                        <div id="label1" class="prevent-select">Name</div>
                        <input type="text" onfocus="onInputFocus(label1)" onblur="onInputBlur(label1 ,this)" name="name"  tabindex="1" id="input1"  autofocus required>
                        
                        <!-- Last Name -->
                        <div id="label2" class="prevent-select" style="left:195px;">Last Name</div>
                        <input type="text" onfocus="onInputFocus(label2)" onblur="onInputBlur(label2 ,this)" name="lastname"  tabindex="2" id="input2" >
                        
                    </div>

                    <!-- Phone NO -->
                    <div id="label6" class="prevent-select">Phone</div>
                    <input type="number" onfocus="onInputFocus(label6)" onblur="onInputBlur(label6 ,this)" name="phone"  tabindex="3" id="input6"  required>
                    
                    
                    

                    <!-- Email Id -->
                    <div id="label8" class="prevent-select">Email Id</div>
                    <input type="email" onfocus="onInputFocus(label8)" onblur="onInputBlur(label8 ,this)" name="email"  tabindex="4" id="input8"  required>
                    
                    <!-- Password -->
                    <div id="label9" class="prevent-select ">Password</div>
                    <input type="password" onfocus="onInputFocus(label9)" onblur="onInputBlur(label9 ,this)" tabindex="5" id="input9" name="password" required style="letter-spacing: 0.1em;"/>
                    
                    <!-- Password Eye  -->
                    <img src="img/eyeClose.png" alt="eye" id="showPassword" onclick="togglePasswordVisibility()" height="24px"style='top:260px;'>

                    <!-- Login Button Next -->
                    <div class="btnGroup">
                        <a href="login.php">Login</a>
                        <input type="button" onclick="sendOtp()" value="Next" id="btn" tabindex="6">
                    </div>
                </div>

                <div id="form2" style="display:none; margin-top: -20px;">
                    <!-- Father Name -->
                    <div id="label3" class="prevent-select">Father's Name</div>
                    <input type="text" onfocus="onInputFocus(label3)" onblur="onInputBlur(label3 ,this)" name="fatherName"  tabindex="7" id="input3" required>
                    <div style="display:flex; gap:1rem;">

                        <!-- Gender -->
                        <div id="label7" class="prevent-select">Gender</div>
                        <select type="text" onfocus="onInputFocus(label7)" onblur="onInputBlur(label7 ,this)" name="gender"  tabindex="8" id="input7" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        
                        
                        <!-- DOB -->
                        <div id="label4" class="prevent-select" style="left:230px;">Date of Birth</div>
                        <input type="date" onfocus="onInputFocus(label4)" onblur="onInputBlur(label4, this)" name="dob"  tabindex="9" id="input4" required>
                    </div>
                    
                    <!-- Address -->
                    <div id="label5" class="prevent-select">Address</div>
                    <input type="text" onfocus="onInputFocus(label5)" onblur="onInputBlur(label5 ,this)" name="address"  tabindex="10" id="input5" required>
                    
                
                        <label for="image">Choose an image:</label>
                        <input type="file" name="image" id="image" accept="image/*" required>
                        
                    
                    <div class="btnGroup">
                        <a href="login.php">Resend otp</a>
                        <input type="submit"  value="Create" id="btnOtp" tabindex="6" style="text-align: center;"/>
                    </div>
                    <div class="backBtn" onclick="backBtn()" >
                        <img src="img/arrow.png" alt="arrow" width="20px">
                    </div>
                </div>

            </form>
            
        </div>
    </div>


    <script src="scripts/script.js">
            

        function onInputFocus(objLabel) {
            objLabel.style.color = '#0072d9';
            objLabel.style.marginTop = 0;
            objLabel.style.borderColor = '#0072d9';
            
        }

        function onInputBlur(objLabel, obj) {
            if (obj.value === '') {
                objLabel.style.marginTop = '26px';
            }
            objLabel.style.color = '#797575';
            objLabel.style.borderColor = '#0072d9';
            
        }
    </script>
    
</body>
</html>