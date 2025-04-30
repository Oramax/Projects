

<?php

// Include the database connection file
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
require 'db.php';
?>

<html>
    <head>

    </head>

    <body>
        
    <section class="top-bar-section">
          <ul class="left">
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/index.php" class="text-decoration-none text-reset">Index</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/register.php" class="text-decoration-none text-reset">Register</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="/Pratikants/list.php" class="text-decoration-none text-reset">List</a></button>
            </ul>
    </section>

    <!-- Form for user input -->
    <form method="POST" action="register.php" class="p-4 border rounded shadow-sm" style="max-width: 400px; margin: auto;">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Validate inputs
        if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Prepare and execute the SQL query
            $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $email);

            if ($stmt->execute()) {
                // Redirect to list.php after successful insertion
                header("Location: list.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Please provide a valid name and email.";
        }
    }
    ?>

    </body>
</html>


