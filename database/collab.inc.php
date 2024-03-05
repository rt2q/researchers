<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root"; 
$password = "evans"; 
$dbname = "researchers"; 

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful<br>";
}

// Fetch form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $collaboratorsName = mysqli_real_escape_string($conn, $_POST['collaborators-name']);
    $collaboratorsEmail = mysqli_real_escape_string($conn, $_POST['collaborators-email']);
    $collaboratorsProject = mysqli_real_escape_string($conn, $_POST['collaborators-project']);
    $collaboratorsPhone = mysqli_real_escape_string($conn, $_POST['collaborators-phone']);

    // Insert data into database
    $sql = "INSERT INTO collaborators (name, email, project, phone) 
            VALUES ('$collaboratorsName', '$collaboratorsEmail', '$collaboratorsProject', '$collaboratorsPhone')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
