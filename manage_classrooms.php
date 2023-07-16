<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_classroom'])) {
    $classroomName = $_POST['classroom_name'];

    // Validate classroom name

    // Insert the classroom into the classrooms table
    $sql = "INSERT INTO classrooms (classroom_name) VALUES ('$classroomName')";

    if (mysqli_query($conn, $sql)) {
        echo "Classroom added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Other functionalities (read, update, delete) go here
?>
