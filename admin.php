<?php
// admin.php: Admin section of the website.

//Start or resume the existing session. You'd put this code at the top of any "protected" page you create
session_start();

// Grab user data from the database using the user_id and let them access the "logged in only pages.
if ( isset( $_SESSION['user_id'] ) ) {
    
} else {
    // Redirect them to the login page if not logged in.
    header("Location: ngo_login.php");
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
    <title>Guardian Link Admin Page</title>

<!-- Close Head Section -->
</head>

<!-- Body Section -->
<body>

<!-- Header Section. Typically contains introductory content or navigation links. -->
<header>
        <h1>Guardian Link Admin Page</h1>

    <!-- Close Header Section. -->
    </header>

    <!-- Defines a container div, which is often used to group and style content. -->
        <div class="container">
       
        <!-- Intro paragraph for the admin page -->
        <section>
            <!-- Title -->
            <h1>Welcome to the Admin page.</h1>
            <p>As an admin you have the ability to let other users become admins as well by using the yes or no buttons in the list below. </p>
            <p>Delete User accounts by entering the user ID in the form below.</p>
        </section>

        <!-- NGO Admin Table -->
        <section>
                <h2>Administer NGO Permissions</h2>
            <?php
                //SQL query to select all columns from the "ngo" table.
                $sql2 = "SELECT * FROM ngo;";

                //Execute the query and store the result.
                $result2 = mysqli_query($conn, $sql2);

                //Check if there are any rows returned by the query.
                $resultCheck2 = mysqli_num_rows($result2);

                //If there are rows in the result.
                if ($resultCheck2 > 0) { 
            ?>

            <form action="./admin.php" method="post">
                <input type="hidden" id="type" name="type" value="ngo">
                <table style="width:100%; border: 1px solid #fff;">
                    
                    <!-- NGO Table header -->
                    <tr>
                        <td><strong>User ID</strong></td>
                        <td><strong>Name</strong></td>
                        <td><strong>Email</strong></td>
                        <td><strong>Admin</strong></td>
                    </tr>

                        <?php
                     
                            //Fetch each row as an array.
                            while ($row = mysqli_fetch_assoc($result2)) {

                              
                                $isAdmin = ""; 
                                if ($row['admin'] === "1") {
                                    $isAdmin = '<input type="radio" name="input__'. $row['idnumber'] .'" value="1" checked />
                                    <label >Yes</label><input type="radio" name="input__'. $row['idnumber'] .'" value="0" />
                                    <label >No</label>'; 
                                } else {
                                    $isAdmin = '<input type="radio" name="input__'. $row['idnumber'] .'" value="1"  />
                                    <label >Yes</label><input type="radio" name="input__'. $row['idnumber'] .'" value="0" checked />
                                    <label >No</label>'; 
                                }
                                //Output the neccessary columns for each row
                                echo "<tr>" . 
                                    "<td >" . $row['idnumber'] . "</td>" .
                                    "<td >" . $row['organization'] . "</td>" .
                                    "<td>" . $row['email'] . "</td>" .
                                    "<td>" . $isAdmin. "</td>" .
                                    "</tr>";
                            }
                        }?>
                </table>
            <input type="submit" value="Update Account">
            </form>
        </section>

        <!-- Delete NGO account Section -->
        <section>
            <h2>Delete NGO Accounts</h2>
                <form action="./admin.php" method="post">
                    <input type="hidden" name="type" value="delete_ngo">
                    <label for="userid_delete">User ID:</label>
                    <input type="text" id="userid_delete" name="userid_delete" required>
                    <input type="submit" value="Delete Account" onclick="return confirm('Are you sure you want to delete this account?');">
                </form>
        </section>

        <!-- Volunteer Admin Table -->
        <section>
            <h2>Administer Volunteer Permissions</h2>
            
            <?php

                //SQL query to select all columns from the "volunteer" table.
                $sql = "SELECT * FROM volunteer;";
                
                //Execute the query and store the result.
                $result = mysqli_query($conn, $sql);

                //Check if there are any rows returned by the query.
                $resultCheck = mysqli_num_rows($result);

                //If there are rows in the result.
                if ($resultCheck > 0) { ?>

                <form action="./admin.php" method="post">
                <table style="width:100%; border: 1px solid #fff;">
                    <input type="hidden" id="type" name="type" value="volunteer">
                    
                    <!-- Volunteer table header -->
                    <tr>
                        
                        <td>User ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Admin</td>
                    </tr>
                        
                        <?php
                            //Fetch each row as an array.
                            while ($row = mysqli_fetch_assoc($result)) {
                                $isAdmin = ""; 
                                if ($row['admin'] === "1") {
                                    $isAdmin = '<input type="radio" name="input__'. $row['idnumber'] .'" value="1" checked />
                                    <label1>Yes</label><input type="radio" name="input__'. $row['idnumber'] .'" value="0" />
                                    <label1>No</label>'; 
                                } else {
                                    $isAdmin = '<input type="radio" name="input__'. $row['idnumber'] .'" value="1"  />
                                    <label1>Yes</label><input type="radio" name="input__'. $row['idnumber'] .'" value="0" checked />
                                    <label1>No</label>'; 
                                }
                                //Output the neccessary columns for each row
                                echo "<tr>" .
                                    "<td>" . $row['idnumber'] . "</td>" .
                                    "<td>" . $row['name'] . "</td>" .
                                    "<td>" . $row['email'] . "</td>" .
                                    "<td>" . $isAdmin . "</td>" .
                                    "</tr>";
                            }
                        }?>
                </table>
                <input type="submit" value="Update Account">
                </form>
        </section>

        <!-- Delete Volunteer account Section ???-->
        <section>
            <h2>Delete Volunteer Accounts</h2>
                <form action="./admin.php" method="post">
                    <input type="hidden" name="type" value="delete_volunteer">
                    <label for="userid_delete">User ID:</label>
                    <input type="text" id="userid_delete" name="userid_delete" required>
                    <input type="submit" value="Delete Account" onclick="return confirm('Are you sure you want to delete this account?');">
                </form>
        </section>


    </div>

<!-- End of Body Section -->
</body>

</html>

<!-- PHP Section for handling form submission -->
<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Delete NGO account form 
    if ($_POST["type"] === "delete_ngo") {

        // Extract user ID to delete from the form input
        $userid_delete = mysqli_real_escape_string($conn, $_POST["userid_delete"]);
        
        // SQL query to delete the user account from the 'ngo' table
        $sql_delete = "DELETE FROM ngo WHERE idnumber = ?";
        $stmt_delete = mysqli_stmt_init($conn);
    
        // Initialize prepared statement
        if (!mysqli_stmt_prepare($stmt_delete, $sql_delete)) {
            echo "SQL Error: " . mysqli_stmt_error($stmt_delete);
        } else {
            // Bind parameters and execute the deletion query
            mysqli_stmt_bind_param($stmt_delete, "s", $userid_delete);
            mysqli_stmt_execute($stmt_delete);
            echo "Account deleted successfully.";
        }
    } 
    
    // Delete Volunteer account form 
    if ($_POST["type"] === "delete_volunteer") {

        // Extract user ID to delete from the form input
        $userid_delete = mysqli_real_escape_string($conn, $_POST["userid_delete"]);
        
        // SQL query to delete the user account from the 'volunteer' table
        $sql_delete = "DELETE FROM volunteer WHERE idnumber = ?";
        $stmt_delete = mysqli_stmt_init($conn);
    
        // Initialize prepared statement
        if (!mysqli_stmt_prepare($stmt_delete, $sql_delete)) {
            echo "SQL Error: " . mysqli_stmt_error($stmt_delete);
        } else {
            // Bind parameters and execute the deletion query
            mysqli_stmt_bind_param($stmt_delete, "s", $userid_delete);
            mysqli_stmt_execute($stmt_delete);
            echo "Account deleted successfully.";
        }
    }
        
    
        foreach($_POST as $key => $value){
            
            //Extract the user ID from the input name
            $userid = substr($key, 7); 
            $isCurrentUser = $_SESSION['type'] === $_POST["type"] && $_SESSION['user_id'] == $userid;

            //Skip updating the current user's own admin status.
            if($isCurrentUser) {     
                continue;
            }

            //Check if the key contains 'input__', indicating it as a radio button input.
            if(str_contains($key, 'input__')) {
                
                //Sanitize the input.
                $type = mysqli_real_escape_string($conn, $_POST["type"] ); 

                //Prepare the SQL query based on the user type.
                if($type == "volunteer") {
                    $sql = "UPDATE volunteer SET `admin`= ? WHERE `idnumber` = ?";
                } elseif ($type == "ngo") {
                    $sql = "UPDATE ngo SET `admin`= ? WHERE `idnumber` = ?";
                } else {
                    echo "SQL Error";
                }
                

                //Initialize and prepare the statement.
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL Error";
                } else {
                    //Bind parameters and execute the statement.
                    mysqli_stmt_bind_param($stmt, "ss", $value, $userid);
                    mysqli_stmt_execute($stmt);
                }
            }
        }
    //Redirect to the admin page after processing to update result.
        echo " <script> window.location.replace('admin.php'); </script>";
    }

    ?>
<!-- End of admin.php file -->