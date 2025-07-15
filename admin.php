<?php
$conn = new mysqli('localhost', 'root', '', 'audiobook_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='book'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>المؤلف: " . $row['author'] . "</p>";
        echo "<p>التصنيف: " . $row['category'] . "</p>";
        echo "<audio controls><source src='uploads/" . $row['audio_file'] . "' type='audio/mp3'></audio>";
        echo "<a href='uploads/" . $row['text_file'] . "' download>تحميل الكتاب النصي</a>";
        echo "<a href='delete_book.php?id=" . $row['id'] . "'>حذف</a>";
        echo "<a href='edit_book.php?id=" . $row['id'] . "'>تعديل</a>";
        echo "</div>";
    }
} else {
    echo "لا توجد كتب لعرضها.";
}

$conn->close();
?>