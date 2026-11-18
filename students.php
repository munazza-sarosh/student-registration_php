<?php

require "db.php";

$sql = "SELECT id, fullname, email, phone, created_at
        FROM students
        ORDER BY id DESC";

$stmt = $conn->query($sql);

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registered Students</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container students-container">

    <div class="form-box">

        <h1>Registered Students</h1>

        <p>Total Students: <?= count($students) ?></p>

        <?php if (count($students) > 0): ?>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($students as $student): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($student["id"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($student["fullname"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($student["email"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($student["phone"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($student["created_at"]) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <p>No students registered yet.</p>

        <?php endif; ?>

        <a href="index.html" class="view-link">
            Back to Registration
        </a>

    </div>

</div>

</body>
</html>