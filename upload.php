<?php
$db = new mysqli('localhost', 'root', '1234', 'image_gallery');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) {
    $image = file_get_contents($_FILES['image']['tmp_name']);
    
    $imageName = $_FILES['image']['name'];

    $stmt = $db->prepare("INSERT INTO images (image_data, image_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $image, $imageName);
    $stmt->execute();

    echo "Image uploaded successfully!";
    $stmt->close();
}

$db->close();
?>
