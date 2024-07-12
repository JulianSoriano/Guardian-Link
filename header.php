<!-- header.php: The point of this file is to create a consistant header bar throughout the website. -->

<!-- Navigation Bar-->
<nav>
        <div class="wrapper">

            <!--Unordered list-->
            <ul>
                
                <!--Home button-->
                <a href="index.php">Home</a>

                <!--If logged in, have a logout button-->
                <?php if ( isset( $_SESSION['user_id'] ) ) { ?>
                <a href="logout.php">Logout</a>
                <?php } ?>

                <!--If logged in as a volunteer, have a link to the volunteer dashboard-->
                <?php if ( isset( $_SESSION['type'] ) && $_SESSION['type'] === "volunteer"  ) { ?>
                    <a href="volunteer_dashboard.php">Volunteer Dashboard</a>
                
                <!--Else if logged in as an NGO, have a link to the NGO dashboard-->
                <?php } elseif( isset( $_SESSION['type'] ) && $_SESSION['type'] === "ngo"  ) {  ?>
                <a href="ngo_dashboard.php">NGO Dashboard</a>
                <?php }  ?>

                <!--If user is an admin, have a link to the Admin Tools-->
                <?php if ( isset($_SESSION['admin']) && $_SESSION['admin'] === 1 ) { ?>
                <a href="admin.php">Admin Tools</a>
                <?php } ?>
            
            <!--End of unodered list-->    
            </ul>
        </div>
</nav>
<!--End of header.php file