<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $book = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $query = "UPDATE books SET title = '$title', author = '$author', year = $year WHERE id = $id";
    if (mysqli_query($connection, $query)) {
        echo "Book updated successfully!";
        header("Location: list_books.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $book['title']; ?>"><br>
        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $book['author']; ?>"><br>
        <label>Year:</label>
        <input type="number" name="year" value="<?php echo $book['year']; ?>"><br>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>
