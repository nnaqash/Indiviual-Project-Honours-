<!-- including the necessary links-->
<?php include "join.php" ?>

<?php include "components/head.inc.php"; ?>

<?php include "adminnav.php" ?>


<!-- User Reviews -->
<div class ="container-fluid">
<table class="table table-responsive table-striped table-hover">
  <thead>
    <tr>
      <!-- heading for the table fields -->
      <th scope="col">Name of cheese</th>
      <th scope="col">Type of cheese</th>
      <th scope="col">Texture of cheese</th>
      <th scope="col">Origin</th>
      <th scope="col">Ingredients</th>
      <th scope="col">Comments</th>
      <th scope="col">username</th>
      <th scope="col">Picture</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

<!-- fetching from database in a loop using php -->
<?php
//selecting  all the data from the table users
$select = "SELECT * FROM reviews INNER JOIN users ON reviews.user_id = users.id";
//reflecting the query on the database
$query = mysqli_query($conn,$select);
/* using php builtin function of associative array to fetch the data
along with the while loop so it keeps loading the data constantly */
while($result = mysqli_fetch_assoc($query))
{
?> 
    <tr>
        <!-- printing the results of the query -->
        <td><?php echo $result['name_of_cheese'];?></td>
        <td><?php echo $result['type_of_cheese'];?></td>
        <td><?php echo $result['texture_of_cheese'];?></td>
        <td><?php echo $result['origin'];?></td>
        <td><?php echo $result['ingredients'];?></td>
        <td><?php echo $result['comments'];?></td>
        <td><?php echo $result['username'];?></td>
        <td> <img src= "<?php echo $result['image_url'];?>"class="img-responsive rounded float-start" style="width: 100px; height: 100px;"></td>  

        <!-- fetching the review id so that review can be deleted and when the button is clicked execute the delete review -->
        <td><a href ="deleteReview.php?r_id=<?php echo $result['r_id'];?>">
                <!-- loading the delete icon  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="Red" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></a></td>
    </tr>
<?php
} // closing the while loop
?>
    
  </tbody>
</table>
</div>