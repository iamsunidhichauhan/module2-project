<?php
session_start();
require 'db_connection.php';

// Function to display success message
function displaySuccessMessage($message)
{
    echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
}

// Function to display error message
function displayErrorMessage($message)
{
    echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
}

// Function to validate the grade
function validateGrade($grade)
{
    return is_numeric($grade) && $grade >= 0 && $grade <= 10;
}

// Function to check if a registration number already exists
function isRegistrationNumberExists($registrationNumber, $conn)
{
    $sql = "SELECT registration_number FROM students WHERE registration_number = '$registrationNumber'";
    $result = mysqli_query($conn, $sql);

    return mysqli_num_rows($result) > 0;
}

$registrationNumber = $_POST['registration_number'];
$name = $_POST['name'];
$grade = $_POST['grade'];
$classroom = $_POST['classroom'];

// Validate registration number
if (!preg_match('/^\d{10}$/', $registrationNumber)) {
    displayErrorMessage('Invalid registration number. It should be a 10-digit number.');
} elseif (!preg_match('/^[A-Za-z\s]+$/', $name)) {
    displayErrorMessage('Invalid name. It should only contain alphabetic characters.');
} elseif (!validateGrade($grade)) {
    displayErrorMessage('Invalid grade. Grade should be a number between 0 and 10.');
} elseif (isRegistrationNumberExists($registrationNumber, $conn)) {
    displayErrorMessage('Registration number already exists.');
} else {
    // Create a new student
    $student = [
        'registration_number' => $registrationNumber,
        'name' => $name,
        'grade' => $grade,
        'classroom' => $classroom
    ];

    // Insert the student into the students table
    $sql = "INSERT INTO students (registration_number, name, grade, classroom) VALUES ('$registrationNumber', '$name', '$grade', '$classroom')";

    if (mysqli_query($conn, $sql)) {
        displaySuccessMessage('Student added successfully.');
    } else {
        displayErrorMessage('Error: ' . mysqli_error($conn));
    }
}
?>
