<?php
    // session_start();
    include 'connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

       
        
        $imgContent = addslashes(file_get_contents($image));
        
        echo $imgContent;
        // $sql = "UPDATE studentlogin SET image_data='' WHERE studentID=$id";
        // $result = $conn->query($sql);
        // if ($result === true) {
        //     echo '<script>alert("Photo Updated !!")</script>';
        //     header("Location: dashboard.php");
        // }
        // else{
        //     echo "errpr";
        // }
        
        
    
    }

    $conn->close();
?>