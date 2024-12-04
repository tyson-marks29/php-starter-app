<?php
include 'database.php';

$query = "SELECT * FROM books";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Books</h1>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td>
                <a href="edit_book.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_book.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
