<?php
session_start();
require 'db_connection.php';

// Get the registration number of the student to be deleted
$registrationNumber = $_POST['registration_number'];

// Delete the student from the students table
$sql = "DELETE FROM students WHERE registration_number = '$registrationNumber'";

if (mysqli_query($conn, $sql)) {
    displaySuccessMessage('Student deleted successfully.');

    // Redirect to the home page
    header('Location: index.php');
    exit();
} else {
    displayErrorMessage('Error: ' . mysqli_error($conn));
}
?>
