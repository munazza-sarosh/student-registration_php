<?php
// <?php this is starting tag to start php
$host = "localhost";
$dbname = "student_registration";
$username = "root";
$password = "";

try {

    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $error) {

    die("Database connection failed: " . $error->getMessage());

}
?>
<!--  ?> this is closing tag of php -->