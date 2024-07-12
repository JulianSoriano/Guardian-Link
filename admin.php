<?php
// admin.php: Admin section of the website.

//Start or resume the existing session. You'd put this code at the top of any "protected" page you create
session_start();

// Grab user data from the database using the user_id and let them access the "logged in only pages.
if ( isset( $_SESSION['user_id'] ) ) {
    
} else {
    // Redirect them to the home page if not logged in.
    header("Location: index.php");
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
            <p>Enter the User ID of the NGO account to be deleted. This cannot be undone.</p>
                <form action="./admin.php" method="post">
                    <input type="hidden" name="type" value="delete_ngo">
                    <label for="userid_delete">User ID:</label>
                    <input type="text" id="userid_delete" name="userid_delete" required>
                    <input type="submit" value="Delete Account" onclick="return confirm('Are you sure you want to delete this account?');">
                </form>
        </section>

        <!-- NGO Account Creation Form -->    
    <section>
        <h1>New NGO Registration Form</h1>
        <form action="./admin.php" method="post">
            <input type="hidden" name="type" value="create_ngo">
            <label for="name">Organization Name:</label>
            <input type="text" id="name" name="name" required><br>
            <br>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required><br>
            <br>

            <label for="email">POC Email:</label>
            <input type="email" id="email" name="email" required><br>
            <br>

            <label for="password">Create Password:</label>
            <input type="password" id="password" name="password" required><br>
            <br>

            <!-- Area of Concern Dropdown Menu-->
            <label for="area_of_concern">Area of Concern:</label>
            <select id="area_of_concern" name="area_of_concern" required>
                <option value="">Select</option>
                
                <!-- Dropdown Options -->
                <option value="Data Privacy and Protection">Data Privacy and Protection</option>
                <option value="Phishing and Social Engineering Attacks">Phishing and Social Engineering Attacks</option>
                <option value="Financial Fraud and Theft">Financial Fraud and Theft</option>
                <option value="Website Security">Website Security</option>
                <option value="Network Security">Network Security</option>
                <option value="Mobile Device Security">Mobile Device Security</option>
                <option value="Compliance and Regulatory Requirements">Compliance and Regulatory Requirements</option>
                <option value="Staff Training and Awareness">Staff Training and Awareness</option>
                <option value="Supply Chain Security">Supply Chain Security</option>
                <option value="Incident Response and Recovery">Incident Response and Recovery</option>
            </select><br>

            <!-- Submit Button -->
            <br>
            <input type="submit" value="Create Your Account">
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

        <!-- Delete Volunteer account Section -->
        <section>
            <h2>Delete Volunteer Accounts</h2>
            <p>Enter the User ID of the Volunteer account to be deleted. This cannot be undone.</p>
                <form action="./admin.php" method="post">
                    <input type="hidden" name="type" value="delete_volunteer">
                    <label for="userid_delete">User ID:</label>
                    <input type="text" id="userid_delete" name="userid_delete" required>
                    <input type="submit" value="Delete Account" onclick="return confirm('Are you sure you want to delete this account?');">
                </form>
        </section>

    <!-- New Volunteer Registration Form -->    
    <section>
        <h1>Volunteer Registration Form</h1>
        <form action="./admin.php" method="post">
            <input type="hidden" name="type" value="create_volunteer">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required><br>
            <br>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required><br>
            <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <br>

            <label for="password">Create Password:</label>
            <input type="password" id="password" name="password" required><br>
            <br>

            <label for="hours">Hours available per week:</label>
            <input type="text" id="hours" name="hours" required><br>
            <br>

            <label for="linkedin">Linkedin profile URL:</label>
            <input type="text" id="linkedin" name="linkedin" required><br>
            <br>

            <!-- Area of Expertise Dropdown Menu-->
            <label for="area_of_concern">Area of Expertise:</label>
            <select id="area_of_concern" name="area_of_concern" required>
                <option value="">Select</option>
                
                <!-- Dropdown Options -->
                <option value="Data Privacy and Protection">Data Privacy and Protection</option>
                <option value="Phishing and Social Engineering Attacks">Phishing and Social Engineering Attacks</option>
                <option value="Financial Fraud and Theft">Financial Fraud and Theft</option>
                <option value="Website Security">Website Security</option>
                <option value="Network Security">Network Security</option>
                <option value="Mobile Device Security">Mobile Device Security</option>
                <option value="Compliance and Regulatory Requirements">Compliance and Regulatory Requirements</option>
                <option value="Staff Training and Awareness">Staff Training and Awareness</option>
                <option value="Supply Chain Security">Supply Chain Security</option>
                <option value="Incident Response and Recovery">Incident Response and Recovery</option>
            </select><br>
            <br>

            <!-- Criminal Background Check Dropdown Menu-->
            <label for="criminal_background_check">Have you completed a criminal background check?:</label>
            <select id="criminal_background_check" name="criminal_background_check" required>
                <option value="">Select</option>
                
                <!-- Dropdown Options -->
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br>
            <br>

            <!-- Submit Button -->
            <input type="submit" value="Create your account">
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

    // Create NGO account form
    If ($_POST["type"] === "create_ngo") {

        // Get the form data and make sure to prevent SQL Injection by using 'msqli real escape string'
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $area_of_concern = mysqli_real_escape_string($conn, $_POST['area_of_concern']);
    

        // Prepare SQL statement to insert data into the NGO database
        $sql = "INSERT INTO ngo (organization, phone, email, password, concern) 
                VALUES (?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);
    
        // Check for errors
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
            } else {

            //Hash password to scramble when viewed in database
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            //Bind the parameters of the prepared statement
            mysqli_stmt_bind_param($stmt, "sssss", $name, $phone, $email, $hashedPwd, $area_of_concern);
        
            //Execute the prepared statement
            mysqli_stmt_execute($stmt);
        
            //Success message
            echo "New record created successfully" . "<br>";
        }    
    }

    // Create NGO account form
    If ($_POST["type"] === "create_volunteer") {

        // Get the form data and make sure to prevent SQL Injection by using 'msqli real escape string'
        $full_name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hours_per_week = mysqli_real_escape_string($conn, $_POST['hours']);
        $linkedin_url = mysqli_real_escape_string($conn, $_POST['linkedin']);
        $area_of_expertise = mysqli_real_escape_string($conn, $_POST['area_of_concern']);
        $criminal_background_check = mysqli_real_escape_string($conn, $_POST['criminal_background_check']);

        // Prepare SQL statement to insert data into the Volunteer database
        $sql = "INSERT INTO volunteer (name, phone, email, password, hours, linkedin, expertise, bgcheck) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);
    
        // Check for errors
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        } else {

            //Hash password to scramble when viewed in database
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            //Bind the parameters of the prepared statement
            mysqli_stmt_bind_param($stmt, "ssssssss", $full_name, $phone, $email, $hashedPwd, $hours_per_week, $linkedin_url, $area_of_expertise, $criminal_background_check);
            
            //Execute the prepared statement
            mysqli_stmt_execute($stmt);
            
            //Success message
            echo "New record created successfully" . "<br>";
        }
    }
        
        //Admin Toggle PHP Code
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