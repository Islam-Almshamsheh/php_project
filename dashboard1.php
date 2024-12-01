<?php
    require_once "includes/dbh.inc.php";
    $query = "select id, name, email, created_at, role from users;";

    $stmt = $pdo->prepare($query);
    $stmt ->execute();
    $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1 class="form-title">
        Users Info
    </h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php

                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tr>
        </tbody>
    </table>
    <form action="register.php" method="post">
        <input type="submit" class="btn" name="register" value="Add User">

    </form>
    </div>
</body>
</html>
