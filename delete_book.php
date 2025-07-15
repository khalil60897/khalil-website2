<?php
$conn = new mysqli('localhost', 'root', '', 'audiobook_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id=$id";
$conn->query($sql);
header("Location: admin.php");
$conn->close();
?>