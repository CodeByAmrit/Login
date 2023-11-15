<?php 
    $servername = "192.168.0.110";
    $username = "amrit";
    $pass = "1234";
    $dbname = "codebyamrit";

    $conn = new mysqli($servername, $username, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>