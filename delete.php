<?php

require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"] ?? "";

    if (!empty($id)) {

        $sql = "DELETE FROM students WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

    }

}

header("Location: students.php");

exit;

?>