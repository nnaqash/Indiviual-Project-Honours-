
<!-- including the necessary links-->

<?php include "join.php" ?>
<?php include "components/head.inc.php"; ?>
<?php include "components/body.inc.php"; ?>


<!-- admin nav bar -->
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <!-- inserting the logo -->
    <div class="navbar-brand" > <img src = "Logo.PNG" style= "width: 180px; height: 95px; "></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <!-- user profile tab -->
          <a class="nav-link active" aria-current="page" href="UserTable.php">User Profiles</a>
        </li>
        <!-- user review tabs -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ReviewTable.php">User Reviews</a>
        </li>
      </ul>
      <!-- dropdown for the account  -->
      <div class="dropdown">
        <button class="btn button1  dropdown-toggle" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">Account
        </button>
        <!-- drop down items -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark p-3" aria-labelledby="dropdownMenuButton5">
          <li><a class="dropdown-item" href="contact.php">Help and Support</a></li>
          <li><a class="dropdown-item" href="aboutus.php">About us</a></li>
          <li><hr class="dropdown-divider"></li>

          <li>
              <!--logout for the admin, calling the logout script  -->
              <form action ="logout.php" method="POST">
                <div class="text-center">
                    <button class="btn Button5 btn-outline-warning"  name = "Logout"  style="margin:right">Logout</button>
                </div>
              </form> 
          </li>

        </ul>
      </div>

    
    </div>
  </div>
</nav>
<!-- styling for the page -->
<style>

nav
{
  background-color:#FFDD50;
}
a{
  color:black;
  
}
.button2
{
    margin-left:20px;
}
.button1
{
background-color:#347599;
color:#fffeeb;
}
a:hover
{
  background-color: #347599;
  color:#fffeeb;

}
ul li a.active
{

  color:#fffeeb;
}
</style>

<!-- reviews page -->

<!-- users page -->
