<?php require ('components/head.inc.php'); ?>
<?php include "join.php" ?>

<!-- PHP code for the edit functionality -->


<!-- <?php
/* if (isset($_GET['submit']))
{
    $id = $_GET['review_id'];
    $result = $mysqli->query("select * from reviews where r_id={$id}") or die($mysqli->error());
    if(count($result)==1)
    {
        $row =$result->fetch_array();
        $CheeseName = $row(['CheeseName']);
    }
} */


?> -->








<?php 

$ids = $_GET['review_id'];
$show_query ="select * from reviews where r_id={$ids}";

$showdata =mysqli_query($conn,$show_query);

$result = mysqli_fetch_array($showdata);
if(isset($_POST['submit'])) /* if the submit button is pressed then take all the data that user has entered */
{
    $idupdate = $_GET['r_id'];
    /* using my mysqli_real_escape_string to prevent sql injection */
    $CheeseName = mysqli_real_escape_string($conn, $_POST['CheeseName']);
    $CheeseType =  mysqli_real_escape_string($conn, $_POST['CheeseType']);
    $texture =  mysqli_real_escape_string($conn, $_POST['texture']);
    $origin =  mysqli_real_escape_string($conn, $_POST['origin']); 
    $ingredients =  mysqli_real_escape_string($conn, $_POST['ingredients']);
    $comment =  mysqli_real_escape_string($conn, $_POST['comment']);
    /* $file = $_FILES['image']; 
    $userid = $_SESSION['id'];
 */
    //print_r($file);
    /* $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileError= $file['error']; */
    // checking if there is any error while uploading
    /* if ($fileError == 0)
    {   
        //settind the destination where the file will be added
        $destinationfile = 'upload/'. $filename; */
        //echo "$destinationfile";
        //php function to store the file path on the database
        /* move_uploaded_file($filepath,$destinationfile); */
        $updatequery = "UPDATE reviews SET r_id=$r_id, name_of_cheese='$CheeseName', type_of_cheese='$CheeseType', texture_of_cheese='$texture', origin='$origin', ingredients='$ingredients', comments='$comment', WHERE r_id=$idupdate";

        $query = mysqli_query($conn, $updatequery);
        header('location: UserTable.php');
   
        if($query)
        {
           ?>
               <script> alert ('update successful');</script>
                       
           <?php
        }
        else
        {
           ?>
           <script> alert ('update not successful');</script>    
           <?php
        }
   
    }
/* }  */  
?>
   
<!-- creating the form so the users can update -->
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
<!-- form to add review -->
<div class="container">
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" style="width:450px; margin:auto">
<!-- making use of the bootstrap grid system so the fields will show next to each other -->

    <div class="row ">
        <div class="col my-3"> <!-- my is the bootstrap margin  -->
            <div class="form-group">
            <label for="CheeseName">Name of cheese:</label>
            <!-- input field for entering cheesename -->
            <input type="text" name="CheeseName" id="CheeseName" class="form-control" placeholder="Please Enter Here" value="<?php echo $result['name_of_cheese'];?>">           
            </div>
        </div>
        <div class="col my-3 ">
            <div class="form-group">
                <label for="CheeseType">Brand of Cheese:</label>
                <!-- input field for entering type of cheese -->
                <input type="text" name="CheeseType" id="CheeseType" class="form-control" placeholder="Please Enter Here" value="<?php echo $result['type_of_cheese'];?>">
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <div class="form-group">
                <label for="texture">Texture of Cheese:</label>
                <!-- for texture -->
                <input type="text" name="texture" id="texture" class="form-control" placeholder="Please Enter Here" value="<?php echo $result['texture_of_cheese'];?>">         
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="origin">Origin of Cheese:</label>
                <!-- for origin -->
                <input type="text" name="origin" id="origin" class="form-control" placeholder="Please Enter Here" value="<?php echo $result['origin'];?>">
            </div>
        </div>
    </div>
    
    <div class="form-group my-3">
        <label for="ingredients">Ingredients:</label>
        <!-- for ingredients -->
        <input type="text" name="ingredients" id="ingredients" class="form-control" placeholder="Please Enter Here" value="<?php echo $result['ingredients'];?>">
    </div>
        
   
    
    <div class="form-group my-3">
        <label for="coment">Comments:</label>
        <!-- for comments using textarea so that comment box can be drawn out-->
        <textarea type="text" name="comment" id="comment" class="form-control" placeholder="Please Enter Here" rows="3"value="<?php echo $result['comments'];?>"></textarea> <!--  -->
    </div>

    <!-- <div class="form-group">
        <input type="file" name="image" class="form-control">
    </div> -->
    
<!-- submmision button -->
<div class="row my-3">
    <div class="col">
    <!-- button -->
        <button class="btn btn-success" type="submit" name="submit">Submit</button>
    </div>
</div>        


