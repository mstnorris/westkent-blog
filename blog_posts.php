<?php
include('mysql_connection.php');
try {
$stmt = $conn->prepare("SELECT title, content, published_at FROM posts ORDER BY published_at DESC");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo "<div class='card'><div class='card-block'>";
    echo "<h4 class='card-title'>" .$row['title'] . "</h4>";
    echo "<p class='card-text'>" . $row['content'] . "</p>";
    echo "<p class='card-text text-xs-right'><small class='text-muted'>" . $row['published_at'] . "</small></p>";
echo "</div></div>";
}

}
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
