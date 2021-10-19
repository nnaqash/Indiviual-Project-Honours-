<!-- including the necessary links-->
<?php require ('components/head.inc.php'); ?> 
<?php require ('navbar.php'); ?> 
<?php include "join.php" ?>


<!-- header of page -->
<div class="header">  
    <h1><b>Your Review History </b></h1>
</div>
<section>
     <!-- using container to generate the reviews in with grid -->
<div class ="container" >
    <!-- Using Php to perform the sql query --> 
    <?php
    $s_id= $_SESSION['id'];
    // sql query to select and load the reviews of the user thats logged in
    $q = "SELECT * FROM reviews WHERE `user_id` = $s_id ORDER BY r_id DESC";  
    //executing the query
    $query = mysqli_query($conn,$q);
    // while loop to fetch the results of the query and storing them in $res
    while($res = mysqli_fetch_array($query))
    {
    ?>
    <!-- adding a border -->
    <div class="boundary">
        <div class="firstrow">     
            <div class="pic">
                <div class="row">
                    <div class="col">
                    <!-- loading the image -->
                    <img src="<?php echo $res['image_url'];?>"class="img-responsive rounded float-start" style="width: 250px; height: 200px; rounded">
                    </div>            
                </div>
            </div>
        </div> 
        <!-- putting review results in a separate class to style -->
        <!-- using rows coloums of the grid to layout the results of the query under their respective labels-->
        <div class ="shadding">
                <!-- row where two fields of coloumns will appear next to each other -->
                <div class = "row ">
                    <div class =" col-sm pb-3 ">
                        <!--print the name of cheese  under the label-->  
                        <label  style="font-size:22px;" for="CheeseType" ><b>Name of cheese:</b> <?php echo $res['name_of_cheese'];?> </label>
                    </div> 
                    
                    <div class ="col-sm pb-3">
                        <!--print the name of brand  under the label-->  
                        <label style="font-size:22px; " for="CheeseType" ><b>Brand of Cheese:</b> <?php echo $res['type_of_cheese'];?> </label>
                    </div>
                </div>
        
            <div class="Secondrow">
                <div class = "row ">
                    <!-- row where two fields of coloumns will appear next to each other -->
                    <div class ="col-sm pb-3">
                        <!--print the texture of cheese  under the label-->   
                        <label  style="font-size:22px;" for="CheeseType"><b>Texture of Cheese:</b> <?php echo $res['texture_of_cheese'];?> </label>
                    </div> 
                        
                    <div class ="col-sm pb-3 ">
                        <!--print the origin of cheese  under the label-->  
                        <label style="font-size:22px;" for="origin"><b>Origin:</b> <?php echo $res['origin'];?> </label>
                    </div>
                </div>
            </div> 

            <div class="thirdrow">
                <div class="row">
                    <!-- row where two fields of coloumns will appear next to each other -->
                    <div class ="col-sm pb-3">
                        <!--print the ingredients under the label-->  
                        <label style="font-size:22px;" for="ingredients"><b>Ingredients:</b> <?php echo $res['ingredients'];?> </label>
                    </div> 
                </div>  
            </div>            
        
            <div class="fourthrow">
                <div class="row">
                    <!-- row where two fields of coloumns will appear next to each other -->
                    <div class ="col-sm pb-3">
                        <!--print the user comments under the label-->  
                        <label style="font-size:22px;" for="comment"><b>Comment:</b> <?php echo $res['comments'];?> </label>
                    </div> 
                </div>   
            </div>

            <!-- fetching the review id so it can be deleted -->
            <a href ="reviewhistory.php?r_id=<?php echo $res['r_id'];?>" class="btn">
                    <!-- loading the delete icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="Red" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
            </a>
    
        </div>  
    </div>    

           
    <?php 
    } /* closing while loop */
    ?>
</div>
</section>

<!-- Update and delete -->
<?php 
/* deleting the review */
if(isset($_GET['r_id'])) /* getting the review id */
{
    $r_id = $_GET['r_id']; /* storing the id */
    /* sql query to delete the review where ids match */
    $d = "DELETE FROM `reviews` WHERE r_id = $r_id";
    /* storring the results of the quieries */
    mysqli_query($conn,$d);
    //echo("Deleted");
    //header('location: reviewhistory.php');

}
?>
<!-- styling for the page -->
<style>
body{
  background:#fdb100;
}

@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;700&family=PT+Serif:wght@400;700&family=Pacifico&family=RocknRoll+One&display=swap');


img 
{
    width: auto;
    height: auto;
    margin-bottom: 10px;    
 
}
.firstrow
{
  font:bold;
}
.container{
  padding-left:100px;
  background:#fdb100;
  font-family: 'RocknRoll One', sans-serif;
}
h1{
    margin-top: 10px;
    text-align: center;
    padding-bottom:15px;

    width: 100%;
    font-family: 'RocknRoll One', sans-serif;
}
h4
{
margin-bottom: -10px;

}
.shadding
{
    background-color: #FFC131;
    margin: -5px;
}
.boundary
{
    border: 2px solid black;
    padding: 5px;
    margin-bottom: 20px;
}
label
{
    padding-left: 5px;
}

</style>