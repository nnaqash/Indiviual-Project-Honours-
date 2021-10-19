<!-- when the user has logged in the session is started -->
<?php session_start();?> <!-- php session stores data on the server rather than user's computer -->
<?php require ('components/head.inc.php'); ?> 
<?php include "join.php" ?>
<!-- PHP Code for loggin in and password verfication -->

<?php
    if(isset($_POST['login']))
    {
        $email =$_POST['email']; // storing users -entered email
        $password =$_POST['password']; // storing users- entered password
        // checking against the email present in the database and the email user entered
        $emailsearch ="select * from users where email='$email'"; 
        $query = mysqli_query($conn,$emailsearch); // reflecting it on the database

        $emailcount = mysqli_num_rows($query); // checking on the rows of database if the email is present
        if($emailcount)
        {
            $emailpass = mysqli_fetch_assoc($query); // if email ID matched then fetching the password of that email
            $dpass = $emailpass['password'];// checking against the password in the database
            $_SESSION['username'] = $emailpass['username'];/* imp */
            $_SESSION['id'] = $emailpass['id'];

            

            $passdecode = password_verify($password, $dpass); // verifyig if the saved password and user password matches 
            
            if($passdecode) 
            {
                /* if the password in the database and the password entered by the user
                are the same then display message "login succesful" */
                echo "";  
                                        


            ?>
                <!-- going to the page -->
                <script> location.replace("Home.php"); </script>
                  
                  
            <?php

            }
            else if ($passdecode == false)
            {
                echo "incorrect password! try again";
            }

        }
        else 
        {
            echo "ivalid email";
        }
    }

?>
<!-- Styling for login page-->

<style>
body{
  background:#FFA600;

}
.button1
{
  width:400px;
  background-color:#DF8C00;
  font-size:20px;

}
.button2
{
  background-color:#1880b8;
  width:400px;
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

background:#FFC131;
width:520px;
height:440px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
border-radius: 25px;
}
.staff{
  padding-top:40px;
  text-align:right; 

}
.title
{
  text-align: center;
  margin-top: 100px;
}
img
{
  width: 550px; 
  height: 350px;
  margin-top: 60px;
  
}
label 
{
  margin-bottom: 3px;
}
.login
{
  margin-top: 60px;
  margin-right: 100px;

}
h1
{
  text-align: center;
}

</style>

<!-- HTML code for login form -->
<!-- using grid to get the form and logo to appear to next to each other -->
<!-- row class so both coloumns are on the same row -->
  <div class = "row">
    <!-- first coloum which has the logo on it -->
    <div class="col">
      <!-- logo image -->
      <img src = "logo.png"> 
    </div>
    <!-- second coloumn -->
    <div class ="col login">
      <!-- container for the form -->
      <div class="container">
        <!-- html form for user input -->
        <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" >
          <h1>Welcome!</h1>
          <!-- first input email-->
          <div class="mb-3">
            <label for="email" class="form-label fw-bold ">Email address: </label>
              <input type="email" class="form-control" placeholder="Please Enter Here" id="email" name="email" aria-describedby="email" >
                <!--  <div id="email"  class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <!-- second input passwords -->
          <div class="mb-3">
            <label for="password" class="form-label fw-bold">Password: </label>
              <input type="password" class="form-control" placeholder="Please Enter Here" id="password" name="password" >
          </div>

          <!-- login button -->
          <div class="text-center">
            <button type="submit" class="btn  button1  fw-bold" name="login" >Login</button>
          </div>

          <!-- signup -->
          <div class="form-text fs-4 fw-bold text-center">Don't have an account?
            <button type="submit" class="btn button2 fw-bold " name="Signup" >
              <a href="signup.php" class="text-reset">Signup</a>
            </button> 
          </div> 
        </form>
          <!-- admin login -->
          <div class="staff">
            <div class="text fs-6 fw-bold ">
              <a href="stafflogin.php" class="text-reset">Admin Login                
              </a>
            </div>

          </div>    
      </div>

    </div>
</div>










