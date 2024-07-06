<?php
session_start();
require 'connect.php';

//Error handling
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the email and password from the form submission
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Prepare the query
    $query = "SELECT * FROM volunteer WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_object();

    var_dump($user);
    // Verify user password and set $_SESSION
    if ( password_verify( $password, $user->password ) ) {
        $_SESSION['user_id'] = $user->idnumber;
        $_SESSION['name'] = $user->name;
        $_SESSION['admin'] = $user->admin;
        $_SESSION['type'] = 'volunteer';
    } 

} else {
    echo "Invalid request method.";
}

var_dump($_SESSION);
if ( !isset( $_SESSION['user_id'] ) ) {
    // Redirect them to the login page
    header("Location: volunteer_login.php");
} else {
    header("Location: volunteer_dashboard.php");
}


?>