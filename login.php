<?php
// session_start(); // Start a session

// Check if the user is already logged in
// if(isset($_SESSION['user_id'])) {
//     header("Location: dashboard.php"); // Redirect to dashboard or a protected page
//     exit();
// }

// Check if the login form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "libraryproject";

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize user input to prevent SQL injection
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password (for secure storage and comparison)
    // $hashed_password = hash("sha256", $password);

    // Query to check if user exists in the database
    $query = "SELECT username,password FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // $_SESSION['user_id'] = $row['id'];
        header("Location: book.html"); // Redirect to dashboard or a protected page
        exit();
    } else {
      echo "Invalid username or password";
        $error_message = "Invalid username or password";
    }

    mysqli_close($conn);
}
?>

