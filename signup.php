<!-- including the necessary links-->
<?php session_start();?> <!-- php session stores data on the server rather than user's computer -->
<!-- including neccessary components with links -->
<?php require ('components/head.inc.php'); ?> 
<?php include "join.php" ?>


<!-- Styling for signup page -->

<style>
body
{
    background:#FFA600;

}

.button1
{

    width:200px;
    background-color:#DF8C00;
    font-size:20px;
    margin: center !important;

}
.button1:hover
{
    background-color:#FFDD50;
    font-size:23px;
  
}
.container
{
    margin-top:90px;
    background:#FFC131;
    width:520px;
    padding-top:15px;
    height:500px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 25px;
  
}
img
{
  width: 550px; 
  height: 350px;
  margin-top: 60px;
  
}

</style>


<!-- creating a new user -->
<?php 
if (isset($_POST['done'])){ /* using the global variable for checking that only when signup button is clicked */

    $first_name = mysqli_real_escape_string($conn, $_POST['firstname']); // assigning variable and fetching the name attribute, so when the user types we get that data 
    $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);
    $username =  mysqli_real_escape_string($conn,$_POST['username']);

    // hashing the password
    $pass = password_hash($password, PASSWORD_DEFAULT);
    //$pquery = mysqli_query($conn,$pass);
    
    //checking if the email is not already in the database registered for another user
    $emailquery = "select * from users where email ='$email'";
    $equery = mysqli_query($conn,$emailquery);

    $emailcount = mysqli_num_rows($equery);// checking if that email exists on that row

    if ($emailcount>0) // if email cout is more than 0 than
    {
        echo "email already exists"; // saying email exixsts
    } 
    else
    {
        // insert query to store data in the databse
        $q = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `username`) 
        VALUES ('$first_name','$last_name','$email','$pass','$username')";

        $query = mysqli_query($conn, $q);
       /*  going to the page */
        ?>       
        <script> location.replace("login.php"); </script>   
        <?php
        
    }
}

?>
<body>
    <!-- using container to keep the form structured -->
<div class="container ">
    <div class="header text-lg-center" >    
    <h1>Who ate all the cheese?</h1>
    </div>

<form action= "<?php echo htmlentities($_SERVER['PHP_SELF']);?> " method="post" style="width:450px; margin:auto">
<!-- making use of the bootstrap grid system so the fields will show next to each other -->
    
    <!-- first name -->
    <div class="row ">
        
        <div class="col">
            <div class="form-group">
            <!-- input field under the appropriate label for the user to enter details -->
            <label class="form-label fw-bold" for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" class="form-control mb-2" placeholder="Please Enter Here"required>           
            </div>
        </div>
        <!-- last name -->
        <div class="col ">
            <div class="form-group">
                <!-- input field under the appropriate label for the user to enter details -->
                <label class="form-label fw-bold" for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Please Enter Here" required>
            </div>
        </div>
    </div>
    <!-- username -->
    <div class="row ">
        <div class="col">
            <div class="form-group">
                <!-- input field under the appropriate label for the user to enter details -->
                <label class="form-label fw-bold" for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control mb-2" placeholder="Please Enter Here" required>
            </div>
        </div>
    </div>
     <!-- user email input-->
    <div class="row ">
            <div class="col">
                <div class="form-group">
                    <!-- input field under the appropriate label for the user to enter details -->
                    <label class="form-label fw-bold" for="email">Enter your email:</label>
                    <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Please Enter Here" required>
                </div>
            </div>
    </div>
    <!-- password input-->
    <div class="row ">
            <div class="col">
                <div class="form-group">
                    <!-- input field under the appropriate label for the user to enter details -->
                    <label class="form-label fw-bold" for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control mb-2" placeholder="Please Enter Here" required>
                </div>
            </div>
    </div>
    </body>
    

<!-- submmision button to signup-->
<div class="text-center">
<div class="row ">
    <div class="col">
        <button class="btn button1 fw-bold " name="done" type="submit" href="login.php">Sign Up</button>
    </div>
    </div>
</form>