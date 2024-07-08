<!-- ngo_register.php: This is the registration page for NGOs -->

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
    <title>Guardian Link: NGO Registration Form</title>

<!-- Close Head Section -->
</head>

<!-- Body Section -->
<body>

<!-- Header Section. Typically contains introductory content or navigation links. -->
<header>

<h1>Guardian Link: NGO Registration Form</h1>

    <!-- Close Header Section. -->
    </header>

    <!-- Defines a container div, which is often used to group and style content. -->
    <div class="container">

    <!-- Form Section -->    
    <section>
        <h1>NGO Registration Form</h1>
        <form action="#" method="post">
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

        <!-- Partnerships Section -->
        <section>
            <!-- Title -->
            <h2>Non-Governmental Organizations (NGOs) face a variety of cybersecurity concerns due to the sensitive nature of their work, the data they handle, and their often limited resources for cybersecurity measures. Here are some common areas of concern for NGOs:</h2>
            <!-- Text -->
            <p>Data Privacy and Protection: NGOs often deal with sensitive information about their donors, beneficiaries, and projects. Protecting this data from unauthorized access, breaches, and misuse is crucial.</p>
            <p>Phishing and Social Engineering Attacks: NGOs are susceptible to phishing emails and social engineering attacks, where attackers may impersonate legitimate entities to obtain sensitive information or access to systems.</p>
            <p>Financial Fraud and Theft: Cybercriminals may target NGOs for financial gain through various means such as fraudulent transactions, invoice manipulation, or unauthorized fund transfers.</p>
            <p>Website Security: NGO websites may contain valuable information and serve as a platform for fundraising and communication. Ensuring the security of these websites against hacking attempts, defacement, and DDoS attacks is important.</p>
            <p>Network Security: Securing internal networks and systems against unauthorized access, malware infections, and other cyber threats is essential to protect sensitive data and maintain operational continuity.</p>
            <p>Mobile Device Security: With the increasing use of mobile devices for communication and work-related tasks, NGOs need to implement measures to secure smartphones, tablets, and other mobile devices used by staff members.</p>
            <p>Compliance and Regulatory Requirements: NGOs may be subject to data protection laws and regulations depending on their location and the nature of their work. Ensuring compliance with relevant regulations is necessary to avoid penalties and legal issues.</p>
            <p>Staff Training and Awareness: Educating staff members about cybersecurity best practices, recognizing phishing attempts, and adhering to security policies can help mitigate risks associated with human error and negligence.</p>
            <p>Supply Chain Security: NGOs often collaborate with external partners, vendors, and service providers. Ensuring the security of these relationships and assessing the cybersecurity posture of third-party entities is important to prevent supply chain attacks.</p>
            <p>Incident Response and Recovery: Having a robust incident response plan in place to detect, contain, and mitigate cybersecurity incidents is crucial for minimizing the impact of potential breaches and restoring normal operations swiftly.</p>
        </section>

    </div>

<?php

// Check if the form is submitted by verifying if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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

?>

<!-- End of Body Section -->
</body>

</html>
<!-- End of ngo_register file -->