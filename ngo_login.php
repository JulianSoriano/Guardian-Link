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

    <title>Login - Guardian Link</title>

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

            <!-- Forgot Password Button -->
            <div class="callout">
                <a href="#">Forgot your password?</a>
            </div>
        </section>

    </div>
</body>

<!-- End of the whole document -->
</html>