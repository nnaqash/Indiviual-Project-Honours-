<!-- including the necessary links-->
<?php require ('components/head.inc.php'); ?> 
<?php require ('navbar.php'); ?> 
<?php include "join.php" ?>

<!-- header of page -->
<div class="header">  
    <h1><b>Your Profile </b></h1>
</div>
<div class="container">
    <?php
    //selecting  all the data from the table users
    $select =  "SELECT * FROM users WHERE `id` = $_SESSION[id]";  
    //reflecting the query on the database
    $query = mysqli_query($conn,$select);
    /* using php builtin function of associative array to fetch the data
    along with the while loop so it keeps loading the data constantly */
    while($result = mysqli_fetch_array($query))
    {    
    ?> 
    <!-- Html code to display the user profile -->
    <form action= "updateUsers.php" method="post" >
    <!-- making use of the bootstrap grid system so the fields will show next to each other -->
        
        <!-- first name -->
        <div class="row ">
            
            <div class="col">
                
                <!-- input field under the appropriate label for the user to enter details -->
                <label class="form-label fw-bold" for="firstname">First Name: <?php echo $result['firstname'];?></label>
                        
                
            </div>
            <!-- last name -->
            <div class="col ">
                
                    <!-- input field under the appropriate label for the user to enter details -->
                    <label class="form-label fw-bold" for="lastname">Last Name: <?php echo $result['lastname'];?></label>
                    
                
            </div>
        </div>
        <!-- username -->
        <div class="row ">
            <div class="col">
                
                    <!-- input field under the appropriate label for the user to enter details -->
                    <label class="form-label fw-bold" for="username">Username: <?php echo $result['username'];?></label>
                    
                
            </div>
        </div>
        <!-- user email input-->
        <div class="row ">
                <div class="col">
                    
                        <!-- input field under the appropriate label for the user to enter details -->
                        <label class="form-label fw-bold" for="email">Enter your email: <?php echo $result['email'];?></label>
                        
                    
                </div>
        </div>

       

        <!-- edit button -->
        
            <div class="text-center">
                
                <a href ="updateprofile.php?id=<?php echo $result['id'];?>" class="btn button"> Edit
                <!-- loading the update/edit icon  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a>
                
            </div>
       
        
     

        <?php
        }
    ?>
    </div>

<style>
label{
    font-size: 25px;
    margin-top: 20px;
}
.container{
  padding-left:100px;
  background:#FFC131;
  font-family: 'RocknRoll One', sans-serif;
  height: 300px;
  width: auto;
  margin-top: 20px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
body{
  background:#fdb100;
}
h1{
    margin-top: 10px;
    text-align: center;
    padding-bottom:15px;

    width: 100%;
    font-family: 'RocknRoll One', sans-serif;
}
.button
{
    background-color:#347599;
    color:#fffeeb;
}
.button:hover
{
    background-color:#DF8C00;
    color:#fffeeb;
}

</style>