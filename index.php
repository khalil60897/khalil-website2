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
        echo "</div>";

        // إعلان بعد كل كتاب
        echo "<div class='advertisement'>";
        echo "<h4>إعلان إضافي</h4>";
        echo "<p>هنا يمكن أن تضع إعلاناً آخر يعرض منتجًا أو خدمة جديدة.</p>";
        echo "</div>";
    }
} else {
    echo "لا توجد كتب لعرضها.";
}

$conn->close();
?>