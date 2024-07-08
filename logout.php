<?php
//logout.php: Code to log the current user out of the website.

//Destroy the current session.
Session_start();
Session_destroy();

//Redirect user to previous page they came from.
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>