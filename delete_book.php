<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM books WHERE id = $id";
    if (mysqli_query($connection, $query)) {
        echo "Book deleted successfully!";
        header("Location: list_books.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
