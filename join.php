<!-- connection script to join the database -->
<?php 

$servername = "localhost"; // name of the server
$username="root";//default username
$password=""; //default password
$dbname="mydb"; // database name

//joining connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
/* if($conn){
   echo"connected";

}else{
   echo "not connected";
} */
?> 