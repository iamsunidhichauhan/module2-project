<?php
require 'db_connection.php';

$sql = "SELECT students.registration_number, students.name, students.grade, classrooms.classroom_name
        FROM students
        INNER JOIN classrooms ON students.classroom_id = classrooms.classroom_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Classroom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <tr>
                <td>' . $row['registration_number'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['grade'] . '</td>
                <td>' . $row['classroom_name'] . '</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary edit-btn" data-toggle="modal" data-target="#editModal"
                        data-regnum="' . $row['registration_number'] . '"
                        data-name="' . $row['name'] . '"
                        data-grade="' . $row['grade'] . '"
                        data-classroom="' . $row['classroom_name'] . '">Edit</button>
                    <form method="POST" class="d-inline">
                        <input type="hidden" name="registration_number" value="' . $row['registration_number'] . '">
                        <button type="submit" class="btn btn-sm btn-danger" name="delete_student">Delete</button>
                    </form>
                </td>
            </tr>';
    }

    echo '
        </tbody>
    </table>';
} else {
    echo '<div class="alert alert-info" role="alert">No students found.</div>';
}
?>
