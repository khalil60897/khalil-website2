<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $audio_file = $_FILES['audio_file']['name'];
    $text_file = $_FILES['text_file']['name'];

    move_uploaded_file($_FILES['audio_file']['tmp_name'], "uploads/$audio_file");
    move_uploaded_file($_FILES['text_file']['tmp_name'], "uploads/$text_file");

    $conn = new mysqli('localhost', 'root', '', 'audiobook_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO books (title, author, category, audio_file, text_file)
            VALUES ('$title', '$author', '$category', '$audio_file', '$text_file')";
    $conn->query($sql);
    $conn->close();
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="عنوان الكتاب" required><br>
    <input type="text" name="author" placeholder="اسم المؤلف" required><br>
    <input type="text" name="category" placeholder="التصنيف" required><br>
    <input type="file" name="audio_file" required><br>
    <input type="file" name="text_file"><br>
    <input type="submit" value="إضافة الكتاب">
</form>