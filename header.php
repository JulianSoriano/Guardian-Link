<nav>
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>

                <?php if ( isset( $_SESSION['user_id'] ) ) { ?>
                <li><a href="logout.php">Logout</a></li>
                <?php } ?>

                <?php if ( isset($_SESSION['admin']) && $_SESSION['admin'] === 1 ) { ?>
                <li><a href="admin.php">Admin Tools</a></li>
                <?php } ?>
            </ul>
        </div>
</nav>

<!-- The point of this file is to create a consistant header bar throughout the website. -->