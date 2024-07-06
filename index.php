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
<title>Guardian Link Home Page</title>

<!-- Close Head Section -->
</head>

<!-- Body Section -->
<body>

<!-- Header Section. Typically contains introductory content or navigation links. -->
<header>
        <h1>Guardian Link</h1>

    <!-- Close Header Section. -->
    </header>

    <!-- Defines a container div, which is often used to group and style content. -->
        <div class="container">
        <!-- About Section -->
        <section>
            <!-- Title -->
            <h1>About Us</h1>
            <p>Guardians is a non-profit organization that aims to build a more secure world by encouraging others to learn cybersecurity, and help real organizations with their online defence needs.</p>
            <!-- Text -->
            <h2>"What is Guardian Link and What do we do?"</h2>
            <p>Guardian Link is a volunteer run platform dedicated to bridging the gap between providers of cybersecurity specialists and clients in need of these services. Our primary focus is on supporting non-profit organizations at no cost to them!</p>
            <p>Our platform facilitates a streamlined process: cybersecurity professionals seeking to volunteer can easily join through our web application to offer their expertise and aid. Simultaneously, non-profit organizations can also apply to become clients of our company, seeking the assistance they require.</p>
            <h2>"Why we do it"</h2>
            <p>Our overarching goal is to seamlessly connect these two ends of the spectrum, ensuring that the need for cybersecurity assistance within non-profit organizations is met by dedicated and skilled volunteers. At Guardian Link, our mission is to fulfill these needs efficiently and effectively.</p>
            <!-- Partnerships Section -->
            <!-- Title -->
            <h2>Proudly Sponsored and Partnered with:</h2>
            <!-- Text -->
            <p>Coding for Veterans.</p>
        </section>
        
        <!-- Login Button -->
        <div class="callout">
            <a href="./ngo_login.php">Login as an NGO</a>
        </div>

        <!-- Register NGO Button -->
        <div class="callout">
            <a href="./ngo_register.php">Register Your NGO</a>
        </div>

        <!-- Login Volunteer Button -->
        <div class="callout">
            <a href="./volunteer_login.php">Login as a Volunteer</a>
        </div>

        <!-- Register Volunteer Button -->
        <div class="callout">
            <a href="./volunteer_register.php">Register as a Volunteer</a>
        </div>

    </div>

<!-- End of Body Section -->
</body>

<!-- This is the home page of the website. -->
</html>