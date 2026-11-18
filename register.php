<?php

header("Content-Type: application/json");

require "db.php";

// Receive data from JavaScript
// name = munazza  id = fullname fullname = munazza
$fullname = trim($_POST["fullname"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$password = $_POST["password"] ?? "";

// Validate data
if (
    empty($fullname) ||
    empty($email) ||
    empty($phone) ||
    empty($password)
) {

    echo json_encode([
        "success" => false,
        "message" => "All fields are required!"
    ]);

    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid email address!"
    ]);

    exit;
}

// Validate password length
if (strlen($password) < 8) {

    echo json_encode([
        "success" => false,
        "message" => "Password must be at least 8 characters!"
    ]);

    exit;
}

// Hash password
$hashedPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);

try {

    // Prepare SQL query
    $sql = "INSERT INTO students
            (fullname, email, phone, password)
            VALUES
            (:fullname, :email, :phone, :password)";

    $stmt = $conn->prepare($sql);

    // Insert data
    $stmt->execute([
        ":fullname" => $fullname,
        ":email" => $email,
        ":phone" => $phone,
        ":password" => $hashedPassword
    ]);

    echo json_encode([
        "success" => true,
        "message" => "Registration successful!"
    ]);

} catch (PDOException $error) {

    if ($error->getCode() == 23000) {

        echo json_encode([
            "success" => false,
            "message" => "This email is already registered!"
        ]);

    } else {

        echo json_encode([
            "success" => false,
            "message" => "Database error occurred!"
        ]);

    }

}

?>