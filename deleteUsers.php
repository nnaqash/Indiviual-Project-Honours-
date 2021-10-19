
<!-- connection to the database -->
<?php include "join.php";


// fetching the user id to delete that specific user
$id = $_GET['id'];
//sql query to delete the user
$q = "DELETE FROM `users` WHERE id = $id";
//executing the sql query
mysqli_query($conn,$q);
//after deleting heading back to the page
header('location: UserTable.php');
?>