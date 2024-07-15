<!-- reset_password.php: Password reset page -->

<!-- Declares the document type and version of HTML being used -->
<!DOCTYPE html>

<!-- Opens the HTML document -->
<html>

<!-- Needed Files to run the site -->
<?php
require 'style.php';
require 'connect.php';
require 'header.php';
?>

<!-- Head. Contains meta info about the document, such as char encoding, viewport settings and page title -->
<head>

<!-- Sets the title of the webpage -->
<title>Guardian Link Reset Password</title>

<!-- Close Head Section -->
</head>

<!-- Body Section -->
<body>

<!-- Header Section. Typically contains introductory content or navigation links. -->
<header>
        <h1>Guardian Link: Password Reset</h1>

    <!-- Close Header Section. -->
    </header>

    <!-- Defines a container div, which is often used to group and style content. -->
        <div class="container">
        <!-- About Section -->
        <section>
            <!-- Title -->
            <h1>So you forgot your password...</h1>
            <form method="POST" action="send_email.php">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="submit" name="request_reset" value="Request Reset" onclick="return confirm('An admin will contact you shortly.');">
            </form>
            
        </section>

    </div>

<!-- End of Body Section -->
</body>

<!-- End of index.php file -->
</html>