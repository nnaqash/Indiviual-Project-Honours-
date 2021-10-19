<!-- including the links -->
<?php require ('components/head.inc.php'); ?> 
<?php include ('navbar.php'); ?> 

<!-- putting information in the container -->
<div class =" container">
  <!-- using row so two things can appear next to each other -->
  <div class="row">
    <!-- first coloumn containing the text -->
    <div class = "col">
      <div class="about">
        <!-- header -->
        <h2> Welcome to our website</h2>
        <!-- text -->
          <p> We are a dedicated group who's trying there best to give our users the best possible experience. We are working day and night to bring more features 
              to out website. We are UK based company of young designers and developers. Our vision is to give our users the best platform shaped for their experierce. We designed this application in consideration with our users needs.
              You can contact us with suggestions and feedback through our contact us page.
              You can also reach through us on our facebook, Instagram and Twitter.
          </p>
      </div>  
    </div>
     <!--second coloumn  -->
    <div class="col">
      <!-- adding apicture -->
      <div class="pic">
      <img src = "images/download.jpeg"> 
      </div>      
    </div> 
  </div>


</div>

<!-- styling for the php -->
 <style>
.about{
    font-size: 20px;
    margin-top: 100px;
    margin-left: 50px;
    margin-right: 20px;
    width: 700px;
 
}
body{
  background:#FFC131;
  /* opacity: 0.5; */

}
p
{
  text-align:justify;
}
.pic
{
margin-top: 100px;
width:300px;
height: 300;
}
</style>