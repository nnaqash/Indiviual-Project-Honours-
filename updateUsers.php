<!-- including the necessary links-->
<?php require ('components/head.inc.php'); ?>


<?php include "join.php" ?>
<!-- Updating the user using the same input style -->
<?php 
// getting the user id
$id = $_GET['id'];
// sql query to fetch the user id
$squery ="select * from users where id=$id";
//executing the query
$query =mysqli_query($conn,$squery);
//storing the results of the query
$result = mysqli_fetch_assoc($query);

if (isset($_POST['done'])){ /* if only when button is clicked */
    
    $id = $_GET['id'];

    $first_name = mysqli_real_escape_string($conn, $_POST['firstname']); // assigning variable and fetching the name attribute, so when the user types we get that data 
    $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    //$password =  mysqli_real_escape_string($conn, $_POST['password']);
    $username =  mysqli_real_escape_string($conn,$_POST['username']);

     // update query for the new data
     $updatequery = "UPDATE users SET id=$id,firstname='$first_name', lastname='$last_name', email='$email', username='$username' WHERE id=$id";

     $query = mysqli_query($conn, $updatequery);
     header('location: UserTable.php');

     if($query){
        ?>
            <!-- if update is succesfull -->
            <script> alert ('update successful');</script>
                    
        <?php
     }
     else
     {
        ?>
        <!-- if update is succesfull -->
        <script> alert ('update not successful');</script>    
        <?php
     }

    
}

?>



<body>
<div class="container-fluid text-lg-center">     
     <h1>Who ate all the cheese?</h1>
   </div>
 </div>
<form action= "" method="post" style="width:450px; margin:auto">
<!-- making use of the bootstrap grid system so the fields will show next to each other -->
    
    <!-- first name -->
    <div class="row ">
        <div class="col my-3">
            <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" value ="<?php echo $result['firstname'];?>" id="firstname" class="form-control" required>           
            </div>
        </div>
        <!-- last name -->
        <div class="col my-3 ">
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" value ="<?php echo $result['lastname'];?>" id="lastname" class="form-control" required>
            </div>
        </div>
    </div>
    <!-- username -->
    <div class="row ">
        <div class="col">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value ="<?php echo $result['username'];?>" id="username" class="form-control" required>
            </div>
        </div>
    </div>
     <!-- email -->
    <div class="row ">
            <div class="col">
                <div class="form-group">
                    <label for="email">Enter your email:</label>
                    <input type="email" name="email" value ="<?php echo $result['email'];?>" id="email" class="form-control" required>
                </div>
            </div>
    </div>


<!-- submmision button -->
<div class="row my-3">
    <div class="col">
        <button class="btn btn-success " value = "update" name="done" type="submit" href="Ureviews.php">Update</button>
    </div>

</form>

<style>
body
{
  background:#fdb100;
  margin-top: 100px;
}
</style>



















