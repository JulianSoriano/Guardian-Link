<?php
//volunteer_login_process.php: PHP code for the volunteer login page

// Start a new session or resume the existing session.
session_start();

// Include the file that establishes a connection to the database.
require 'connect.php';

// Error handling: Check if the connection to the database failed.
if (!$conn) {
    
    // If the connection failed, terminate the script and output the error message.
    die("Connection failed: " . mysqli_connect_error());
}


// Check if the form is submitted via POST method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the email and password from the form submission and escape characters to prevent SQL Injection.
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Prepare the SQL query to select user data where the email matches.
    $query = "SELECT * FROM volunteer WHERE email = ?";
    $stmt = $conn->prepare($query);
    
    // Bind the email parameter to the prepared statement.
    $stmt->bind_param('s', $email);

    // Check if the statement preparation failed.
    if ($stmt === false) {
        
        // If preparation failed, terminate the script and output the error message.
        die("Prepare failed: " . $conn->error);
    }

    // Execute the prepared statement.
    $stmt->execute();
    
    // Get the result set from the executed statement.
    $result = $stmt->get_result();
    
    // Fetch the resulting row as an object.
    $user = $result->fetch_object();

    // Debugging: Output the user object.
    var_dump($user);

    // Verify the provided password against the hashed password stored in the database.
    if ( password_verify( $password, $user->password ) ) {
        
        // If the password is correct, set session variables with user information.
        $_SESSION['user_id'] = $user->idnumber;
        $_SESSION['name'] = $user->name;
        $_SESSION['admin'] = $user->admin;
        $_SESSION['type'] = 'volunteer';
    } 

} else {
    
    // If the request method is not POST, output an error message.
    echo "Invalid request method.";
}

// Debugging: Output the session variables.
var_dump($_SESSION);

// Check if the user_id session variable is not set.
if ( !isset( $_SESSION['user_id'] ) ) {
    
    // If user_id is not set, redirect the user to the login page.
    header("Location: volunteer_login.php");
} else {
    
    // If user_id is set, redirect the user to the dashboard page.
    header("Location: volunteer_dashboard.php");
}

//End of volunteer_login_process.php
?>