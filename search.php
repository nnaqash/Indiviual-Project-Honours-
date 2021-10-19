<!-- including the necessary links-->
<?php include "join.php" ?>
<?php require ('navbar.php'); ?> 



<!-- styling for the page -->
<style>
body
{
    background-color: #fdb100;
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
.pic
{
    padding-bottom: 8px;
}
h1{
    text-align: center;
}
</style>

<h1> Your Search Results </h1>

<div class="container">
    <?php 
        if(isset($_POST['submitsearch']))
        {
            // search variable that will contain the information typed in the search form
        $search = mysqli_real_escape_string($conn, $_POST['search']); // using mysqli_real_escape_string to prevent sql injection
        
        //query for searching what user typed in the database
        $query = "SELECT * FROM reviews WHERE name_of_cheese LIKE '%$search%' OR type_of_cheese LIKE '%$search%'OR origin LIKE '%$search%'";
        // querying the results of the database
        $result = mysqli_query($conn,$query);
        //checking for the results of the query
        $queryResult = mysqli_num_rows($result);
        
            // using if statement to check if query result have more than one results from the database
            if ($queryResult > 0)
            {
                while ($res = mysqli_fetch_assoc($result))
                {
    ?>
    <!-- using a seperate class to create border -->  
    <div class="boundary">
        <div class="pic">
            <div class="row">
                <!-- <div class="col">
                <h4><b>Reviewed By:</b></h4>
                </div> -->
                <div class="col">
                    <!-- printing the image -->
                    <img src="<?php echo $res['image_url'];?>"class="img-responsive rounded float-start" style="width: 250px; height: 200px; rounded">
                </div>         
            </div>
        </div>

        <!-- adding an extra class so the review section will be highlighted  -->           
        <div class ="shadding">
            <div class = "row ">
                <!-- first coloum on the second row -->
                <div class =" col-sm pb-3 ">
                    <!-- printing the results under appropriate labe using php echo  -->
                    <label  style="font-size:22px;" for="CheeseType" ><b>Name of cheese:</b> <?php echo $res['name_of_cheese'];?> </label>
                </div> 
                <!-- second coloumn on the same row --> 
                <div class ="col-sm pb-3"> 
                    <!-- printing the results under appropriate labe using php echo  --> 
                    <label style="font-size:22px; " for="CheeseType" ><b>Brand of Cheese:</b> <?php echo $res['type_of_cheese'];?> </label>
                </div>
            </div>   
            <!-- third row -->
            <div class = "row ">
                <!-- first coloumn on the thrid row -->
                <div class ="col-sm pb-3">
                    <!-- printing the results under appropriate labe using php echo  -->  
                    <label  style="font-size:22px;" for="CheeseType"><b>Texture of Cheese:</b> <?php echo $res['texture_of_cheese'];?> </label>
                </div> 
                <!-- second coloumn on the third row -->    
                <div class ="col-sm pb-3 ">
                    <!-- printing the results under appropriate labe using php echo  -->  
                    <label style="font-size:22px;" for="origin"><b>Origin:</b> <?php echo $res['origin'];?> </label>
                </div>
            </div>
            <!-- fourth row -->
            <div class="row">
                <!-- creating the coloumn on the row -->
                <div class ="col-sm pb-3">
                    <!-- printing the results under appropriate labe using php echo  -->  
                    <label style="font-size:22px;" for="ingredients"><b>Ingredients:</b> <?php echo $res['ingredients'];?> </label>
                </div> 
            </div>   
            <!-- fifth row -->
            <div class="row">
                <!-- creating the coloumn on the row -->
                <div class ="col-sm pb-3">
                    <!-- printing the results under appropriate labe using php echo  -->  
                    <label style="font-size:22px;" for="comment"><b>Comment:</b> <?php echo $res['comments'];?> </label>
                </div> 
            </div>   
    
        </div>          
    </div> 
    <!-- closing the Brackets -->                  
    <?php 
                } /* closing while loop */            
            
            }else{ echo "NO RESULTS FOUND";} // closing if statement
           
        } // closing if statement
    ?>           
</div>


