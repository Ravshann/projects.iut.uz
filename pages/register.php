<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="image/icon2.png">
    <!-- <link rel="stylesheet" type="text/css" href="src/css/navbar-fixed-top.css"> -->

    <link href="../libs/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../libs/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../libs/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- <link href="src/css/carousel.css" rel="stylesheet"> -->


    <link rel="stylesheet" href="../libs/bootstrap-3.3.7/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../libs/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">
   <link rel="stylesheet" type="text/css" href="../src/css/menubar.css">
   <script type="text/javascript" src="../src/scripts/menubar.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../src/css/w3.css">
  <link rel="stylesheet" href="../src/css/submit.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
   integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
   crossorigin=""/>
   <script src="../libs/node_modules/jquery/dist/jquery.min.js"></script>
   <script type="text/javascript" src = "../src/scripts/sign.js"></script>
<style>

input:required:focus {
  box-shadow: 0  0 3px rgba(255,0,0,0.5); 
}
   body, html {
    
    height: 100%;
    padding-right: 10px;
}

    .parallax {
    /* The image used */
    background-image: url('../image/visitka1.png');
    margin-top: 0px;
    /*z-index: -1;*/


     /* Full height */
    height: 80%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .welcome{
    padding-top: 40%;
    text-align: center;
    font-size: 30px;
    color: blue;
  }

      .parallax1 {
    /* The image used */
    background-image: url('../image/office.png');
    margin-top: 0px;
    z-index: -1;

     /* Full height */
    height: 100%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
footer{
  margin-right: 10px;
  margin-left: 10px;
}
#mySidenav{
  background-image: url("../image/narrow.png");
}
#mySidenav a{
  color: white;
}
</style>
</head>
<body>

    
      <div class="navbar-wrapper">
          <div class="container">
          <nav class="navbar navbar-default navbar-fixed-top">

             <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="#">HOME</a>
              <a href="projects.html">PROJECTS</a>
              <a href="#">WINNERS</a>
              <a href="news.html">NEWS</a>
              <a href="contact_us.html">CONTACT US</a>
              <a href="submit.html">SUBMIT</a>
          </div> 



          <div class="col-md-4" style=" text-align: left; background-color: #009688;"><button class="w3-button w3-teal w3-xlarge" onclick="openNav()">☰ MENU</button></div>
          <div class="col-md-4" style="background-color: #009688; text-align: center; height: 52px; padding-top: 10px; font-size: 25px; color: white;"><a href="#">PROJECTS.IUT.UZ</a></div>
              <div class="col-md-4" style="text-align:right;background-color: #009688; "><button type="submit" class="w3-button w3-teal w3-xlarge" onclick="openSub()">SUBMIT</button></div>

              
   
            
              </div> <!-- end of container-->
          </nav>
          </div>
       </div>

 <div class="parallax">
   <!-- <p class="welcome">I am OdilJon<br>Welcome here you can see latest Projects!</p> -->

 </div>

<div id="main">
<div class="container">
  <center>
  <h1 id="ContactUs">Registration</h1>
  
  </center>


  
 
  <div class="row">
  <div class="col-md-4 col-xs-4"  style="text-align: right;">
  <h4 style="padding-top: 10px;">Name: </h4>
  <h4 style="padding-top: 10px;">Last Name: </h4> 
  <h4 style="padding-top: 10px;">Email: </h4>
  <h4 style="padding-top: 10px;">Password: </h4> 
  
  </div>
  <div class="col-md-8 col-xs-8">
    <input type="text" id='name' style="margin-top: 10px;" class="form-control" name="" placeholder="Name" required>
    <input type="text" id="last_name" style="margin-top: 10px;" class="form-control" name="" placeholder="Last Name" required>
    <input type="text" id="email" style="margin-top: 10px;" class="form-control" name="" placeholder="email" required>
    <input type="text" id="password" style="margin-top: 10px;" class="form-control" name="" placeholder="password" required>
  </div>
</div>
<br>
<input type="submit" value="Submit" id="reg" style="float: right;" class="btn btn-primary">

<br>
</div>
   <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 INHA UNIVERSITY in TASHKENT,IUT. &middot; <a href="http://www.iutlab.uz">IUTLab</a> &middot; <a href="../contact_us.html">Contact</a>
        </p>
      </footer>
      </div>

<div class="parallax1"></div>

  
</div>
</body>
</html>