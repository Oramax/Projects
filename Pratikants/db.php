<?php
header("Access-Control-Allow-Origin: *");

// Define database connection variables
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your actual database password (leave empty if no password is set for 'root')

// Create the database if it doesn't exist
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS pratikants";
if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  die("Error creating database: " . $conn->error);
}

// Reconnect to the newly created database
$conn->select_db("pratikants");

// Check connectioni
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";

// Create a table
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  name VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// $conn->close(); // Commented out to keep the connection open for list.php
?>