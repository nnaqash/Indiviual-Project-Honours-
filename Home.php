<!-- including the necessary links-->
<?php require ('components/head.inc.php'); ?> 
<?php require ('navbar.php'); ?> 
<?php include "join.php" ?>

<!-- header of page -->
<div class="header">  
    <h1><b>Your Daily Cheesy Feed</b></h1>
</div>
<!-- loading the reviews using bootstrap grid -->
<section>
<!-- using container to generate the reviews in -->
<div class ="container" >
    <!-- Using Php to perform the sql query -->    
    <?php  
    // sql query to join two tables and select data and arange by descending order
    $q = "SELECT * FROM reviews INNER JOIN users ON reviews.user_id = users.id ORDER BY r_id DESC" ;
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
                            <!-- printint the user name -->
                            <h4><b>Reviewed By:</b> <?php echo $res['username'];?> </h4>
                        </div>
                        <!-- loading the image -->
                        <div class="col">
                            <img src="<?php echo $res['image_url'];?>"class="img-responsive rounded float-start" style="width: 250px; height: 200px; rounded">
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
                    <!-- row where two fields of coloumns will appear next to each other -->
                    <div class = "row ">
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
            </div>
        </div>  
          
    </div>      
    <?php 
    } /* closing while loop */
    ?>

</div>

</section>
<!-- styling of the page -->
<style>
body{
  background:#fdb100;
  /* opacity: 0.5; */

}
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;700&family=PT+Serif:wght@400;700&family=Pacifico&family=RocknRoll+One&display=swap');


img 
{
    width: auto;
    height: auto;
    margin-bottom: 10px;
    margin-top:3px;
 
}
.firstrow
{
  font:bold;
}
.container
{
    padding-left:100px;
    background:#fdb100;
    font-family: 'RocknRoll One', sans-serif;
    /*  */
}
h1{
    margin-top: 10px;
    text-align: center;
    padding-bottom:15px;
    width: 100%;
    /* font style */
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
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* border-radius: 25px; */
}
.boundary
{
    border: 2px solid black;
    padding: 5px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* border-radius: 25px; */
}
label
{
    padding-left: 5px;
}


</style>


  












