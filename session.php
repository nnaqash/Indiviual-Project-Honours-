<?php session_start(); // starts the session
    // checks if the session id is present or no
    if (!isset($_SESSION['id']))
    { 
        ?>
            <!--when the session id is not found then redirecting the user to the login page
            and stopping from keep loading the contents of the previous page-->
            <script> location.replace("login.php"); 
            </script> 
        <?php 
     
    }
?>









