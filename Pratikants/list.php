<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
?>
<html>
    <head>

    </head>
    <section class="top-bar-section">
          <ul class="left">
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/index.php" class="text-decoration-none text-reset">Index</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/register.php" class="text-decoration-none text-reset">Register</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/list.php" class="text-decoration-none text-reset">List</a></button>
            </ul>
    </section>
    <body>

    </body>
</html>

<?php
// Include the database connection file
require 'db.php';

// Ensure the connection is properly established
if (!isset($conn) || !$conn || $conn->connect_errno) {
    die("Database connection error: " . ($conn ? $conn->connect_error : "Connection not initialized."));
}


$tableCheckQuery = "SHOW TABLES LIKE 'users'";


$query = "SELECT id, name, email FROM users";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    echo "<table class='table table-striped table-bordered'>";
    echo "<tr><th>Name</th><th>Email</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>
