<!-- ngo_login.php: Login form for the NGO user -->

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
    <title>Guardian Link NGO Login</title>

</head>

<body>
    <header>
        <h1>NGO Login</h1>
    </header>
    
    <div class="container">
        <section>
            <form action="ngo_login_process.php" method="post">
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>

            <div class="callout">
                <a href="./reset_password.php">Forgot your password?</a>
            </div>

        </section>

    </div>

<!-- End of Body Section -->
</body>

<!-- End of ngo_login.php file -->
</html>