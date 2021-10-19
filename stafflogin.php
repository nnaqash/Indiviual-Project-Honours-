<!-- including the necessary links-->
<?php session_start();?> <!-- php session stores data on the server rather than user's computer -->
<?php include "join.php" ?>
<?php require ('components/head.inc.php'); ?> 


<!-- login form -->
<div class="container">
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" style="width:450px; margin:auto">
  <div class="mb-3">
    <!-- user enters email -->
    <label for="email" class="form-label fw-bold ">Email address: </label>
    <input type="email" class="form-control" placeholder="Please Enter Here" id="email" name="email" aria-describedby="email" nequired>

  </div>
  <div class="mb-3">
    <!-- user enters password -->
    <label for="password" class="form-label fw-bold">Password: </label>
    <input type="password" class="form-control" placeholder="Please Enter Here" id="password" name="password" required>
  </div>

  <div class="text-center">
  <button type="submit" class="btn  button1  fw-bold" name="adminlogin" >Admin Login</button>

</form>
</div>
<!-- PHP Code for loggin in and password verfication -->
<?php
    if(isset($_POST['adminlogin']))
    {
        $email =$_POST['email']; // storing users -entered email
        $password =$_POST['password']; // storing users- entered password
        // checking against the email present in the database and the email user entered
        $emailsearch ="select * from admin where email='$email'"; 
        $query = mysqli_query($conn,$emailsearch); // reflecting it on the database

        $emailcount = mysqli_num_rows($query); // checking on the rows of database if the email is present
        if($emailcount)
        {
            $emailpass = mysqli_fetch_assoc($query); // if email ID matched then fetching the password of that email
            $dpass = $emailpass['password'];// checking against the password in the database
            $_SESSION['username'] = $emailpass['username'];
            $passdecode = password_verify($password, $dpass); // verifyig if the saved password and user password matches 
            
            if($passdecode) 
            {
                
            ?>
                <script> location.replace("UserTable.php"); </script>  <!-- directing the user to the page -->
            <?php

            }
            // if the password doesnt match
            else if ($passdecode == false)
            {
              // display messagge
                echo "incorrect password! try again";
            }

        }
        else 
        {
          //display message
            echo "ivalid email";
        }
    }

?>
<!-- style code -->

<style>
body{
  background:#FFA600;

}
.button1
{
  width:200px;
  background-color:#DF8C00;
  font-size:20px;

}
.button2
{
  background-color:#1880b8;
  width:200px;
  text-align:center;
  font-size:20px;

  
}
.button2:hover
{
  background-color:#56c1fc;
  font-size:23px;
}
.button1:hover
{
  background-color:#FFDD50;
  font-size:23px;
  
}
.form-text
{
  margin-top:15px;
  color: black;

}
.container
{
  margin-top:90px;
  background:#FFC131;
  width:520px;
  padding-top:15px;
  height:422px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 25px;
}
.staff{
  padding-top:40px;
  text-align:right; 

}
</style>