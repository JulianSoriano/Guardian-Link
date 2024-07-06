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
        

    </div>

<!-- End of Body Section -->
</body>

<!-- This document outlines the NGO members to the Volunteer user -->
</html>