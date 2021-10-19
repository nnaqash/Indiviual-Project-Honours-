<!-- including the connection file -->
<!-- php code to delete review in the admin table-->
<?php include "join.php";
//fetching review id from the database
$r_id = $_GET['r_id'];
//sql query to delete
$q = "DELETE FROM `reviews` WHERE r_id = $r_id";
//executing the sql query
mysqli_query($conn,$q);
//once the query is performed load the table with updated results
if($q)
{
    header('location: ReviewTable.php');
}
else 
{
    ?>
    <!-- printing a message that data is not deleted-->
    <script> alert (' Not deleted'); </script>
    <?php
    
}

?>