<!--volunteer_dashboard.php: The protected part of the site for the volunteer user.-->

<?php
// Start output buffering
ob_start();

//Start or resume the existing session. You'd put this code at the top of any "protected" page you create
session_start();

//Grab user data from the database using the user_id and let them access the "logged in only pages.
if ( isset( $_SESSION['user_id'] ) ) {
    $user_id = $_SESSION['user_id'];
    
} else {
    
    // Redirect them to the login page
    header("Location: volunteer_login.php");
}

?>

<!-- Declares the document type and version of HTML being used -->
<!DOCTYPE html>

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
    <title>Guardian Link Volunteer Dashboard Page</title>

<!-- Close Head Section -->
</head>

<!-- Body Section -->
<body>

<!-- Header Section. Typically contains introductory content or navigation links. -->
<header>
        <h1>Guardian Link Volunteer Dashboard</h1>

    <!-- Close Header Section. -->
    </header>

    <!-- Defines a container div, which is often used to group and style content. -->
        <div class="container">
        <!-- About Section -->
        <section>
            <!-- Title -->
            <h1>Welcome to the Volunteer Dashboard</h1>
            <p>A list of organizations that are requesting help with their cybersecurity needs are included below.</p>
            <!-- Text -->
            <h2>NGOs</h2>
            <?php
                //SQL query to select all columns from the "volunteer" table.
                $sql = "SELECT * FROM ngo;";

                //Execute the query and store the result.
                $result = mysqli_query($conn, $sql);

                //Check if there are any rows returned by the query.
                $resultCheck = mysqli_num_rows($result);

                //If there are rows in the result.
                if ($resultCheck > 0) {

                    //Fetch each row as an array.
                    while ($row = mysqli_fetch_assoc($result)) {

                        //Output the neccessary columns for each row
                        echo "Organization: " . $row['organization'] . "<br>" .
                        "Phone Number: " . $row['phone'] . "<br>" .
                        "Email: " . $row['email'] . "<br>" . 
                        "Area of Concern: " . $row['concern'] . "<br>" . 
                        "<br>";
                    }
                }
            ?>
        </section>
        
        <!-- Delete Account Section -->
        <section>
            <h2>Account Management</h2>
            <p>This cannot be undone!</p>
            <form method="POST" action="">
                <!-- Submit Button -->
                <input type="submit" name="delete_account" value="Delete Account" onclick="return confirm('Are you sure you want to delete this account?');">
            </form>
        </section>

    </div>

<!-- End of Body Section -->
</body>

<?php
// Handle account deletion if the form is submitted
if (isset($_POST['delete_account'])) {
    // Prepare the SQL statement to delete the user's account
    $sql_delete = "DELETE FROM Volunteer WHERE idnumber = ?";
    $stmt_delete = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt_delete, $sql_delete)) {
        echo "SQL Error: " . mysqli_stmt_error($stmt_delete);
    } else {
        // Bind parameters and execute the deletion query
        mysqli_stmt_bind_param($stmt_delete, "s", $user_id);
        mysqli_stmt_execute($stmt_delete);

        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: volunteer_login.php");
    }
}

//End output buffering and flush the output
ob_end_flush();
?>

<!-- End of volunteer_dashboard.php file -->
</html>