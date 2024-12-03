<?php
$connection = mysqli_connect("localhost", "root", "", "books_db");

if (!$connection) {
    die("Failed to connect to database: " . mysqli_connect_error());
}
?>