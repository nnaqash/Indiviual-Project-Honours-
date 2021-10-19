<!-- including the necessary links-->
<?php require ('session.php'); ?> 
<?php include "join.php" ?>
<?php include "components/head.inc.php"; ?>
<?php include "components/body.inc.php"; ?>

<!-- styling for the navbar -->
<style>

nav
{
  background-color:#FFDD50;
}
a{
  color:black;
}
a:hover
{
  background-color: #347599;
  color:#fffeeb;

}
ul li a.active
{
background: #347599;
color:white;
}
.navbar-toggler
{
color:Black;
border: none;
padding:10px  6px;
outline: none;
}
.navbar-toggler span{
  display:block;
  width:25px;
  height:3px;
  border: 1px;
  background: black;
}
.navbar-toggler span+span{

  width:20px; 
  margin-top: 4px;
  margin-left:5px ;

}
.navbar-toggler span+span+span{

  width:15px;
  margin-left: 10px;

}
.button1
{
background-color:#347599;
color:#fffeeb;
}
.button1:hover
{
  color:#fffeeb;
}
.user
{
  margin-right: 20px;
}
.navbar-brand
{
  margin-left: -100px;
}

</style>
<!-- nav bar header and using bootstrap sticky top so the nav bar stays at thetop while scrolling -->
<header class="header sticky-top">
<nav class="navbar navbar-expand-sm ">
<div class="container-fluid container-md sticky-top">
  <div  class="navbar-brand">
        <!-- inserting Logo -->
      <img src = "Logo.PNG" style= "width: 180px; height: 95px; ">
  </div>
  <!-- navbar toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
      <span class="navbar-toggler-icon "></span>
      <span class="navbar-toggler-icon "></span>
    </button>
    <!-- when the navbar will collapse the tabs will collapse with it -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-sm-0">
        <!-- home tab -->
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="Home.php"><b>Home</b></a>
        </li>
        <!-- add review tab -->
        <li class="nav-item">
            <a class="nav-link" href="addreview.php"><b>Add Review</b></a>
        </li>
        <!-- review history tab -->
        <li class="nav-item">
            <a class="nav-link" href="reviewhistory.php"><b>Review History</b></a>
        </li>                      
        <!-- contact us tab -->
        <li class="nav-item">
            <a class="nav-link" href="contact.php"><b>Contact Us</b></a>
        </li>
        <div class="text-center">
          <!-- search bar -->
        <form action ="search.php"  method="POST" class="d-flex align-item-right">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-outline-success" name ="submitsearch" type="submit">Search</button>
        </form>
        </div>               
      </ul> 
      <!-- <div class="user">
      <p>  <b>Username: <?php echo $_SESSION['username'];?> </b></p>
      </div> -->
      <!-- drop down for the navbar -->
      <div class="dropdown">
        <button class="btn button1  dropdown-toggle" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">Account
        </button>
        <!-- elements of the dropdown -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark p-3" aria-labelledby="dropdownMenuButton5">
          <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="contact.php">Help and Support</a></li>
          <li><a class="dropdown-item" href="aboutus.php">About us</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <!-- logout button -->
              <form action ="logout.php" method="POST">
                <div class="text-center">
                    <button class="btn Button5 btn-outline-warning"  name = "Logout" href ="login.php" style="margin:right">Logout</button>
                </div>
              </form> 
          </li>

        </ul>
      </div>
    </div>
</div>
</nav>
</header>