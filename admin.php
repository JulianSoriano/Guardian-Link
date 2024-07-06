<?php
// You'd put this code at the top of any "protected" page you create
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
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
    <title>Guardian Link NGO Dashboard Page</title>

<!-- Close Head Section -->
</head>

<!-- Body Section -->
<body>

<!-- Header Section. Typically contains introductory content or navigation links. -->
<header>
        <h1>Guardian Link NGO Dashboard</h1>

    <!-- Close Header Section. -->
    </header>

    <!-- Defines a container div, which is often used to group and style content. -->
        <div class="container">
        <!-- About Section -->
        <section>
            <!-- Title -->
            <h1>Admin</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et pariatur neque reiciendis similique harum vel! Suscipit vitae possimus quos sequi voluptatum ad id ducimus, consequuntur eaque tempora a quod perspiciatis?</p>
            <!-- Text -->
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

                <table style="width:100%; border: 1px solid #fff;">
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Admin</td>
                    </tr>
                        <?php
                            //Fetch each row as an array.
                            while ($row = mysqli_fetch_assoc($result)) {
                                $isAdmin = ""; 
                                if ($row['admin'] === "1") {
                                    $isAdmin = "Yes"; 
                                } else {
                                    $isAdmin = "No"; 
                                }
                                //Output the neccessary columns for each row
                                echo "<tr>" .
                                    "<td>" . $row['name'] . "</td>" .
                                    "<td>" . $row['email'] . "</td>" .
                                    "<td>" . $isAdmin . "</td>" .
                                    "</tr>";
                            }
                        }?>
                </table>


                <h2>Administer NGO Permissions</h2>
            <?php

                //SQL query to select all columns from the "volunteer" table.
                $sql2 = "SELECT * FROM ngo;";

                //Execute the query and store the result.
                $result2 = mysqli_query($conn, $sql2);

                //Check if there are any rows returned by the query.
                $resultCheck2 = mysqli_num_rows($result2);

                //If there are rows in the result.
                if ($resultCheck2 > 0) { ?>

                <table style="width:100%;">
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><strong>Email</strong></td>
                        <td><strong>Admin</strong></td>
                    </tr>
                        <?php
                     
                            //Fetch each row as an array.
                            while ($row = mysqli_fetch_assoc($result2)) {

                              
                                $isAdmin = ""; 
                                if ($row['admin'] === "1") {
                                    $isAdmin = "Yes"; 
                                } else {
                                    $isAdmin = "No"; 
                                }
                                //Output the neccessary columns for each row
                                echo "<tr>" .
                                    "<td >" . $row['organization'] . "</td>" .
                                    "<td>" . $row['email'] . "</td>" .
                                    "<td>" . $isAdmin. "</td>" .
                                    "</tr>";
                            }
                        }?>
                </table>
        </section>
<!--         
        <table>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Admin</td>
            </tr>
        </table> -->

    </div>

<!-- End of Body Section -->
</body>

<!-- This document outlines the volunteer members to the NGO User -->
</html>