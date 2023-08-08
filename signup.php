<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Signup"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Gather form data
    $name = $_POST["name"];
    $father_name = $_POST["father_name"];
    $mother_name = $_POST["mother_name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $department = $_POST["department"];
    $level = $_POST["level"];
    $mobile = $_POST["mobile"];

    // You should also handle the student image upload here

    // Insert data into the database
    $sql = "INSERT INTO students (name, father_name, mother_name, gender, dob, email, department, level, mobile)
            VALUES ('$name', '$father_name', '$mother_name', '$gender', '$dob', '$email', '$department', '$level', '$mobile')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
