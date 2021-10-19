<!-- opening php -->
<?php 
//starting the session
session_start();
// clearing the session
session_unset();
// destroying the session
session_destroy(); 
?>
    <!-- redirecting the user once logged out -->
    <script> location.replace("login.php"); </script>
<?php

?> 
<!-- closing php -->