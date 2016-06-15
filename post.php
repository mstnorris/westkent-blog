<?php

include ("mysql_connection.php");

$title = $_POST['title'];
$content =$_POST['content'];

try {
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO posts (title, content) 
    VALUES (:title, :content)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);

    // insert a row
    $title = $title;
    $content = $content;
    $stmt->execute();

    header("Location: blog.php");
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
