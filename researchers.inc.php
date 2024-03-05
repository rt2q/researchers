<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database configuration
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "researchers"; 


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $researcherNumber = mysqli_real_escape_string($conn, $_POST['researcher-number']);
    $researcherSurname = mysqli_real_escape_string($conn, $_POST['researcher-surname']);
    $researcherPhone = mysqli_real_escape_string($conn, $_POST['researcher-phone']);
    $researcherQualifications = mysqli_real_escape_string($conn, $_POST['researcher-qualifications']);
    $researcherEmail = mysqli_real_escape_string($conn, $_POST['researcher-email']);
    $researcherResearchArea = mysqli_real_escape_string($conn, $_POST['researcher-research-area']);
    $researcherTheme = mysqli_real_escape_string($conn, $_POST['researcher-theme']);

    // Insert data into database
    $sql = "INSERT INTO researchers (number, surname, phone, qualifications, email, research_area, theme) 
            VALUES ('$researcherNumber', '$researcherSurname', '$researcherPhone', '$researcherQualifications', '$researcherEmail', '$researcherResearchArea', '$researcherTheme')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>php
