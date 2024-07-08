<!-- header.php: The point of this file is to create a consistant header bar throughout the website. -->

<!-- Navigation Bar-->
<nav>
        <div class="wrapper">

            <!--Unordered list-->
            <ul>
                
                <!--Home button-->
                <li><a href="index.php">Home</a></li>

                <!--If logged in, have a logout button-->
                <?php if ( isset( $_SESSION['user_id'] ) ) { ?>
                <li><a href="logout.php">Logout</a></li>
                <?php } ?>

                <!--If logged in as a volunteer, have a link to the volunteer dashboard-->
                <?php if ( isset( $_SESSION['type'] ) && $_SESSION['type'] === "volunteer"  ) { ?>
                    <li><a href="volunteer_dashboard.php">Volunteer Dashboard</a></li>
                
                <!--Else if logged in as an NGO, have a link to the NGO dashboard-->
                <?php } elseif( isset( $_SESSION['type'] ) && $_SESSION['type'] === "ngo"  ) {  ?>
                <li><a href="ngo_dashboard.php">NGO Dashboard</a></li>
                <?php }  ?>

                <!--If user is an admin, have a link to the Admin Tools-->
                <?php if ( isset($_SESSION['admin']) && $_SESSION['admin'] === 1 ) { ?>
                <li><a href="admin.php">Admin Tools</a></li>
                <?php } ?>
            
            <!--End of unodered list-->    
            </ul>
        </div>
</nav>
<!--End of header.php file