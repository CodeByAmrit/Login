<?php
// Assuming you have a MySQL connection established
$servername = "192.168.1.4";
$username = "amrit";
$password = "1234";
$dbname = "SchoolDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $branchID = $_POST["branch"];
    $subject = $_POST["subject"];
    $marks = $_POST["marks"];
    $loginID = $_POST["loginID"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert student data into the Students table
    $sql = "INSERT INTO Students (FirstName, LastName, BranchID) VALUES ('$firstName', '$lastName', '$branchID')";
    $conn->query($sql);

    // Get the last inserted student ID
    $studentID = $conn->insert_id;

    // Insert marks data into the Marks table
    $sql = "INSERT INTO Marks (StudentID, Subject, MarksObtained) VALUES ('$studentID', '$subject', '$marks')";
    $conn->query($sql);

    // Insert login credentials into the StudentLogin table
    $sql = "INSERT INTO StudentLogin (StudentID, LoginID, Password) VALUES ('$studentID', '$loginID', '$password')";
    $conn->query($sql);

    echo "Registration successful!";
}

$conn->close();
?>
