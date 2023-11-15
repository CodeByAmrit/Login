<?php
    $servername = "192.168.0.110";
    $username = "amrit";
    $password = "1234";
    $dbname = "codebyamrit";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (name, email, password) VALUES ('$name','$username', '$password')";
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

    
 
    exit;

?>
