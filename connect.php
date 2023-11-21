<?php 
    $servername = "localhost";
    $username = "amrit";
    $pass = "1234";
    $dbname = "codebyamrit";

    $conn = new mysqli($servername, $username, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>