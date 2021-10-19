<!-- including the necessary links-->
<?php require ('components/head.inc.php'); ?> 
<?php require ('navbar.php'); ?> 
<?php include "join.php" ?>

<!-- form to add review -->
<div class="container">
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" style="width:450px; margin:auto" >
<!-- making use of the bootstrap grid system so the fields will show next to each other -->

    <div class="row ">
        <div class="col my-3"> <!-- my is the bootstrap margin  -->
            <div class="form-group">
            <label for="CheeseName">Name of cheese:</label>
            <!-- input field for entering cheesename -->
            <input type="text" name="CheeseName" id="CheeseName" class="form-control" placeholder="Please Enter Here" required>           
            </div>
        </div>
        <div class="col my-3 ">
            <div class="form-group">
                <label for="CheeseType">Brand of Cheese:</label>
                <!-- input field for entering type of cheese -->
                <input type="text" name="CheeseType" id="CheeseType" class="form-control" placeholder="Please Enter Here" required>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <div class="form-group">
                <label for="texture">Texture of Cheese:</label>
                <!-- for texture -->
                <input type="text" name="texture" id="texture" class="form-control" placeholder="Please Enter Here" required>         
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="origin">Origin of Cheese:</label>
                <!-- for origin -->
                <input type="text" name="origin" id="origin" class="form-control" placeholder="Please Enter Here" required>
            </div>
        </div>
    </div>
    
    <div class="form-group my-3">
        <label for="ingredients">Ingredients:</label>
        <!-- for ingredients -->
        <input type="text" name="ingredients" id="ingredients" class="form-control" placeholder="Please Enter Here" required>
    </div>      
   
    
    <div class="form-group my-3">
        <label for="coment">Comments:</label>
        <!-- for comments using textarea so that comment box can be drawn out-->
        <textarea type="text" name="comment" id="comment" class="form-control" placeholder="Please Enter Here" rows="3" required></textarea> <!--  -->
    </div>

    <div class="form-group">
        <input type="file" name="image" class="form-control">
    </div>
    
<!-- submmision button -->
<div class="row my-3 text-center" >
    <div class="col ">
    <!-- button -->
        <button class="btn btn-success button" type="submit" name="submit">Submit</button>
    </div>
</div>        


<!-- PHp code to save user inputs -->
<?php 

    if(isset($_POST['submit'])) /* if the submit button is pressed then take all the data that user has entered */
    {
        /* using my mysqli_real_escape_string to prevent sql injection */
        // storing the information added in the form in temporay variables
        $CheeseName = mysqli_real_escape_string($conn, $_POST['CheeseName']);
        $CheeseType =  mysqli_real_escape_string($conn, $_POST['CheeseType']);
        $texture =  mysqli_real_escape_string($conn, $_POST['texture']);
        $origin =  mysqli_real_escape_string($conn, $_POST['origin']); 
        $ingredients =  mysqli_real_escape_string($conn, $_POST['ingredients']);
        $comment =  mysqli_real_escape_string($conn, $_POST['comment']);
        $file = $_FILES['image']; 
        $userid = $_SESSION['id'];

        //print_r($file);
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileError= $file['error'];
        // checking if there is any error while uploading
        if ($fileError == 0)
        {   
            //setting the destination where the file will be added
            $destinationfile = 'upload/'. $filename;
            //echo "$destinationfile";
            //php function to store the file path on the database
            move_uploaded_file($filepath,$destinationfile);

            /* SQL query to save all the data */
            $queryinsert = "INSERT INTO `reviews`
            (`name_of_cheese`, `type_of_cheese`, `texture_of_cheese`, `origin`, `ingredients`, `comments`, `user_id`, `image_url`) 
            VALUES ('$CheeseName','$CheeseType','$texture','$origin','$ingredients','$comment','$userid','$destinationfile')";
            // PHP code that executes the query on the database
            $query = mysqli_query($conn, $queryinsert); 
            // checking if the query is performed or not
            if($query)
            {
                ?>
                <!-- if the review is added sucessfully then display in the review history page -->
                <script> location.replace("reviewhistory.php"); </script>                
                <?php
            }
            else 
            {
                ?>
                <!-- printing a message that data is not inserted -->
                <script> alert (' Not inserted'); </script>
                <?php
            }
        }   
    } 
?>

<!-- styling for the page -->
<style>

body{
    background:#fdb100;
}
label
{
    font-weight: bold;
}


</style>