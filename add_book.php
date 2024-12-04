<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $query = "INSERT INTO books (title, author, year) VALUES ('$title', '$author', $year)";
    if (mysqli_query($connection, $query)) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add a New Book</h1>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title"><br>
        <label>Author:</label>
        <input type="text" name="author"><br>
        <label>Year:</label>
        <input type="number" name="year"><br>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>
