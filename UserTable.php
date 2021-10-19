<!-- including the necessary links-->
<?php include "join.php" ?>

<?php include "components/head.inc.php"; ?>

<?php include "adminnav.php" ?>


<!-- User credentials -->
<div class ="container-fluid">
<table class="table table-responsive table-striped table-hover">
  <thead>
    <tr>
      <!-- heading for the table fields -->
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>      
      <th scope="col">Picture</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

<!-- fetching from database in a loop using php -->
<?php
//selecting  all the data from the table users
$select = " select * from users" ; 
//reflecting the query on the database
$query = mysqli_query($conn,$select);
/* using php builtin function of associative array to fetch the data
along with the while loop so it keeps loading the data constantly */
while($result = mysqli_fetch_assoc($query))
{
?> 
    <tr>
        <!-- printing the results of the query -->      
        <td><?php echo $result['id'];?></td>
        <td><?php echo $result['firstname'];?></td>
        <td><?php echo $result['lastname'];?></td>
        <td><?php echo $result['email'];?></td>
        <td><?php echo $result['username'];?></td>
           
        <td>Pic</td>
        <!-- update the account details -->
        <td><a href ="updateUsers.php?id=<?php echo $result['id'];?>"> 
                <!-- loading the update/edit icon  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="Green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a></td>
        <!-- delete the account -->
        <td><a href ="deleteUsers.php?id=<?php echo $result['id'];?>"> 
                <!-- loading the delete icon  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="Red" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></a></td>
    </tr>
<?php
}
?>
    
  </tbody>
</table>
</div>