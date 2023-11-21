<?php
$db = new mysqli('localhost', 'root', '1234', 'image_gallery');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$result = $db->query("SELECT * FROM images");

while ($row = $result->fetch_assoc()) {
    echo '<img style="height:200px; margin:10px;" src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" alt="' . $row['image_name'] . '">';
}

$db->close();
?>
