<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'test');
define('DB_PASSWORD', 'test');
define('DB_NAME', 'module2_db');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
