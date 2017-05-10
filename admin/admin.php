<?php session_start();
  if(!isset($_SESSION["admin"]) || ($_SESSION["admin"]!=1)) 
  {
  header("Location: ../index.html");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../libs/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="src/dashboard.css" rel="stylesheet">

    <script src="../libs/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="src/adminLogic.js"></script>
  
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin.html">Admin panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li><a id="sign_out">Sign out</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a id="users">Users</a></li>
            <li><a id="projects">Projects</a></li>
            <li><a id="user_requests">User requests</a></li>
            <li><a id="user_create">User create</a></li>
            <li><a id="project_post">Project post</a></li>
            <li><a id="news">News</a></li>
            <li><a id="news_create">News create</a></li>
            <!-- <li><button id="soap">soapbutton</button> -->
          </ul>
         
        </div>
        <div id="bigContainer" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" id="page_title">Welcome to admin panel</h1>
          
          
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../libs/node_modules/jquery/dist/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="libs/bootstrap-3.3.7/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../libs/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../libs/bootstrap-3.3.7/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../libs/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../libs/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  </body>
</html>
