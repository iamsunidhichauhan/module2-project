<?php
session_start();
require 'db_connection.php';

// ...

// Add a new student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_student'])) {
    require 'add_student.php';
}

// Update a student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_student'])) {
    require 'update_student.php';
}

// Delete a student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_student'])) {
    require 'delete_student.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content goes here -->
</head>

<body>
    <div class="container mt-5">
        <h2>Add Student</h2>
        <?php require 'add_student_form.php'; ?>

        <h2 class="mt-5">Students List</h2>
        <?php require 'students_list.php'; ?>
    </div>

    <!-- Edit Modal -->
    <?php require 'edit_modal.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        // Populate edit modal with student data
        $('.edit-btn').click(function() {
            var registrationNumber = $(this).data('regnum');
            var name = $(this).data('name');
            var grade = $(this).data('grade');
            var classroom = $(this).data('classroom');

            $('#edit_registration_number').val(registrationNumber);
            $('#edit_name').val(name);
            $('#edit_grade').val(grade);
            $('#edit_classroom').val(classroom);
        });
    </script>
</body>

</html>
