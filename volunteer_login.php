<!-- Opens the HTML document -->
<html>

<!-- Head. Contains meta info about the document, such as char encoding, viewport settings and page title -->
<head>
    
<!-- Needed Files to run the site -->
<?php
require 'style.php';
require 'connect.php';
require 'header.php';
?>

    <!-- Sets the title of the webpage -->
    <title>Guardian Link Volunteer Login</title>
    
</head>

<body>
    <header>
        <h1>Volunteer Logink</h1>
    </header>
    
    <div class="container">
        <section>
            <form action="login_process.php" method="post">
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>

            <!-- Forgot Password Button -->
            <div class="callout">
                <a href="#">Forgot your password?</a>
            </div>
        </section>

    </div>

    <?php

// Get the email and password from the form submission
$email = $_POST["email"];
$password = $_POST["password"];

// Query the database to check the credentials
$query = "SELECT * FROM volunteer WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

// Check if a row was returned
if (mysqli_num_rows($result) > 0) {
    // Login successful, redirect to protected page
    header("Location: volunteer_dashboard.php");
    exit;
  } else {
    // Login failed, display error message
    echo "Invalid email or password";
  }
  
  // Close the database connection
  mysqli_close($conn);

echo "Volunteer Login page works." . "<br>";
?>

<!-- End of Body Section -->
</body>

<!-- End of the whole document -->
</html>